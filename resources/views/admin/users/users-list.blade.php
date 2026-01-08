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
            <h3 class="fw-bold text-primary mb-0">Usuários</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="bi bi-person-plus me-2"></i> Novo Usuário
            </button>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table id="user-list" class="table style-1 dt-table-hover non-hover">
                        <thead class="mb-5">
                            <tr class="text-center">
                                <th>Usuário</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Perfil</th>
                                <th class="">Status</th>
                                <th class="text-center dt-no-sorting">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                <tr class="text-center">
                                    <td class="text-center">
                                        @if( $user->status->status == 1)
                                        <div class="avatar avatar-sm avatar-indicators avatar-online" title="Online">
                                            <img alt="avatar" src="{{ Vite::asset('resources/images/users/user-icon.png') }}"
                                                class="rounded-circle border border-2 border-success">
                                        </div>
                                        @elseif( $user->status->status == 2)
                                        <div class="avatar avatar-sm avatar-indicators avatar-busy" title="Ocupado">
                                            <img alt="avatar" src="{{ Vite::asset('resources/images/users/user-icon.png') }}"
                                                class="rounded-circle border border-2 border-danger">
                                        </div> 
                                        @elseif( $user->status->status == 3)
                                        <div class="avatar avatar-sm avatar-indicators avatar-away" title="Ausente">
                                            <img alt="avatar" src="{{ Vite::asset('resources/images/users/user-icon.png') }}"
                                                class="rounded-circle border border-2 border-warning">
                                        </div>
                                        @elseif( $user->status->status == 0)
                                        <div class="avatar avatar-sm avatar-indicators avatar-offline" title="Offline">
                                            <img alt="avatar" src="{{ Vite::asset('resources/images/users/user-icon.png') }}"
                                                class="rounded-circle border border-2 border-none">
                                        </div>
                                        @endif
                                    </td>
                                    <td class="user-name text-primary">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->cpf }}</td>
                                    <td>
                                        @foreach ($user->profiles as $profile) 
                                        {{ $profile->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div>
                                            @if($user->active == 1)
                                                <div class=" align-self-center d-m-success data-marker"></div>
                                                <span class="badge bg-success">ATIVO</span>
                                            @else
                                            <div class=" align-self-center d-m-danger data-marker"></div>
                                            <span class="badge bg-danger">INATIVO</span>
                                            @endIf
                                        </div>
                                    </td>
                                    <td class="text-center">
                                       <button class="btn btn-sm btn-none"
                                            data-user-ativo="{{ $user->active }}"
                                            data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewUserModal" title="Visualizar">
                                            <i class="bi bi-eye  h6"></i>
                                        </button>
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-none"
                                            title="Editar">
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

{{-- Modal Novo Usuário --}}
@include('admin.users.modals.create-user')

{{-- Modal Novo Usuário --}}
@if ($users && count($users) > 0)
    @include('admin.users.modals.view-user')
@endif

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
