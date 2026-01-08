    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createServiceModal" tabindex="-1" role="dialog"
        aria-labelledby="createServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Novo Script</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createServiceForm" action="{{ route('service.script.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="form-group col-lg-4">
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

                            <div class="form-group col-lg-4">
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
                            </div> --}}
                            <!-- Categoria -->
                            <div class="form-group col-lg-5">
                                <label for="category_id" class="form-label fw-bold text-primary">Categoria</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="" selected disabled>Selecione uma Categoria</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor, selecione uma Categoria.</div>
                                </div>
                            </div>
                            <div class="form-group col-lg-7">
                                <label for="demand"
                                    class="form-label fw-bold text-primary">Atendimento</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-journal-plus"></i></span>
                                    <select class="form-select fw-bold text-black" id="demand"
                                        name="demand" required >
                                        <option value="" selected>Selecione primeiro a Categoria...
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <!-- Título -->
                            <div class="form-group mb-3">
                                <label for="titleCreateUser" class="form-label fw-bold text-primary">Título</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-type"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title" maxlength="100"
                                        placeholder="Informe o título do serviço..." required>
                                    <div class="invalid-feedback">Por favor, informe o título do serviço.</div>
                                </div>
                            </div>

                            <!-- Descrição -->
                            <div class="form-group mb-3">
                                <label for="cpfCreateUser" class="form-label fw-bold text-primary">Conteúdo</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-text"></i>
                                    </span>
                                    <textarea class="form-control" name="content" rows="5" maxlength="255"
                                        placeholder="Informe o passado a passo do script...." required></textarea>
                                    <div class="invalid-feedback">Por favor, informe o passado a passo do script.</div>
                                </div>
                            </div>

                            <!-- Observações -->
                            <div class="form-group mb-3">
                                <label for="observationCreateUser"
                                    class="form-label fw-bold text-primary">Observações</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-chat-left-dots"></i>
                                    </span>
                                    <textarea class="form-control" name="observation" rows="3" maxlength="255"
                                        placeholder="Informe observações adicionais (opcional)..."></textarea>
                                </div>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                var demandSelect = $('#demand');

                demandSelect.html('<option>Selecione o Atendimento...</option>');
                if (categoryId) {
                    $.ajax({
                        url: '/painel/atendimentos/' + categoryId, // rota Laravel que retorna JSON
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                $.each(data, function(key, item) {
                                    demandSelect.append('<option value="' + item.id +
                                        '">' + item.name + '</option>');
                                });
                            } else {
                                demandSelect.html(
                                    '<option>Nenhum atendimento para a Categoria.</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(xhr);
                            demandSelect.html(
                                '<option value="">Erro ao carregar atendimentos</option>');
                            console.error(error);
                        }
                    });
                } else {
                    demandSelect.html('<option value="">Selecione primeiro a Categoria...</option>');
                }
            });
        });
    </script>
