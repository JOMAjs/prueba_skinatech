<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SubcategoriasController;

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

Route::view('/', 'welcome')->name('home');


Route::controller(CategoriaController::class)->group(function () {
    Route::get('/categorias', 'index')->name('categorias.index');//
    Route::post('categorias-crear', 'create')->name('categorias.crear-formulario');
    Route::post('categorias-formulario', 'abrir_formulario')->name('categorias.abrir-formulario');
    Route::post('categorias-eliminar', 'destroy')->name('categorias.eliminar-formulario');
});


Route::controller(ProductosController::class)->group(function () {
    Route::get('/productos', 'index')->name('productos.index');
    Route::post('productos-crear', 'create')->name('productos.crear-formulario');
    Route::post('productos-formulario', 'abrir_formulario')->name('productos.abrir-formulario');
    Route::post('productos-eliminar', 'destroy')->name('productos.eliminar-formulario');
});


Route::controller(SubcategoriasController::class)->group(function () {
    Route::get('/subcategorias', 'index')->name('subcategorias.index');
    Route::post('subcategorias-crear', 'create')->name('subcategorias.crear-formulario');
    Route::post('subcategorias-formulario', 'abrir_formulario')->name('subcategorias.abrir-formulario');
    Route::post('subcategorias-eliminar', 'destroy')->name('subcategorias.eliminar-formulario');
});


Route::controller(UsuariosController::class)->group(function () {
    Route::get('/usuarios', 'index')->name('usuarios.index');
    Route::post('usuarios-crear', 'create')->name('usuarios.crear-formulario');
    Route::post('usuarios-formulario', 'abrir_formulario')->name('usuarios.abrir-formulario');
    Route::post('usuarios-eliminar', 'destroy')->name('usuarios.eliminar-formulario');
});


Auth::routes();
