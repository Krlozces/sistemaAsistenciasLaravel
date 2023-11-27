{{-- Modal de cambiar password usuario --}}
<div class="modal fade" id="password-usuario-{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="password-usuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="password-usuario">CONTRASEÑA USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cambiar-password', ['id' => Auth::user()->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">CONTRASEÑA ACTUAL</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">NUEVA CONTRASEÑA</label>
                        <input type="password" class="form-control" id="new-password" name="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmed-password" class="form-label">CONFIRMAR CONTRASEÑA</label>
                        <input type="password" class="form-control" id="confirmed-password" name="confirmed-password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
