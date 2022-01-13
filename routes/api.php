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
Route::fallback(function() {
    return view("welcome");
});

//API route for register new user
// Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

// API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

// API route go register a user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

// GET request to 'login' route is forbidden.
Route::get('login', [ 'as' => 'login', 'uses' => function() {
    return view("welcome");
}]);

// test free route
Route::get('test', function() {
    return ['test' => 'test'];
});
  ### API route for articles ###
    ##############################
    Route::apiResource('article', ArticleController::class);
    // Get all articles from one category.
    Route::post('category/articles', [ArticleController::class, 'getArticlesByCategory']);
    // Get all articles from one user.
    Route::post('user/articles', [ArticleController::class, 'getArticlesByUser']);


    ### API route for category ###
    ##############################
    Route::apiResource('category', CategoryController::class);


    ### API route for comments ###
    ##############################
    Route::apiResource('comment', CommentController::class);
    // Get all comments from one article.
    Route::post('article/comments', [CommentController::class, 'getCommentsByArticle']);
    // Get all comments from one user.
    Route::post('user/comments', [CommentController::class, 'getCommentsByUser']);

        ### API route for user ###
    Route::apiResource('user', UserController::class);
        // Get all user from one role.
    Route::post('role/users', [UserController::class, 'getUsersByRole']);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    ### API route for logout user ###
    #################################
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    ### API route for messages ###
    ##############################
    Route::apiResource('message', MessageController::class);
    // Get all message from one user.
    Route::post('user/messages', [MessageController::class, 'getMessagesByUser']);



});