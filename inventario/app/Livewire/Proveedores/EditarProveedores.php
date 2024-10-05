<?php

namespace App\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\Attributes\Title;

#[Title('Editar Proveedor')]
class EditarProveedores extends Component
{
    public $proveedorId;
    public $nombre;
    public $direccion;
    public $telefono;
    public $email;

    public function mount($proveedorID)
    {
        $this->proveedorId = $proveedorID;

        $proveedor = Proveedor::find($this->proveedorId);
    
        if ($proveedor) {
            $this->nombre = $proveedor->nombre;
            $this->direccion = $proveedor->direccion;
            $this->telefono = $proveedor->telefono;
            $this->email = $proveedor->email;
        } else {
            // Maneja el caso en que no se encuentra la categoría
            session()->flash('error', 'Proveedor no encontrad.');
            return redirect('/ver-proveedores');
        }
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|min:6',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|numeric',
            'email' => 'nullable|email',
        ]);

        $proveedor = Proveedor::find($this->proveedorId);
        $proveedor->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Proveedor actualizado con éxito.');
        return redirect('/ver-proveedores');
    }
    public function render()
    {
        return view('livewire.proveedores.editar-proveedores');
    }
}
