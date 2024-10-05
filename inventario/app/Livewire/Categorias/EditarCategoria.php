<?php

namespace App\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\Attributes\Title;

#[Title('Editar Categoria')]
class EditarCategoria extends Component
{
    public $categoriaId;
    public $nombre;
    public $descripcion;

    public function mount($categoriaID)
    {
        $this->categoriaId = $categoriaID;

        $categoria = Categoria::find($this->categoriaId);
    
        if ($categoria) {
            $this->nombre = $categoria->nombre;
            $this->descripcion = $categoria->descripcion;
        } else {
            // Maneja el caso en que no se encuentra la categoría
            session()->flash('error', 'Categoría no encontrada.');
            return redirect('/');
        }
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|min:6',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::find($this->categoriaId);
        $categoria->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', 'Categoría actualizada con éxito.');
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.categorias.editar-categoria');
    }
}
