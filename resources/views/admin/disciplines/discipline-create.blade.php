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
                <h3 class="fw-bold text-primary mb-0"> Registrar Disciplina</h3>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="bi bi-journal-text me-2"></i> Dados Básicos
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-areas-tab" data-bs-toggle="pill" data-bs-target="#pills-areas" type="button"
                    role="tab" aria-controls="pills-areas" aria-selected="false">
                    <i class="bi bi-file-earmark-check me-2"></i> Áreas de Conhecimento
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
                                <div class="card-body">
                                    <form action="{{ route('discipline.store') }}" method="POST" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label fw-bold text-primary">Nome</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-book"></i></span>
                                                    <input type="text" class="form-control text-uppercase" name="nome" required placeholder="Ex: MATEMÁTICA">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label class="form-label fw-bold text-primary">Código</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                                    <input type="text" class="form-control" name="codigo" required placeholder="Ex: 123456">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label class="form-label fw-bold text-primary">Nível</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-bar-chart-steps"></i></span>
                                                    <select class="form-select" name="nivel" required>
                                                        <option value="" disabled selected>Selecione o Nível</option>
                                                        <option value="Básico">Básico</option>
                                                        <option value="Intermediário">Intermediário</option>
                                                        <option value="Avançado">Avançado</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label class="form-label fw-bold text-primary">Descrição</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                    <textarea class="form-control" name="descricao" rows="2" placeholder="Descrição da disciplina"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Abreviatura</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-type"></i></span>
                                                    <input type="text" class="form-control text-uppercase" name="abreviatura" required placeholder="Ex: MAT">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Carga Horária</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                                    <input type="number" class="form-control" name="carga_horaria" required min="1" placeholder="Ex: 60">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Aproveitamento</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                                                    <input type="text" class="form-control" name="aproveitamento" placeholder="Ex: 75%">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                            <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect" data-bs-dismiss="modal">Limpar</button>
                                            <button type="submit" class="btn btn-success mt-3">Salvar</button>
                                        </div>
                                    </form>
                                </div>
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
                    <h6 class="">Áreas de Conhecimento</h6>
                    <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert"
                        id="alert-info">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Selecione ao menos uma área de conhecimento!
                    </div>

                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <!-- Áreas não adicionadas -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-danger">Áreas de Conhecimento não adicionadas</label>
                                    <ul id="areas-nao-adicionadas" class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Ciências Exatas">
                                            Ciências Exatas
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Ciências Humanas">
                                            Ciências Humanas
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Ciências Biológicas">
                                            Ciências Biológicas
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Engenharias">
                                            Engenharias
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Saúde">
                                            Saúde
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Linguística, Letras e Artes">
                                            Linguística, Letras e Artes
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-value="Outros">
                                            Outros
                                            <button type="button" class="btn btn-sm btn-outline-success btn-mover">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Áreas adicionadas -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-success">Áreas de Conhecimento adicionadas</label>
                                    <ul id="areas-adicionadas" class="list-group"></ul>
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
        btn.addEventListener("click", function () {
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
            const form = document.getElementById('createCourseForm');
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
