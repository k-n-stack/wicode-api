<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {
        return $Article;
    }

    // public function showByCategory(Request $request)
    // {
    //     $test = Article::where('id')
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $Article)
    {
        $Article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        $Article->delete();
    }

    /**
     * Request body must have a "category_id" key.
     * Otherwise, return error.
     */
    public function getArticlesByCategory(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('category_id', $_body)) {
            return ['error' => 'no category provided'];
        }

        $_categoryId = $_body['category_id'];
         
        return Category::find($_categoryId)->articles;
    }

    /**
     * Request body must have a "user_id" key.
     * Otherwise, return error.
     */
    public function getArticlesByUser(Request $request) {
        $_body = json_decode($request->getContent(), true);
        if(!array_key_exists('user_id', $_body)) {
            return ['error' => 'no user provided'];
        }

        $_userId = $_body['user_id'];

        return User::find($_userId)->articles;
    }
}
