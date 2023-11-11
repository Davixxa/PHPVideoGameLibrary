<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Uncategorized
Route::get('/game/index', [GameController::class, 'showIndex'])->name('showIndex');

//Games
Route::get('game/strategy', [GameController::class, 'showStrategy'])->name('showStrategy');
Route::get('game/drivingracing', [GameController::class, 'showDrivingRacing'])->name('showDrivingRacing');
Route::get('game/action', [GameController::class, 'showAction'])->name('showAction');
Route::get('game/shooting', [GameController::class, 'showShooting'])->name('showShooting');
