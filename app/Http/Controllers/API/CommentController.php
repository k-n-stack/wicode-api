<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return comment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        comment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        $comment->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        $comment->delete();
    }

    /**
     * Request body must have a "article_id" key,
     * return error otherwise
     */
    public function getCommentsByArticle(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('article_id', $_body)) {
            return ['error' => 'no article provided'];
        }

        $_articleId = $_body['article_id'];

        return Article::find($_articleId)->comments;
    }

    public function getCommentsByUser(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('user_id', $_body)) {
            return ['error' => 'no user provided'];
        }

        $_userId = $_body['user_id'];

        return User::find($_userId)->comments;
    }
}
