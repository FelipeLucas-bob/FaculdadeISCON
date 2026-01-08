<!-- PROFESSORES -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">

        <!-- SVG de alerta -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-alert-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12" y2="16"></line>
        </svg>

        <!-- Ícone da área (professor) -->
        <i class="bi bi-mortarboard-fill me-2 fs-5"></i>

        <strong class="me-1">Área do Professor:</strong> Gerencie suas turmas, avaliações e materiais.
    </div>
</div>


<div id="accordionProfessores" class="accordion-icons accordion">

    <!-- MATERIAL DIDÁTICO -->
    <div class="card">
        <div class="card-header" id="headingMateriais">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseMateriais" aria-expanded="false" aria-controls="collapseMateriais">
                    <div class="accordion-icon"><i class="bi bi-file-earmark-text me-2"></i> Materiais</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseMateriais" class="collapse show" aria-labelledby="headingMateriais"
            data-bs-parent="#accordionProfessores">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Meus Materiais</h6>
                <!-- Botão adicionar material -->
                <div class="mb-3">
                    <button class="btn btn-primary rounded-pill">
                        <i class="bi bi-upload me-1"></i> Adicionar Material
                    </button>
                </div>

                <!-- Tabela de materiais -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Curso</th>
                                <th>Turno</th>
                                <th>Disciplina</th>
                                <th>Tipo</th>
                                <th class="text-center">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Direito</td>
                                <td>Matutino</td>
                                <td>Direito Constitucional</td>
                                <td>Aula</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Baixar">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                        title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Direito</td>
                                <td>Matutino</td>
                                <td>Direito Penal</td>
                                <td>PDF</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Baixar">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                        title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Direito</td>
                                <td>Noturno</td>
                                <td>Direito Civil</td>
                                <td>Vídeo</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill me-1"
                                        title="Baixar">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                        title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- CALENDÁRIO DE AULAS -->
    <div class="card">
        <div class="card-header" id="headingProfCalendar">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseProfCalendar" aria-expanded="false" aria-controls="collapseProfCalendar">
                    <div class="accordion-icon"><i class="bi bi-calendar-check me-2"></i> Calendário de Aulas
                    </div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseProfCalendar" class="collapse" aria-labelledby="headingProfCalendar"
            data-bs-parent="#accordionProfessores">
            <div class="card-body">
                <div class="row">

                    <!-- Coluna esquerda: Calendário mensal -->
                    <div class="col-lg-12 mb-4 table-responsive">
                        <h6 class="fw-bold text-primary mb-3">Compromissos em Agosto</h6>
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
                                    <td><b>11</b> <br /><span class="badge bg-primary">Turma A</span></td>
                                    <td>12</td>
                                    <td><b>13</b> <br /><span class="badge bg-info">Turma B</span></td>
                                    <td><b>14</b> <br /><span class="badge bg-success">Turma C</span></td>
                                    <td><b>15</b> <br /><span class="badge bg-warning">Ativadade</span></td>
                                    <td>16</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td><b>18</b> <br /><span class="badge bg-primary">Turma A</span></td>
                                    <td>19</td>
                                    <td><b>20</b> <br /><span class="badge bg-info">Turma B</span></td>
                                    <td><b>21</b> <br /><span class="badge bg-success">Turma C</span></td>
                                    <td>22</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td><b>25</b> <br /><span class="badge bg-primary">Turma A</span></td>
                                    <td>26</td>
                                    <td><b>27</b> <br /><span class="badge bg-info">Turma B</span></td>
                                    <td><b>28</b> <br /><span class="badge bg-success">Turma C</span></td>
                                    <td><b>29</b> <br /><span class="badge bg-danger">Prova</span></td>
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
                    <div class="col-lg-12 table-responsive>
                        <h6 class="fw-bold text-primary mb-3">Eventos de Outubro</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Aula - Direito Constitucional
                                <span class="badge bg-primary rounded-pill">Turma A | 01/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Prova - Direito Penal
                                <span class="badge bg-warning text-dark rounded-pill">Turma B | 04/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Aula - Direito Civil
                                <span class="badge bg-primary rounded-pill">Turma C | 15/08/2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Aula - Direito Constitucional
                                <span class="badge bg-primary rounded-pill">Turma A | 22/08/2025</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TURMAS -->
    <div class="card">
        <div class="card-header" id="headingTurmas">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseTurmas" aria-expanded="false" aria-controls="collapseTurmas">
                    <div class="accordion-icon"><i class="bi bi-people-fill me-2"></i> Minhas Turmas</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseTurmas" class="collapse" aria-labelledby="headingTurmas"
            data-bs-parent="#accordionProfessores">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Minhas Turmas</h6>
                <!-- Lista de turmas -->
                <div class="list-group mb-4">
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Turma A - Direito Constitucional
                        <span class="badge bg-primary rounded-pill">Turma A</span>
                    </a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Turma B - Direito Penal
                        <span class="badge bg-success rounded-pill">Turma B</span>
                    </a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Turma C - Direito Civil
                        <span class="badge bg-warning text-dark rounded-pill">Turma C</span>
                    </a>
                </div>


                <!-- Dashboard das turmas -->
                <div class="row g-3">
                    <!-- Turma A -->
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card p-3 border rounded-3">
                            <div class="dashboard-title fw-bold text-primary">Turma A</div>
                            <div class="dashboard-subtitle text-muted mb-2">Direito Constitucional</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="text-muted">Aulas</div>
                                    <div class="fw-bold">12</div>
                                </div>
                                <div>
                                    <div class="text-muted">Atividades</div>
                                    <div class="fw-bold">5</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <div class="text-muted">Provas</div>
                                    <div class="fw-bold">2</div>
                                </div>
                                <div>
                                    <div class="text-muted">Conclusão</div>
                                    <div class="fw-bold">70%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Turma B -->
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card p-3 border rounded-3">
                            <div class="dashboard-title fw-bold text-success">Turma B</div>
                            <div class="dashboard-subtitle text-muted mb-2">Direito Penal</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="text-muted">Aulas</div>
                                    <div class="fw-bold">10</div>
                                </div>
                                <div>
                                    <div class="text-muted">Atividades</div>
                                    <div class="fw-bold">6</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <div class="text-muted">Provas</div>
                                    <div class="fw-bold">3</div>
                                </div>
                                <div>
                                    <div class="text-muted">Conclusão</div>
                                    <div class="fw-bold">60%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Turma C -->
                    <div class="col-lg-4 col-md-6">
                        <div class="dashboard-card p-3 border rounded-3">
                            <div class="dashboard-title fw-bold text-warning">Turma C</div>
                            <div class="dashboard-subtitle text-muted mb-2">Direito Civil</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="text-muted">Aulas</div>
                                    <div class="fw-bold">14</div>
                                </div>
                                <div>
                                    <div class="text-muted">Atividades</div>
                                    <div class="fw-bold">7</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <div class="text-muted">Provas</div>
                                    <div class="fw-bold">4</div>
                                </div>
                                <div>
                                    <div class="text-muted">Conclusão</div>
                                    <div class="fw-bold">80%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
