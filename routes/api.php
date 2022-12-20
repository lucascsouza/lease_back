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

Route::get('/test', [ServerController::class, 'index'])->middleware('auth:sanctum');

//return response()->json([
//    [
//        'model' => 'Dell R210Intel Xeon X3440',
//        'ram' => '16GBDDR3',
//        'hdd' => '2x2TBSATA2',
//        'location' => 'AmsterdamAMS-01',
//        'price' => '€49.99'
//    ],
//    [
//        'model' => 'HP DL180G62x Intel Xeon E5620',
//        'ram' => '32GBDDR3',
//        'hdd' => '8x2TBSATA2',
//        'location' => 'AmsterdamAMS-01',
//        'price' => '€119.00'
//    ],
//    [
//        'model' => 'HP DL380eG82x Intel Xeon E5-2420',
//        'ram' => '32GBDDR3',
//        'hdd' => '8x2TBSATA2',
//        'location' => 'AmsterdamAMS-01',
//        'price' => '€131.99'
//    ],
//]);


Route::post('/filter', function () {
    return response()->json(\request()->all());
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
