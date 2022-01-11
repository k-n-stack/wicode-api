<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // api/message
    public function index()
    {
        return message::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        message::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // api/message/5
    public function show(message $message)
    {
        return $message;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        $message->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        $message->delete();
    }

    /**
     * Request must have a "user_id" key
     * return error otherwise
     */
    public function getMessagesByUser(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('user_id', $_body)) {
            return ['error' => 'no user provided'];
        }

        $_userId = $_body['user_id'];

        return User::find($_userId)->messages;
    }
}
