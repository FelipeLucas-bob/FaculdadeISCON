    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createSectorModal" tabindex="-1" role="dialog"
        aria-labelledby="createSectorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header" id="inputFormModalLabel">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Novo Setor</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createUserForm" action="{{ route('sector.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label fw-bold text-primary">Nome</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <!-- Ícone de setor usando Bootstrap Icons -->
                                    <i class="bi bi-shop text-primary"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" maxlength="45" required>
                                <div class="invalid-feedback">Por favor, informe o nome.</div>
                            </div>  
                        </div>
                        <div class="form-group mt-3">
                            <label for="description" class="form-label fw-bold text-primary">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="255" required></textarea>
                            <div class="invalid-feedback">Por favor, informe a descrição.</div>
                        </div>
                    </div>    <div class="modal-footer">
                        <button type="reset" class="btn btn-light-danger mt-2 mb-2 btn-no-effect"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('createUserForm');
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
