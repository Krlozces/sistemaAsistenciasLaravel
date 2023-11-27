{{-- Modal de registro de trabajadores --}}
<div class="modal fade" id="registrar-trabajador" tabindex="-1" aria-labelledby="registrar-trabajador" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registrar-trabajador">REGISTRAR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrar-trabajador') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" maxlength="8">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">NOMBRE</label>
                        <input class="form-control" id="nombre" name="nombre" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">APELLIDOS</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">CARGO</label>
                        <select class="form-select" name="id_cargo" id="id_cargo">
                            <option value="" selected disabled>Seleccione un cargo</option>
                            @if(isset($cargos))
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id_cargo }}">{{ $cargo->descripcion }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">TELEFONO</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
