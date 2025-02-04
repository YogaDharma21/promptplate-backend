<?php

use App\Http\Controllers\PromptController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/prompt', [PromptController::class, 'index']);
    Route::post('/prompt', [PromptController::class, 'store']);

    Route::get('/tag', [TagController::class, 'index']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World']);
});
