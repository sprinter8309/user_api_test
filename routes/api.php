<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;

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

Route::group(['prefix' => 'user'], function () {
    Route::get('list', [UserController::class, 'userList'])->name('user.list');
    Route::get('{user_id}', [UserController::class, 'userView'])->name('user.view');
    Route::post('add', [UserController::class, 'userAdd'])->name('user.add');
    Route::put('update', [UserController::class, 'userUpdate'])->name('user.update');
    Route::delete('{user_id}', [UserController::class, 'userDelete'])->name('user.delete');
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
