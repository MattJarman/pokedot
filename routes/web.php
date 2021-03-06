<?php

declare(strict_types=1);

use App\Http\Controllers\Pokemon\PokemonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', static function () {
    return Inertia::render('Home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', static function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('pokemon', PokemonController::class)->only('show');
