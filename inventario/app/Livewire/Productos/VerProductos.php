<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class VerProductos extends Component
{
    public function eliminar($productoID)
    {
        $producto = Producto::find($productoID)->delete();
    }
    public function render()
    {
    $productos = Producto::all();
    return view('livewire.productos.ver-productos', compact('productos'));
    }
}
