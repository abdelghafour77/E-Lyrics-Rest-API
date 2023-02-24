<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\LyricsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerRegister;



//include JWT provider "Tymon\JWTAuth\Providers\JWT\Provider"
use Tymon\JWTAuth\Providers\JWT\Provider;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;


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

Route::post('register',[ControllerRegister::class,'register'])->name('register');
Route::post('login',[ControllerRegister::class,'login'])->name('login');
Route::get('logout',[ControllerRegister::class,'logout'])->name('logout');

Route::apiResource('albums', AlbumController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('lyrics',LyricsController::class);
// create route for lyrics methode get return message from api file
// Route::get('lyrics', [LyricsController::class, 'getLyrics']);




// ressources for the APIcfor songs table
Route::apiResource('songs', SongController::class);

// ressources for the APIcfor artists table
Route::apiResource('artists', ArtistController::class);
// Route::post('/profile/change_password', [ProfileController::class, 'change_password']);
Route::post('/profile/update/{id}', [ProfileController::class, 'update_profile']);
// Route::post('/profile/change_password',[ProfileController::class,'change_password'])->middleware('auth:api');