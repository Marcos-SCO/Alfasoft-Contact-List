<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::middleware('auth')->group(function () {
    
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');

    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');

    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
