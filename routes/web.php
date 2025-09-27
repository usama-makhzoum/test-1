<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;

Route::prefix('cards')->group(function () {

    Route::get('/', [CardController::class, 'index']); 
    Route::post('/', [CardController::class, 'store']); 
    Route::delete('/{id}', [CardController::class, 'destroy']);

});
