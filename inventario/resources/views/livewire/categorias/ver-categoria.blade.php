<div class="px-5 py-4">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Descripcion </th>
                </td>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr wire:key='{{$categoria->id}}'>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{ str($categoria->descripcion)-> words(5)}}</td>
                        <td>
                            <button class="btn btn-danger" type="button" wire:click="eliminar({{$categoria->id}})" 
                            wire:confirm="Estas Seguro que deseas eliminar la categoria?" {{$categoria->nombre}}>
                                Eliminar
                            </button>
                            <button class="btn btn-success" type="button" onclick="window.location.href='{{ route('editar-categoria', ['categoriaID' => $categoria->id]) }}'">
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
