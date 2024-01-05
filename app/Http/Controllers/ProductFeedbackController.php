<?php

namespace App\Http\Controllers;

use App\Models\FeedbackVote;
use App\Models\ProductFeedback;
use App\Http\Requests\StoreProductFeedbackRequest;
use App\Http\Requests\UpdateProductFeedbackRequest;
use App\Models\User;
use App\Notifications\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProductFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_feedback = ProductFeedback::all();
        return view('feedback.feedback_index',compact('product_feedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductFeedbackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductFeedback $productFeedback)
    {
        try {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
            if (Auth::user()->role == "admin") {
                Auth::logout();
                return redirect()->route('login');
            }
            $feedback_vote = FeedbackVote::firstOrNew([
                'feedback_id' => $productFeedback->id,
                'user_id' => Auth::user()->id,
            ]);
            $feedback_vote->feedback_id = $productFeedback->id;
            $feedback_vote->user_id     =  $productFeedback->user_id;
            if ($feedback_vote->vote  == 0){
                $feedback_vote->vote = 1;
            }else
            {
                $feedback_vote->vote  = 0;
            }
            $feedback_vote->save();
            $user   = User::find(Auth::user()->id);

            Notification::send($user, new Email());
            return back();
        } catch (\Exception $e) {
            // Log or print the exception message for debugging
            dd($e->getMessage());
        }




    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductFeedback $productFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductFeedbackRequest $request, ProductFeedback $productFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductFeedback $productFeedback)
    {
        //
    }
}
