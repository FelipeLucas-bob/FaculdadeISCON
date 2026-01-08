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
                <h3 class="fw-bold text-primary mb-0">Livros</h3>
                <div class="d-flex justify-content-start">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#createSectorModal">
                        <i class="bi bi-briefcase"></i> Novo Livro
                    </button>
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#createProfileModal">
                        <i class="bi bi-person"></i> Nova Editora
                    </button>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-books-tab" data-bs-toggle="pill" data-bs-target="#pills-books"
                    type="button" role="tab" aria-controls="pills-books" aria-selected="true">
                    <i class="bi bi-book me-2"></i> Livros
                </button>
            </li>

            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-publishers-tab" data-bs-toggle="pill" data-bs-target="#pills-publishers"
                    type="button" role="tab" aria-controls="pills-publishers" aria-selected="false">
                    <i class="bi bi-building me-2"></i> Editoras
                </button>
            </li>
        </ul>


        <div class="tab-content" id="pills-tabContent">

            {{-- ABA LIVROS --}}
            <div class="tab-pane fade show active" id="pills-books" role="tabpanel" aria-labelledby="pills-books-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Livros</h6>
                                <div class="mb-5">
                                    <table id="books-list" class="table style-1 dt-table-hover non-hover">
                                        <thead class="mb-5">
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Autor</th>
                                                <th>ISBN</th>
                                                <th>Cópias</th>
                                                <th>Ações</th>
                                                {{-- <th class="text-center dt-no-sorting">Ações</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($books)
                                                @foreach ($books as $book)
                                                    <tr class="text-center">
                                                        <td>{{ $book->id }}</td>
                                                        <td>{{ $book->title }}</td>
                                                        <td>{{ $book->author }}</td>
                                                        <td>{{ $book->isbn }}</td>
                                                        <td>{{ $book->copies }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('library.book.show', $book->id) }}"
                                                                class="btn btn-sm btn-none" title="Editar">
                                                                <i class="bi bi-pencil-square h6"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">Nenhum usuário encontrado.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ABA EDITORAS --}}
            <div class="tab-pane fade" id="pills-publishers" role="tabpanel" aria-labelledby="pills-publishers-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section general-info payment-info">
                            <div class="info">
                                <h6 class="">Editoras</h6>
                                <div class="mb-5">
                                    <table id="publishers-list" class="table style-1 dt-table-hover non-hover">
                                        <thead class="mb-5">
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>Site</th>
                                                {{-- <th>Ações</th> --}}
                                                {{-- <th class="text-center dt-no-sorting">Ações</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($publishers)
                                                @foreach ($publishers as $publisher)
                                                    <tr class="text-center">
                                                        <td>{{ $publisher->id }}</td>
                                                        <td>{{ $publisher->name }}</td>
                                                        <td>{{ $publisher->email }}</td>
                                                        <td>{{ $publisher->phone }}</td>
                                                        <td>{{ $publisher->website }}</td>
                                                        {{-- <td class="text-center">
                                                            <a href="{{ route('library.book.show', $book->id) }}"
                                                                class="btn btn-sm btn-none" title="Editar">
                                                                <i class="bi bi-pencil-square h6"></i>
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">Nenhum usuário encontrado.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- Modal Novo Sector --}}
            @include('admin.library.modals.create-book')
            {{-- Modal Novo Setor --}}

            {{-- Modal Novo Perfil --}}
            @include('admin.library.modals.create-publisher')
            {{-- Modal Novo Perfil --}}

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
        let c1 = $('#books-list, #publishers-list').DataTable({

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
