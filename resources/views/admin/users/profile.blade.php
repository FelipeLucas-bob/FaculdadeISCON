@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    @vite(['resources/scss/light/assets/components/list-group.scss'])
    @vite(['resources/scss/light/assets/users/user-profile.scss'])
    @vite(['resources/scss/dark/assets/components/list-group.scss'])
    @vite(['resources/scss/dark/assets/users/user-profile.scss'])
@endsection

@section('content')
    <div class="row layout-spacing ">

        <!-- Content -->
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            <div class="user-profile">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Perfil</h3>
                        @if ($user->id == Auth::id())
                            <a href="{{ route('profile.edit', $user->id) }}" class="mt-2 edit-profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('user.edit', $user->id) }}" class="mt-2 edit-profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="d-flex flex-column align-items-center mt-4">
                        <form action="{{ route('user.uploadAvatar') }}" method="POST" enctype="multipart/form-data"
                            class="text-center">
                            @csrf

                            <div class="position-relative mb-3">
                                <img src="{{ $avatar ? asset('storage/' . $avatar->path) : Vite::asset('resources/images/users/user-icon.png') }}"
                                    alt="avatar" class="rounded-circle shadow" width="120" height="120"
                                    style="object-fit: cover; border: 3px solid #0d6efd; transition: transform 0.3s;">

                                {{-- Exibir o botão de trocar foto apenas se o usuário logado for o dono do perfil --}}
                                @if(Auth::id() === $user->id)
                                    <label for="avatar"
                                        class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2"
                                        style="cursor: pointer; border: 2px solid white;">
                                        <i class="bi bi-camera-fill"></i>
                                    </label>
                                @endif
                            </div>

                            <h3 class="fw-bold mb-3">{{ $user->name }}</h3>

                            <input type="file" name="avatar" id="avatar" class="d-none" accept="image/*" required
                                onchange="this.form.submit()">
                        </form>
                    </div>

                    <style>
                        img.rounded-circle:hover {
                            transform: scale(1.05);
                        }
                    </style>

                    <div class="user-info-list">

                        <div class="col-lg-12">
                            <ul class="contacts-block list-unstyled text-primary">
                                <li class="contacts-block__item d-flex align-items-center">
                                    <i class="bi bi-person-badge text-info me-2"></i>
                                    <b class="text-info me-2">Perfil:</b><b> {{ $user_profile->name }}</b>
                                </li>
                                <li class="contacts-block__item d-flex align-items-center">
                                    <i class="bi bi-envelope-at text-info me-2"></i>
                                    <b class="text-info me-2">Email:</b> <b> {{ $user->email }}</b>
                                </li>
                                <li class="contacts-block__item d-flex align-items-center">
                                    <i class="bi bi-calendar-check text-info me-2"></i>
                                    <b class="text-info me-2">Registrado:</b> <b>
                                        {{ $user->created_at->format('d/m/Y') }}</b>
                                </li>
                            </ul>

                            <ul class="list-inline mt-4">
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-danger btn-icon btn-rounded" href="javascript:void(0);">
                                        <!-- Instagram -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-instagram">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                                            </rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line>
                                        </svg>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-info btn-icon btn-rounded" href="javascript:void(0);">
                                        <!-- Facebook -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-facebook">
                                            <path d="M18 2h-3a4 4 0 0 0-4 4v4H8v4h3v8h4v-8h3l1-4h-4V6a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-success btn-icon btn-rounded" href="https://wa.me/5599999999999"
                                        target="_blank">
                                        <!-- WhatsApp -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-message-circle">
                                            <path
                                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5z" />
                                        </svg>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

            <div class="usr-tasks">
                <div class="widget-content widget-content-area">
                    <h3>Atividades de Login</h3>
                    <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Usuário</th>
                                    <th>Email</th>
                                    <th>IP</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $log->created_at->format('H:i') }}</td>
                                        <td>{{ $log->user?->name ?? '-' }}</td>
                                        <td>{{ $log->email }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>
                                            @if ($log->success)
                                                <span class="badge bg-success">Sucesso</span>
                                            @else
                                                <span class="badge bg-danger">Falha</span>
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

    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
@endsection
