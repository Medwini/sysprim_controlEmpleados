<div>
<div class="container shadow p-3 mb-5 bg-body rounded">
        @foreach($estados as $estado)
            @if ($edit)
                @if ($id_editar == $estado->id)
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="valor_edit" />
                        <button class="btn btn-outline-success" wire:click="editar({{ $estado->id }})">Guardar</button>
                        <button class="btn btn-outline-secondary" wire:click="limpiar">Cancelar</button>
                    </div>
                    @error('valor_edit')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror
                @endif
            @endif   
        @endforeach
        @if (!$edit)
            @if ($nuevo)
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="valor" />
                    <button class="btn btn-outline-success" wire:click="crear">Guardar</button>
                    <button class="btn btn-outline-secondary" wire:click="limpiar">Cancelar</button>
                </div>
                @error('valor')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
            @else
                <button wire:click="nuevo">Nuevo</button>
            @endif
        @endif
        <p class="my-3 msg-crud">{{ $mensaje }}</p>
    </div>


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estados as $estado)
                <tr>
                    <td>{{ $estado->id }}</td>
                    <td>{{ $estado->descripcion }}</td>
                    <td>
                        <button wire:click="hab_edit({{ $estado->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="eliminar({{ $estado->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
