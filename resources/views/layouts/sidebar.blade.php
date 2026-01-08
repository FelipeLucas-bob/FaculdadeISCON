{{-- @extends('layouts.app') --}}

{{-- @section('sidebar') --}}
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ getRouterValue() }}painel">


                        @if (app()->environment('production'))
                            {{-- Produção: busca arquivos compilados pelo Vite --}}
                            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="logo-light navbar-logo-g ms-2"
                                alt="logo" style="width: 150px; height: 100px; text-align: center;">
                            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="logo-dark navbar-logo-g"
                                alt="logo" style="width: 150px; height: 100px; text-align: center;">
                        @else
                            {{-- Desenvolvimento: rodando npm run dev --}}
                            <img src="{{ Vite::asset('resources/images/logo/logo.png') }}" class="logo-light navbar-logo-g ms-2" alt="logo"
                                style="width: 150px; height: 100px; text-align: center;">
                            <img src="{{ Vite::asset('resources/images/logo/logo.png') }}" class="logo-dark navbar-logo-g" alt="logo"
                                style="width: 150px; height: 100px; text-align: center;">
                        @endif


                    </a>
                </div>
                {{-- <div class="nav-item theme-text">
                    <a href="{{getRouterValue()}}painel" class="nav-link"> {{ config('custom.nome_do_projeto') }} </a>
                </div> --}}
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    @php
                        $avatar = Auth::user()->currentAvatar()->first();
                        $avatarSrc = $avatar
                            ? asset('storage/' . $avatar->path)
                            : Vite::asset('resources/images/users/user-icon.png');
                    @endphp
                    <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle" width="50" height="50"
                        style="object-fit: cover;">
                </div>
                <div class="profile-content">
                    <h6 class="text-primary">{{ Str::of(Auth::user()->name)->explode(' ')->first() }}</h6>
                    <p class="fw-bold">
                        @foreach (Auth::user()->profiles as $profile)
                            {{ $profile->name }}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        {{-- <div class="shadow-bottom"></div> --}}
        <ul class="list-unstyled menu-categories" id="accordionExample">

            @include('layouts.modules.admin')
            @include('layouts.modules.suport')
            @include('layouts.modules.administrative')
            @include('layouts.modules.academic')

        </ul>


    </nav>

</div>
{{-- @endsection --}}
