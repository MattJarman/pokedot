<?php

declare(strict_types=1);

use App\Models\Pokemon;
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

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/test', static function () {
    return Pokemon::with('abilities.prose')
        ->where('id', 1)
        ->firstOrFail()
        ->toArray();
});
