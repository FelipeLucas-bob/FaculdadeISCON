@if ($passwordUpdate == 0)
    <div class="col-12 mt-4">
        <div class="alert alert-arrow-right alert-icon-right alert-light-info alert-dismissible fade show d-flex align-items-start"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-lock-check">

                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                <polyline points="9 16 11 18 15 14"></polyline>
            </svg>


            <div>
                <strong>Atenção!</strong>
                Identificamos que sua senha ainda não foi alterada.<br><br>


                Por motivos de segurança, faça a <strong>alteração da sua senha</strong>
                antes de continuar utilizando a plataforma.<br><br>



                <a href="{{ route('profile.edit.alterar-senha', Auth::user()->id) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-key-fill me-1"></i>
                    Alterar senha agora
                </a>

            </div>
        </div>
    </div>
@endif

<!-- CANDIDATOS -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <!-- Ícone atualizado para candidato -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-user-check">
            <path d="M16 21v-2a4 4 0 0 0-8 0v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
            <polyline points="16 11 18 13 22 9"></polyline>
        </svg>
        <i class="bi bi-person-badge-fill me-2 fs-5"></i>
        <strong class="me-1">Área do Candidato:</strong> Acompanhe e gerencie seu processo seletivo.
    </div>
</div>

<div id="accordionCandidatos" class="accordion-icons accordion">


    <!-- LISTA DE PROVAS -->
    <div class="card">
        <div class="card-header" id="headingContrato">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseProcesso" aria-expanded="false" aria-controls="collapseProcesso">
                    <div class="accordion-icon"><i class="bi bi-file-earmark-text-fill me-2"></i>Processo Seletivo</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseProcesso" class="collapse show" aria-labelledby="headingContrato"
            data-bs-parent="#accordionCandidatos">

            {{-- Processos Seletivos --}}
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Processo Seletivo</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center rounded-3 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Processo</th>
                                <th>Curso</th>
                                <th>Forma de Ingresso</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td>{{ $registration->reg_id }}</td>
                                    <td>{{ $registration->course }}</td>
                                    <td>{{ $registration->admission_type }}</td>
                                    <td>
                                        @if ($registration->status == 'in_progress')
                                            <span class="badge bg-info rounded-pill p-2">Prova em Andamento</span>
                                        @elseif ($registration->status === 'finished')
                                            <span class="badge bg-success rounded-pill">Prova Realizada</span>
                                        @else
                                            <span class="badge bg-warning rounded-pill">Prova Pendente</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($registration->status === 'finished')
                                            --
                                        @else
                                            <form
                                                action="{{ $registration->status === 'in_progress' ? route('proof.continue') : route('proof.start') }}"
                                                method="POST" class="text-center">

                                                @csrf

                                                <input type="hidden" name="registration_id"
                                                    value="{{ $registration->reg_id }}">

                                                @if ($registration->status === 'in_progress')
                                                    <a href="{{ route('registrations.proof', $registration->id) }}"
                                                        class="btn btn-success rounded-pill shadow-sm">
                                                        <i class="bi bi-arrow-repeat"></i> Continuar Prova
                                                    </a>
                                                @else
                                                    <form action="{{ route('proof.start') }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="registration_id"
                                                            value="{{ $registration->id }}">
                                                        <button class="btn btn-primary rounded-pill shadow-sm">
                                                            <i class="bi bi-play-fill"></i> Iniciar Prova
                                                        </button>
                                                    </form>
                                                @endif
                                            </form>
                                        @endif


                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            {{-- Provas --}}
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Provas</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center rounded-3 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Prova</th>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Duração</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proofs as $proof)
                                <tr>
                                    <td>{{ $proof->hash }}</td>
                                    <td>{{ Date('d/m/Y H:i:s', strtotime($proof->created_at)) }}</td>
                                    <td>{{ Date('d/m/Y H:i:s', strtotime($proof->updated_at)) }}</td>
                                    <td>
                                        {{ gmdate('H:i:s', strtotime($proof->updated_at) - strtotime($proof->created_at)) }}
                                    </td>
                                    <td>
                                        @if ($proof->status === 'in_progress')
                                            <span class="badge bg-success rounded-pill">Em andamento</span>
                                        @elseif ($proof->status === 'finished')
                                            <span class="badge bg-primary rounded-pill">Finalizada</span>
                                        @elseif ($proof->status === 'pending')
                                            <span class="badge bg-warning rounded-pill">Pendente</span>
                                        @else
                                            <span class="badge bg-secondary rounded-pill">Desconhecido</span>
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Visualizar Contrato -->
                                        <a href="{{ route('documents.contract.user') }}"
                                            class="btn btn-sm btn-outline-info rounded-pill me-1" title="Visualizar"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <!-- REALIZAR PROVA -->
    <div class="card">
        <div class="card-header" id="headingProva">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseProva" aria-expanded="false" aria-controls="collapseProva">
                    <div class="accordion-icon"><i class="bi bi-pencil-square me-2"></i> Realizar Prova</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseProva" class="collapse" aria-labelledby="headingProva"
            data-bs-parent="#accordionCandidatos">
            <div class="card-body">
                <ul class="list-unstyled ps-2">
                    <li class="mb-2" style="font-size: 1rem;"><i class="bi bi-clock-history text-primary me-2"></i>
                        <strong class="text-primary">Duração:</strong> A prova terá 60 minutos. O tempo começa a contar
                        assim que você clicar em "Iniciar Prova".
                    </li>
                    <li class="mb-2" style="font-size: 1rem;"><i class="bi bi-list-ol text-primary me-2"></i>
                        <strong class="text-primary">Quantidade de questões:</strong> Serão 10 questões de múltipla
                        escolha.
                    </li>
                    <li class="mb-2" style="font-size: 1rem;"><i class="bi bi-info-circle text-primary me-2"></i>
                        <strong class="text-primary">Respostas:</strong> Leia cada questão com atenção antes de marcar
                        sua resposta. Você só poderá enviar a prova uma vez.
                    </li>
                    <li class="mb-2" style="font-size: 1rem;"><i class="bi bi-info-circle text-primary me-2"></i>
                        <strong class="text-primary">Envio
                            automático:</strong> Ao final dos 60 minutos, a prova será enviada automaticamente,
                        mesmo que você não tenha terminado.
                    </li>
                    <li style="font-size: 1rem;"><i class="bi bi-info-circle text-primary me-2"></i> <strong
                            class="text-primary">Confirmação:</strong> Após enviar, você verá uma tela de
                        confirmação indicando que sua prova foi registrada com sucesso.</li>
                </ul>
                <form action="{{ route('proof.proof') }}" method="POST" class="text-center mt-5">
                    @csrf
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm"
                        style="font-size: 1.15rem;">
                        <i class="bi bi-play-fill me-1"></i> Iniciar Prova
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- UPLOAD DE DOCUMENTOS -->
    <div class="card">
        <div class="card-header" id="headingDocumentos">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseDocumentos" aria-expanded="false" aria-controls="collapseDocumentos">
                    <div class="accordion-icon"><i class="bi bi-folder2-open me-2"></i> Documentos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>

        <div id="collapseDocumentos" class="collapse" aria-labelledby="headingDocumentos"
            data-bs-parent="#accordionCandidatos">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Enviar Documentos</h6>

                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Documento</th>
                            <th>Arquivo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    @php
                        $documentos = ['CPF', 'RG', 'Comprovante de Residência', 'Certidão de Nascimento'];
                        $userDocs = auth()->user()->documents->keyBy('tipo'); // pega os docs do usuário
                    @endphp

                    <tbody>
                        @foreach ($documentos as $doc)
                            @php
                                $documento = $userDocs[$doc] ?? null;
                                $status = $documento->status ?? 'Pendente';
                                $arquivo = $documento->arquivo ?? null;
                                $link = $arquivo ? asset('storage/documentos/' . $arquivo) : '#';
                                $botaoLabel = $arquivo ? 'Atualizar' : 'Enviar';
                            @endphp
                            <tr id="row-{{ $doc }}">
                                <td>{{ $doc }}</td>
                                <td>
                                    <input type="file" name="documentos[{{ $doc }}]"
                                        class="form-control form-control-sm file-input">
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $status == 'Enviado' ? 'bg-success' : 'bg-secondary' }} status-badge">{{ $status }}</span>
                                </td>
                                <td>
                                    @if ($arquivo)
                                        <a href="{{ $link }}" target="_blank"
                                            class="btn btn-sm btn-outline-secondary rounded-pill">
                                            <i class="bi bi-file-earmark-arrow-down"></i> Baixar
                                        </a>
                                    @else
                                        -
                                    @endif

                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary rounded-pill upload-btn"
                                        data-doc="{{ $doc }}">
                                        <i class="bi bi-upload"></i> {{ $botaoLabel }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>

            </div>
        </div>
    </div>



    <!-- EMITIR CONTRATO -->
    <div class="card">
        <div class="card-header" id="headingContrato">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseContrato" aria-expanded="false" aria-controls="collapseContrato">
                    <div class="accordion-icon"><i class="bi bi-file-earmark-text-fill me-2"></i>Contrato</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseContrato" class="collapse" aria-labelledby="headingContrato"
            data-bs-parent="#accordionCandidatos">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Contratos</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center rounded-3 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Curso</th>
                                <th>Data Início</th>
                                <th>Data Término</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Direito</td>
                                <td>05/08/2025</td>
                                <td>04/08/2028</td>
                                <td><span class="badge bg-success rounded-pill">Assinado</span></td>
                                <td>
                                    <!-- Visualizar Contrato -->
                                    <a href="{{ route('documents.contract.user') }}"
                                        class="btn btn-sm btn-outline-info rounded-pill me-1"
                                        title="Visualizar Contrato" target="_blank">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Download Contrato -->
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Download Contrato">
                                        <i class="bi bi-download"></i>
                                    </a>

                                    <!-- Assinar Contrato -->
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill disabled"
                                        title="Assinar Contrato">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td>Psicologia</td>
                                <td>10/08/2025</td>
                                <td>09/08/2029</td>
                                <td><span class="badge bg-warning text-dark rounded-pill">Aguardando
                                        Assinatura</span></td>
                                <td>
                                    <!-- Visualizar Contrato -->
                                    <a href="{{ route('documents.contract.user') }}"
                                        class="btn btn-sm btn-outline-info rounded-pill me-1"
                                        title="Visualizar Contrato" target="_blank">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Download Contrato -->
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Download Contrato">
                                        <i class="bi bi-download"></i>
                                    </a>

                                    <!-- Assinar Contrato -->
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"
                                        title="Assinar Contrato">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <!-- EMITIR BOLETO -->
    <div class="card">
        <div class="card-header" id="headingBoleto">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseBoleto" aria-expanded="false" aria-controls="collapseBoleto">
                    <div class="accordion-icon"><i class="bi bi-receipt me-2"></i> Boletos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseBoleto" class="collapse" aria-labelledby="headingBoleto"
            data-bs-parent="#accordionCandidatos">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Meus Boletos</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Curso</th>
                            <th>Mês</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Direito</td>
                            <td>Julho/2025</td>
                            <td>10/07/2025</td>
                            <td>R$ 890,00</td>
                            <td><span class="badge bg-success">Pago</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                    title="Emitir Comprovante">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Psicologia</td>
                            <td>Julho/2025</td>
                            <td>10/07/2025</td>
                            <td>R$ 890,00</td>
                            <td><span class="badge bg-warning">Pendente de Pagamento</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                    title="Emitir Comprovante">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.upload-btn').click(function() {
            var doc = $(this).data('doc');
            var row = $('#row-' + doc);

            // Seleciona input correto pelo name
            var fileInput = $('input[name="documentos[' + doc + ']"]')[0];

            if (!fileInput || !fileInput.files.length) {
                alert('Selecione um arquivo para ' + doc);
                return;
            }

            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('documento', file);
            formData.append('nome_doc', doc);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('documentos.upload') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Atualiza badge
                    row.find('.status-badge')
                        .removeClass('bg-secondary bg-danger')
                        .addClass('bg-success')
                        .text('Enviado');

                    // Atualiza link
                    var linkCell = row.find('td').eq(3);
                    linkCell.html('<a href="/storage/documentos/' + response.arquivo +
                        '" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-file-earmark-arrow-down"></i> Baixar</a>'
                    );

                    // Botão sempre visível com Atualizar
                    row.find('.upload-btn').html('<i class="bi bi-upload"></i> Atualizar');

                    // Limpa input
                    fileInput.value = '';

                    alert(response.message);
                },
                error: function(xhr) {
                    row.find('.status-badge')
                        .removeClass('bg-secondary bg-success')
                        .addClass('bg-danger')
                        .text('Erro');

                    var msg = xhr.responseJSON?.message ?? 'Erro desconhecido';
                    alert('Erro ao enviar o documento: ' + msg);
                }
            });

        });

    });
</script>
