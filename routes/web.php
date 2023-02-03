<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\VerProgramas;
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

// Route::get('/', function () {
//     return view('inicio.index');
// });
// // Route::get('/', function () {
// //     return view('layouts.app');
// // });
Route::get('/programas', VerProgramas::class)->name('programas.index');

//programas
// Route::get('/programas', [programasController::class, 'index'])->name('programas.index');