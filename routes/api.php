<?php

use App\Http\Controllers\Api\ClientAuthController;
use App\Http\Controllers\Api\CreateProjectController;
use App\Http\Controllers\Api\partnerAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth/partner'
], function ($router) {
    Route::post('/login', [partnerAuthController::class, 'login']);
    Route::post('/register', [partnerAuthController::class, 'register']);
    Route::post('/logout', [partnerAuthController::class, 'logout']);
    Route::post('/refresh', [partnerAuthController::class, 'refresh']);
    Route::get('/user-profile', [partnerAuthController::class, 'userProfile']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth/clinet'
], function ($router) {
    Route::post('/addClient', [ClientAuthController::class, 'register']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'project'
],function($router){
    Route::post('/createProject',[CreateProjectController::class,'create']);
});

