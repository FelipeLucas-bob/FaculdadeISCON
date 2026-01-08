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
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                    <form action="{{  route('login.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <a href="{{getRouterValue()}}">
                                <h2><img src="{{Vite::asset( config('custom.logo_icon_transparent') )}}" style="width: 100px"><b> BobDev</b></h2>
                                <p class="mt-2">Digite seu e-mail e senha para acessar</p>
                                </a>                                
                            </div>
                            <div class="col-lg-12">
                                @error('email')
                                    <div class="alert alert-danger">
                                        @if( $message == 'These credentials do not match our records.')
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
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Senha</label>
                                    <input type="password" name="password" class="form-control" placeholder="********" required>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-4">
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