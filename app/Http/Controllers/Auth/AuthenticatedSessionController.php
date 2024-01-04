<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin'){
            return redirect()->intended(RouteServiceProvider::HOME);
        }elseif (Auth::user()->role == 'user'){

            if (Auth::user()->status == 1)
            {
                if(Auth::user()->email == $request->input('email'))
                {
                    return redirect()->intended(RouteServiceProvider::USER);
                }
                else
                {
                    Auth::logout();
                    return redirect()
                        ->back()
                        ->with('error', 'Invalid !');
                }
            }
            else
            {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                Auth::logout();
                return redirect()
                    ->back()
                    ->withInput($request->only($request->input('username'), 'remember'))
                    ->with('error', 'You must be active first Yourself from Email For login.');
                // dd($userData);
            }
//                return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
