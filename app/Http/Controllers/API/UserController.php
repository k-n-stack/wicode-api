<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    }

    /**
     * Request body must have a "role_id" key
     * return error otherwise
     */
    public function getUsersByRole(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('role_id', $_body)) {
            return ['error' => 'no role provided'];
        }

        $_roleId = $_body['role_id'];

        return Role::find($_roleId)->users;
    }



}
