<?php

use App\Http\Controllers\CatGameController;

Route::get('/', [CatGameController::class, 'index']);
Route::post('/feed', [CatGameController::class, 'feed'])->name('cat.feed');
Route::post('/play', [CatGameController::class, 'play'])->name('cat.play');
