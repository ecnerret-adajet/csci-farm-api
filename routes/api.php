<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AppLoginController;


Route::post('/login', [AppLoginController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/farms/{id}', [FarmController::class, 'show']);
    Route::post('/farms', [FarmController::class, 'store']);
    Route::put('/farms/{id}', [FarmController::class, 'update']);
    Route::delete('/farms/{id}', [FarmController::class, 'destroy']);

    Route::get('/fields', [FieldController::class, 'index']);
    Route::get('/fields/{id}', [FieldController::class, 'show']);
    Route::post('/fields', [FieldController::class, 'store']);
    Route::put('/fields/{id}', [FieldController::class, 'update']);
    Route::delete('/fields/{id}', [FieldController::class, 'destroy']);

    Route::get('/clusters', [ClusterController::class, 'index']);
    Route::get('/clusters/{id}', [ClusterController::class, 'show']);
    Route::post('/clusters', [ClusterController::class, 'store']);
    Route::put('/clusters/{id}', [ClusterController::class, 'update']);
    Route::delete('/clusters/{id}', [ClusterController::class, 'destroy']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::put('/companies/{id}', [CompanyController::class, 'update']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);
});