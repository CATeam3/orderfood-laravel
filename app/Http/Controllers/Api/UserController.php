<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $users)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        return $this->sendResponse(new UserResource($user), 'Succesfully fetched your profile.');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->update($request->toArray());
        return $this->sendResponse(true, 'Changed your account data successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
