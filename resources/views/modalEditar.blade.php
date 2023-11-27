{{-- Modal editar datos del trabajador --}}
@foreach($elementos as $elemento)
    <div class="modal fade" id="editar-trabajador-{{ $elemento->dni }}" tabindex="-1" aria-labelledby="editar-trabajador" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar-trabajador">EDITAR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editar-registro', ['dni' => $elemento->dni]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" maxlength="8" value="{{ $elemento->dni }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">NOMBRE</label>
                            <input class="form-control" id="nombre" name="nombre" value="{{ $elemento->nombre }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">APELLIDOS</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $elemento->apellidos }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label for="id_cargo" class="form-label">CARGO</label>
                            <select class="form-select" name="id_cargo" id="id_cargo">
                                @if(isset($cargos))
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id_cargo }}" selected>{{ $cargo->descripcion }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">TELEFONO</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" value="{{ $elemento->telefono }}">
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