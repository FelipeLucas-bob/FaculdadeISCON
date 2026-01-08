@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <div class="container mt-5">

        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">Notificações</h3>
            </div>
        </div>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Registro</th>
                                <th>Usuário</th>
                                <th>Título</th>
                                <th>Mensagem</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notifications as $notification)
                                {{-- <tr class="{{ $notification->is_read ? '' : 'table-danger' }}"> --}}
                                <tr>
                                    <td>{{ $notification->created_at ? $notification->created_at->format('d/m/Y H:i') : '' }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="avatar me-2">
                                                @php
                                                    $author = $notification->author; // pega o author da notificação
                                                    $avatar = $author?->currentAvatar()->first();
                                                    $avatarSrc = $avatar
                                                        ? asset('storage/' . $avatar->path)
                                                        : Vite::asset('resources/images/users/user-icon.png');
                                                @endphp
                                                <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle"
                                                    width="50" height="50" style="object-fit: cover;">
                                            </div>
                                            <p class="align-self-center mb-0 admin-name">
                                                {{ $author->name ?? 'Sistema' }}
                                            </p>
                                        </div>

                                    </td>
                                    <td>{{ $notification->title }}</td>
                                    <td>{{ $notification->message }}</td>
                                    <td>
                                        @if (!$notification->is_read)
                                            <a href="{{ route('notifications.read', $notification->id) }}"
                                                class="btn btn-sm btn-outline-success align-items-center gap-1">
                                                <i class="bi bi-check2-circle"></i>
                                                <span class="fw-bold">Marcar lida</span>
                                            </a>
                                        @else
                                            <span class="badge bg-success">Lida</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
    <script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    </script>
@endsection
