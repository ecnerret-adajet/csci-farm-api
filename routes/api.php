<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AppLoginController;
use App\Http\Controllers\FarmActivityController;
use App\Http\Controllers\FarmActivitivityLogController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialApplicationController;


Route::post('/login', [AppLoginController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/farms', [FarmController::class, 'index']);
    Route::get('/farms/{id}', [FarmController::class, 'show']);
    Route::post('/farms', [FarmController::class, 'store']);
    Route::get('/farms/edit/{id}', [FarmController::class, 'edit']);
    Route::put('/farms/{id}', [FarmController::class, 'update']);
    Route::delete('/farms/{id}', [FarmController::class, 'destroy']);
    Route::get('/farms/assigned/{company_id}', [FarmController::class, 'assignedFarms']);

    Route::get('/fields', [FieldController::class, 'index']);
    Route::get('/fields/{id}', [FieldController::class, 'show']);
    Route::post('/fields', [FieldController::class, 'store']);
    Route::get('/fields/edit/{id}', [FieldController::class, 'edit']);
    Route::put('/fields/{id}', [FieldController::class, 'update']);
    Route::delete('/fields/{id}', [FieldController::class, 'destroy']);

    Route::get('/clusters', [ClusterController::class, 'index']);
    Route::get('/clusters/{id}', [ClusterController::class, 'show']);
    Route::post('/clusters', [ClusterController::class, 'store']);
    Route::get('/clusters/edit/{id}', [ClusterController::class, 'edit']);
    Route::put('/clusters/{id}', [ClusterController::class, 'update']);
    Route::delete('/clusters/{id}', [ClusterController::class, 'destroy']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit']);
    Route::put('/companies/{id}', [CompanyController::class, 'update']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

    Route::get('/farm-activities/{fieldId}', [FarmActivityController::class, 'index']);
    Route::get('/farm-activities/show/{id}', [FarmActivityController::class, 'show']);
    Route::post('/farm-activities', [FarmActivityController::class, 'store']);
    Route::get('/farm-activities/edit/{id}', [FarmActivityController::class, 'edit']);
    Route::put('/farm-activities/{id}', [FarmActivityController::class, 'update']);
    Route::delete('/farm-activities/{id}', [FarmActivityController::class, 'destroy']);

    Route::get('/farm-activity-logs', [FarmActivitivityLogController::class, 'index']);
    Route::get('/farm-activity-logs/{id}', [FarmActivitivityLogController::class, 'show']);
    Route::post('/farm-activity-logs', [FarmActivitivityLogController::class, 'store']);
    Route::get('/farm-activity-logs/edit/{id}', [FarmActivitivityLogController::class, 'edit']);
    Route::put('/farm-activity-logs/{id}', [FarmActivitivityLogController::class, 'update']);
    Route::delete('/farm-activity-logs/{id}', [FarmActivitivityLogController::class, 'destroy']);

    Route::get('/attendances', [AttendanceController::class, 'index']);
    Route::get('/attendances/{id}', [AttendanceController::class, 'show']);
    Route::post('/attendances', [AttendanceController::class, 'store']);
    /* Route::get('/attendances/edit/{id}', [AttendanceController::class, 'edit']);
    Route::put('/attendances/{id}', [AttendanceController::class, 'update']); */
    Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy']);

    Route::get('/materials', [MaterialController::class, 'index']);
    Route::get('/materials/{id}', [MaterialController::class, 'show']);
    Route::post('/materials', [MaterialController::class, 'store']);
    Route::get('/materials/edit/{id}', [MaterialController::class, 'edit']);
    Route::put('/materials/{id}', [MaterialController::class, 'update']);
    Route::delete('/materials/{id}', [MaterialController::class, 'destroy']);

    Route::get('/material-applications', [MaterialApplicationController::class, 'index']);
    Route::get('/material-applications/{id}', [MaterialApplicationController::class, 'show']);
    Route::post('/material-applications', [MaterialApplicationController::class, 'store']);
    Route::get('/material-applications/edit/{id}', [MaterialApplicationController::class, 'edit']);
    Route::put('/material-applications/{id}', [MaterialApplicationController::class, 'update']);
    Route::delete('/material-applications/{id}', [MaterialApplicationController::class, 'destroy']);
});