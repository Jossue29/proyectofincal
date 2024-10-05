<?php

namespace App\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\Attributes\Title;

#[Title('Ver Proveedores')]
class VerProveedores extends Component
{
    public function eliminar($proveedorID)
    {
        $proveedor = Proveedor::find($proveedorID)->delete();
    }
    public function render()
    {
        return view('livewire.proveedores.ver-proveedores', ['proveedores' => Proveedor::all(),]);
    }
}
