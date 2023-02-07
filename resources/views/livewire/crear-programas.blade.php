<div>
    {{-- Crear programa  --}}
    <a href="#" class="btn btn-primary mr-3" data-bs-toggle="modal" data-bs-target="#crearPrograma">Crear</a>

    <x-modal>
        <x-slot name="idModal">
            crearPrograma
        </x-slot>

        <x-slot name="tituloModal">
            Crear programa
        </x-slot>
        
        {{-- Contenido del modal --}}
        <form id="form" wire:submit.prevent="guardar" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Nombre del programa<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input id="nombre" type="text" name="nombre"
                            class="form-control" name="nombre" 
                            wire:model="nombre" />
                            @error('nombre')
                                <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nombreAbreviado">Nombre del programa abreviado<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input id="nombreAbreviado" type="text" name="nombreAbreviado"
                            class="form-control" name="nombreAbreviado" 
                            wire:model="nombreAbreviado" />
                            @error('nombreAbreviado')
                                <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Color del programa<b style="color: red" data-toggle="tooltip" data-placement="top"
                            title="Requerido"> *</b></label>
                        <input id="inputColorCrear" type="text" class="form-control" name="colorPrograma" wire:model="colorPrograma"  />
                        @error('colorPrograma')
                            <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcionPrograma" id="descripcionPrograma" cols="30" rows="10" 
                         wire:model="descripcionPrograma"></textarea>
                        
                    </div>
                    @error('descripcionPrograma')
                        <span class="text-danger text-sm" style="--bs-text-opacity: .5;">{{$message}}</span>   
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    {{-- <button type="submit" class="btn btn-primary tipoletra" wire:loading.attr="disabled" wire:target="guardar" class="disabled:opacity-25">Crear</button> --}}
                    <button type="submit" class="btn btn-primary tipoletra" wire:loading.remove wire:target="guardar">Crear</button>
                    <button type="submit" class="btn btn-primary tipoletra" wire:loading wire:target="guardar">Cargando</button>
                </div>
            </div>
        </form>
    </x-modal> 

    @section('script')
    <x-alerta></x-alerta>
    <script>
        window.addEventListener('jsCerrarModalCrear', event => {
            $('#crearPrograma').modal('hide');
        });
        $("#inputColorCrear").focus(function(){
            $("#inputColorCrear").val("#");
        });
    </script>
    @endsection
</div>
