<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('task', TaskController::class);
});


