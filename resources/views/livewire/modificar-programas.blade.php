<div>
    <a href="#ModalEdit-{{$datos->id}}" data-bs-toggle="modal" style="cursor: pointer;">
        {{$programa->nombre}}
    </a>
    
    <x-modal>
        <x-slot name="idModal">
            ModalEdit-{{$datos->id}}
        </x-slot>

        <x-slot name="tituloModal">
            Editar modal
        </x-slot>
        @if (session()->has('ModificarPrograma'))
            <script>
                window.addEventListener('ModificarPrograma', event => {
                    $('#ModalEdit-{{ $datos->id }}').modal('hide');
                });
            </script>
        @endif
        {{-- Contenido del modal --}}
        <form id="form" wire:submit.prevent="actualizar" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Nombre del programa<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input type="text" class="form-control" wire:model="programa.nombre" />
                        @error('programa.nombre')
                            <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nombreAbreviado">Nombre del programa abreviado<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input type="text" class="form-control" wire:model="programa.nombreAbreviado" />
                        @error('programa.nombreAbreviado')
                            <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Color del programa<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input type="text" class="form-control" wire:model="programa.colorPrograma" />
                        @error('programa.colorPrograma')
                            <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea type="text" class="form-control" wire:model="programa.descripcionPrograma" cols="30" rows="10" 
                        ></textarea>
                        
                    </div>
                    @error('programa.descripcionPrograma')
                        <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>   
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    {{-- <button type="submit" class="btn btn-primary tipoletra" wire:loading.attr="disabled" wire:target="guardar" class="disabled:opacity-25">Crear</button> --}}
                    <button type="submit" class="btn btn-primary tipoletra" wire:loading.remove wire:target="actualizar">Modificar</button>
                    <button type="submit" class="btn btn-primary tipoletra" wire:loading wire:target="actualizar">Cargando</button>
                </div>
            </div>
        </form>
    </x-modal> 
    @section('script')
    <x-alerta>
        <x-slot name="titulo">
            ¡Excelente!
        </x-slot>
        Se ha modificado el programa exitosamente
        <x-slot name="icono">
            success
        </x-slot>
    </x-alerta>
    @endsection
</div>
