    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createProfileModal" tabindex="-1" role="dialog"
        aria-labelledby="createProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header" id="inputFormModalLabel">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Novo Perfil</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createUserForm" action="{{ route('profile.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label fw-bold text-primary">Nome</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M5.5 21h13a2 2 0 0 0 2-2v-1a7 7 0 0 0-14 0v1a2 2 0 0 0 2 2"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" maxlength="45"
                                    required>
                                <div class="invalid-feedback">Por favor, informe o nome.</div>
                            </div>
                            <div class="form-group">
                                <label for="sector_id" class="form-label fw-bold text-primary">Setor</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                            <path d="M8 7V5a4 4 0 0 1 8 0v2"></path>
                                            <path d="M12 12v.01"></path>
                                        </svg>
                                    </span>    
                                    <select class="form-select" id="sector_id" name="sector_id" required>
                                        <option value="" selected disabled>Selecione um setor</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor, selecione um setor.</div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description" class="form-label fw-bold text-primary">Descrição</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" maxlength="255" required></textarea>
                                    <div class="invalid-feedback">Por favor, informe a descrição.</div>
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