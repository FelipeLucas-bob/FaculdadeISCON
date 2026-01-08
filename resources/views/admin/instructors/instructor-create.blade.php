@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
    <!--  END CUSTOM STYLE FILE  -->
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
            <h3 class="fw-bold text-primary mb-0"> Registrar Professor</h3>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                    <form id="createInstructorForm" class="p-5" action="{{ route('instructor.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="modal-body row">


                            <div class="form-group col-lg-6">
                                <label for="status" class="form-label fw-bold text-primary">Professor</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="bi bi-toggle-on"></i>
                                    </span>
                                    <select class="form-select" id="user_id" name="user_id" required>
                                        <option value="" selected disabled>Selecione um Professor</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o Professor.</div>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="status" class="form-label fw-bold text-primary">Curso</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="bi bi-toggle-on"></i>
                                    </span>
                                    <select class="form-select" id="course_id" name="course_id" required>
                                        <option value="" selected disabled>Selecione um Curso</option>
                                        @foreach ($courses as $course)
                                            <option value='{{ $course->id }}'>{{ $course->course }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o Curso.</div>
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


@endsection

@section('scripts')
    {{-- Scripts Here --}}
    @vite(['resources/js/custom.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createInstructorForm');
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
