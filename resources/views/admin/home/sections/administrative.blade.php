        <!-- ADMINISTRATIVOS -->
        <div class="col-12 mt-0">
            <div class="alert alert-arrow-right alert-icon-right alert-light-info alert-dismissible fade show d-flex align-items-center"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
                <i class="bi bi-briefcase-fill me-2 fs-5"></i>
                <strong class="me-1">Área Administrativa: </strong>Gerencie setores, usuários e processos internos.
            </div>
        </div>

        <div id="accordionAdm" class="accordion-icons accordion">
            <!-- DASHBOARD -->
            <div class="card">
                <div class="card-header" id="headingDashboard">
                    <section class="mb-0 mt-0">
                        <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                            <div class="accordion-icon"><i class="bi bi-graph-up me-2"></i> Dashboard
                            </div>
                            <div class="icons">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="collapseDashboard" class="collapse show " aria-labelledby="headingDashboard"
                    data-bs-parent="#accordionAdm">

                    <div class="page-header p-3">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-primary mb-0">Informações Gerais</h3>

                            <div class="d-flex align-items-center text-end">
                                <div>
                                    <div id="current-date" class="text-muted fw-semibold small"></div>
                                    <div id="current-time" class="text-primary fw-bold"></div>
                                </div>
                                <i class="bi bi-clock ms-2 fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">

                            <div class="d-flex flex-wrap gap-3">

                                <!-- Usuários -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-success"><i class="bi bi-people-fill"></i></div>
                                    <div class="dashboard-title text-success">Usuários</div>
                                    <div class="dashboard-value text-dark">{{ $users }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Online:</strong> 0</div>
                                        <div><strong>Offline:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Candidatos -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-warning"><i class="bi bi-person-lines-fill"></i></div>
                                    <div class="dashboard-title text-warning">Candidatos</div>
                                    <div class="dashboard-value text-dark">{{ $registrations }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Matriculados:</strong> 0</div>
                                        <div><strong>Pendentes:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Aluno -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-info"><i class="bi bi-person-vcard-fill"></i></div>
                                    <div class="dashboard-title text-info">Alunos</div>
                                    <div class="dashboard-value text-dark">{{ $students }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Matriculados:</strong> 0</div>
                                        <div><strong>Rematrícula:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Professores -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-primary"><i class="bi bi-person-badge-fill"></i></div>
                                    <div class="dashboard-title text-primary">Professores</div>
                                    <div class="dashboard-value text-dark">{{ $instructors }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Matutinos:</strong> 0</div>
                                        <div><strong>Noturnos:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Turmas -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-primary"><i class="bi bi-people-fill"></i></div>
                                    <div class="dashboard-title text-primary">Turmas</div>
                                    <div class="dashboard-value text-dark">0</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Ativas:</strong> 0</div>
                                        <div><strong>Concluídas:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Cursos -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-none"><i class="bi bi-journal-bookmark-fill"></i></div>
                                    <div class="dashboard-title text-none">Cursos</div>
                                    <div class="dashboard-value text-dark">{{ $courses }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Matutinos:</strong> 0</div>
                                        <div><strong>Noturnos:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Disciplinas -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-success"><i class="bi bi-journal-bookmark-fill"></i></div>
                                    <div class="dashboard-title text-success">Disciplinas</div>
                                    <div class="dashboard-value text-dark">{{ $disciplines }}</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Ativas:</strong> 0</div>
                                        <div><strong>Inativas:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Diplomas -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-info"><i class="bi bi-mortarboard-fill"></i></div>
                                    <div class="dashboard-title text-info">Diplomas</div>
                                    <div class="dashboard-value text-dark">0</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Emitidos:</strong> 0</div>
                                        <div><strong>Pendentes:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Atendimentos -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-warning"><i class="bi bi-headset"></i></div>
                                    <div class="dashboard-title text-warning">Atendimentos</div>
                                    <div class="dashboard-value text-dark">0</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Resolvidos:</strong> 0</div>
                                        <div><strong>Pendentes:</strong> 0</div>
                                    </div>
                                </div>

                                <!-- Mensalidades -->
                                <div class="dashboard-card col-lg-2 col-md-4 col-sm-6">
                                    <div class="dashboard-icon text-danger"><i class="bi bi-cash-coin"></i></div>
                                    <div class="dashboard-title text-danger">Mensalidades</div>
                                    <div class="dashboard-value text-dark">R$ 0,00</div>
                                    <div class="dashboard-subinfo text-muted">
                                        <div><strong>Pagos:</strong> R$ 0,00</div>
                                        <div><strong>Vencidos:</strong> R$ 0,00</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ATENDIMENTOS -->
            <div class="card">
                <div class="card-header" id="headingAtendAdm">
                    <section class="mb-0 mt-0">
                        <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseAtendAdm" aria-expanded="false" aria-controls="collapseAtendAdm">
                            <div class="accordion-icon"><i class="bi bi-headset me-2"></i> Atendimentos</div>
                            <div class="icons"><i class="bi bi-chevron-down"></i></div>
                        </div>
                    </section>
                </div>
                <div id="collapseAtendAdm" class="collapse" aria-labelledby="headingAtendAdm"
                    data-bs-parent="#accordionAdm">
                    <div class="page-header p-3">
                        <div class=" d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-primary mb-0">Atendimentos de Hoje</h3>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('service.create') }}" class="btn btn-primary me-2">
                                    <i class="bi bi-chat-dots "></i> Novo Atendimento
                                </a>
                                <a href="{{ route('service.create') }}" class="btn btn-info me-2">
                                    <i class="bi bi-chat-dots "></i> Meus Atendimentos
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <h5 class="">Atendimentos Geral</h5>
                                </div>
                                <div class="widget-content">
                                    <div id="chart-2" class=""></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <h5 class="">Últimos Atendimentos</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Aluno</th>
                                                    <th>Demanda</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>30/07/2025 às 17:13</td>
                                                    <td>Shaun Park</td>
                                                    <td>Emissão de Declaração</td>
                                                    <td><span class="badge bg-info">Em andamento</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 16:22</td>
                                                    <td>Alma Clarke</td>
                                                    <td>Emissão de Histórico</td>
                                                    <td><span class="badge bg-warning">Pendente</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 15:08</td>
                                                    <td>Vincent Carpenter</td>
                                                    <td>Atestado de Matrícula</td>
                                                    <td><span class="badge bg-warning">Pendente</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 14:45</td>
                                                    <td>Xavier</td>
                                                    <td>Solicitação de Documentos</td>
                                                    <td><span class="badge bg-success">Concluído</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 14:30</td>
                                                    <td>Lucas Pereira</td>
                                                    <td>Declaração de Conclusão</td>
                                                    <td><span class="badge bg-success">Concluído</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 14:10</td>
                                                    <td>Maria Fernanda</td>
                                                    <td>Trancamento de Matrícula</td>
                                                    <td><span class="badge bg-success">Concluído</span></td>
                                                </tr>
                                                <tr>
                                                    <td>30/07/2025 às 08:55</td>
                                                    <td>Eduardo Lima</td>
                                                    <td>Solicitação de Boleto</td>
                                                    <td><span class="badge bg-info">Em andamento</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="{{ route('services.index') }}" class="h6 text-primary fw-bold ms-3">Ver
                                            Todos...</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- PROCESSO SELETIVO -->
            <div class="card">
                <div class="card-header" id="headingProcessoSeletivo">
                    <section class="mb-0 mt-0">
                        <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseProcessoSeletivo" aria-expanded="false"
                            aria-controls="collapseProcessoSeletivo">
                            <div class="accordion-icon"><i class="bi bi-journal-text me-2"></i> Processo Seletivo
                            </div>
                            <div class="icons">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="collapseProcessoSeletivo" class="collapse" aria-labelledby="headingProcessoSeletivo"
                    data-bs-parent="#accordionAdm">
                    <div class="card-body">
                        Gerencie inscrições, etapas e resultados do processo seletivo.
                    </div>
                </div>
            </div>

            <!-- PROCESSOS INTERNOS -->
            <div class="card">
                <div class="card-header" id="headingProcAdm">
                    <section class="mb-0 mt-0">
                        <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseProcAdm" aria-expanded="false" aria-controls="collapseProcAdm">
                            <div class="accordion-icon"><i class="bi bi-chat-dots me-2"></i> Conversas</div>
                            <div class="icons"><i class="bi bi-chevron-down"></i></div>
                        </div>
                    </section>
                </div>
                <div id="collapseProcAdm" class="collapse" aria-labelledby="headingProcAdm"
                    data-bs-parent="#accordionAdm">
                    <div class="card-body">Conversas e interações com alunos, professores ou setores administrativos.</div>
                </div>
            </div>


            <!-- USUÁRIOS / FUNCIONÁRIOS -->
            <div class="card">
                <div class="card-header" id="headingUsersAdm">
                    <section class="mb-0 mt-0">
                        <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseUsersAdm" aria-expanded="false" aria-controls="collapseUsersAdm">
                            <div class="accordion-icon"><i class="bi bi-list-check me-2"></i> Demandas</div>
                            <div class="icons"><i class="bi bi-chevron-down"></i></div>
                        </div>
                    </section>
                </div>
                <div id="collapseUsersAdm" class="collapse" aria-labelledby="headingUsersAdm"
                    data-bs-parent="#accordionAdm">
                    <div class="card-body">Adicione, edite ou remova usuários do sistema institucional.</div>
                </div>
            </div>


            <!-- FINANCEIRO EM CARDS -->
            <div class="card">
                <div class="card-header" id="headingFinanceiro">
                    <section class="mb-0 mt-0">
                        <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            data-bs-target="#collapseFinanceiro" aria-expanded="false"
                            aria-controls="collapseFinanceiro">
                            <div class="accordion-icon"><i class="bi bi-cash-coin me-2"></i> Financeiro</div>
                            <div class="icons"><i class="bi bi-chevron-down"></i></div>
                        </div>
                    </section>
                </div>
                <div id="collapseFinanceiro" class="collapse" aria-labelledby="headingFinanceiro"
                    data-bs-parent="#accordionAdm">
                    <div class="card-body">
                        <h6 class="fw-bold text-primary mb-3">Resumo Financeiro Anual</h6>
                        <div class="d-flex flex-wrap gap-3">

                            <!-- Valor Anual -->
                            <div class="dashboard-card col-lg-5 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-primary"><i class="bi bi-currency-dollar"></i></div>
                                <div class="dashboard-title text-primary">Valor Anual</div>
                                <div class="dashboard-value text-dark">R$ 12.000,00</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Pago:</strong> R$ 2.000,00</div>
                                    <div><strong>Vencido:</strong> R$ 2.000,00</div>
                                    <div><strong>A Vencer:</strong> R$ 8.000,00</div>
                                </div>
                            </div>

                            <!-- Primeiro Semestre -->
                            <div class="dashboard-card col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-success"><i class="bi bi-cash-stack"></i></div>
                                <div class="dashboard-title text-success">Primeiro Semestre (2025.1)</div>
                                <div class="dashboard-value text-dark">R$ 6.000,00</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Pago:</strong> R$ 2.000,00</div>
                                    <div><strong>Vencido:</strong> R$ 1.000,00</div>
                                    <div><strong>A Vencer:</strong> R$ 3.000,00</div>
                                </div>
                            </div>

                            <!-- Segundo Semestre -->
                            <div class="dashboard-card col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-info"><i class="bi bi-check-circle"></i></div>
                                <div class="dashboard-title text-info">Segundo Semestre (2025.2)</div>
                                <div class="dashboard-value text-dark">R$ 6.000,00</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Pago:</strong> R$ 0,00</div>
                                    <div><strong>Vencido:</strong> R$ 1.000,00</div>
                                    <div><strong>A Vencer:</strong> R$ 5.000,00</div>
                                </div>
                            </div>

                        </div>

                        <!-- Resumo Mensal -->
                        <h6 class="fw-bold text-primary mt-5 mb-3">Resumo do Mês de Agosto</h6>
                        <div class="d-flex flex-wrap gap-3">

                            <!-- Vencidas -->
                            <div class="dashboard-card col-lg-2 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-danger"><i class="bi bi-exclamation-circle"></i></div>
                                <div class="dashboard-title text-danger">Vencidas</div>
                                <div class="dashboard-value text-dark">1</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Valor:</strong> R$ 2.000,00</div>
                                </div>
                            </div>

                            <!-- A Vencer -->
                            <div class="dashboard-card col-lg-2 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-warning"><i class="bi bi-clock"></i></div>
                                <div class="dashboard-title text-warning">A Vencer</div>
                                <div class="dashboard-value text-dark">4</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Valor:</strong> R$ 8.000,00</div>
                                </div>
                            </div>

                            <!-- Recebido -->
                            <div class="dashboard-card col-lg-2 col-md-4 col-sm-6 mb-3">
                                <div class="dashboard-icon text-success"><i class="bi bi-wallet2"></i></div>
                                <div class="dashboard-title text-success">Recebido</div>
                                <div class="dashboard-value text-dark">325</div>
                                <div class="dashboard-subinfo text-muted">
                                    <div><strong>Valor:</strong> R$ 2.000,00</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>