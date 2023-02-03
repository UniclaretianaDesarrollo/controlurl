<div>
    @section('seleccionmenuProgramas')
    active
    @endsection

    {{-- @section('buscar')
        <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" wire:model="buscar">
        </div>
    @endsection --}}

    @section('titulo')
    Programas
    @endsection

    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            @livewire('crear-programas')
            <div class="input-group" style="height: 42px; margin-left:20px;">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" wire:model="buscar" placeholder="Buscar programa" >
            </div>
        </div>
    </div>

    <x-tabla>
        @if ($programas->count())
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="cursor-pointer text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" wire:click="ordenar('id')">
                            Id
                            @if ($variableOrdenar=='id')
                                @if ($tipoOrden=='asc')
                                    <i class="fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                            <i class="fas fa-sort"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" wire:click="ordenar('nombre')">Nombre 
                            @if ($variableOrdenar=='nombre')
                                @if ($tipoOrden=='asc')
                                    <i class="fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                            <i class="fas fa-sort"></i>
                            @endif
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="pointer-events: none;">Color</th>
                        <th class="cursor-pointer text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" wire:click="ordenar('estado')">Estado 
                            @if ($variableOrdenar=='estado')
                                @if ($tipoOrden=='asc')
                                    <i class="fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                            <i class="fas fa-sort"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" wire:click="ordenar('created_at')">Fecha de creación 
                            @if ($variableOrdenar=='created_at')
                                @if ($tipoOrden=='asc')
                                    <i class="fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                            <i class="fas fa-sort"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programas as $programa)                
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$programa->id}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm" style="word-break: break-all;">{{$programa->nombre}}</h6>
                                        <p class="text-xs text-secondary mb-0" style="word-break: break-all;">{{$programa->nombreAbreviado}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <!-- <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                </div> -->
                                <div class="w3-col l4 m6 w3-center colorbox">
                                <div class="p-4 border" id="box134" style="background-color: {{$programa->colorPrograma}}; border-radius: 50%; width: 40px; height: 40px;"></div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-{{$programa->estado==1?"success":"danger"}}">{{$programa->estado==1?"Activo":"Inactivo"}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ucwords(Date::create($programa->created_at)->format('d, m'.'/'. 'Y' .' '.'h:i:s A'))}}</span>
                            </td>
                            <td class="align-middle">
                                <a style="cursor: pointer;" class="text-secondary font-weight-bold text-xs">
                                    Editar
                                </a>
                                |
                                <a href="#" class="text-secondary font-weight-bold text-xs">
                                    {{$programa->estado==0?"Activar ":"Inactivar"}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @if ($vacio)
                <div class="text-center p-3">
                    <p>No hay programas registrados</p>
                </div>
            @else
                <div class="text-center p-3">
                    <p>No se encontró un programa registrado con el nombre "{{$buscar}}"</p>
                </div>
            @endif
        @endif
    </x-tabla>
</div>
