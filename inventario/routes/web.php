<?php

use App\Livewire\Categorias\CrearCategoria;
use App\Livewire\Categorias\EditarCategoria;
use App\Livewire\Categorias\VerCategoria;
use App\Livewire\Productos\CrearProductos;
use App\Livewire\Productos\EditarProductos;
use App\Livewire\Productos\VerProductos;
use App\Livewire\Proveedores\VerProveedores;
use App\Livewire\Proveedores\CrearProveedores;
use App\Livewire\Proveedores\EditarProveedores;
use App\Livewire\Inventario\VerInventario;
use App\Livewire\Inventario\RegistrarMovimiento;
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

// Route::view('/', 'welcome');

//  Route::view('dashboard', 'dashboard')
//      ->middleware(['auth', 'verified'])
//     ->name('dashboard');
// Route::get('/', function () {
//     return redirect()->route('register'); // Asegúrate de que esta ruta esté definida en tu archivo auth.php
// });
Route::get('/', VerCategoria::class);
require __DIR__.'/auth.php';

 Route::view('profile', 'profile')
     ->middleware(['auth'])
    ->name('profile');
Route::get("/crear", CrearCategoria::class);
Route::get("/editar-categoria/{categoriaID}", EditarCategoria::class)->name('editar-categoria');
Route::get("/ver-proveedores", VerProveedores::class);
Route::get("/crear-proveedores", CrearProveedores::class);
Route::get("/editar-proveedores/{proveedorID}", EditarProveedores::class)->name('editar-proveedores');
Route::get("/ver-productos", VerProductos::class);
Route::get('/crear-productos', CrearProductos::class);
Route::get("/editar-productos/{productoID}", EditarProductos::class)->name('editar-productos');
Route::get('/ver-inventario', VerInventario::class);
Route::get('/registrar-movimiento', RegistrarMovimiento::class);



