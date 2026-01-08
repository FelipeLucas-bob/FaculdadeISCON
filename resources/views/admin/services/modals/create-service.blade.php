    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createServiceModal" tabindex="-1" role="dialog"
        aria-labelledby="createServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Novo Serviço</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createServiceForm" action="{{ route('service.type.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sector_id" class="form-label fw-bold text-primary">Tipo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-gear-wide"></i>
                                </span>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="" selected disabled>Selecione o Tipo</option>
                                    <option value="1">Atendimento</option>
                                    <option value="2">Demanda</option>
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um Tipo.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sector_id" class="form-label fw-bold text-primary">Setor</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <select class="form-select" id="sector_id" name="sector_id" required>
                                <option value="" selected disabled>Selecione um Setor</option>
                                @foreach ($sectors as $sector)
                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um setor.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sector_id" class="form-label fw-bold text-primary">Categoria</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" selected disabled>Selecione uma Categoria</option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                <div class="invalid-feedback">Por favor, selecione uma Categoria.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label fw-bold text-primary">Nome</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" minlength="3" maxlength="45"
                                    required placeholder="Nome do Serviço...">
                                <div class="invalid-feedback">Por favor, informe o nome do serviço.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpfCreateUser" class="form-label fw-bold text-primary">Descrição</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <textarea type="text" class="form-control" name="description" rows="7" maxlength="255" placeholder="Informe a descrição do Serviço..." required></textarea>
                                <div class="invalid-feedback">Por favor, informe a descrição do serviço.</div>
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
            const form = document.getElementById('createServiceForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    </script>
