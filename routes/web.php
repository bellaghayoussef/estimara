<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\DemandesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'shops',
], function () {
    Route::get('/', [ShopsController::class, 'index'])
         ->name('shops.shop.index');
    Route::get('/create', [ShopsController::class, 'create'])
         ->name('shops.shop.create');
    Route::get('/show/{shop}',[ShopsController::class, 'show'])
         ->name('shops.shop.show')->where('id', '[0-9]+');
    Route::get('/{shop}/edit',[ShopsController::class, 'edit'])
         ->name('shops.shop.edit')->where('id', '[0-9]+');
    Route::post('/', [ShopsController::class, 'store'])
         ->name('shops.shop.store');
    Route::put('shop/{shop}', [ShopsController::class, 'update'])
         ->name('shops.shop.update')->where('id', '[0-9]+');
    Route::delete('/shop/{shop}',[ShopsController::class, 'destroy'])
         ->name('shops.shop.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'demandes',
], function () {
    Route::get('/', [DemandesController::class, 'index'])
         ->name('demandes.demande.index');
    Route::get('/create', [DemandesController::class, 'create'])
         ->name('demandes.demande.create');
    Route::get('/show/{demande}',[DemandesController::class, 'show'])
         ->name('demandes.demande.show')->where('id', '[0-9]+');
    Route::get('/{demande}/edit',[DemandesController::class, 'edit'])
         ->name('demandes.demande.edit')->where('id', '[0-9]+');
    Route::post('/', [DemandesController::class, 'store'])
         ->name('demandes.demande.store');
    Route::put('demande/{demande}', [DemandesController::class, 'update'])
         ->name('demandes.demande.update')->where('id', '[0-9]+');
    Route::delete('/demande/{demande}',[DemandesController::class, 'destroy'])
         ->name('demandes.demande.destroy')->where('id', '[0-9]+');
});
