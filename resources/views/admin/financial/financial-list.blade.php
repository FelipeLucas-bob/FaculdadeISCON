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
                <h3 class="fw-bold text-primary mb-0">Mensalidades</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <table id="user-list" class="table style-1 dt-table-hover non-hover">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Curso</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>Maria Oliveira</td>
                                    <td>123.456.789-00</td>
                                    <td>Radiologia</td>
                                    <td>10/09/2025</td>
                                    <td>R$ 450,00</td>
                                    <td><span class="badge bg-success">Pago</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-none" title="Detalhes">
                                            <i class="bi bi-eye h6"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>João Santos</td>
                                    <td>987.654.321-00</td>
                                    <td>Enfermagem</td>
                                    <td>15/09/2025</td>
                                    <td>R$ 500,00</td>
                                    <td><span class="badge bg-warning">A Vencer</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-none" title="Detalhes">
                                            <i class="bi bi-eye h6"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Beatriz Lima</td>
                                    <td>456.789.123-00</td>
                                    <td>Biomedicina</td>
                                    <td>05/09/2025</td>
                                    <td>R$ 470,00</td>
                                    <td><span class="badge bg-danger">Vencido</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-none" title="Detalhes">
                                            <i class="bi bi-eye h6"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carlos Ferreira</td>
                                    <td>321.654.987-00</td>
                                    <td>Radiologia</td>
                                    <td>20/09/2025</td>
                                    <td>R$ 450,00</td>
                                    <td><span class="badge bg-warning">A Vencer</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-none" title="Detalhes">
                                            <i class="bi bi-eye h6"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ana Souza</td>
                                    <td>654.321.987-00</td>
                                    <td>Enfermagem</td>
                                    <td>08/09/2025</td>
                                    <td>R$ 500,00</td>
                                    <td><span class="badge bg-success">Pago</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-none" title="Detalhes">
                                            <i class="bi bi-eye h6"></i>
                                        </a>
                                    </td>
                                </tr>
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
    <script type="module" src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script type="module" src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script type="module">
        function multiCheck(tb_var) {
            tb_var.on("change", ".chk-parent", function() {
                    var e = $(this).closest("table").find("td:first-child .child-chk"),
                        a = $(this).is(":checked");
                    $(e).each(function() {
                        a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this)
                            .prop("checked", !1), $(this).closest("tr").removeClass("active"))
                    })
                }),
                tb_var.on("change", "tbody tr .new-control", function() {
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
    document.addEventListener('DOMContentLoaded', function() {
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
            modal.addEventListener('shown.bs.modal', function() {
                aplicarInputMaskCPF();
            });
        }
    });
</script>
