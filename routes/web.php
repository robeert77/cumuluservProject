<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterventionController;
use App\Models\User;

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

Route::get('/', [CompanyController::class, 'companiesList'])
    ->middleware(['verified', 'auth'])
    ->name('home');

Route::view('/new-company', 'new-company')
    ->middleware(['verified', 'auth'])
    ->name('newCompany');

Route::post('/new-company', [CompanyController::class, 'add'])
    ->middleware(['verified', 'auth'])
    ->name('addCompany');

Route::get('/company/{id}/details', [CompanyController::class, 'showDetails'])
    ->middleware(['verified', 'auth'])
    ->name('detailsCompany');

Route::get('/company/{id}/edit', [CompanyController::class, 'editCompany'])
    ->middleware(['verified', 'auth'])
    ->name('editCompany');

Route::post('/company/{id}/edit', [CompanyController::class, 'updateCompany'])
    ->middleware(['verified', 'auth'])
    ->name('updateCompany');

Route::get('/company/{id}/intervention', [InterventionController::class, 'showForm'])
    ->middleware(['verified', 'auth'])
    ->name('createIntervention');

Route::post('/company/{id}/intervention', [InterventionController::class, 'saveIntervention'])
    ->middleware(['verified', 'auth'])
    ->name('createIntervention');

require __DIR__.'/auth.php';
