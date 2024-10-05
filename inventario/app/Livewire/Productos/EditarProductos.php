<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Livewire\Attributes\Title;

#[Title('Editar Producto')]
class EditarProductos extends Component
{
    public $productoId;
    public $nombre;
    public $descripcion;
    public $precio;
    public $cantidad; // Aunque no se pueda modificar, se mostrará
    public $categoria_id;
    public $proveedor_id;
    public $categorias;
    public $proveedores;

    public function mount($productoID)
    {
        $this->productoId = $productoID;

        $producto = Producto::find($this->productoId);
    
        if ($producto) {
            $this->nombre = $producto->nombre;
            $this->descripcion = $producto->descripcion;
            $this->precio = $producto->precio;
            $this->cantidad = $producto->cantidad;
            $this->categoria_id = $producto->categoria_id;
            $this->proveedor_id = $producto->proveedor_id;
        } else {
            // Maneja el caso en que no se encuentra el producto
            session()->flash('error', 'Producto no encontrado.');
            return redirect('/ver-productos');
        }

        // Cargar categorías y proveedores
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|min:3',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);

        $producto = Producto::find($this->productoId);
        $producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'categoria_id' => $this->categoria_id,
            'proveedor_id' => $this->proveedor_id,
        ]);

        session()->flash('message', 'Producto actualizado con éxito.');
        return redirect('/ver-productos');
    }

    public function render()
    {
        return view('livewire.productos.editar-productos');
    }
}
