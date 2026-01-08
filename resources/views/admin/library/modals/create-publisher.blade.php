1 <!-- Modal -->
<div class="modal fade inputForm-modal" id="createProfileModal" tabindex="-1" role="dialog"
    aria-labelledby="createProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light dark:bg-dark">
            <div class="modal-header" id="inputFormModalLabel">
                <h5 class="modal-title">Cadastrar <b class="text-primary">Nova Editora</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                </button>
            </div>
            <form id="createPublisherForm" action="{{ route('library.publisher.store') }}" method="POST" novalidate>
                @csrf
                <div class="modal-body">

                    {{-- Nome --}}
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold text-primary">Nome da Editora</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-building"></i>
                            </span>
                            <input type="text" class="form-control" id="name" name="name" maxlength="100"
                                required>
                            <div class="invalid-feedback">Por favor, informe o nome da editora.</div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold text-primary">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="invalid-feedback">Por favor, informe um e-mail válido.</div>
                        </div>
                    </div>

                    {{-- Telefone --}}
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label fw-bold text-primary">Telefone</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="20">
                            <div class="invalid-feedback">Por favor, informe um telefone válido.</div>
                        </div>
                    </div>

                    {{-- Website --}}
                    <div class="form-group mb-3">
                        <label for="website" class="form-label fw-bold text-primary">Site</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-globe"></i>
                            </span>
                            <input type="url" class="form-control" id="website" name="website">
                            <div class="invalid-feedback">Por favor, informe uma URL válida.</div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger mt-2 mb-2 btn-no-effect"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('createPublisherForm');
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            </script>
        </div>
    </div>
</div>
