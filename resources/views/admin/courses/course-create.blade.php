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
                <h3 class="fw-bold text-primary mb-0"> Registrar Curso</h3>
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
                <button class="nav-link" id="pills-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-doc" type="button"
                    role="tab" aria-controls="pills-doc" aria-selected="false">
                    <i class="bi bi-file-earmark-check me-2"></i> Documentação
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-turnos-tab" data-bs-toggle="pill" data-bs-target="#pills-turnos"
                    type="button" role="tab" aria-controls="pills-turnos" aria-selected="false">
                    <i class="bi bi-clock-history me-2"></i> Turnos
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-matriz-tab" data-bs-toggle="pill" data-bs-target="#pills-matriz"
                    type="button" role="tab" aria-controls="pills-matriz" aria-selected="false">
                    <i class="bi bi-layout-text-window-reverse me-2"></i> Matriz Curricular
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
                                    <form action="{{ route('course.store') }}" method="POST" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Código do Curso</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                                    <input type="text" class="form-control" name="code" required placeholder="Ex: 123456">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Modalidade</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-laptop"></i></span>
                                                    <select class="form-select" name="modality" required>
                                                        <option value="" disabled selected>Selecione a Modalidade
                                                        </option>
                                                        <option value="Presencial">Presencial</option>
                                                        <option value="EaD">EaD</option>
                                                        <option value="Híbrido">Híbrido</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Grau</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-mortarboard"></i></span>
                                                    <select class="form-select" name="degree" required>
                                                        <option value="" disabled selected>Selecione o Grau</option>
                                                        <option value="Bacharelado">Bacharelado</option>
                                                        <option value="Licenciatura">Licenciatura</option>
                                                        <option value="Tecnológico">Tecnológico</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-8">
                                                <label class="form-label fw-bold text-primary">Nome do Curso</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-book"></i></span>
                                                    <input type="text" class="form-control text-uppercase"
                                                        name="course_name" required placeholder="Ex: ADMINISTRAÇÃO">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Situação do Curso</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-toggle-on"></i></span>
                                                    <select class="form-select" name="status" required>
                                                        <option value="" disabled selected>Selecione a Situação
                                                        </option>
                                                        <option value="1">Ativo</option>
                                                        <option value="0">Inativo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

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

            {{-- DOCUMENTAÇÃO --}}
            <div class="tab-pane fade" id="pills-doc" role="tabpanel" aria-labelledby="pills-doc-tab">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Documentação</h6>
                                <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert"
                                    id="alert-info">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    Preencha ao menos um dos contatos!
                                </div>
                                <div class="card-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead class="table-primary text-center">
                                                        <tr>
                                                            <th>Tipo Documento</th>
                                                            <th>Sexo</th>
                                                            <th>Idade Min-Max</th>
                                                            <th>Documento Obrigatório</th>
                                                            <th>Transf.</th>
                                                            <th>Port. Dipl.</th>
                                                            <th>Ins. Proc. Sel.</th>
                                                            <th>Obrigatório à cada Renovação</th>
                                                            <th>Reab.</th>
                                                            <th>Impedir Renovação Matrícula</th>
                                                            <th>Data Inclusão no Curso</th>
                                                            <th>Opções</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>CPF</td>
                                                            <td>AMBOS</td>
                                                            <td>0</td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexSwitchCheckDefault0"
                                                                        name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden"
                                                                        for="flexSwitchCheckDefault0">Selecionar</label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-calendar">
                                                                    <rect x="3" y="4" width="18" height="18"
                                                                        rx="2" ry="2"></rect>
                                                                    <line x1="16" y1="2" x2="16"
                                                                        y2="6"></line>
                                                                    <line x1="8" y1="2" x2="8"
                                                                        y2="6"></line>
                                                                    <line x1="3" y1="10" x2="21"
                                                                        y2="10"></line>
                                                                </svg>
                                                                <span class="table-inner-text">16/01/25 08:52</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-sm btn-danger">Excluir</button>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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

            {{-- TURNOS --}}
            <div class="tab-pane fade" id="pills-turnos" role="tabpanel" aria-labelledby="pills-turnos-tab">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Turnos</h6>
                                <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert"
                                    id="alert-info">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    Preencha ao menos um dos contatos!
                                </div>
                                <div class="card-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:33%">Turno</th>
                                                            <th style="width:33%">Quantidade de Vagas</th>
                                                            <th style="width:33%">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>MANHÃ</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="vacancies[morning]" placeholder="Qtd. Vagas" max="9999" maxlength="4">
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckMorning" name="items[0][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden" for="flexSwitchCheckMorning">Selecionar</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>TARDE</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="vacancies[afternoon]" placeholder="Qtd. Vagas" max="9999" maxlength="4">
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckAfternoon" name="items[1][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden" for="flexSwitchCheckAfternoon">Selecionar</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOITE</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="vacancies[evening]" placeholder="Qtd. Vagas" max="9999" maxlength="4">
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckEvening" name="items[2][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden" for="flexSwitchCheckEvening">Selecionar</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>INTEGRAL</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="vacancies[full]" placeholder="Qtd. Vagas" max="9999" maxlength="4">
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckFull" name="items[3][selected]" value="1">
                                                                    <label class="form-check-label visually-hidden" for="flexSwitchCheckFull">Selecionar</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
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

            {{-- MATRIZ CURRICULAR --}}
            <div class="tab-pane fade" id="pills-matriz" role="tabpanel" aria-labelledby="pills-matriz-tab">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Matriz Curricular</h6>
                                <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert"
                                    id="alert-info">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    Preencha ao menos um dos contatos!
                                </div>
                                <div class="card-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">Upload da Matriz
                                                Curricular</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-file-earmark-text"></i></span>
                                                <input type="file" class="form-control" name="curriculum">
                                            </div>
                                        </div>
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
