<!-- ALUNOS -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-user">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>

        <i class="bi bi-person-fill me-2 fs-5"></i>
        <strong class="me-1">Bem-vindo(a), Aluno!</strong> Acompanhe seus cursos, notas e calendário acadêmico.
    </div>
</div>


<div id="accordionAlunos" class="accordion-icons accordion">


    <!-- CALENDÁRIO ACADÊMICO -->
    <div class="card">
        <div class="card-header" id="headingAlunoCalendar">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseAlunoCalendar" aria-expanded="false" aria-controls="collapseAlunoCalendar">
                    <div class="accordion-icon"><i class="bi bi-calendar-event me-2"></i> Calendário Acadêmico
                    </div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseAlunoCalendar" class="collapse show" aria-labelledby="headingAlunoCalendar"
            data-bs-parent="#accordionAlunos">
            <div class="card-body p-4">
                <div class="row">

                    <!-- Coluna esquerda: Calendário mensal -->
                    <div class="col-lg-12 mb-4 table-responsive">
                        <h6 class="fw-bold text-primary mb-3">Calandário Agosto</h6>
                        <table class="table table-bordered text-center rounded-3">
                            <thead class="table-light">
                                <tr>
                                    <th>Dom</th>
                                    <th>Seg</th>
                                    <th>Ter</th>
                                    <th>Qua</th>
                                    <th>Qui</th>
                                    <th>Sex</th>
                                    <th>Sáb</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted">27</td>
                                    <td class="text-muted">28</td>
                                    <td class="text-muted">29</td>
                                    <td class="text-muted">30</td>
                                    <td class="text-muted">31</td>
                                    <td>01</td>
                                    <td>02</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>04</td>
                                    <td>05</td>
                                    <td>06</td>
                                    <td>07</td>
                                    <td>08</td>
                                    <td>09</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>11 <span class="badge bg-primary">Aulas</span></td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15 <span class="badge bg-warning text-dark">Avaliação</span></td>
                                    <td>16</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29 <span class="badge bg-danger text-dark">Prova</span></td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>31</td>
                                    <td class="text-muted">01</td>
                                    <td class="text-muted">02</td>
                                    <td class="text-muted">03</td>
                                    <td class="text-muted">04</td>
                                    <td class="text-muted">05</td>
                                    <td class="text-muted">06</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Coluna direita: Lista de eventos -->
                    <div class="col-lg-12 table-responsive">
                        <h6 class="fw-bold text-primary mb-3">Eventos de Outubro</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Início das Aulas
                                <span class="badge bg-primary rounded-pill">11/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Atividade - Materia X
                                <span class="badge bg-warning text-dark rounded-pill">15/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Prova - Independência
                                <span class="badge bg-danger rounded-pill">29/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Feriado - Independência
                                <span class="badge bg-success rounded-pill">07/09/2025</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CURSOS MATRICULADOS -->
    <div class="card">
        <div class="card-header" id="headingAlunoCursos">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseAlunoCursos" aria-expanded="false" aria-controls="collapseAlunoCursos">
                    <div class="accordion-icon"><i class="bi bi-book me-2"></i> Meus Cursos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseAlunoCursos" class="collapse" aria-labelledby="headingAlunoCursos"
            data-bs-parent="#accordionAlunos">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Meus Cursos</h6>
                <h5 class="fw-bold text-primary mb-3">Direito</h5>
                <!-- Disciplinas -->
                <div class="row g-3 mb-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-info"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-info">Direito Constitucional</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-success"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-success">Direito Penal</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-warning"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-warning">Direito Civil</div>
                        </div>
                    </div>
                </div>

                <!-- Atividades -->
                <h6 class="fw-bold text-dark mb-2">Atividades</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quiz - Direito Constitucional
                        <span class="badge bg-primary rounded-pill">10/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Trabalho - Direito Penal
                        <span class="badge bg-success rounded-pill">15/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Prova - Direito Civil
                        <span class="badge bg-warning text-dark rounded-pill">20/09/2025</span>
                    </li>
                </ul>


                <h5 class="fw-bold text-primary mt-5 mb-3">Psicologia</h5>

                <!-- Disciplinas -->
                <div class="row g-3 mb-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-info"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-info">Psicologia Geral</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-success"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-success">Psicologia do Desenvolvimento</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="dashboard-icon text-warning"><i class="bi bi-journal-text"></i></div>
                            <div class="dashboard-title text-warning">Psicologia Clínica</div>
                        </div>
                    </div>
                </div>

                <!-- Atividades -->
                <h6 class="fw-bold text-dark mb-2">Atividades</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quiz - Psicologia Geral
                        <span class="badge bg-primary rounded-pill">10/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Trabalho - Psicologia do Desenvolvimento
                        <span class="badge bg-success rounded-pill">15/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Prova - Psicologia Clínica
                        <span class="badge bg-warning text-dark rounded-pill">20/09/2025</span>
                    </li>
                </ul>


            </div>
        </div>
    </div>

    <!-- FINANCEIRO -->
    <div class="card">
        <div class="card-header" id="headingAlunoFinanceiro">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseAlunoFinanceiro" aria-expanded="false"
                    aria-controls="collapseAlunoFinanceiro">
                    <div class="accordion-icon"><i class="bi bi-cash-coin me-2"></i> Financeiro</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseAlunoFinanceiro" class="collapse" aria-labelledby="headingAlunoFinanceiro"
            data-bs-parent="#accordionAlunos">
            <div class="card-body p-4">
                <h6 class="fw-bold text-primary mb-3">Resumo Financeiro</h6>
                <!-- Resumo rápido -->
                <div class="row text-center mb-4 g-3">
                    <div class="col-md-4">
                        <div class="p-3 bg-light border rounded-3 shadow-sm h-100">
                            <h6 class="text-muted mb-2">Mensalidade Atual</h6>
                            <h4 class="text-primary fw-bold">R$ 890,00</h4>
                            <small class="text-danger">Vencimento: 10/09/2025</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light border rounded-3 shadow-sm h-100">
                            <h6 class="text-muted mb-2">Situação</h6>
                            <h4 class="text-success fw-bold">Em Dia</h4>
                            <small>Último pagamento: 10/08/2025</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light border rounded-3 shadow-sm h-100">
                            <h6 class="text-muted mb-2">Contratos</h6>
                            <h4 class="fw-bold">2 Ativos</h4>
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill mt-2">Ver
                                contratos</a>
                        </div>
                    </div>
                </div>

                <!-- Tabela de boletos -->
                <h6 class="fw-bold text-primary mb-3">Histórico de Mensalidades</h6>
                <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm rounded-3">
                        <thead class="table-light">
                            <tr>
                                <th>Mês</th>
                                <th>Vencimento</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th class="text-center">Boleto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Agosto/2025</td>
                                <td>10/08/2025</td>
                                <td>R$ 890,00</td>
                                <td class="text-center"><span
                                        class="text-center badge bg-success px-3 py-2 rounded-pill">Pago</span>
                                </td>
                                <!-- Quando a mensalidade já estiver paga -->
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill"
                                        title="Emitir Comprovante">
                                        <i class="bi bi-receipt"></i> Emitir Comprovante
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Setembro/2025</td>
                                <td>10/09/2025</td>
                                <td>R$ 890,00</td>
                                <td class="text-center"><span
                                        class="badge bg-warning text-dark px-3 py-2 rounded-pill">Em Aberto</span>
                                </td>
                                <td class="text-center">
                                    <!-- Baixar boleto -->
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Baixar Boleto">
                                        <i class="bi bi-file-earmark-pdf"></i> Baixar Boleto
                                    </a>

                                    <!-- Pagar com boleto -->
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1"
                                        title="Pagar com Boleto">
                                        <i class="bi bi-upc-scan"></i> Pagar Boleto
                                    </a>

                                    <!-- Pagar com cartão -->
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill me-1"
                                        title="Pagar com Cartão">
                                        <i class="bi bi-credit-card"></i> Pagar com Cartão
                                    </a>

                                    <!-- Pagar com PIX -->
                                    <a href="#" class="btn btn-sm btn-outline-info rounded-pill"
                                        title="Pagar com PIX">
                                        <i class="bi bi-qr-code"></i> Pagar com PIX
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
