<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FootballStatsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/football-stats', [FootballStatsController::class, 'getFootballData']);
