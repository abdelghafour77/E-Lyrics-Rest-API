<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Controllers\Api\LyricsController;

use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;


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


Route::apiResource('lyrics',LyricsController::class);

// ressources for the APIcfor songs table
Route::apiResource('songs', SongController::class);

// ressources for the APIcfor artists table
Route::apiResource('artists', ArtistController::class);

