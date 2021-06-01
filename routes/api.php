<?php

use App\Http\Controllers\Api\{
    CategoryController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});