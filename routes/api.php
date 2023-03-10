<?php

use App\Http\Controllers\ServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('servers.')->middleware('auth:sanctum')->group(function () {
    Route::get('/servers', [ServerController::class, 'index'])->name('index');
    Route::get('/filter-data', [ServerController::class, 'filterData'])->name('filterData');
});
