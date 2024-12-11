<?php

use App\Http\Controllers\AdminFixtureController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/alive', function () {
    return new JsonResponse('hello world');
});

Route::get('/admin/fixture/{id}', [AdminFixtureController::class, 'fulfill']);

//    ->middleware('auth:sanctum');
