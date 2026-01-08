    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createDemandModal" tabindex="-1" role="dialog"
        aria-labelledby="createDemandModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header" id="inputFormModalLabel">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Nova Demanda</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createDemandForm" action="{{ route('service.demand.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_id" class="form-label fw-bold text-primary">Responsável</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <option value="" selected disabled>Selecione um Responsável</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um responsável.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="demand_id" class="form-label fw-bold text-primary">Demanda</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-gear-wide"></i>
                                </span>
                                <select class="form-select" id="type_id" name="type_id" required>
                                    <option value="" selected disabled>Selecione uma Demanda</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title ?? $type->name ?? 'Demanda #' . $type->id }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Por favor, selecione uma demanda.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpfCreateUser" class="form-label fw-bold text-primary">Observação</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <textarea type="text" class="form-control" name="observation" rows="7" maxlength="255" placeholder="Observação..."></textarea>
                                <div class="invalid-feedback">Por favor, informe a descrição do serviço.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label fw-bold text-primary">Prioridade</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-5">
                                    <input class="form-check-input" type="radio" name="priority" id="priorityNormal" value="0" required checked>
                                    <label class="form-check-label" for="priorityNormal">
                                        Normal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="priority" id="priorityImportant" value="1" required>
                                    <label class="form-check-label" for="priorityImportant">
                                        Importante
                                    </label>
                                </div>
                                <div class="invalid-feedback">Por favor, selecione uma prioridade.</div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light-danger mt-2 mb-2 btn-no-effect"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createDemandForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    </script>
