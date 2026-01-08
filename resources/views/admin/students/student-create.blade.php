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
            <h3 class="fw-bold text-primary mb-0">Matricular Aluno</h3>
        </div>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student"
                type="button" role="tab" aria-controls="pills-student" aria-selected="true">
                <i class="bi bi-person-badge me-2"></i> Dados do Aluno
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
            <button class="nav-link" id="pills-courses-tab" data-bs-toggle="pill" data-bs-target="#pills-courses"
                type="button" role="tab" aria-controls="pills-courses" aria-selected="false">
                <i class="bi bi-journal-bookmark me-2"></i> Disciplinas / Matriz
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        {{-- DADOS DO ALUNO --}}
        <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
            <div class="row">
                <div class="col-xl-12 layout-spacing">
                    <div class="section general-info">
                        <div class="info">
                            <h6 class="">Informações do Aluno</h6>
                            <div class="card-body">
                                <form action="#" method="POST" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label fw-bold text-primary">Nome Completo</label>
                                            <input type="text" class="form-control text-uppercase" name="full_name" required placeholder="Ex: João Silva">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="form-label fw-bold text-primary">Data de Nascimento</label>
                                            <input type="date" class="form-control" name="birth_date" required>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="form-label fw-bold text-primary">Sexo</label>
                                            <select class="form-select" name="gender" required>
                                                <option value="" disabled selected>Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label fw-bold text-primary">Curso</label>
                                            <select class="form-select" name="course_id" required>
                                                <option value="" disabled selected>Selecione o Curso</option>
                                                {{-- Listar cursos via loop do backend --}}
                                                {{-- @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label fw-bold text-primary">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Ex: aluno@email.com">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label fw-bold text-primary">Telefone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="(00) 00000-0000">
                                        </div>
                                    </div>

                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect" data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success mt-3">Matricular</button>
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
                <div class="col-xl-12 layout-spacing">
                    <div class="section general-info">
                        <div class="info">
                            <h6 class="">Documentação do Aluno</h6>
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-primary">CPF</label>
                                        <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-primary">RG</label>
                                        <input type="text" class="form-control" name="rg" placeholder="00.000.000-0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-primary">Comprovante de Residência</label>
                                        <input type="file" class="form-control" name="residence_proof">
                                    </div>
                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect" data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success mt-3">Salvar Documentos</button>
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
                <div class="col-xl-12 layout-spacing">
                    <div class="section general-info">
                        <div class="info">
                            <h6 class="">Escolha o Turno</h6>
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Turno</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(['MANHÃ', 'TARDE', 'NOITE', 'INTEGRAL'] as $shift)
                                                <tr>
                                                    <td>{{ $shift }}</td>
                                                    <td>
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input" type="checkbox" name="shifts[]" value="{{ $shift }}">
                                                            <label class="form-check-label visually-hidden">Selecionar</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect" data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success mt-3">Salvar Turno</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DISCIPLINAS / MATRIZ --}}
        <div class="tab-pane fade" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
            <div class="row">
                <div class="col-xl-12 layout-spacing">
                    <div class="section general-info">
                        <div class="info">
                            <h6 class="">Matriz de Disciplinas</h6>
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-primary">Upload da Matriz de Disciplinas</label>
                                        <input type="file" class="form-control" name="curriculum">
                                    </div>
                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect" data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success mt-3">Salvar Matriz</button>
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
    {{-- Scripts Here --}}
    @vite(['resources/js/custom.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createStudentForm');
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
