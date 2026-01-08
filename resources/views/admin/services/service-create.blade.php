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


        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0"> Novo Atendimento</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">

                        <div class="modal-body row">

                            <!-- Mensagem de Sucesso -->
                            <div id="alert-success" class="alert alert-success d-none" role="alert"></div>

                            <!-- Mensagem de Erro -->
                            <div id="alert-error" class="alert alert-danger d-none" role="alert"></div>

                            <!-- ================== BUSCA DE USUÁRIO ================== -->
                            <div class="col-12">
                                <form id="searchUserForm" class="col-12 p-3 needs-validation" novalidate>
                                    <h5 class="fw-bold text-primary">Usuário</h5>
                                    <div class="row">
                                        <div class="form-group col-lg-5 col-md-12">
                                            <label for="search_name" class="form-label fw-bold">Nome</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control fw-bold text-black"
                                                    id="search_name" name="search_name" placeholder="Digite o Nome ..."
                                                    minlength="3" maxlength="45" required>
                                                <div class="invalid-feedback">
                                                    Por favor, informe ao menos 3 caracteres no nome.
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-lg-3">
                                            <label for="search_cpf" class="form-label fw-bold">CPF</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                <input type="text" class="form-control fw-bold text-black"
                                                    id="search_cpf" name="search_cpf" minlength="3" maxlength="14"
                                                    placeholder="000.000.000-00">
                                                <div class="invalid-feedback">
                                                    Por favor, informe ao menos 3 caracteres do CPF.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label for="search_rg" class="form-label fw-bold">RG</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-credit-card-2-front"></i></span>
                                                <input type="text" class="form-control fw-bold text-black" id="search_rg"
                                                    name="search_rg" placeholder="0.000.000">
                                                <div class="invalid-feedback">
                                                    Por favor, informe ao menos 3 caracteres do RG.
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-lg-2 mt-1">
                                            <label>&nbsp;</label>
                                            <button type="submit" id="btnSearchUser" class="btn btn-primary w-100">
                                                <i class="bi bi-search"></i> BUSCAR
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal de Resultado -->
                                <div class="modal fade" id="userSearchModal" tabindex="-1"
                                    aria-labelledby="userSearchModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-light dark:bg-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-primary" id="userSearchModalLabel">
                                                    Resultado da Busca</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body" id="userSearchResults">
                                                <p class="text-muted">Nenhum resultado...</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class=" mb-2 d-none" id="hr">

                                <form id="createServiceForm" class="col-lg-12 p-3 d-none"
                                    action="{{ route('service.store') }}" method="POST" novalidate>
                                    @csrf
                                    @method('POST')
                                    <div class="row">

                                        <input type="hidden" class="form-control fw-bold text-black" id="name"
                                            name="name" placeholder="Nome completo">

                                        <input type="hidden" class="form-control fw-bold text-black" id="cpf"
                                            name="cpf" placeholder="000.000.000-00">

                                        <input type="hidden" class="form-control fw-bold text-black" id="rg"
                                            name="rg" placeholder="00.000.000-0">



                                        <h5 class="fw-bold text-primary mb-3">Formulário de Atendimento</h5>
                                        <div class="form-group col-lg-4">
                                            <label for="email" class="form-label fw-bold ">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" class="form-control fw-bold text-black"
                                                    id="email" name="email" placeholder="email@exemplo.com">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="email" class="form-label fw-bold ">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" class="form-control fw-bold text-black"
                                                    id="email" name="email" placeholder="email@exemplo.com">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="email" class="form-label fw-bold ">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" class="form-control fw-bold text-black"
                                                    id="email" name="email" placeholder="email@exemplo.com">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="phone" class="form-label fw-bold ">Telefone</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                <input type="text" class="form-control fw-bold text-black"
                                                    id="telephone" name="telephone" placeholder="(00) 0000-0000">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="phone" class="form-label fw-bold ">Celular</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                                <input type="text" class="form-control fw-bold text-black"
                                                    id="phone" name="phone" placeholder="(00) 0000-0000">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="whatsapp" class="form-label fw-bold ">Whatsapp</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                                <input type="text" class="form-control fw-bold text-black"
                                                    id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000">
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-5">
                                            <label for="category_id" class="form-label fw-bold ">Categoria</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-journal-plus"></i></span>
                                                <select class="form-select fw-bold text-black" id="category_id"
                                                    name="category_id" required>
                                                    <option value="" selected>Selecione uma Categoria
                                                    </option>
                                                    @foreach ($categorys as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-5">
                                            <label for="demand" class="form-label fw-bold ">Atendimento</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-journal-plus"></i></span>
                                                <select class="form-select fw-bold text-black" id="demand"
                                                    name="demand" required>
                                                    <option value="" selected>Selecione primeiro a Categoria...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-2 col-sm-12">

                                            <div class="input-group mb-3">
                                                <label for="demand" class="form-label fw-bold ">&nbsp</label>
                                                <button type="button" class="btn btn-outline-primary w-100 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#atendimentoModal">
                                                    Ver Procedimentos...
                                                </button>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="request_name" class="form-label fw-bold ">Solicitação</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                <textarea class="form-control text-black" name="request_name" rows="7" maxlength="500"
                                                    placeholder="Informe a solicitação do Atendimento..." required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="procedure" class="form-label fw-bold ">Orientação</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                <textarea class="form-control text-black" name="procedure" rows="7" maxlength="500"
                                                    placeholder="Informe o procedimento realizado..." required></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-light-none mt-2 mb-2 btn-no-effect"
                                            data-bs-dismiss="modal">Limpar</button>
                                        <button type="submit" class="btn btn-success ms-2">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="atendimentoModal" tabindex="-1" aria-labelledby="atendimentoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="atendimentoModalLabel">Procedimentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-primary">Emissão de Segunda Via de Boleto</h5>
                    <p style="color: rgba(0, 0, 0, 0.3);">
                        <strong>Data do Script:</strong> 12/08/2025 - <strong>Última Atualização:</strong> 12/08/2025
                    </p>

                    <ol class="mt-3 mb-3s">
                        <li>Acesse o portal do aluno com seu login e senha.</li>
                        <li>Na área financeira, clique em "Boletos e Pagamentos".</li>
                        <li>Selecione o boleto que deseja reemitir.</li>
                        <li>Clique no botão "Gerar Segunda Via".</li>
                        <li>Imprima ou salve o boleto em PDF para pagamento.</li>
                        <li>Se houver dúvidas, contate o setor financeiro pelo e-mail financeiro@exemplo.com.</li>
                    </ol>

                    <p><em>Observação:</em> Sempre confira a validade do boleto antes do pagamento para evitar problemas
                        com
                        juros ou bloqueios.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-none" data-bs-dismiss="modal">Fechar</button>
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
                "sInfo": "Mostrando página PAGE de PAGES",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Resultado :  MENU",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c1);
    </script>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        // Envio do formulário de busca
        $("#searchUserForm").on("submit", function(e) {
            e.preventDefault();
            const form = this;

            // Remove feedback antigo
            form.classList.remove('was-validated');

            // Validação Bootstrap
            if (!form.checkValidity()) {
                form.classList.add('was-validated'); // mostra o invalid-feedback
                return;
            }

            form.classList.add('was-validated');

            // Oculta o formulário de criação de serviço ao iniciar nova busca
            $("#createServiceForm").addClass("d-none");

            // AJAX para buscar usuários
            $.ajax({
                url: "{{ route('user.search') }}", // ajuste para sua rota
                method: "GET",
                data: {
                    search_name: $("#search_name").val(),
                    search_cpf: $("#search_cpf").val(),
                    search_rg: $("#search_rg").val(),
                },
                beforeSend: function() {
                    $("#userSearchResults").html(
                        '<div class="text-primary">🔍 Buscando...</div>');
                },
                success: function(response) {
                    let html = '';

                    if (response.length > 0) {
                        html = '<ul class="list-group">';
                        response.forEach(user => {
                            html += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${user.name}</strong><br>
                                <small>CPF: ${user.cpf ?? '-'} | RG: ${user.rg ?? '-'}</small>
                            </div>
                            <button type="button" class="btn btn-sm btn-success selectUser" data-id="${user.id}">
                                Selecionar
                            </button>
                        </li>`;
                        });
                        html += '</ul>';
                    } else {
                        html = `
                    <div class="alert alert-warning">
                        <b>Usuário não registrado!</b><br>
                        Clique em "Cadastrar como Externo" para adicionar.
                    </div>
                    <button type="button" class="btn btn-sm btn-success selectUserExternal">
                        <b class="h6">Cadastrar como Externo</b>
                    </button>`;
                    }

                    // Insere no modal e abre
                    $("#userSearchResults").html(html);
                    var modalEl = document.getElementById('userSearchModal');
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                },
                error: function() {
                    $("#userSearchResults").html(
                        '<div class="alert alert-danger">Erro ao buscar usuário.</div>'
                    );
                }
            });
        });

        // Selecionar usuário existente
        $(document).on("click", ".selectUser", function() {
            let userItem = $(this).closest("li");
            let name = userItem.find("strong").text();
            let cpfRgText = userItem.find("small").text();
            let cpf = cpfRgText.match(/CPF: ([\d\. -]+)/)?.[1] || '';
            let rg = cpfRgText.match(/RG: ([\d\. -]+)/)?.[1] || '';

            // Preenche campos do formulário
            $("#search_name, #name").val(name);
            $("#search_cpf, #cpf").val(cpf);
            $("#search_rg, #rg").val(rg);

            // Mostra o formulário
            $("#createServiceForm").removeClass("d-none");

            // Fecha o modal
            var modalEl = document.getElementById('userSearchModal');
            var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.hide();
        });

        // Selecionar usuário externo
        $(document).on("click", ".selectUserExternal", function() {
            // Limpa campos do formulário
            $("#student_name").val('');
            $("#cpfCreateService").val('');
            $("#rg").val('');

            // Mostra o formulário
            $("#createServiceForm").removeClass("d-none");

            // Fecha o modal
            var modalEl = document.getElementById('userSearchModal');
            var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.hide();
        });
    });
</script>




<script>
    $(document).ready(function() {
        const divsAluno = document.querySelectorAll('.divAluno');
        const divsUsuarioExterno = document.querySelectorAll('.divUsuarioExterno');

        // Esconde inicialmente as divs
        divsAluno.forEach(div => div.style.display = 'none');
        divsUsuarioExterno.forEach(div => div.style.display = 'none');
    });

    document.addEventListener('DOMContentLoaded', function() {
        const cpfInput = document.getElementById('cpfCreateService');
        const alertSuccess = document.getElementById('alert-success');
        const alertWarning = document.getElementById('alert-warning');
        const alertError = document.getElementById('alert-error');

        if (typeof Inputmask !== 'undefined' && cpfInput) {
            Inputmask("999.999.999-99").mask(cpfInput);
        }

        cpfInput.addEventListener('keyup', function() {
            const cpf = cpfInput.value.replace(/\D/g, '');
            if (cpf.length === 11) {
                fetch(`{{ route('student.search') }}?cpf=${cpf}`)
                    .then(res => res.json())
                    .then(data => {
                        // Esconde alertas
                        alertSuccess.classList.add('d-none');
                        alertWarning.classList.add('d-none');
                        alertError.classList.add('d-none');

                        const divsAluno = document.querySelectorAll('.divAluno');
                        const divsUsuarioExterno = document.querySelectorAll('.divUsuarioExterno');

                        if (data.encontrado) {
                            alertSuccess.textContent = data.mensagem;
                            alertSuccess.classList.remove('d-none');

                            divsAluno.forEach(div => div.style.display = 'block');
                            divsUsuarioExterno.forEach(div => div.style.display = 'none');

                            document.getElementById('student_name').value = data.aluno.name;
                            document.getElementById('email').value = data.aluno.email;
                            document.getElementById('phone').value = data.aluno.phone;
                            document.getElementById('whatsapp').value = data.aluno.whatsapp;

                            const formElements = document.querySelectorAll(
                                '#createServiceForm input, #createServiceForm select, #createServiceForm textarea, #createServiceForm button'
                            );
                            formElements.forEach(el => {
                                if (el.id === 'cpfCreateService') {
                                    el.disabled = true;
                                } else if (el.id !== 'attendant' && el.id !== 'registration_date') {
                                    el.disabled = false;
                                }
                            });

                            setTimeout(() => alertSuccess.classList.add('d-none'), 5000);
                        } else {
                            alertWarning.textContent = data.mensagem;
                            alertWarning.classList.remove('d-none');

                            divsAluno.forEach(div => div.style.display = 'none');
                            divsUsuarioExterno.forEach(div => div.style.display = 'block');

                            const formElements = document.querySelectorAll(
                                '#createServiceForm input, #createServiceForm select, #createServiceForm textarea'
                            );
                            formElements.forEach(el => {
                                if (el.id !== 'cpfCreateService') {
                                    el.disabled = true;
                                    if (el.tagName.toLowerCase() === 'select') {
                                        el.selectedIndex = 0;
                                    } else if (el.id !== 'attendant') {
                                        el.value = '';
                                    }
                                }
                            });

                            setTimeout(() => alertWarning.classList.add('d-none'), 5000);
                        }
                    })
                    .catch(err => {
                        console.error('Erro na consulta do CPF:', err);
                        alertError.textContent = 'Erro ao consultar o aluno. Tente novamente.';
                        alertError.classList.remove('d-none');
                    });
            }
        });
    });

    $(document).ready(function() {
        $('#category_id').on('change', function() {
            const categoryId = $(this).val();
            const demandSelect = $('#demand');

            demandSelect.html('<option value="">Selecione o Atendimento...</option>');

            if (categoryId) {
                $.ajax({
                    url: `/painel/atendimentos/${categoryId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        demandSelect.empty();
                        if (data.length > 0) {
                            demandSelect.append('<option value="">Selecione o Atendimento...</option>');
                            $.each(data, function(_, item) {
                                demandSelect.append(`<option value="${item.id}">${item.name}</option>`);
                            });
                        } else {
                            demandSelect.html('<option value="">Nenhum atendimento disponível</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro ao carregar atendimentos:', error);
                        demandSelect.html('<option value="">Erro ao carregar atendimentos</option>');
                    }
                });
            } else {
                demandSelect.html('<option value="">Selecione primeiro a Categoria...</option>');
            }
        });
    });
</script>
