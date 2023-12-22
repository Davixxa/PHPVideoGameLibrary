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

//Startpage
//Localization Routing
Route::get("locale/{lange}",[LocalizationController::class,'setLang']);

//Localization Routing
Route::get("locale/{lange}",[LocalizationController::class,'setLang']);

//Uncategorized
Route::get('/game/index', [GameController::class, 'showIndex'])->name('showIndex');

//Signup stuff
Route::get('/game/account', [GameController::class, 'showAccount'])->name('showAccount');
Route::get('/game/signup', [GameController::class, 'showSignup'])->name('showSignup');
Route::get('/game/news', [GameController::class, 'showNews'])->name('showNews');

//Games
Route::get('/game/strategy', [GameController::class, 'showStrategy'])->name('showStrategy');
Route::get('/game/racing', [GameController::class, 'showDrivingRacing'])->name('showDrivingRacing');
Route::get('/game/action', [GameController::class, 'showAction'])->name('showAction');
Route::get('/game/shooting', [GameController::class, 'showShooting'])->name('showShooting');
Route::get('/game/puzzle', [GameController::class, 'showPuzzle'])->name('showPuzzle');
