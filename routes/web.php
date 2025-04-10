<?php

use App\Http\Controllers\InterventionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\oldInterventionController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CompanyProductsController;
use App\Http\Controllers\SearchProductsController;
use App\Http\Controllers\PdfController;

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

Route::middleware(['auth'])->group(callback: function () {
    // Home page
    Route::get('/', [CompanyController::class, 'index'])
        ->name('home');

    Route::resource('companies', CompanyController::class);

    Route::resource('companies.interventions', InterventionController::class);

    // Intervention for a comapany
    Route::get('/company/{id}/intervention', [oldInterventionController::class, 'showForm'])
        ->name('createIntervention');
    Route::post('/company/{id}/intervention', [oldInterventionController::class, 'saveIntervention'])
        ->name('createIntervention');
    Route::get('/intervention/{intervention_id}/edit', [oldInterventionController::class, 'editIntervention'])
        ->name('editIntervention');
    Route::post('/intervention/{intervention_id}/edit', [oldInterventionController::class, 'updateIntervention'])
        ->name('editIntervention');

    // Reports for a company
    Route::get('/company/{id}/report/month/{date}', [ReportsController::class, 'monthlyReport'])
        ->name('monthlyReports');
    Route::get('/company/{id}/report/day/{date}', [ReportsController::class, 'interventionReport'])
        ->name('interventionsReports');

    // Sale products for a company
    Route::get('/compnay/{id}/products/sale', [CompanyProductsController::class, 'sale'])
        ->name('saleProductsCompany');
    Route::post('/compnay/{id}/products/sale', [CompanyProductsController::class, 'saveProducts'])
        ->name('saveProductsCompany');

    // See all products
    Route::get('/products', [ProductsController::class, 'showAllProducts'])
        ->name('showAllProducts');
    Route::get('/products/search', [SearchProductsController::class, 'query'])
        ->name('searchProducts');

    // Sale products for anyone
    Route::get('/products/sale', [ProductsController::class, 'sale'])
        ->name('saleProducts');
    Route::post('/products/sale', [ProductsController::class, 'saveProducts'])
        ->name('saveProducts');

    // Modify a product (delete, edit)
    Route::get('/product/{id}/delete', [ProductsController::class, 'deleteProduct'])
        ->middleware(['password.confirm'])
        ->name('deleteProduct');
    Route::get('/product/{id}/edit', [ProductsController::class, 'editProduct'])
        ->name('editProduct');
    Route::post('/product/{id}/edit', [ProductsController::class, 'updateProduct'])
        ->name('editProduct');

    // Generete a PDF for displacement
    Route::get('/company/{id}/displacement', [PdfController::class, 'generate'])
        ->name('displacementPdf');
});

require __DIR__.'/auth.php';
