{{-- Modal de perfil de usuario --}}
<div class="modal fade" id="perfil-usuario-{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="perfil-usuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="perfil-usuario">PERFIL USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editar-perfil', ['id' => Auth::user()->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" id="name" name="name" oninput="this.value = this.value.toUpperCase()" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
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
