@extends('layouts.app')

@section('styles')
    {{-- Estilos aqui --}}
    @vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
    @vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
@endsection

@section('content')
    {{-- Conteúdo aqui --}}
    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3" style="background-color: #ffffff;">
                        <div class="card-body">
                            <form action="{{ route('login.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="{{ getRouterValue() }}">
                                            <h2>
                                                @if (app()->environment('production'))
                                                    {{-- Produção: busca arquivos compilados pelo Vite --}}
                                                     <img src="{{ asset('images/logo/logo.png') }}" alt="Logo">
                                                @else
                                                    {{-- Desenvolvimento: rodando npm run dev --}}
                                                    <img src="{{ Vite::asset('resources/images/logo/logo.png') }}"
                                                        alt="Logo">
                                                @endif

                                            </h2>
                                            <p class="mt-2 mb-5 text-primary fw-bold h6">Digite seu e-mail e senha para
                                                acessar o Portal</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-12">
                                        @error('email')
                                            <div class="alert alert-danger">
                                                @if ($message == 'These credentials do not match our records.')
                                                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                                    <strong>Usuário ou senha inválidos.</strong>
                                                @else
                                                    <strong>{{ $message }}</strong>
                                                @endif
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold text-primary">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Exemplo@email.com.br" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label fw-bold text-primary">Senha</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="********" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4 mt-3">
                                            <button type="submit" class="btn btn-primary w-100">ENTRAR</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    {{-- Scripts aqui --}}
@endsection
