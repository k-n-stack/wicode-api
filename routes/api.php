<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\MessageController;

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

// GET request to 'login' route is forbidden.
Route::get('login', [ 'as' => 'login', 'uses' => function() {
    return "unauthorized";
}]);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    Route::apiResource('article', ArticleController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('comment', CommentController::class);
    Route::apiResource('message', MessageController::class);
});