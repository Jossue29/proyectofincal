<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use App\Models\Inventario;
use App\Models\Producto;
use Livewire\Attributes\Title;

#[Title('Registrar Movimiento de Inventario')]
class RegistrarMovimiento extends Component
{
    public $producto_id;
    public $tipo; // 'entrada' o 'salida'
    public $cantidad;

    public $productos;

    public function mount()
    {
        $this->productos = Producto::all();
    }

    public function guardar()
    {
        $this->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($this->producto_id);

        if ($this->tipo == 'salida' && $producto->cantidad < $this->cantidad) {
            session()->flash('error', 'No hay suficiente stock para realizar esta salida.');
            return;
        }

        // Crear el movimiento en la tabla Inventario
        Inventario::create([
            'producto_id' => $this->producto_id,
            'tipo' => $this->tipo,
            'cantidad' => $this->cantidad,
            'fecha' => now(),
        ]);

        // Actualizar la cantidad del producto
        if ($this->tipo == 'entrada') {
            $producto->increment('cantidad', $this->cantidad);
        } else {
            $producto->decrement('cantidad', $this->cantidad);
        }

        session()->flash('message', 'Movimiento registrado con éxito.');
        $this->reset(['producto_id', 'tipo', 'cantidad']);
        return redirect('/ver-inventario');
    }

    public function render()
    {
        return view('livewire.inventario.registrar-movimiento');
    }
}
