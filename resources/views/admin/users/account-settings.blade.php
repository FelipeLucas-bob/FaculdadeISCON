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
@endsection

@section('content')
    <div class="account-settings-container layout-top-spacing">
        @include('layouts.errors')
        <div class="account-content">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 class="fw-bold text-primary mb-3">@if($user->id == auth()->user()->id)Editar Meu Usuário @else Editar Usuário: <b class="text-info">{{ $user->name }}</b>  @endif</h3>
                    <ul class="nav nav-pills" id="animateLine" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $menu == 'usuario' ? 'active' : '' }}" id="animated-underline-home-tab" data-bs-toggle="tab"
                                href="#animated-underline-home" role="tab" aria-controls="animated-underline-home"
                                aria-selected="{{ $menu == 'usuario' ? 'true' : 'false' }}" tabindex="-1">
                            <i class="bi bi-person"></i>
                            Usuário
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $menu == 'contatos' ? 'active' : '' }}" id="animated-underline-contact-tab" data-bs-toggle="tab"
                                href="#animated-underline-contact" role="tab" aria-controls="animated-underline-contact"
                                aria-selected="{{ $menu == 'contatos' ? 'true' : 'false' }}" tabindex="-1">
                            <i class="bi bi-telephone-plus"></i>
                            Contatos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $menu == 'endereco' ? 'active' : '' }}" id="animated-underline-address-tab" data-bs-toggle="tab"
                                href="#animated-underline-address" role="tab" aria-controls="animated-underline-address"
                                aria-selected="{{ $menu == 'endereco' ? 'true' : 'false' }}" tabindex="-1">
                            <i class="bi bi-house"></i>
                            Endereço
                            </button>
                        </li>
                        @if( $user->id == auth()->user()->id )
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $menu == 'alterar-senha' ? 'active' : '' }}" id="animated-underline-password-tab" data-bs-toggle="tab"
                                href="#animated-underline-password" role="tab" aria-controls="animated-underline-password"
                                aria-selected="{{ $menu == 'alterar-senha' ? 'true' : 'false' }}" tabindex="-1">
                            <i class="bi bi-pass"></i>
                            Alterar Senha
                            </button>
                        </li>
                        @endif
                        @foreach (Auth::user()->profiles as $profile)
                            @if($profile->id == 1 && $user->id != auth()->user()->id)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $menu == 'administrador' ? 'active' : '' }} text-danger" id="animated-underline-admin-tab" data-bs-toggle="tab"
                                    href="#animated-underline-admin" role="tab" aria-controls="animated-underline-admin"
                                    aria-selected="{{ $menu == 'administrador' ? 'true' : 'false' }}" tabindex="-1">
                                <i class="bi bi-person-fill-gear"></i>
                                Administrador
                                </button>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="animateLineContent-4">

                @include('admin.users.modules.account-settings-info')

                @include('admin.users.modules.account-settings-contacts')

                @include('admin.users.modules.account-settings-address')

                @if( $user->id == auth()->user()->id )
                    @include('admin.users.modules.account-settings-change-password')
                @endif

                @foreach (Auth::user()->profiles as $profile)
                    @if($profile->id == 1)
                        @include('admin.users.modules.account-settings-admin')
                    @endif
                @endforeach                

            </div>
        </div>
    </div>

{{-- Modal Novo Usuário --}}
@include('admin.users.modals.update-profile-user')

{{-- Modal Novo Usuário --}}
@include('admin.users.modals.reset-password-user')

{{-- Modal Novo Usuário --}}
@include('admin.users.modals.inactivate-user')


@endsection

@section('scripts')
    {{-- Scripts Here --}}
    <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>

    <script src="{{ asset('plugins/src/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>

    @vite(['resources/js/users/account-settings.js'])

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<script>
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00');
    });
    $(document).ready(function(){
        $('#telephone').mask('(00) 0000-0000');
    });
    $(document).ready(function(){
        $('#phone, #whatsapp').mask('(00) 00000-0000');
    });
    $(document).ready(function(){
        $('#cep').mask('00.000-000');
    });

    document.getElementById('cep').addEventListener('blur', function () {
        let cep = this.value.replace(/\D/g, '');

        if (cep.length !== 8) {
            alert('CEP inválido.');
            return;
        }

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert('CEP não encontrado.');
                    return;
                }

                document.getElementById('logradouro').value = data.logradouro || '';
                document.getElementById('public_place').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('district').value = data.bairro || '';
                document.getElementById('localidade').value = data.localidade || '';
                document.getElementById('city').value = data.localidade || '';
                document.getElementById('uf').value = data.uf || '';
                document.getElementById('uf2').value = data.uf || '';
            })
            .catch(() => {
                alert('Erro ao consultar o CEP.');
            });
    });
</script>


@endsection
