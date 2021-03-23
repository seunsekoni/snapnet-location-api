<?php

use App\Http\Controllers\LocationController;
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

Route::get('countries', [LocationController::class, 'countries'])->name('countries');
Route::get('country/{id}', [LocationController::class, 'showCountry'])->name('showCountry');

Route::get('states/{country_id}', [LocationController::class, 'stateInACountry'])->name('stateInACountry');
Route::get('state/{id}', [LocationController::class, 'showState'])->name('showState');

Route::get('cities/{state_id}', [LocationController::class, 'citiesInAState'])->name('citiesInAState');
Route::get('city/{id}', [LocationController::class, 'showCity'])->name('showCity');

Route::get('lgas/{state_id}', [LocationController::class, 'LgaInAState'])->name('LgaInAState');
Route::get('lga/{lid}', [LocationController::class, 'ShowLga'])->name('ShowLga');
