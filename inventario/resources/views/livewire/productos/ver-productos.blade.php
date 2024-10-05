<div class="px-5 py-4">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Descripcion </th>
                    <th scope="col"> Precio </th>
                    <th scope="col"> Cantidad </th>
                    <th scope="col"> Categoria </th>
                    <th scope="col"> Proveedor </th>
                </td>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr wire:key='{{$producto->id}}'>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{ str($producto->descripcion)-> words(10)}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>{{$producto->categoria->nombre}}</td>
                        <td>{{$producto->proveedor->nombre}}</td>
                        <td>
                            <button class="btn btn-danger" type="button" wire:click="eliminar({{$producto->id}})" 
                            wire:confirm="Estas Seguro que deseas eliminar el producto?" {{$producto->nombre}}>
                                Eliminar
                            </button>
                             <button class="btn btn-success" type="button" onclick="window.location.href='{{ route('editar-productos', ['productoID' => $producto->id]) }}'">
                                Editar
                            </button>  
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
