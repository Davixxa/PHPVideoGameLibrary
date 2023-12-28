<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;

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

Route::get('/', [GameController::class, 'showIndex'])->name('showIndex');
Route::get('/games/{id}', [GameController::class, 'showGame'])->name('showGame');

Route::get('/game/strategy', [GameController::class, 'showStrategy'])->name('showStrategy');
Route::get('/game/racing', [GameController::class, 'showDrivingRacing'])->name('showDrivingRacing');
Route::get('/game/action', [GameController::class, 'showAction'])->name('showAction');
Route::get('/game/shooting', [GameController::class, 'showShooting'])->name('showShooting');
Route::get('/game/puzzle', [GameController::class, 'showPuzzle'])->name('showPuzzle');
Route::get('/game/{linkPath}', [GameController::class, 'showGamePage'])->name('showGamePage');

Route::get('/account', [UserController::class, 'showAccount'])->name('showAccount');
Route::post('/account/login', [UserController::class, 'login']);
Route::post('/account/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/account/change-password', [UserController::class, 'changePassword'])->middleware('auth');

Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/games', [UserController::class, 'showGames'])->name('admins.showGames');
        Route::get('/categories', [UserController::class, 'showCategories'])->name('admins.showCategories');
        Route::get('/games/add', [UserController::class, 'showAddGameForm'])->name('admins.showAddGameForm');
        Route::post('/games/add', [UserController::class, 'addGame'])->name('admins.addGame');
        Route::get('/games/edit/{id}', [UserController::class, 'editGame'])->name('admins.editGame');
        Route::post('/games/update/{id}', [UserController::class, 'updateGame'])->name('admins.updateGame');
        Route::post('/games/delete/{id}', [UserController::class, 'deleteGame'])->name('admins.deleteGame');
        Route::get('/categories/add', [UserController::class, 'showAddCategoryForm'])->name('admins.showAddCategoryForm');
        Route::post('/categories/add', [UserController::class, 'addCategory'])->name('admins.addCategory');
    });
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/games', [UserController::class, 'showGames'])->name('users.showGames');
        Route::get('/games/edit/{id}', [UserController::class, 'editGame'])->name('users.editGame');
        Route::post('/games/update/{id}', [UserController::class, 'updateGame'])->name('users.updateGame');
    });
});
