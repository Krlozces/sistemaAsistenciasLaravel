{{-- Modal eliminar cargo --}}
@foreach ($cargos as $cargo)
    <div class="modal fade" id="eliminar-cargo-{{ $cargo->id_cargo }}" tabindex="-1" aria-labelledby="eliminar-cargo" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminar-cargo">Eliminar registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('eliminar-cargo', ['id_cargo' => $cargo->id_cargo]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id_cargo" id="id_cargo" value="{{ $cargo->id_cargo }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach