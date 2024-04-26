<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SalespersonController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for Lead Management
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
Route::get('/leads/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
Route::put('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');
Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');
Route::post('/leads/{lead}/update-status', [LeadController::class, 'updateStatus'])->name('leads.update_status');

// Routes for Salespersons
Route::get('/salespersons', [SalespersonController::class, 'index'])->name('salespersons.index');
Route::get('/salespersons/create', [SalespersonController::class, 'create'])->name('salespersons.create');
Route::post('/salespersons', [SalespersonController::class, 'store'])->name('salespersons.store');
Route::get('/salespersons/{salesperson}', [SalespersonController::class, 'show'])->name('salespersons.show');
Route::get('/salespersons/{salesperson}/edit', [SalespersonController::class, 'edit'])->name('salespersons.edit');
Route::put('/salespersons/{salesperson}', [SalespersonController::class, 'update'])->name('salespersons.update');
Route::delete('/salespersons/{salesperson}', [SalespersonController::class, 'destroy'])->name('salespersons.destroy');
