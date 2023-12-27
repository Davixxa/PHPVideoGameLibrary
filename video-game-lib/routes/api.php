<?php

use App\Http\Controllers\Api\GameController;


Route::middleware(['throttle:api'])->group(function () {
    Route::apiResource('games', GameController::class);
});
