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

    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
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
                <h3 class="fw-bold text-primary mb-0"> Registrar Empréstimo</h3>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info"
                    type="button" role="tab" aria-controls="pills-info" aria-selected="true">
                    <i class="bi bi-person-check me-2"></i> Informações
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            {{-- ABA INFORMAÇÕES --}}
            <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Buscar Aluno</h6>
                                <div class="mb-5">
                                    <form id="formSearchStudent">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label text-primary fw-bold">Nome</label>
                                                <input type="text" name="full_name" id="full_name" class="form-control"
                                                    placeholder="Nome..." maxlength="50">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cpf" class="form-label text-primary fw-bold">CPF</label>
                                                <input type="text" name="cpf" id="cpf" class="form-control"
                                                    placeholder="000.000.000-00">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="rg" class="form-label text-primary fw-bold">RG</label>
                                                <input type="text" name="rg" id="rg" class="form-control"
                                                    placeholder="0.000.000">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary w-100 mt-4">
                                                    <i class="bi bi-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="resultStudents" class="mt-5">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.library.modules.loan-books')

        </div>



    </div>
@endsection

@section('scripts')
    @vite(['resources/js/users/account-settings.js'])

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cpfInput = document.getElementById('cpf');
            const rgInput = document.getElementById('rg');

            if (typeof Inputmask !== 'undefined' && cpfInput) {
                Inputmask("999.999.999-99").mask(cpfInput);
            } else {
                console.error('Inputmask não está disponível.');
            }

            if (typeof Inputmask !== 'undefined' && rgInput) {
                Inputmask("9.999.999[-A]").mask(rgInput);
            } else {
                console.error('Inputmask não está disponível.');
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#formSearchStudent').on('submit', function(e) {
                e.preventDefault(); // evita reload

                $.ajax({
                    url: "{{ route('library.search.students') }}",
                    method: "GET",
                    data: $(this).serialize(),
                    success: function(response) {
                        let html = '';

                        if (response.length > 0) {
                            html += `
                        <table id="zero-config-1" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Aluno</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
                            response.forEach(student => {
                                console.log(student);
                                html += `
                            <tr>
                                <td>
                                    <div class="d-flex">                                                        
                                        <p class="align-self-center mb-0 admin-name">${student.full_name}</p>
                                    </div>
                                </td>
                                <td>${student.cpf }</td>
                                <td>${student.rg }</td>
                                <td class="text-center">
                                    <a onclick="teste('${student.full_name}', '${student.cpf}', '${student.rg}', '${student.id}');" class="btn btn-success btn-sm">
                                        <i class="bi bi-check2-circle"></i> Selecionar
                                    </a>
                                </td>
                            </tr>
                        `;
                            });
                            html += `</tbody></table>`;
                        } else {
                            html =
                                `<div class="alert alert-warning fw-bold">Nenhum Resultado encontrado.</div>`;
                        }

                        // insere a tabela no HTML
                        $('#resultStudents').html(html);
                        document.getElementById('resultStudents').classList.remove('d-none');
                        document.getElementById('pills-info-2').classList.add('d-none');

                        // inicializa o DataTable após inserir
                        if (response.length > 0) {
                            $('#zero-config-1').DataTable({
                                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                                    "<'table-responsive'tr>" +
                                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                                "oLanguage": {
                                    "oPaginate": {
                                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                                    },
                                    "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                    "sSearchPlaceholder": "Pesquisar...",
                                    "sLengthMenu": "Resultados :  _MENU_",
                                },
                                "stripeClasses": [],
                                "lengthMenu": [5, 10, 20, 50],
                                "pageLength": 10
                            });
                        }
                    },
                    error: function() {
                        $('#resultStudents').html(
                            '<div class="alert alert-danger">Erro ao buscar alunos.</div>');
                    }
                });
            });
        });
        s

        function teste(nome, cpf, rg, student_id) {

            if(rg === 'null'){
                rg = '';
            }

            $('#nomeAluno').val(nome ?? '');
            $('#cpfAluno').val(cpf ?? '');
            $('#rgAluno').val(rg ?? '');
            $('#student_id').val(student_id ?? '');

            // Remove a classe d-none da aba de livros
            document.getElementById('resultStudents').classList.add('d-none');
            document.getElementById('pills-info-2').classList.remove('d-none');


            // Muda para a aba de livros
            var triggerEl = document.querySelector('#pills-info-tab');
            var tab = new bootstrap.Tab(triggerEl);
            tab.show();

        }
    </script>

    <script>
        $(document).ready(function() {
            $('#formSearchBook').on('submit', function(e) {
                e.preventDefault(); // evita reload

                $.ajax({
                    url: "{{ route('library.search.books') }}", // rota atualizada para livros
                    method: "GET",
                    data: $(this).serialize(),
                    success: function(response) {
                        let html = '';

                        if (response.length > 0) {
                            html += `
                        <table id="zero-config-2" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>ISBN</th>
                                    <th>Código</th>
                                    <th>Status</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                        `;
                            response.forEach(book => {
                                html += `
                                    <tr>
                                        <td>${book.book_title}</td>
                                        <td>${book.author ?? ''}</td>
                                        <td>${book.isbn ?? ''}</td>
                                        <td>${book.code_system ?? ''}</td>
                                        <td>
                                            <span class="badge ${
                                                book.status == 1 ? 'bg-success' :
                                                book.status == 2 ? 'bg-warning text-dark' :
                                                book.status == 3 ? 'bg-info text-dark' :

                                                book.status == 4 ? 'bg-danger' :
                                                'bg-secondary'
                                            }">
                                                ${
                                                    book.status == 1 ? 'Disponível' :
                                                    book.status == 2 ? 'Indisponível' :
                                                    book.status == 3 ? 'Emprestado' :
                                                    book.status == 4 ? 'Removido' :
                                                    'Desconhecido'
                                                }
                                            </span>
                                        </td>
                                        <td>
                                            ${
                                                book.status == 1
                                                ? `<button class="btn btn-primary" onclick="solicitar(this, ${book.item_id})" data-book-id="${book.item_id}">
                                                                <i class="bi bi-book"></i> Solicitar Empréstimo
                                                        </button>`
                                                : `<span class="text-muted">Empréstimo indisponível</span>`
                                            }
                                        </td>
                                    </tr>

                            `;
                            });
                            html += `</tbody></table>`;
                        } else {
                            html =
                                `<div class="alert alert-warning fw-bold">Nenhum Resultado encontrado.</div>`;
                        }

                        // insere a tabela no HTML
                        $('#resultBooks').html(html);
                        document.getElementById('modal-footer').classList.remove('d-none');

                        // inicializa o DataTable após inserir
                        if (response.length > 0) {
                            $('#zero-config-2').DataTable({
                                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                                    "<'table-responsive'tr>" +
                                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                                "oLanguage": {
                                    "oPaginate": {
                                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                                    },
                                    "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                    "sSearchPlaceholder": "Pesquisar...",
                                    "sLengthMenu": "Resultados :  _MENU_",
                                },
                                "stripeClasses": [],
                                "lengthMenu": [5, 10, 20, 50],
                                "pageLength": 10
                            });
                        }
                    },
                    error: function() {
                        $('#resultBooks').html(
                            '<div class="alert alert-danger">Erro ao buscar livros.</div>');
                    }
                });
            });
        });



        // function solicitar(button, bookId) {
        //     let $btn = $(button);
        //     let $badge = $btn.closest('tr').find('td span.badge');

        //     // Evita múltiplos cliques
        //     if ($btn.hasClass('btn-success') || $btn.hasClass('btn-info')) return;

        //     // if ($btn.data('clicked')) return;
        //     // $btn.data('clicked', true);

        //     // Pega o ID do aluno do input hidden
        //     const studentId = $('#student_id').val(); // exemplo: <input type="hidden" id="inputHiddenAluno" value="1">
        //     if (!studentId) {
        //         alert('Selecione um aluno antes de solicitar o empréstimo.');
        //         return;
        //     }

        //     // Botão de carregando
        //     $btn.prop('disabled', true);
        //     $btn.removeClass('btn-primary').addClass('btn-warning');
        //     $btn.html('<i class="bi bi-arrow-clockwise spin"></i> Registrando...');
        //     // AJAX para criar empréstimo
        //     $.ajax({

        //         url: '{{ route('library.loan.store') }}',
        //         method: 'POST',
        //         data: {
        //             user_id: studentId,
        //             book_item_id: bookId,
        //             _token: '{{ csrf_token() }}'
        //         },

        //     });
        // }



        function solicitar(button, bookId) {
            let $btn = $(button); // botão clicado
            let $row = $btn.closest('tr'); // linha da tabela (ou container do badge)
            let $badge = $row.find('.status-badge'); // badge de status

            // estado inicial: carregando
            $btn.prop('disabled', true);
            $btn.removeClass('btn-primary').addClass('btn-warning');
            $btn.html('<i class="bi bi-arrow-clockwise spin"></i> Registrando...');

            $.ajax({
                url: "{{ route('library.loan.store') }}",
                method: "POST",
                data: {
                    user_id: $('#student_id').val(), // aluno
                    book_item_id: bookId, // exemplar
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // botão
                    $btn.removeClass('btn-warning').addClass('btn-info');
                    $btn.html('<i class="bi bi-check2-circle"></i> Emprestado');
                    $btn.prop('disabled', false);

                    // atualiza badge na linha
                    let $row = $btn.closest('tr');
                    let $badgeCell = $row.find('td').eq(3); // supondo que o <td> do badge seja a 2ª coluna
                    $badgeCell.html(`
                    <span class="badge bg-info text-dark">
                        Emprestado
                    </span>
                `);
                },

                error: function() {
                    $btn.removeClass('btn-warning').addClass('btn-primary');
                    $btn.html('<i class="bi bi-book"></i> Solicitar Empréstimo');
                    $btn.prop('disabled', false);
                }
            });
        }
    </script>
@endsection
