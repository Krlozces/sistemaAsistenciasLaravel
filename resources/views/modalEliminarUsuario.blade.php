{{-- Modal eliminar usuario --}}
@foreach ($datos as $dato)
    <div class="modal fade" id="eliminaModalUsuario-{{ $dato->id }}" tabindex="-1" aria-labelledby="eliminar-usuario" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminar-usuario">Eliminar registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('eliminar-usuario', ['id' => $dato->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="{{ $dato->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach