<div class="modal fade" id="registrar-cargos" tabindex="-1" aria-labelledby="registrar-cargos" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registrar-cargos">Registrar cargos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrar-cargo') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="id_cargo" class="form-label">ID:</label>
                        <input type="text" name="id_cargo" id="id_cargo" placeholder="AUX0001" maxlength="7" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">DESCRIPCION:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" oninput="this.value = this.value.toUpperCase()">
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