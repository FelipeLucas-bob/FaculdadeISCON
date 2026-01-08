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
    @vite(['resources/scss/light/assets/apps/chat.scss'])
    @vite(['resources/scss/dark/assets/apps/chat.scss'])
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
            <h3 class="fw-bold text-primary mb-0">Chat</h3>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="chat-system">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                    <div class="user-list-box">
                        <div class="search">
                            <input type="text" class="form-control" placeholder="Search User" />
                        </div>
<div class="people">

    <div class="person" data-chat="person6">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-4.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Nia Hillyer">Nia Hillyer</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Você já viu o calendário das provas?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person1">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-3.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Sean Freeman">Sean Freeman</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Preciso de ajuda com o trabalho da disciplina de Direito.</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person2">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-11.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Alma Clarke">Alma Clarke</span>
                    <span class="user-meta-time">13:44</span>
                </div>
                <span class="preview">Alguém sabe qual é o professor da próxima aula?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person3">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-23.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Alan Green">Alan Green</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">A biblioteca vai abrir no fim de semana?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person4">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-7.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Shaun Park">Shaun Park</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">O prazo para entregar o TCC está próximo.</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person5">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-15.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Roxanne">Roxanne</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Você assistiu à última aula online?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person7">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-32.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Ernest Reeves">Ernest Reeves</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Sim, achei o conteúdo bem complexo.</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person8">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-33.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Laurie Fox">Laurie Fox</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Alguém sabe se vai ter reposição de aula?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person9">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-21.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Xavier">Xavier</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Sim, foi confirmada para a próxima semana.</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person10">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-12.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Susan Phillips">Susan Phillips</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Vocês já começaram a estudar para a prova final?</span>
            </div>
        </div>
    </div>

    <div class="person" data-chat="person11">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-26.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Dale Butler">Dale Butler</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Ainda não, mas vou começar esta semana.</span>
            </div>
        </div>
    </div>

    <div class="person border-none" data-chat="person12">
        <div class="user-info">
            <div class="f-head">
                <img src="{{Vite::asset('resources/images/profile-20.jpeg')}}" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" data-name="Grace Roberts">Grace Roberts</span>
                    <span class="user-meta-time">14:09</span>
                </div>
                <span class="preview">Alguém sabe se já saiu o resultado da última prova?</span>
            </div>
        </div>
    </div>                                        
</div>

                    </div>
                    <div class="chat-box" style="background-image: url({{Vite::asset('resources/images/bg.png')}})">

                        <div class="chat-not-selected">
                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Click User To Chat</p>
                        </div>

<div class="chat-box-inner">
    <div class="chat-meta-user">
        <div class="current-chat-user-name"><span><img src="{{Vite::asset('resources/images/90x90.jpg')}}" alt="dynamic-image"><span class="name"></span></span></div>

        <div class="chat-action-btn align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone  phone-call-screen"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video video-call-screen"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
            <div class="dropdown d-inline-block">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </a>

                <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-2">
                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Configurações</a>
                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Email</a>
                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg> Copiar</a>
                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Excluir</a>
                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> Compartilhar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-conversation-box">
        <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
            <div class="chat" data-chat="person1">
                <div class="conversation-start">
                    <span>Hoje, 6:48</span>
                </div>
                <div class="bubble you">
                    Olá,
                </div>
                <div class="bubble you">
                    Sou eu.
                </div>
                <div class="bubble you">
                    Tenho uma dúvida sobre o projeto da disciplina.
                </div>
            </div>
            <div class="chat" data-chat="person2">
                <div class="conversation-start">
                    <span>Hoje, 17:38</span>
                </div>
                <div class="bubble you">
                    Oi!
                </div>
                <div class="bubble me">
                    Oi!
                </div>
                <div class="bubble me">
                    Como foi seu dia de estudos até agora?
                </div>
                <div class="bubble you">
                    Foi meio corrido por causa das aulas e trabalhos.
                </div>
            </div>
            <div class="chat" data-chat="person3">
                <div class="conversation-start">
                    <span>Hoje, 3:38</span>
                </div>
                <div class="bubble me">
                    E aí, colega.
                </div>
                <div class="bubble me">
                    Tudo certo?
                </div>
                <div class="bubble you">
                    Estou doente,
                </div>
                <div class="bubble you">
                    Não vou conseguir ir à aula hoje.
                </div>
            </div>
            <div class="chat" data-chat="person4">
                <div class="conversation-start">
                    <span>Ontem, 16:20</span>
                </div>
                <div class="bubble you">
                    Oi, você já pegou o material da última aula?
                </div>
                <div class="bubble me">
                    Ok, passo aí em 10 minutos para te entregar.
                </div>
            </div>
            <div class="chat" data-chat="person5">
                <div class="conversation-start">
                    <span>Hoje, 6:28</span>
                </div>
                <div class="bubble you">
                    Oi,
                </div>
                <div class="bubble you">
                    Já subi os arquivos para o servidor da faculdade.
                </div>
            </div>
            <div class="chat" data-chat="person6">
                <div class="conversation-start">
                    <span>Segunda-feira, 13:27</span>
                </div>
                <div class="bubble you">
                    Olá, voltei das férias.
                </div>
                <div class="bubble you">
                    Como estão as coisas na faculdade?
                </div>
                <div class="bubble me">
                    Bem-vindo de volta!
                </div>
                <div class="bubble me">
                    Tudo tranquilo por aqui.
                </div>
                <div class="bubble you">
                    Vamos tomar um café para colocar o papo em dia?
                </div>
            </div>
            <div class="chat" data-chat="person7">
            </div>
            <div class="chat" data-chat="person8">
            </div>
            <div class="chat" data-chat="person9">
            </div>
            <div class="chat" data-chat="person10">
            </div>
            <div class="chat" data-chat="person11">
            </div>
            <div class="chat" data-chat="person12">
            </div>
        </div>
    </div>
    <div class="chat-footer">
        <div class="chat-input">
            <form class="chat-form" action="javascript:void(0);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <input type="text" class="mail-write-box form-control" placeholder="Mensagem"/>
            </form>
        </div>
    </div>
</div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script src="{{asset('plugins/src/global/vendors.min.js')}}"></script>
    @vite(['resources/js/apps/chat.js'])

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
