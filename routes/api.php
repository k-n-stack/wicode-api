<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\UserController;

use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//API route for register new user
// Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

// API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

// API route to register a user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

// GET request to 'login' route is forbidden.
Route::get('login', [ 'as' => 'login', 'uses' => function() {
    return "unauthorized";
}]);

// test free route
Route::get('test', function() {
    $test = Category::find(2);
    return $test->articles;
});

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    // API route for articles
    Route::apiResource('article', ArticleController::class);
    Route::get('category/{id}/articles', [ArticleController::class, 'getArticlesByCategory']);
    Route::get('user/{id}/articles', [ArticleController::class, 'getArticlesByUser']);

    // API route for category
    Route::apiResource('category', CategoryController::class);

    // API route for comments
    Route::apiResource('comment', CommentController::class);
    Route::get('article/{id}/comments', [CommentController::class, 'getCommentsByArticle']);

    // API route for messages
    Route::apiResource('message', MessageController::class);
    Route::get('user/{id}/messages', [MessageController::class, 'getMessageByUser']);

    // API route for user
    Route::apiResource('user', UserController::class);
});