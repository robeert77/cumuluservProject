<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InterventionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Session;

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

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ro'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang');

Route::get('companies/{company}/interventions/by-date', [InterventionController::class, 'byDate'])
    ->name('companies.interventions.byDate');

Route::middleware(['auth'])->group(callback: function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('home');

    Route::resource('companies', CompanyController::class);

    Route::resource('companies.interventions', InterventionController::class);
});

require __DIR__.'/auth.php';
