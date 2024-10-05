<div class="px-5 py-4">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Direccion </th>
                    <th scope="col"> Telefono </th>
                    <th scope="col"> Email </th>
                </td>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr wire:key='{{$proveedor->id}}'>
                        <td>{{$proveedor->id}}</td>
                        <td>{{$proveedor->nombre}}</td>
                        <td>{{ str($proveedor->direccion)-> words(10)}}</td>
                        <td>{{$proveedor->telefono}}</td>
                        <td>{{$proveedor->email}}</td>
                        <td>
                            <button class="btn btn-danger" type="button" wire:click="eliminar({{$proveedor->id}})" 
                            wire:confirm="Estas Seguro que deseas eliminar la provedor?" {{$proveedor->nombre}}>
                                Eliminar
                            </button>
                            <button class="btn btn-success" type="button" onclick="window.location.href='{{ route('editar-proveedores', ['proveedorID' => $proveedor->id]) }}'">
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
