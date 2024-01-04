<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user  = User::query()->where('role' , User::IS_USER)->paginate(10);
        return view('user.user_index',compact('user'));
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
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try{
            $user               = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->role         = User::IS_USER;
            $user->status       = $request->active ?? 0;
            $user->password     = Hash::make($request->password);
            $user->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Add Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return response()->json(
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();
        try{
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->role         = User::IS_USER;
            $user->status       = $request->active ?? 0;
            $user->password     = Hash::make($request->password);
            $user->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Updated Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'success']);
    }
}
