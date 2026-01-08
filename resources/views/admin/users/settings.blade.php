@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/css/app.css'])
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

        <div class="row">
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-primary mb-0">Permissões</h3>
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#createSectorModal">
                            <i class="bi bi-briefcase"></i> Novo Setor
                        </button>
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#createProfileModal">   
                            <i class="bi bi-person"></i> Novo Perfil
                        </button>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="row">
                    <!-- Coluna Lateral (Setores) -->
                    <div class="col-md-3 border-end pe-4">
                        <div class="nav flex-column nav-pills" id="sector-tabs" role="tablist" aria-orientation="vertical">
                            @foreach($sectors as $index => $sector)
                                <button class="mt-2 nav-link d-flex align-items-center gap-2 py-3 px-3 shadow-sm {{ $index === 1 ? 'active' : '' }}"
                                        id="sector-tab-{{ $sector->id }}"
                                        data-bs-toggle="pill"
                                        data-bs-target="#sector-{{ $sector->id }}"
                                        type="button" role="tab">
                                    <i class="bi bi-briefcase fs-5"></i>
                                    <span class="fw-semibold"><b class="h6 fw-bold">{{ $sector->name }}</b></span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Conteúdo dos Perfis e Permissões -->
                    <div class="col-md-9 mt-3">
                        <div class="tab-content" id="sector-tabContent">
                            @foreach($sectors as $index => $sector)
                                <div class="tab-pane fade {{ $index === 1 ? 'show active' : '' }}" 
                                    id="sector-{{ $sector->id }}" 
                                    role="tabpanel">
                                    
                                    @if($sector->profiles && $sector->profiles->count() > 0)
                                        <div class="accordion" id="accordionProfiles-{{ $sector->id }}">
                                            @foreach($sector->profiles as $profile)
                                                <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                                                        <button class="accordion-button collapsed rounded-top-3 fw-bold text-primary" 
                                                                type="button" 
                                                                data-bs-toggle="collapse" 
                                                                data-bs-target="#collapse-{{ $profile->id }}" 
                                                                aria-expanded="false">
                                                            <i class="bi bi-person-circle me-2"></i> {{ $profile->name }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-{{ $profile->id }}" 
                                                        class="accordion-collapse collapse rounded-bottom-3 border-top"
                                                        data-bs-parent="#accordionProfiles-{{ $sector->id }}">
                                                        <div class="accordion-body">
                                                            <form action="{{  route('module.access.store') }}" method="POST">
                                                                @csrf
                                                                <p class="fw-semibold mb-3 text-secondary h6">Permissões:</p>
                                                                <div class="mb-3">
                                                                <input type="text" id="moduleFilter{{ $profile->id }}" class="form-control" placeholder="Filtrar módulos...">
                                                                </div>

                                                                <div class="table-responsive" style="max-height: 300px; overflow-y: scroll;">
                                                                    <table class="table table-bordered align-middle table-hover" id="modulesTable{{ $profile->id }}">
                                                                        <thead class="table-light">
                                                                            <tr">
                                                                                <th class="fw-bold"><i class="bi bi-box me-1"></i> Módulo</th>
                                                                                <th class="fw-bold">Permitir acesso</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody style="max-height: 300px; overflow-y: auto;">
                                                                            @foreach($modules as $index => $module)

                                                                                @php
                                                                                    $hasAccess = $modulesAccess[$profile->id][$sector->id][$module->id] ?? false;
                                                                                @endphp

                                                                                <tr>
                                                                                    <td class="module-name fw-semibold">
                                                                                        <i class="bi bi-box text-primary me-2"></i>{{ $module->name }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="form-check form-switch">
                                                                                            <input type="hidden" name="items[{{ $index }}][profile_id]" value="{{ $profile->id }}">
                                                                                            <input type="hidden" name="items[{{ $index }}][module_id]" value="{{ $module->id }}">
                                                                                            <input type="hidden" name="items[{{ $index }}][sector_id]" value="{{ $sector->id }}">
                                                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault{{ $index }}" name="items[{{ $index }}][selected]" @if($hasAccess) checked @endif  value="1">
                                                                                            <label class="form-check-label" for="flexSwitchCheckDefault{{ $index }}">Sim</label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    

                                                                    <script>
                                                                        document.getElementById('moduleFilter'+{{ $profile->id }}).addEventListener('input', function() {
                                                                            const filter = this.value.toLowerCase();
                                                                            const rows = document.querySelectorAll('#modulesTable'+{{ $profile->id }}+' tbody tr');

                                                                            rows.forEach(row => {
                                                                            const moduleName = row.querySelector('.module-name').textContent.toLowerCase();
                                                                            row.style.display = moduleName.includes(filter) ? '' : 'none';
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success mt-3 me-3">Salvar</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Nenhum perfil disponível para este setor.
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



    {{-- Modal Novo Sector --}}
    @include('admin.users.modals.create-sector')

    {{-- Modal Novo Perfil --}}
    @include('admin.users.modals.create-profile')


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
        let c1 = $('#settings-list').DataTable({
            headerCallback: function (e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML = `
                                                                                                    <div class="form-check form-check-primary d-block">
                                                                                                        <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                                                                                                    </div>`
            },
            columnDefs: [{
                targets: 0,
                width: "30px",
                className: "",
                orderable: !1,
                render: function (e, a, t, n) {
                    return `
                                                                                                        <div class="form-check form-check-primary d-block">
                                                                                                            <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                                                                                                        </div>`
                }
            }],
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


    document.addEventListener('DOMContentLoaded', () => {
        const switches = document.querySelectorAll('.form-check-input');

        switches.forEach(sw => {
        const toggleColor = () => {
            if (sw.checked) {
            sw.classList.add('bg-primary', 'border-primary');
            } else {
            sw.classList.remove('bg-primary', 'border-primary');
            }
        };

        // Executar ao carregar
        toggleColor();

        // Executar ao mudar
        sw.addEventListener('change', toggleColor);
        });
    });

    </script>
@endsection