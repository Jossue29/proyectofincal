<?php
namespace App\Livewire\Productos;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Crear Producto')]
class CrearProductos extends Component
{
    protected $layout = 'layouts.app';

    // Reglas de validación para los campos del formulario
    #[Rule('required', message: 'El nombre del producto es obligatorio')]
    #[Rule('min:3', message: 'El nombre del producto debe tener al menos 3 caracteres')]
    public $nombre = '';

    #[Rule('required', message: 'La descripción es obligatoria')]
    #[Rule('min:5', message: 'La descripción debe tener al menos 5 caracteres')]
    public $descripcion = '';

    #[Rule('required', message: 'El precio es obligatorio')]
    //#[Rule('numeric|min:0', message: 'Debe ingresar un valor válido para el precio')]
    public $precio = '';

    //#[Rule('required', message: 'La cantidad es obligatoria')]
    //#[Rule('integer|min:0', message: 'La cantidad debe ser un número entero no negativo')]
    public $cantidad = '0';

    #[Rule('required', message: 'Debe seleccionar una categoría')]
    public $categoria_id = '';

    #[Rule('required', message: 'Debe seleccionar un proveedor')]
    public $proveedor_id = '';

    // Cargar categorías y proveedores
    public $categorias = [];
    public $proveedores = [];

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->proveedores = Proveedor::all();
    }

    // Método para guardar el producto
    public function guardar()
    {
        // Validar los campos antes de guardar
        $this->validate();

        Producto::create(
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'cantidad' => 0,
                'categoria_id' => $this->categoria_id,
                'proveedor_id' => $this->proveedor_id,
            ]
        );

        // Mensaje de éxito y redirección
        session()->flash('mensaje', 'Producto creado correctamente');
        return redirect('/ver-productos');
    }

    // Renderizar la vista
    public function render()
    {
        return view('livewire.productos.crear-productos');
    }
}
