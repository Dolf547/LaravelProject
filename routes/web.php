<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;

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

// Route::get('/', function () { // ::get acesar view
//     return view('welcome');
// });

// Rotas do site
Route::resource("/", SiteController::class); //::resource acessar controller

Route::get('/site/home', function () { // ::get acessar view
    return view('site.home');
});
Route::get('/site/services', function () { // ::get acessar view
    return view('site.services');
});


Route::resource("/dashboard", DashboardController::class); //::resource acessar controller
Route::resource("/vehicles", VehicleController::class); //::resource acessar controller
