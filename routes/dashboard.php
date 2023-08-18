<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ItemsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Dashboard\ClientsController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PrintSettingController;

Route::view('', 'layouts.dashboard')->name('index');
Route::get('change/lang/{lang}', [HomeController::class, 'changeLang'])->name('change.lang');
//Users
Route::resource('users', UserController::class);
Route::post('users/multi-delete', [UserController::class, 'multiDelete'])->name('users.multi-delete');
//Units
Route::resource('units', UnitController::class);
Route::post('units/multi-delete', [UnitController::class, 'multiDelete'])->name('units.multi-delete');
//Categories
Route::resource('categories', CategoryController::class);
Route::get('categories/parent', [CategoryController::class, 'show'])->name('category.parent');
Route::post('categories/multi-delete', [CategoryController::class, 'multiDelete'])->name('categories.multi-delete');
// Route::get('categories/list/parents', [CategoryController::class, 'parents'])->name('categories.parents');

//Clients
Route::resource('clients', ClientsController::class);
Route::post('clients/multi-delete', [ClientsController::class, 'multiDelete'])->name('clients.multi-delete');
//Stores
Route::resource('stores', StoresController::class);
Route::post('stores/multi-delete', [StoresController::class, 'multiDelete'])->name('stores.multi-delete');
//Items
Route::resource('items', ItemsController::class);
Route::post('items/multi-delete', [ItemsController::class, 'multiDelete'])->name('items.multi-delete');
//Inovies
Route::resource('invoices', InvoiceController::class);
// Route::post('invoices/multi-delete', [InvoiceController::class, 'multiDelete'])->name('invoices.multi-delete');
Route::get('invoices/items/list', [InvoiceController::class, 'items'])->name('invoices.items.list');
Route::get('invoices/items/details', [InvoiceController::class, 'itemDetails'])->name('invoices.items.details');
// Route::get('invoices/items/quantity', [InvoiceController::class, 'itemQuantity'])->name('invoices.items.quantity');

//Shops
// Route::controller('ShopController')->as('shop.')->prefix('shop')->group(function () {
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop', [ShopController::class, 'store'])->name('store');
Route::delete('/shop', [ShopController::class, 'destroy'])->name('destroy');
// });

//PrintSettings
Route::get('print_settings', [PrintSettingController::class, 'index'])->name('print_settings.index');
Route::post('print_settings', [PrintSettingController::class, 'update'])->name('print_settings.update');
Route::get('print_settings/print', [PrintSettingController::class, 'print'])->name('print_settings.print');
