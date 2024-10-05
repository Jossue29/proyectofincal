<?php

namespace App\Livewire\Proveedores;

use App\Models\Proveedor;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

use Livewire\Component;

#[Title('Crear Categoria')]
class CrearProveedores extends Component
{
    protected $layout = 'layouts.app'; 
    #[Rule('required', message: 'El nombre es obligatorio')]
    #[Rule('min:5', message: 'Por favor digite un proveedor')]
    public $nombre = '';

    #[Rule('required', message: 'La direccion es obligatorio')]
    #[Rule('min:5', message: 'Por favor digite una direccion')]
    public $direccion = '';

    #[Rule('required', message: 'El telefono es obligatorio')]
    #[Rule('min:8', message: 'Por favor digite un telefono')]
    public $telefono = '';

    #[Rule('required', message: 'El email es obligatorio')]
    #[Rule('min:5', message: 'Por favor digite un email')]
    public $email = '';

    public function guardar()
    {
        $this->validate();
        Proveedor::create(
            [
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'email' => $this->email,
            ]
            );
            session()->flash('mensaje', 'Proveedor creado correctamente');
            return redirect('/ver-proveedores');
    }
    public function render()
    {
        return view('livewire.proveedores.crear-proveedores');
    }
}
