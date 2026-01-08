    <!-- Modal -->
    <div class="modal fade inputForm-modal" id="createSectorModal" tabindex="-1" role="dialog"
        aria-labelledby="createSectorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-light dark:bg-dark">
                <div class="modal-header" id="inputFormModalLabel">
                    <h5 class="modal-title">Cadastrar <b class="text-primary">Novo Livro</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">
                    </button>
                </div>
                <form id="createBookForm" action="{{ route('library.book.store') }}" method="POST" novalidate>
                    @csrf
                    @method('POST')
                    <div class="modal-body">

                        {{-- Editora (Publisher) --}}
                        <div class="form-group mb-3">
                            <label for="publisher_id" class="form-label fw-bold text-primary">Editora</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building text-primary"></i></span>
                                <select class="form-select" id="publisher_id" name="publisher_id" required>
                                    <option value="" selected disabled>Selecione a editora</option>
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Por favor, selecione a editora.</div>
                            </div>
                        </div>

                        {{-- Título --}}
                        <div class="form-group mb-3">
                            <label for="title" class="form-label fw-bold text-primary">Título</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-book text-primary"></i></span>
                                <input type="text" class="form-control" id="title" name="title" maxlength="150"
                                    required>
                                <div class="invalid-feedback">Por favor, informe o título.</div>
                            </div>
                        </div>

                        {{-- Autor --}}
                        <div class="form-group mb-3">
                            <label for="author" class="form-label fw-bold text-primary">Autor</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person text-primary"></i></span>
                                <input type="text" class="form-control" id="author" name="author" maxlength="100"
                                    required>
                                <div class="invalid-feedback">Por favor, informe o autor.</div>
                            </div>
                        </div>

                        {{-- Ano de Publicação --}}
                        <div class="form-group mb-3">
                            <label for="publication_year" class="form-label fw-bold text-primary">Ano de
                                Publicação</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar text-primary"></i></span>
                                <input type="text" class="form-control" id="publication_year" name="publication_year"
                                    minlength="4" maxlength="4">
                                <div class="invalid-feedback">Por favor, informe um ano válido.</div>
                            </div>
                        </div>

                        {{-- ISBN --}}
                        <div class="form-group mb-3">
                            <label for="isbn" class="form-label fw-bold text-primary">ISBN</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-upc-scan text-primary"></i></span>
                                <input type="text" class="form-control" id="isbn" name="isbn" maxlength="13"
                                    required>
                                <div class="invalid-feedback">Por favor, informe o ISBN.</div>
                            </div>
                        </div>

                        {{-- Quantidade de Exemplares --}}
                        <div class="form-group mb-3">
                            <label for="copies" class="form-label fw-bold text-primary">Quantidade de
                                Exemplares</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-123 text-primary"></i></span>
                                <input type="number" class="form-control" id="copies" name="copies" value="1"
                                    min="1" minlength="1" maxlength="3" required>
                                <div class="invalid-feedback">Por favor, informe a quantidade.</div>
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
                        const form = document.getElementById('createBookForm');
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
