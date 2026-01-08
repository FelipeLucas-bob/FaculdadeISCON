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
            <h3 class="fw-bold text-primary mb-0">Prova </h3>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12">
                    {{-- Visão da Prova com a Primeira Questão --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Processo Seletivo 2025.2</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('registrations.answers') }}" class="ajax-answer-form">
                                @foreach($questions as $question)
                                @csrf
                                <div class="mb-3 mt-4">
                                    <label class="form-label fw-bold">{{ $question->id }} - {{ $question->statement }}</label>
                                    <div class="mt-3">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option1-{{ $question->id }}" value="a">
                                            <label class="form-check-label" for="option1-{{ $question->id }}">
                                                {{ $question->option_a }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option2-{{ $question->id }}" value="b">
                                            <label class="form-check-label" for="option2-{{ $question->id }}">
                                                {{ $question->option_b }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option3-{{ $question->id }}" value="c">
                                            <label class="form-check-label" for="option3-{{ $question->id }}">
                                                {{ $question->option_c }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option4-{{ $question->id }}" value="d">
                                            <label class="form-check-label" for="option4-{{ $question->id }}">
                                                {{ $question->option_d }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option5-{{ $question->id }}" value="e">
                                            <label class="form-check-label" for="option5-{{ $question->id }}">
                                                {{ $question->option_e }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Responder</button>
                                <div class="ajax-response mt-2"></div>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.querySelectorAll('.ajax-answer-form').forEach(function(form) {
                                        form.addEventListener('submit', function(e) {
                                            e.preventDefault();
                                            const formData = new FormData(form);
                                            fetch("{{ route('registrations.answers') }}", {
                                                method: 'POST',
                                                headers: {
                                                    'X-Requested-With': 'XMLHttpRequest',
                                                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value
                                                },
                                                body: formData
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                let responseDiv = form.querySelector('.ajax-response');
                                                if (data.success) {
                                                    responseDiv.innerHTML = '<div class="alert alert-success">'+data.message+'</div>';
                                                } else {
                                                    responseDiv.innerHTML = '<div class="alert alert-danger">'+(data.message || 'Erro ao enviar resposta')+'</div>';
                                                }
                                            })
                                            .catch(() => {
                                                let responseDiv = form.querySelector('.ajax-response');
                                                responseDiv.innerHTML = '<div class="alert alert-danger">Erro ao enviar resposta</div>';
                                            });
                                        });
                                    });
                                });
                            </script>
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
    <script type="module" src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script type="module" src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script type="module">
        function multiCheck(tb_var) {
            tb_var.on("change", ".chk-parent", function () {
                var e = $(this).closest("table").find("td:first-child .child-chk"),
                    a = $(this).is(":checked");
                $(e).each(function () {
                    a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this)
                        .prop("checked", !1), $(this).closest("tr").removeClass("active"))
                })
            }),
                tb_var.on("change", "tbody tr .new-control", function () {
                    $(this).parents("tr").toggleClass("active")
                })
        }

        // var e;
        let c1 = $('#user-list').DataTable({

            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Resultado :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c1);
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function aplicarInputMaskCPF() {
            const cpfField = document.getElementById('cpfCreateUser');
            if (cpfField) {
                Inputmask("999.999.999-99").mask(cpfField);
            }
        }

        aplicarInputMaskCPF(); // Aplica ao carregar

        // Aplica novamente ao abrir o modal (útil se o input for recriado)
        const modal = document.getElementById('createUserModal');
        if (modal) {
            modal.addEventListener('shown.bs.modal', function () {
                aplicarInputMaskCPF();
            });
        }
    });
</script>
