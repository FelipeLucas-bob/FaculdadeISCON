@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    @vite(['resources/scss/light/assets/elements/alert.scss'])
    @vite(['resources/scss/dark/assets/elements/alert.scss'])
    <!--  END CUSTOM STYLE FILE  -->
    @vite(['resources/scss/light/assets/components/accordions.scss'])
    @vite(['resources/scss/dark/assets/components/accordions.scss'])

    @vite(['resources/scss/light/assets/dashboard/dash_2.scss'])
    @vite(['resources/scss/dark/assets/dashboard/dash_2.scss'])
@endsection

@section('content')
    {{-- Content Here --}}
    <div class="row layout-top-spacing">
        {{-- <div class="col-12">
            <div class="alert alert-arrow-right alert-icon-right alert-light-success alert-dismissible fade show mb-4" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                <strong>Inicie seu novo projeto com facilidade!</strong> Página Inicial do Projeto. 
            </div>
        </div> --}}

        @foreach (Auth::user()->profiles as $profile)

            @if($profile->name == 'Administrador' || $profile->name == 'Diretor' || $profile->name == 'Secretária')
                @include('admin.home.sections.administrative')
                @include('admin.home.sections.suport')
                @include('admin.home.sections.instructors')
                @include('admin.home.sections.students')
                @include('admin.home.sections.candidate')
                @include('admin.home.sections.graduation')
                @include('admin.home.sections.library')
                @include('admin.home.sections.services')
            @elseif($profile->name == 'Suporte Técnico')
                @include('admin.home.sections.suport')
            @elseif($profile->name == 'Professor')
                @include('admin.home.sections.instructors')
            @elseif($profile->name == 'Aluno')
                @include('admin.home.sections.students')
            @elseif($profile->name == 'Candidato')
                @include('admin.home.sections.candidate')
            @elseif($profile->name == 'Assistente Acadêmico')
                @include('admin.home.sections.graduation')
            @elseif($profile->name == 'Assistente de Biblioteca')
                @include('admin.home.sections.library')
            @elseif($profile->name == 'Atendente')
                @include('admin.home.sections.services')
            @else
                <!-- VISÃO DEFAULT PARA PERFIS NÃO RECONHECIDOS -->
                <div class="col-12">
                    <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                        <strong>Perfil não reconhecido:</strong> Algumas funcionalidades podem estar indisponíveis. Contate o administrador para ajustes no seu perfil. 
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Dashboard Limitada</h5>
                            </div>
                            <div class="card-body">
                                <p class="h6">Você possui acesso limitado. Funcionalidades completas estarão disponíveis quando seu perfil for reconhecido pelo sistema.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        @endforeach


    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
    <script src="{{ asset('plugins/src/apex/apexcharts.min.js') }}"></script>
    @vite(['resources/js/dashboard/dash_2.js'])

    <script>
        function updateClock() {
            const now = new Date();

            const optionsDate = {
                weekday: 'long',
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            };
            const formattedDate = now.toLocaleDateString('pt-BR', optionsDate);

            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');

            document.getElementById('current-date').textContent = formattedDate;
            document.getElementById('current-time').textContent = `${hours}:${minutes}`;
        }

        updateClock();
        setInterval(updateClock, 60000); // atualiza a cada minuto
    </script>
@endsection
