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
                                    <td>{{ $registration->id }}</td>
                                    <td>{{ $registration->course }}</td>
                                    <td>{{ $registration->admission_type }}</td>
                                    <td><span class="badge bg-warning rounded-pill">Prova Pendente</span></td>
                                    <td>

                                        <form action="{{ route('proof.proof') }}" method="POST" class="text-center">
                                            @csrf
                                            <input type="hidden" name="registration_id" value="{{ $registration->id }}" class="form-control">
                                            <button type="submit"
                                                class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                                                <i class="bi bi-play-fill me-1"></i> Iniciar Prova
                                            </button>
                                        </form>

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
                                <th>Curso</th>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proofs as $proof)
                                <tr>
                                    <td> {{ $proof->hash }}</td>
                                    <td>DIREITO</td>
                                    <td>12/01/2026 20:52</td>
                                    <td>12/01/2026 21:30</td>
                                    <td><span class="badge bg-success rounded-pill">Em andamento</span></td>
                                    <td>
                                        <!-- Visualizar Contrato -->
                                        <a href="{{ route('documents.contract.user') }}"
                                            class="btn btn-sm btn-outline-info rounded-pill me-1"
                                            title="Continuar Prova" target="_blank">
                                            <i class="bi bi-play"></i>
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
        <div id="collapseProva" class="collapse" aria-labelledby="headingProva" data-bs-parent="#accordionCandidatos">
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
