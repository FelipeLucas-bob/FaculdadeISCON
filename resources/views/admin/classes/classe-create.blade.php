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
                <h3 class="fw-bold text-primary mb-0">Registrar Turma</h3>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-basic-tab" data-bs-toggle="pill" data-bs-target="#pills-basic"
                    type="button" role="tab" aria-controls="pills-basic" aria-selected="true">
                    <i class="bi bi-journal-text me-2"></i> Dados da Turma
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-turnos-tab" data-bs-toggle="pill" data-bs-target="#pills-turnos"
                    type="button" role="tab" aria-controls="pills-turnos" aria-selected="false">
                    <i class="bi bi-clock-history me-2"></i> Turnos & Vagas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-students-tab" data-bs-toggle="pill" data-bs-target="#pills-students"
                    type="button" role="tab" aria-controls="pills-students" aria-selected="false">
                    <i class="bi bi-people me-2"></i> Alunos Matriculados
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            {{-- DADOS DA TURMA --}}
            <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
                <div class="row">
                    <div class="col-xl-12 layout-spacing">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Informações da Turma</h6>
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Código da Turma</label>
                                                <input type="text" class="form-control" name="code" required
                                                    placeholder="Ex: T2025-01">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Curso</label>
                                                <select class="form-select" name="course_id" required>
                                                    <option value="" disabled selected>Selecione o Curso</option>
                                                    {{-- @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach --}}
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Ano / Semestre</label>
                                                <input type="text" class="form-control" name="semester"
                                                    placeholder="Ex: 2025/1" required>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="form-label fw-bold text-primary">Situação da Turma</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="" disabled selected>Selecione</option>
                                                    <option value="1">Ativa</option>
                                                    <option value="0">Inativa</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                            <button type="reset"
                                                class="btn btn-light-none mt-3 me-2 btn-no-effect">Limpar</button>
                                            <button type="submit" class="btn btn-success mt-3">Salvar Turma</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TURNOS & VAGAS --}}
            <div class="tab-pane fade" id="pills-turnos" role="tabpanel" aria-labelledby="pills-turnos-tab">
                <div class="row">
                    <div class="col-xl-12 layout-spacing">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Turnos e Quantidade de Vagas</h6>
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Turno</th>
                                                        <th>Quantidade de Vagas</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (['MANHÃ', 'TARDE', 'NOITE', 'INTEGRAL'] as $shift)
                                                        <tr>
                                                            <td>{{ $shift }}</td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="vacancies[{{ strtolower($shift) }}]"
                                                                    placeholder="Qtd. Vagas" max="999">
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="form-check form-switch d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="shifts[]" value="{{ $shift }}">
                                                                    <label
                                                                        class="form-check-label visually-hidden">Selecionar</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                            <button type="reset"
                                                class="btn btn-light-none mt-3 me-2 btn-no-effect">Limpar</button>
                                            <button type="submit" class="btn btn-success mt-3">Salvar Turnos</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ALUNOS MATRICULADOS --}}
            <div class="tab-pane fade" id="pills-students" role="tabpanel" aria-labelledby="pills-students-tab">
                <div class="row">
                    <div class="col-xl-12 layout-spacing">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Alunos Matriculados na Turma</h6>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Nome do Aluno</th>
                                                    <th>Curso</th>
                                                    <th>Turno</th>
                                                    <th>Status</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Loop de alunos matriculados --}}
                                            <tbody>
                                                <tr>
                                                    <td>Maria Oliveira</td>
                                                    <td>Radiologia</td>
                                                    <td>MANHÃ</td>
                                                    <td>Ativo</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-danger">Remover</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>João Santos</td>
                                                    <td>Enfermagem</td>
                                                    <td>TARDE</td>
                                                    <td>Ativo</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-danger">Remover</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Beatriz Lima</td>
                                                    <td>Biomedicina</td>
                                                    <td>NOITE</td>
                                                    <td>Inativo</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-danger">Remover</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Carlos Ferreira</td>
                                                    <td>Radiologia</td>
                                                    <td>INTEGRAL</td>
                                                    <td>Ativo</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-danger">Remover</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ana Souza</td>
                                                    <td>Enfermagem</td>
                                                    <td>MANHÃ</td>
                                                    <td>Ativo</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-danger">Remover</button>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-success mt-3">Adicionar Aluno</button>
                                    </div>
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
    {{-- Scripts Here --}}
    @vite(['resources/js/custom.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createClasseForm');
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
