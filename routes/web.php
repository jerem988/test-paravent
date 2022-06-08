<?php

use Illuminate\Support\Facades\Route;
use App\Classes\Continent;

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
    return view('welcome');
});

Route::get('/run-test', function () {
    $continent = new Continent(10, '30 27 17 42 29 12 14 41 42 42');
    echo $continent->getSafeArea();
});
