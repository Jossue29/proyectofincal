<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use GuzzleHttp\Psr7\message;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Crear Categoria')]
class CrearCategoria extends Component
{
    protected $layout = 'layouts.app'; 
    //Atributos
    #[Rule('required', message: 'El nombre es obligatorio')]
    #[Rule('min:5', message: 'Por favor digite una categoria')]
     public $nombre = '';
     public $descripcion = '';

     public function guardar()
     {
        $this->validate();

        Categoria::create(
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]
        );
        session()->flash('message', 'Categoría creada exitosamente.');
        return redirect('/');
     }
    public function render()
    {
        return view('livewire.categorias.crear-categoria');
    }
}
