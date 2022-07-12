<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('login')->middleware('guest')->group(function() {
    Route::get('/', [AuthController::class, 'index'])
        ->name('login');
    Route::post('/', [AuthController::class, 'login'])
        ->name('auth.login');
    Route::get('/create', [AuthController::class, 'create'])
        ->name('auth.create');
    Route::post('/create', [AuthController::class, 'store'])
        ->name('auth.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('projects')->middleware('auth')->group(function() {
    Route::get('/completed', [ProjectController::class, 'completed'])
        ->name('projects.completed');
    Route::post('/complete/{project}', [ProjectController::class, 'complete'])
        ->name('projects.complete');
});
Route::resource('projects', ProjectController::class)
    ->middleware('auth');
