<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class);
Route::apiResource('categories', CategoryController::class);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});