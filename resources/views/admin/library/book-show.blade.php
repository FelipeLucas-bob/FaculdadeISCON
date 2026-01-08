@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <link rel="stylesheet" href="{{ asset('plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/src/notification/snackbar/snackbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/src/sweetalerts2/sweetalerts2.css') }}">

    @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
    @vite(['resources/scss/light/assets/components/tabs.scss'])
    @vite(['resources/scss/light/plugins/sweetalerts2/custom-sweetalert.scss'])
    @vite(['resources/scss/light/plugins/notification/snackbar/custom-snackbar.scss'])
    @vite(['resources/scss/light/assets/forms/switches.scss'])
    @vite(['resources/scss/light/assets/components/list-group.scss'])
    @vite(['resources/scss/light/assets/users/account-setting.scss'])

    @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])
    @vite(['resources/scss/dark/assets/components/tabs.scss'])
    @vite(['resources/scss/dark/assets/elements/alert.scss'])
    @vite(['resources/scss/dark/plugins/sweetalerts2/custom-sweetalert.scss'])
    @vite(['resources/scss/dark/plugins/notification/snackbar/custom-snackbar.scss'])
    @vite(['resources/scss/dark/assets/forms/switches.scss'])
    @vite(['resources/scss/dark/assets/components/list-group.scss'])
    @vite(['resources/scss/dark/assets/users/account-setting.scss'])
@endsection

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Erro!</strong>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0"> Editar Livro: <b
                        class="text-info">{{ old('title', $book->title) }}</b></h3>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="bi bi-journal-text me-2"></i> Informações
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-areas-tab" data-bs-toggle="pill" data-bs-target="#pills-areas"
                    type="button" role="tab" aria-controls="pills-areas" aria-selected="false">
                    <i class="bi bi-file-earmark-check me-2"></i> Exemplares
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            {{-- DADOS BÁSICOS --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Dados Básicos</h6>
                                <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert"
                                    id="alert-info">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    Preencha ao menos um dos contatos!
                                </div>
                                <form id="editBookForm" action="{{ route('library.book.update') }}" method="POST"
                                    novalidate>
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            {{-- Título --}}
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="title" class="form-label fw-bold text-primary">Título</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-book text-primary"></i></span>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        minlength="3" maxlength="50" required
                                                        value="{{ old('title', $book->title) }}">
                                                    <div class="invalid-feedback">Por favor, informe o título.</div>
                                                </div>
                                            </div>

                                            {{-- Autor --}}
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="author" class="form-label fw-bold text-primary">Autor</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-person text-primary"></i></span>
                                                    <input type="text" class="form-control" id="author" name="author"
                                                        minlength="2" maxlength="50" required
                                                        value="{{ old('author', $book->author) }}">
                                                    <div class="invalid-feedback">Por favor, informe o autor.</div>
                                                </div>
                                            </div>

                                            {{-- Ano de Publicação --}}
                                            <div class="form-group mb-3 col-lg-2">
                                                <label for="publication_year" class="form-label fw-bold text-primary">Ano
                                                    de Publicação</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-calendar text-primary"></i></span>
                                                    <input type="text" class="form-control" id="publication_year"
                                                        name="publication_year" minlength="4" maxlength="4"
                                                        value="{{ old('publication_year', $book->publication_year) }}">
                                                    <div class="invalid-feedback">Por favor, informe um ano válido.</div>
                                                </div>
                                            </div>

                                            {{-- Quantidade de Exemplares --}}
                                            <div class="form-group mb-3 col-lg-2">
                                                <label for="copies"
                                                    class="form-label fw-bold text-primary">Cópias</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-123 text-primary"></i></span>
                                                    <input type="text" class="form-control" id="copies"
                                                        name="copies" value="{{ old('copies', $book->copies) }}"
                                                        min="1" minlength="1" maxlength="3" required>
                                                    <div class="invalid-feedback">Por favor, informe a quantidade.</div>
                                                </div>
                                            </div>

                                            {{-- ISBN --}}
                                            <div class="form-group mb-3 col-lg-3">
                                                <label for="isbn" class="form-label fw-bold text-primary">ISBN</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-upc-scan text-primary"></i></span>
                                                    <input type="text" class="form-control" id="isbn"
                                                        name="isbn" maxlength="13" required
                                                        value="{{ old('isbn', $book->isbn) }}">
                                                    <div class="invalid-feedback">Por favor, informe o ISBN.</div>
                                                </div>
                                            </div>

                                            {{-- Editora --}}
                                            <div class="form-group mb-3 col-lg-5">
                                                <label for="publisher_id"
                                                    class="form-label fw-bold text-primary">Editora</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-building text-primary"></i></span>
                                                    <select class="form-select" id="publisher_id" name="publisher_id"
                                                        required>
                                                        <option value="" disabled>Selecione a editora</option>
                                                        @foreach ($publishers as $publisher)
                                                            <option value="{{ $publisher->id }}"
                                                                {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>
                                                                {{ $publisher->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Por favor, selecione a editora.</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Input oculto para enviar no form -->
                                    <input type="hidden" name="knowledge_areas[]" id="selected-areas">

                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                            data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success mt-3">Salvar</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ÁREAS DE CONHECIMENTO --}}
            <div class="tab-pane fade" id="pills-areas" role="tabpanel" aria-labelledby="pills-areas-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Exemplares do Livro</h6>

                                <div class="card-body">
                                    <form action="{{ route('library.book_item.update') }}" method="POST">
                                        @csrf

                                        <!-- Cabeçalho -->
                                        <div class="row fw-bold mb-2 text-primary">
                                            <div class="col-md-3">Código do Sistema</div>
                                            <div class="col-md-4">Código da Biblioteca</div>
                                            <div class="col-md-2 text-center">Status</div>
                                            <div class="col-md-3 text-center">Ações</div>
                                        </div>

                                        <!-- Lista -->
                                        <ul id="exemplares-lista" class="list-group">
                                            @foreach ($book->items as $item)
                                                <li class="list-group-item">
                                                    <div class="row align-items-center">

                                                        <!-- Código atual -->
                                                        <div class="col-md-3">
                                                            <input type="text" value="{{ $item->code_system }}"
                                                                class="form-control fw-bold text-black" disabled>
                                                        </div>

                                                        <!-- Novo código -->
                                                        <div class="col-md-4">
                                                            <input type="text" name="new_codes[{{ $item->id }}]" value="{{ $item->code_library }}"
                                                                placeholder="Digite novo código" class="form-control">
                                                        </div>

                                                        <!-- Status -->
                                                        <div class="col-md-2 text-center">
                                                            <span id="status-label-{{ $item->id }}"
                                                                class="badge
                                                        @if ($item->status == 1) bg-success
                                                        @elseif($item->status == 2) bg-warning text-dark
                                                        @elseif($item->status == 3) bg-info text-dark
                                                        @elseif($item->status == 4) bg-danger
                                                        @else bg-secondary @endif
                                                    ">
                                                                @if ($item->status == 1)
                                                                    Disponível
                                                                @elseif($item->status == 2)
                                                                    Indisponível
                                                                @elseif($item->status == 3)
                                                                    Emprestado
                                                                @elseif($item->status == 4)
                                                                    Removido
                                                                @else
                                                                    Desconhecido
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <!-- Ações -->
                                                        <div class="col-md-3 d-flex justify-content-center gap-2">
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-success btn-available"
                                                                data-id="{{ $item->id }}" title="Disponível">
                                                                <i class="bi bi-check-lg"></i>
                                                            </button>

                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-warning btn-unavailable"
                                                                data-id="{{ $item->id }}" title="Indisponível">
                                                                <i class="bi bi-x-lg"></i>
                                                            </button>

                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-info btn-borrowed"
                                                                data-id="{{ $item->id }}" title="Emprestado">
                                                                <i class="bi bi-book"></i>
                                                            </button>

                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-danger btn-remover"
                                                                data-id="{{ $item->id }}" title="Removido">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Status escondido -->
                                                    <input type="hidden" name="statuses[{{ $item->id }}]"
                                                        id="status-{{ $item->id }}" value="{{ $item->status }}">
                                                </li>
                                            @endforeach
                                        </ul>

                                        <!-- Rodapé -->
                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                            <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                                data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-success mt-3">Salvar alterações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Script --}}
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {

                                    function atualizarStatus(id, status, classe, texto) {
                                        document.getElementById('status-' + id).value = status;
                                        const span = document.getElementById('status-label-' + id);
                                        span.className = 'badge ' + classe;
                                        span.textContent = texto;
                                    }

                                    document.addEventListener('click', function(e) {
                                        if (e.target.closest('.btn-available')) {
                                            const id = e.target.closest('.btn-available').dataset.id;
                                            atualizarStatus(id, 1, 'bg-success', 'Disponível');
                                        }
                                        if (e.target.closest('.btn-unavailable')) {
                                            const id = e.target.closest('.btn-unavailable').dataset.id;
                                            atualizarStatus(id, 2, 'bg-warning text-dark', 'Indisponível');
                                        }
                                        if (e.target.closest('.btn-borrowed')) {
                                            const id = e.target.closest('.btn-borrowed').dataset.id;
                                            atualizarStatus(id, 3, 'bg-info text-dark', 'Emprestado');
                                        }
                                        if (e.target.closest('.btn-remover')) {
                                            const id = e.target.closest('.btn-remover').dataset.id;
                                            atualizarStatus(id, 4, 'bg-danger', 'Removido');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                const naoAdicionadas = document.getElementById("areas-nao-adicionadas");
                const adicionadas = document.getElementById("areas-adicionadas");
                const hiddenInput = document.getElementById("selected-areas");

                function atualizarHidden() {
                    let valores = [];
                    adicionadas.querySelectorAll("li").forEach(li => {
                        valores.push(li.dataset.value);
                    });
                    hiddenInput.value = valores.join(",");
                }

                function criarBotao(tipo) {
                    const btn = document.createElement("button");
                    btn.type = "button";
                    btn.className = "btn btn-sm " + (tipo === "mais" ? "btn-outline-success" : "btn-outline-danger") + " btn-mover";
                    btn.innerHTML = `<i class="bi ${tipo === "mais" ? "bi-plus-circle" : "bi-dash-circle"}"></i>`;
                    return btn;
                }

                function moverItem(item, destino, tipo) {
                    // troca botão ao mover
                    const novoBtn = criarBotao(tipo);
                    novoBtn.addEventListener("click", () => {
                        if (destino.id === "areas-adicionadas") {
                            moverItem(item, naoAdicionadas, "mais");
                        } else {
                            moverItem(item, adicionadas, "menos");
                        }
                    });

                    item.querySelector("button").remove();
                    item.appendChild(novoBtn);

                    destino.appendChild(item);
                    atualizarHidden();
                }

                document.querySelectorAll("#areas-nao-adicionadas li .btn-mover").forEach(btn => {
                    btn.addEventListener("click", function() {
                        const li = this.closest("li");
                        moverItem(li, adicionadas, "menos");
                    });
                });
            </script>


        </div>


    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>

    <script src="{{ asset('plugins/src/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>

    @vite(['resources/js/users/account-settings.js'])

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    {{-- Scripts Here --}}
    @vite(['resources/js/custom.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editBookForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    </script>
@endsection
