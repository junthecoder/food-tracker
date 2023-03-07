<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Meals;
use App\Http\Livewire\Menus;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('/meals')->group(function () {
    Route::get('/', Meals\Index::class)->name('meals.index');
    Route::get('/create', Meals\Create::class)->name('meals.create');
});

Route::middleware('auth')->prefix('/menus')->group(function () {
    Route::get('/', Menus\Index::class)->name('menus.index');
    Route::get('/create', Menus\Create::class)->name('menus.create');
});

require __DIR__.'/auth.php';
