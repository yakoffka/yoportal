<?php
declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskManager\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/dashboard', static function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('auth')
    ->controller(TaskController::class)
    ->prefix('tm')
    ->group(function () {
        Route::get('/tasks',  'index')->name('tm.tasks.index');
        Route::get('/tasks/create',  'create')->name('tm.tasks.create');
        Route::post('/tasks',  'store')->name('tm.tasks.store');
        Route::get('/tasks/{task}',  'show')->name('tm.tasks.show');
        Route::get('/tasks/{task}/edit',  'edit')->name('tm.tasks.edit');
        Route::patch('/task/{task}',  'update')->name('tm.tasks.update');
        Route::delete('/profile',  'destroy')->name('tm.tasks.destroy');
    });
