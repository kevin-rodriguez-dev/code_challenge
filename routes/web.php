<?php

use App\Http\Controllers\CharacterController;
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

Route::get('/', [CharacterController::class, 'index'])->name('home');

Route::prefix('characters')->group(function () {
    Route::get('/', [CharacterController::class, 'index'])->name('characters.index');
    Route::get('/search', [CharacterController::class, 'search'])->name('characters.search');
    Route::get('/filter', [CharacterController::class, 'filter'])->name('characters.filter');
    Route::get('/{id}', [CharacterController::class, 'show'])->name('characters.show');
});
