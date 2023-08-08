<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddMenuController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('add-menu', [AddMenuController::class, 'add_menu']);
Route::post('add-new-menu', [AddMenuController::class, 'add_new_menu']);
Route::get('edit-menu/{id}', [AddMenuController::class, 'edit_menu']);
Route::post('update-menu/{id}', [AddMenuController::class, 'update_menu']);
Route::get('menu-dlt/{id}', [AddMenuController::class, 'delete_menu']);