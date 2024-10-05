<?php

namespace App\Livewire\Inventario;

use App\Models\Inventario;
use Livewire\Component;
use App\Models\Producto;

class VerInventario extends Component
{
    public $tipo;
    public $producto_id; 
    public $productos;

    public function mount()
    {
        $this->tipo = ''; 
        $this->producto_id = ''; 
        $this->productos = Producto::all(); 
    }

    protected $listeners = ['filtrarMovimientos'];

    public function filtrarMovimientos($tipo, $producto_id)
    {
        $this->tipo = $tipo;
        $this->producto_id = $producto_id;

    }

    // 
    public function render()
    {
        $movimientos = Inventario::query()
            ->when($this->tipo, function ($query) {
                $query->where('tipo', $this->tipo);
            })
            ->when($this->producto_id, function ($query) {
                $query->where('producto_id', $this->producto_id);
            })
            ->with('producto') 
            ->get();

        return view('livewire.inventario.ver-inventario', [
            'movimientos' => $movimientos,
            'productos' => $this->productos 
        ]);
    } 

    /* public function render()
    {
        $movimientos = Inventario::query()
            ->when($this->tipo, function ($query) {
                $query->where('tipo', $this->tipo);
            })
            ->when($this->producto_id, function ($query) {
                $query->where('producto_id', $this->producto_id);
            })
            ->with('producto')
            ->get();

        return view('livewire.inventario.ver-inventario', [
            'movimientos' => $movimientos,
        ]);
    } */
}
