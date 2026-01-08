<!-- DIPLOMAÇÃO -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <!-- Ícone atualizado para "award" -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-award">
            <circle cx="12" cy="8" r="7"></circle>
            <path d="M8 21v-4l4-2 4 2v4"></path>
        </svg>
        <i class="bi bi-mortarboard-fill me-2 fs-5"></i>
        <strong class="me-1">Área de Diplomação:</strong> Acompanhe emissão e status de diplomas.
    </div>
</div>


<div id="accordionDiplomacao" class="accordion-icons accordion">

    <!-- DIPLOMAS EMITIDOS -->
    <div class="card">
        <div class="card-header" id="headingEmitidos">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseEmitidos" aria-expanded="true" aria-controls="collapseEmitidos">
                    <div class="accordion-icon"><i class="bi bi-check-circle me-2"></i> Diplomas Emitidos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseEmitidos" class="collapse show" aria-labelledby="headingEmitidos"
            data-bs-parent="#accordionDiplomacao">
            <div class="card-body table-responsive">
                <h6 class="fw-bold text-primary mb-3">Meus Diplomas</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Curso</th>
                            <th>Data de Conclusão</th>
                            <th>Data de Emissão</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Direito</td>
                            <td>30/07/2025</td>
                            <td>05/08/2025</td>
                            <td><span class="badge bg-success">Emitido</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-info rounded-pill me-1"
                                    title="Visualizar Diploma" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill"
                                    title="Download Diploma">
                                    <i class="bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Psicologia</td>
                            <td>28/07/2025</td>
                            <td>-</td>
                            <td><span class="badge bg-warning text-dark">Pendente</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill disabled"
                                    title="Visualizar Diploma">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill disabled"
                                    title="Download Diploma">
                                    <i class="bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DIPLOMAS PENDENTES -->
    <div class="card">
        <div class="card-header" id="headingPendentes">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapsePendentes" aria-expanded="false" aria-controls="collapsePendentes">
                    <div class="accordion-icon"><i class="bi bi-hourglass-split me-2"></i> Diplomas Pendentes</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapsePendentes" class="collapse" aria-labelledby="headingPendentes"
            data-bs-parent="#accordionDiplomacao">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Diplomas em Processamento</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Curso</th>
                            <th>Data de Conclusão</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Administração</td>
                            <td>30/07/2025</td>
                            <td><span class="badge bg-warning text-dark">Em Processamento</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill disabled"
                                    title="Visualizar Diploma">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Engenharia</td>
                            <td>28/07/2025</td>
                            <td><span class="badge bg-warning text-dark">Em Processamento</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill disabled"
                                    title="Visualizar Diploma">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- HISTÓRICO DE DIPLOMAS -->
    <div class="card">
        <div class="card-header" id="headingHistorico">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseHistorico" aria-expanded="false" aria-controls="collapseHistorico">
                    <div class="accordion-icon"><i class="bi bi-journal-text me-2"></i> Histórico de Diplomas</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseHistorico" class="collapse" aria-labelledby="headingHistorico"
            data-bs-parent="#accordionDiplomacao">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Histórico Completo</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Curso</th>
                            <th>Data de Conclusão</th>
                            <th>Data de Emissão</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Direito</td>
                            <td>30/07/2025</td>
                            <td>05/08/2025</td>
                            <td><span class="badge bg-success">Emitido</span></td>
                        </tr>
                        <tr>
                            <td>Psicologia</td>
                            <td>28/07/2025</td>
                            <td>-</td>
                            <td><span class="badge bg-warning text-dark">Pendente</span></td>
                        </tr>
                        <tr>
                            <td>Administração</td>
                            <td>30/07/2024</td>
                            <td>05/08/2024</td>
                            <td><span class="badge bg-success">Emitido</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
