<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::class, 'index'])->name('home');
Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
Route::patch('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('users/{id}/delete', [UsersController::class, 'destroy'])->name('users.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
