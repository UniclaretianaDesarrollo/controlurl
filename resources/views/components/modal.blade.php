<div wire:ignore.self class="modal fade" id="crearPrograma" tabindex="-1" aria-labelledby="crearProgramaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="crearProgramaLabel">{{$tituloModal}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="card">
            <div class="card-body">
                {{$slot}}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>