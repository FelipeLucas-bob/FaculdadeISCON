<div class="modal fade inputForm-modal" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-light text-dark">

            <div class="modal-header">
                <h5 class="modal-title" id="returnModalLabel"><b class="text-primary">Confirmar Devolução</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <form id="returnForm" action="{{ route('library.loan.return') }}" method="POST">
                @csrf
                @method('post')

                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Informações do Livro -->
                        <div class="col-12">
                            <h5 class="fw-bold text-primary">Livro</h5>
                            <h6 class="mb-1">Título: <strong id="modal-book-title" class="text-primary"></strong></h6>
                            <h6 class="mb-1">Editora: <span id="modal-publisher-name" class="text-info"></span></h6>
                            <h6 class="mb-1">Código: <span id="modal-book-code" class="fw-bold"> </span></h6>
                            <hr>
                        </div>

                        <!-- Dados do Aluno -->
                        <div class="col-12">
                            <h5 class="fw-bold text-primary">Aluno</h5>
                            <h6 class="mb-1">Nome: <span id="modal-student-name" class="text-primary"></span></h6>
                            <h6 class="mb-1">CPF: <span id="modal-student-cpf"class="text-primary"></span></h6>
                            <h6 class="mb-1">RG: <span id="modal-student-rg"class="text-primary"></span></h6>
                            <hr>
                        </div>

                        <!-- Observação -->
                        <div class="col-12">
                            <input type="hidden" name="loan_id" id="modal-loan-id">
                            <label for="modal-observation" class="fw-bold text-primary h6">Observação:</label>
                            <div class="mb-3" id="modal-observation-container">
                                <!-- preenchido dinamicamente via JS -->
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer d-none" id="modal-footer">
                    <button type="reset" class="btn btn-light-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>
