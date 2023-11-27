{{-- Modal editar datos del cargo --}}
@foreach ($cargos as $cargo)
    <div class="modal fade" id="editar-cargo-{{ $cargo->id_cargo }}" tabindex="-1" aria-labelledby="editar-cargo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar-cargo">EDITAR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editar-cargo', ['id_cargo'=>$cargo->id_cargo]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="id_cargo" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id_cargo" name="id_cargo" maxlength="7" value="{{ $cargo->id_cargo }}">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">DESCRIPCION</label>
                            <input class="form-control" id="descripcion" name="descripcion" value="{{ $cargo->descripcion }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach