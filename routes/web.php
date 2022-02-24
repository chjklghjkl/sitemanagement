<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\NewslistController;

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


Route::get('/', [NewslistController::class, 'newslist']);
Route::get('/domain', [DomainController::class, 'domains']);
Route::post('/adddomain', [DomainController::class, 'adddomain']);
Route::get('/domainlist', [DomainController::class, 'domainlist']);
Route::post('/deletedomain', [DomainController::class, 'deletedomain']);