@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/css/app.css'])
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

        <div class="row">
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-primary mb-0">Empréstimos</h3>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="loans-list" class="table style-1 dt-table-hover non-hover">
                                    <thead class="mb-5">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>Aluno</th>
                                            <th>Data do Empréstimo</th>
                                            <th>Data Prevista</th>
                                            <th>Data de Devolução</th>
                                            <th>Atrasado</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($loans)
                                            @foreach ($loans as $loan)
                                                <tr class="text-center">
                                                    <td>{{ $loan->id }}</td>
                                                    <td>{{ $loan->book_title ?? '-' }}</td>
                                                    <td>{{ $loan->user_name ?? '-' }}</td>
                                                    <td>{{ Date('d/m/Y', strtotime($loan->loan_date)) }}</td>
                                                    <td>{{ Date('d/m/Y', strtotime($loan->due_date)) }}</td>
                                                    <td>{{ $loan->return_date ? date('d/m/Y', strtotime($loan->return_date)) : '' }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $dueDate = strtotime($loan->due_date);
                                                            $refDate = $loan->return_date
                                                                ? strtotime($loan->return_date)
                                                                : strtotime(date('Y-m-d'));
                                                            $daysDiff = floor(($dueDate - $refDate) / (60 * 60 * 24));
                                                        @endphp

                                                        <span
                                                            class="badge 
                                                            {{ $loan->return_date
                                                                ? ($daysDiff < 0
                                                                    ? 'bg-danger'
                                                                    : 'bg-success')
                                                                : ($daysDiff < 0
                                                                    ? 'bg-danger'
                                                                    : ($daysDiff == 0
                                                                        ? 'bg-warning'
                                                                        : 'bg-warning')) }}">
                                                            @if ($loan->return_date)
                                                                {{ $daysDiff < 0 ? abs($daysDiff) . ' dias vencidos' : 'Devolvido no prazo' }}
                                                            @else
                                                                @if ($daysDiff < 0)
                                                                    {{ abs($daysDiff) }} dias vencidos
                                                                @elseif ($daysDiff == 0)
                                                                    Vence hoje
                                                                @else
                                                                    {{ $daysDiff }} dias restantes
                                                                @endif
                                                            @endif
                                                        </span>
                                                    </td>

                                                    <td>
                                                        @php
                                                            $statusClass = 'bg-secondary';
                                                            $statusText = 'Desconhecido';
                                                            if ($loan->status == 1) {
                                                                $statusClass = 'bg-info';
                                                                $statusText = 'Emprestado';
                                                            } elseif ($loan->status == 2) {
                                                                $statusClass = 'bg-primary';
                                                                $statusText = 'Devolvido';
                                                            } elseif ($loan->status == 3) {
                                                                $statusClass = 'bg-danger';
                                                                $statusText = 'Atrasado';
                                                            }
                                                        @endphp
                                                        <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                                                    </td>

                                                    <td class="text-center">
                                                        @if ($loan->status == 1)
                                                            {{-- Emprestado --}}
                                                            <!-- Botão de Devolver abre modal -->
                                                            <button class="btn btn-sm btn-none" data-bs-toggle="modal"
                                                                data-bs-target="#returnModal"
                                                                data-loan-id="{{ $loan->id }}"
                                                                data-loan-book="{{ $loan->book_title }}"
                                                                title="Registrar devolução">
                                                                <i class="bi-arrow-return-left h6 text-success"></i>
                                                            </button>
                                                        @elseif ($loan->status == 2)
                                                            <button class="btn btn-sm btn-none" data-bs-toggle="modal"
                                                                data-bs-target="#returnModal"
                                                                data-loan-id="{{ $loan->id }}"
                                                                data-loan-book="{{ $loan->book_title }}"
                                                                title="Visualizar devolução">
                                                                <i class="bi bi-eye h6 text-info"></i>
                                                            </button>
                                                        @endif

                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">Nenhum empréstimo encontrado.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                @include('admin.library.modals.return-loan')


                                <!-- Script para preencher modal via AJAX -->
                                <script>
                                    $(document).ready(function() {
                                        $('#returnModal').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget);
                                            var loanId = button.data('loan-id');
                                            var modal = $(this);

                                            // Esconde o footer inicialmente
                                            modal.find('#modal-footer').addClass('d-none');

                                            // Preenche o input hidden
                                            modal.find('#modal-loan-id').val(loanId);

                                            // Busca os dados do empréstimo
                                            $.ajax({
                                                url: '/painel/biblioteca/emprestimo/' + loanId,
                                                method: 'GET',
                                                dataType: 'json',
                                                success: function(data) {
                                                    // Preenche os campos do modal
                                                    modal.find('#modal-book-title').text(data.book_title);
                                                    modal.find('#modal-book-code').text(data.book_code_system);
                                                    modal.find('#modal-student-name').text(data.student_name);
                                                    modal.find('#modal-publisher-name').text(data.publisher_name);
                                                    modal.find('#modal-student-cpf').text(data.cpf);
                                                    modal.find('#modal-student-rg').text(data.rg);

                                                    // Observação dinâmica
                                                    var obsContainer = modal.find('#modal-observation-container');
                                                    obsContainer.empty(); // limpa antes de preencher

                                                    if (data.observation && data.observation !== '') {
                                                        // Mostra observação já existente
                                                        obsContainer.html('<h6 class="text-black">' + data.observation +
                                                            '</h6>');

                                                        // Oculta footer (não pode editar)
                                                        modal.find('#modal-footer').addClass('d-none');
                                                    } else {
                                                        // Mostra textarea para adicionar observação
                                                        obsContainer.html(`
                            <textarea name="observation" id="modal-observation" 
                                      class="form-control" rows="3"
                                      placeholder="Digite uma observação (opcional)"></textarea>
                        `);

                                                        // Mostra footer (para permitir confirmar)
                                                        modal.find('#modal-footer').removeClass('d-none');
                                                    }
                                                },

                                                error: function(xhr) {
                                                    console.error(xhr.responseText);
                                                    alert('Erro ao carregar informações do empréstimo.');
                                                    modal.find('#modal-footer').addClass(
                                                    'd-none'); // garante ocultar em caso de erro
                                                }
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
    </div>


@endsection



@section('scripts')
    {{-- Scripts Here --}}
    <script type="module" src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script type="module" src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script type="module">
        function multiCheck(tb_var) {
            tb_var.on("change", ".chk-parent", function() {
                    var e = $(this).closest("table").find("td:first-child .child-chk"),
                        a = $(this).is(":checked");
                    $(e).each(function() {
                        a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this)
                            .prop("checked", !1), $(this).closest("tr").removeClass("active"))
                    })
                }),
                tb_var.on("change", "tbody tr .new-control", function() {
                    $(this).parents("tr").toggleClass("active")
                })
        }

        // var e;
        let c1 = $('#loans-list').DataTable({

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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                modal.addEventListener('shown.bs.modal', function() {
                    aplicarInputMaskCPF();
                });
            }
        });
    </script>
@endsection
