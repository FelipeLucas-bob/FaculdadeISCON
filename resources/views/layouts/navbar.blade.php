{{-- @extends('layouts.app')

@section('navbar') --}}
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <div class="search-animated toggle-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <form class="form-inline search-full form-inline search" role="search" onsubmit="return false;">
                <div class="search-bar">
                    <input type="text" id="sidebar-search" class="form-control search-form-control ml-lg-auto"
                        placeholder="Pesquisar no menu..." style="width: 350px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x search-close" onclick="clearSidebarSearch()">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </form>
            <ul id="sidebar-search-results" class="list-group position-absolute w-100 mt-4 shadow rounded"
                style="z-index: 1050; display: none; background: #fff; border: 1px solid #e3e6ed; max-height: 320px; overflow-y: auto; left: 0; right: 0;">
                <!-- Os resultados da busca aparecerão aqui -->
            </ul>
        </div>


        <ul class="navbar-item flex-row ms-lg-auto ms-0">


            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-moon dark-mode">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-sun light-mode">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </a>
            </li>


            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg><span
                        class="badge badge-success"></span><b>{{ $notifications->where('is_read', 0)->count() }}</b>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                    <div class="drodpown-title message">
                        <h6 class="d-flex justify-content-between">
                            <span class="align-self-center">Notificações</span>
                            <span class="badge badge-primary">
                                {{ $notifications->where('is_read', 0)->count() }} Não lidas
                            </span>
                        </h6>
                    </div>

                    <div class="notification-scroll">
                        @foreach ($notifications->take(5) as $notification)
                            @php
                                $bg = $notification->is_read ? '#f8f9fa' : 'rgba(255,193,7,0.15)'; // 15% de opacidade
                            @endphp

                            <div class="dropdown-item rounded p-3 mb-2"
                                style="background-color: {{ $bg }};">


                                <div class="media server-log">
                                    <div class="avatar me-2">
                                        @php
                                            $user = \App\Models\User::find($notification->author_id);
                                            $avatar = $user?->currentAvatar()->first();
                                            $avatarSrc = $avatar
                                                ? asset('storage/' . $avatar->path)
                                                : Vite::asset('resources/images/users/user-icon.png');
                                        @endphp
                                        <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle"
                                            width="50" height="50" style="object-fit: cover;">
                                    </div>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="mb-0">{{ $notification->user_name }}</h6>
                                            <p class="text-primary small mb-0">
                                                {{ Date('d/m/Y', strtotime($notification->created_at)) }} às
                                                {{ Date('H:i', strtotime($notification->created_at)) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </li>

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="#" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <div class="avatar-container">
                        @php
                            $avatar = Auth::user()->currentAvatar()->first();
                            $avatarSrc = $avatar
                                ? asset('storage/' . $avatar->path)
                                : Vite::asset('resources/images/users/user-icon.png');
                        @endphp
                        {{-- <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle" width="50" height="50" style="object-fit: cover;"> --}}

                        @if (Auth::user()->status->status == 1)
                            <div class="avatar avatar-sm avatar-indicators avatar-online" title="Online">
                                <img alt="avatar" src="{{ $avatarSrc }}"
                                    class="rounded-circle border border-2 border-success">
                            </div>
                        @elseif(Auth::user()->status->status == 2)
                            <div class="avatar avatar-sm avatar-indicators avatar-busy" title="Ocupado">
                                <img alt="avatar" src="{{ $avatarSrc }}"
                                    class="rounded-circle border border-2 border-danger">
                            </div>
                        @elseif(Auth::user()->status->status == 3)
                            <div class="avatar avatar-sm avatar-indicators avatar-away" title="Ausente">
                                <img alt="avatar" src="{{ $avatarSrc }}"
                                    class="rounded-circle border border-2 border-warning">
                            </div>
                        @endif
                    </div>
                </a>


                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div class="media-body">
                                <h5>{{ Auth::user()->name }}</h5>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <form method="POST" action="{{ route('user.status.update') }}" id="statusForm">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <!-- Select para alterar status -->
                                    <select name="status" id="statusSelect" class="form-select form-select-sm mt-2">
                                        <option value="1"
                                            {{ Auth::user()->status->status == 1 ? 'selected' : '' }}>Online</option>
                                        <option value="2"
                                            {{ Auth::user()->status->status == 2 ? 'selected' : '' }}>Ocupado</option>
                                        <option value="3"
                                            {{ Auth::user()->status->status == 3 ? 'selected' : '' }}>Ausente</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown-item">
                        <a href="{{ route('profile.show', Auth::user()->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> <span>Perfil</span>
                        </a>
                    </div>
                    {{-- <div class="dropdown-item">
                        <a href="{{ getRouterValue() }}app/mailbox">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                <path
                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                </path>
                            </svg> <span>Caixa de Entrada</span>
                        </a>
                    </div> --}}
                    <div class="dropdown-item">
                        <a href="{{ route('profile.edit.alterar-senha', Auth::user()->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                </rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg> <span>Alterar Senha</span>
                        </a>
                    </div>
                    <div class="dropdown-item text-center mt-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link text-decoration-none col-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-danger feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> <span class="text-danger">SAIR</span>
                            </button>
                        </form>
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>
{{-- @endsection --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $('#statusSelect').on('change', function() {
        const form = $('#statusForm');
        const status = $(this).val();

        $.post(form.attr('action'), form.serialize(), function(data) {
            // Atualiza o círculo pequeno
            const indicator = $('#statusIndicator');
            indicator.removeClass().addClass('rounded-circle me-2');

            // Atualiza avatar
            const avatar = $('.avatar-container .avatar img');
            const avatarParent = avatar.closest('.avatar');

            avatar.removeClass('border-success border-danger border-warning border-secondary');
            avatarParent.removeClass('avatar-online avatar-busy avatar-away');

            switch (parseInt(status)) {
                case 1: // Online
                    indicator.addClass('bg-success');
                    avatar.addClass('border-success');
                    avatarParent.addClass('avatar-online').attr('title', 'Online');
                    break;
                case 2: // Ocupado
                    indicator.addClass('bg-danger');
                    avatar.addClass('border-danger');
                    avatarParent.addClass('avatar-busy').attr('title', 'Ocupado');
                    break;
                case 3: // Ausente
                    indicator.addClass('bg-warning');
                    avatar.addClass('border-warning');
                    avatarParent.addClass('avatar-away').attr('title', 'Ausente');
                    break;
                default:
                    indicator.addClass('bg-secondary');
                    avatar.addClass('border-secondary');
                    avatarParent.removeAttr('title');
            }
        }).fail(function(xhr) {
            console.error(xhr.responseText);
            alert('Erro ao atualizar status.');
        });
    });
</script>
