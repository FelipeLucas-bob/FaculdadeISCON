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

    @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
    @vite(['resources/scss/light/assets/apps/todolist.scss'])
    {{-- @vite(['resources/scss/light/assets/components/modal.scss']) --}}
    @vite(['resources/scss/light/assets/apps/invoice-preview.scss'])
    @vite(['resources/scss/dark/assets/apps/invoice-preview.scss'])

    <style>
        /* ====== HEADER ====== */
        .inv--head-section {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .company-logo {
            height: 60px;
            margin-right: 15px;
        }

        .in-heading {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1d4ed8;
            /* Azul moderno */
            letter-spacing: 1px;
        }

        /* ====== INFO ====== */
        .inv-street-addr,
        .inv-email-address {
            font-size: 0.9rem;
            color: #64748b;
            margin: 2px 0;
        }

        .inv-title {
            font-weight: 600;
            color: #334155;
        }

        .inv-list-number span,
        .inv-date {
            font-weight: 500;
            color: #1e293b;
        }

        /* ====== TABLE ====== */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        .table th {
            background: #f1f5f9;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }

        .table td {
            padding: 12px;
            font-size: 0.9rem;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        /* Alinhamento à direita */
        .text-end {
            text-align: right;
        }

        /* ====== TOTAL ====== */
        .inv--total-amounts {
            background: #f9fafb;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }

        .inv--total-amounts p {
            margin: 6px 0;
            font-size: 0.95rem;
            color: #475569;
        }

        .grand-total-title h4 {
            font-size: 1.2rem;
            color: #1d4ed8;
            font-weight: 700;
        }

        .grand-total-amount h4 {
            font-size: 1.2rem;
            color: #16a34a;
            font-weight: 700;
        }
    </style>
@endsection

@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container">
                            <div class="invoice-inbox">

                                <div id="ct" class="">

                                    <div class="invoice-00001">
                                        <div class="content-section">

                                            <!-- Cabeçalho -->
                                            <div class="inv--head-section inv--detail-section">
                                                <div class="row">
                                                    <div class="col-sm-6 col-12 mr-auto">
                                                        <div class="d-flex align-items-center">
                                                            <img class="company-logo"
                                                                src="{{ Vite::asset('resources/images/logo/logo.png') }}"
                                                                alt="company">
                                                            <h3 class="in-heading text-primary fw-bold ms-3">FICHA DE
                                                                MATRÍCULA</h3>
                                                        </div>
                                                        <p class="inv-street-addr mt-3 fw-bold text-primary">Faculdade ISCON
                                                        </p>
                                                        <p class="inv-email-address">secretaria@iscon.edu.br</p>
                                                        <p class="inv-email-address">(61) 98119-2489</p>
                                                    </div>

                                                    <div class="col-sm-6 text-sm-end">
                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4">
                                                            <span class="inv-title text-none">Matrícula:</span>
                                                            <span class="inv-number text-primary fw-bold">202510001.0</span>
                                                        </p>
                                                        <p class="inv-created-date mt-sm-5 mt-3">
                                                            <span class="inv-title text-none">Período:</span>
                                                            <span class="inv-date text-primary fw-bold">2025/2</span>
                                                        </p>
                                                        <p class="inv-due-date">
                                                            <span class="inv-title text-none">Turno:</span>
                                                            <span class="inv-date text-primary fw-bold">Noturno</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Dados do Curso -->
                                            <div class="inv--detail-section inv--customer-detail-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h6 class="inv-title">Dados do Curso</h6>
                                                        <p class="text-none"><strong>Curso:</strong> <b
                                                                class="text-primary">Psicologia</b></p>

                                                        <p class="text-none">
                                                            <strong>Valor Total do Curso:</strong>
                                                            <b class="text-primary">R$ 10.200,00</b> |
                                                            <b class="text-success">R$ 2.394,00 (com desconto)</b>
                                                        </p>

                                                        <p class="text-none">
                                                            <strong>Mensalidade:</strong>
                                                            <b class="text-primary">R$ 1.700,00</b> |
                                                            <b class="text-success">R$ 399,00 (com desconto)</b>
                                                        </p>
                                                        <p class="text-none"><strong>Valor Total do Desconto:</strong> <b
                                                                class="text-success">R$ 7.806,00</b></p>
                                                        <p class="text-none"><strong>Quantidade de Parcelas:</strong> <b
                                                                class="text-primary">6</b></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Dados do Aluno -->
                                            <div class="inv--detail-section inv--customer-detail-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h6 class="inv-title">Dados do Aluno Contratante</h6>
                                                        <p><strong>Nome:</strong> <b class="text-primary">João da Silva</b>
                                                        </p>
                                                        <p><strong>RG:</strong> <b class="text-primary">12.345.678
                                                                SSP/SP</b></p>
                                                        <p><strong>CPF:</strong> <b class="text-primary">123.456.789-00</b>
                                                        </p>
                                                        <p><strong>Sexo:</strong> <b class="text-primary">Masculino</b></p>
                                                        <p><strong>Data de Nascimento:</strong> <b
                                                                class="text-primary">01/01/2000</b></p>
                                                        <p><strong>Estado Civil:</strong> <b
                                                                class="text-primary">Solteiro</b></p>
                                                        <p><strong>Nacionalidade:</strong> <b
                                                                class="text-primary">Brasileiro</b></p>
                                                        <p><strong>Naturalidade:</strong> <b class="text-primary">São Paulo
                                                                - SP</b></p>
                                                        <p><strong>Endereço:</strong> <b class="text-primary">Rua das
                                                                Flores, 123, Bairro Jardim, São Paulo - SP, CEP
                                                                01010-000</b></p>
                                                        <p><strong>Telefone:</strong> <b class="text-primary">(11)
                                                                98765-4321</b> | <strong>WhatsApp:</strong> <b
                                                                class="text-primary">(11) 98765-4321</b></p>
                                                        <p><strong>E-mail:</strong> <b
                                                                class="text-primary">joao.silva@email.com</b></p>
                                                        <p><strong>Login:</strong> <b class="text-primary">12345678900</b> |
                                                            <strong>Senha:</strong> <b class="text-primary">12345678900</b>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Responsável Financeiro -->
                                            <div class="inv--detail-section inv--customer-detail-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h6 class="inv-title">Responsável Financeiro (caso menor de 18 anos)
                                                        </h6>
                                                        <p><strong>Nome:</strong> <b class="text-primary">Maria da Silva</b>
                                                        </p>
                                                        <p><strong>RG:</strong> <b class="text-primary">98.765.432
                                                                SSP/SP</b></p>
                                                        <p><strong>CPF:</strong> <b class="text-primary">987.654.321-00</b>
                                                        </p>
                                                        <p><strong>Data de Nascimento:</strong> <b
                                                                class="text-primary">01/01/1980</b></p>
                                                        <p><strong>Estado Civil:</strong> <b class="text-primary">Casada</b>
                                                        </p>
                                                        <p><strong>Nacionalidade:</strong> <b
                                                                class="text-primary">Brasileira</b></p>
                                                        <p><strong>Naturalidade:</strong> <b class="text-primary">São Paulo
                                                                - SP</b></p><br />
                                                        <p><strong>Endereço:</strong> <b class="text-primary">Rua das
                                                                Palmeiras, 456, Bairro Centro, São Paulo - SP, CEP
                                                                01020-000</b></p>
                                                        <p><strong>Telefone:</strong> <b class="text-primary">(11)
                                                                91234-5678</b> | <strong>WhatsApp:</strong> <b
                                                                class="text-primary">(11) 91234-5678</b></p>
                                                        <p><strong>E-mail:</strong> <b
                                                                class="text-primary">maria.silva@email.com</b></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Pais -->
                                            <div class="inv--detail-section inv--customer-detail-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h6 class="inv-title">Identificação dos Pais</h6>
                                                        <p><strong>Mãe:</strong> <b class="text-primary">Maria da Silva</b>
                                                        </p>
                                                        <p><strong>Pai:</strong> <b class="text-primary">José da Silva</b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Observação -->
                                            <div class="inv--note">
                                                <div class="row mt-2">
                                                    <div class="col-sm-12">
                                                        <p><strong>Responsável financeiro:</strong> Pessoa responsável pelo
                                                            pagamento das semestralidades e quaisquer outros valores
                                                            relacionados a este contrato. Se o
                                                            CONTRATANTE e o responsável financeiro forem a mesma pessoa, no
                                                            campo NOME escrever: “Dados informados em CONTRATANTE” passando
                                                            desse
                                                            ponto em diante serem chamado(a) de CONTRATANTE/RESPONSÁVEL
                                                            FINANCEIRO/ ALUNO-CONTRATANTE(A)
                                                            Li e concordo com os termos desse contrato. Estou assinando,
                                                            consciente de que essa ação acarreta aceitação em bloco de todas
                                                            as cláusulas aqui
                                                            existentes. Declaro conhecer o Regimento Interno da CONTRATADA.
                                                        </p><br />
                                                    </div>
                                                </div>
                                            </div>

                                            @include('admin.documents.modules.contract')

                                        </div>
                                    </div>



                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3">

                        <div class="invoice-actions-btn">

                            <div class="invoice-action-btn">

                                <div class="row">
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary btn-print  action-print">Imprimir</a>
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
    @vite(['resources/js/apps/invoice-preview.js'])

    <script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('plugins/src/editors/quill/quill.js') }}"></script>
    @vite(['resources/js/apps/todoList.js'])

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

        const modal = document.getElementById('createDemandModal');
        if (modal) {
            modal.addEventListener('shown.bs.modal', function() {
                aplicarInputMaskCPF();
            });
        }
    });
</script>
