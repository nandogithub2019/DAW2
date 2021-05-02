<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\filmController;
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
Route::get('panelAdmin', [filmController::class,'panelAdmin'])->name('panelAdmin');


Route::get('formulario',[filmController::class, 'guardaformulario'])->name('formulario');

Route::get('contacta', [filmController::class,'contacta'])->name('contacta');

Route::get('pelicula', [filmController::class,'pelicula'])->name('muestraPelicula');

Route::get('categories', [filmController::class,'vistaCategories'])->name('categories');


Route::get('/', function () {
    return view('inicio');
});
Route::get('inicio', [filmController::class,'inicio'])->name('inicio');

// Route::get('inicio', function () {
//     return view('inicio')->name('inicio');
// });


require __DIR__.'/auth.php';
