<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $transform = app(\App\Transformers\ServerXLSTransformer::class);
    $transform->transform([
        'model' => 'Dell R210Intel Xeon X3440',
        'RAM' => '128GBDDR3',
        'HDD' => '2x2TBSATA2',
        'location' => 'AmsterdamAMS-01',
        'price' => '€49.99'
    ]);
});
