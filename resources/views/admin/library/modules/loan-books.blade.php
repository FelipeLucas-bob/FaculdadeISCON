{{-- ABA INFORMAÇÕES --}}
<div class="tab-pane fade show active d-none" id="pills-info-2" role="tabpanel" aria-labelledby="pills-info-tab">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <div class="section general-info payment-info">
                <div class="info">
                    <h6 class="">Aluno Solicitante</h6>
                    <div class="mb-1">
                        <form id="formStudentSelect">
                            <div class="row g-2 ">
                                <input type="hidden" id="student_id">
                                <div class="col-md-6">
                                    <label for="full_name" class="form-label text-primary fw-bold">Nome</label>
                                    <input type="text" id="nomeAluno" class="form-control fw-bold text-black" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="cpf" class="form-label text-primary fw-bold">CPF</label>
                                    <input type="text" id="cpfAluno" class="form-control fw-bold text-black" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="rg" class="form-label text-primary fw-bold">RG</label>
                                    <input type="text" id="rgAluno" class="form-control fw-bold text-black" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <h6 class="">Buscar Livro</h6>
                    <div class="mb-5">
                        <form id="formSearchBook">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="title" class="form-label text-primary fw-bold">Título</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Título do livro..." maxlength="100">
                                </div>
                                <div class="col-md-4">
                                    <label for="author" class="form-label text-primary fw-bold">Autor</label>
                                    <input type="text" name="author" id="author" class="form-control"
                                        placeholder="Autor do livro..." maxlength="50">
                                </div>
                                <div class="col-md-2">
                                    <label for="isbn" class="form-label text-primary fw-bold">Código</label>
                                    <input type="text" name="code_system" id="code_system" class="form-control"
                                        placeholder="Código...">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary w-100 mt-4">
                                        <i class="bi bi-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="resultBooks" class="mt-5">
                        {{-- Aqui serão listados os livros encontrados --}}
                    </div>
                    <!-- Input oculto para enviar no form -->
                    <input type="hidden" name="knowledge_areas[]" id="selected-areas">

                    <div class="modal-footer border-top d-flex justify-content-center mt-5 d-none" id="modal-footer">
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>


