<?php

use App\Http\Controllers\ControladorDeGados;
use Illuminate\Support\Facades\DB;
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
Route::get('/gerenciando_bovinos/abater_bovino', [ControladorDeGados::class, "abaterbovinos"]);
Route::get('/gerenciando_bovinos/cadastrar_bovino', [ControladorDeGados::class, "cadastrar"]);
Route::get('/gerenciando_bovinos/bovinos', [ControladorDeGados::class, "listatodos"]);
Route::resource('/gerenciando_bovinos', ControladorDeGados::class);
