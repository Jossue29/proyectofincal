<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Ver Categorias')]

class VerCategoria extends Component
{
    protected $layout = 'layouts.app'; 
    public function eliminar($categoriaID)
    {
        $categoria = Categoria::find($categoriaID)->delete();
    }
    public function render()
    {
        return view('livewire.categorias.ver-categoria', ['categorias' => Categoria::all(),]);
    }
}
