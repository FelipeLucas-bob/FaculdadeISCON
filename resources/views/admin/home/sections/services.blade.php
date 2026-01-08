<!-- ATENDIMENTO AO PÚBLICO -->
<div class="col-12 mt-5">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <i class="bi bi-people me-2 fs-5"></i>
        <strong class="me-1">Área de Atendimento ao Público:</strong> Acompanhe e gerencie solicitações e
        atendimentos.
    </div>
</div>


<div id="accordionSuporte" class="accordion-icons accordion">

    <!-- NOVO CHAMADO -->
    <div class="card">
        <div class="card-header" id="headingNovoChamado">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseNovoChamado" aria-expanded="false" aria-controls="collapseNovoChamado">
                    <div class="accordion-icon"><i class="bi bi-plus-circle me-2"></i> Abrir Novo Chamado</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseNovoChamado" class="collapse show" aria-labelledby="headingNovoChamado"
            data-bs-parent="#accordionSuporte">
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">

                        <!-- TAB CONTENT -->
                        <div class="tab-content col-lg-9" id="v-pills-tabContent">

                            <!-- NOVO ATENDIMENTO -->
                            <div class="tab-pane fade show active" id="v-pills-novo" role="tabpanel"
                                aria-labelledby="v-pills-novo-tab" tabindex="0">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição do Problema</label>
                                        <textarea class="form-control" id="descricao" name="description" rows="4" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                            <i class="bi bi-plus-circle me-1"></i> Abrir Atendimento
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- BUSCAR ATENDIMENTO -->
                            <div class="tab-pane fade" id="v-pills-buscar" role="tabpanel"
                                aria-labelledby="v-pills-buscar-tab" tabindex="0">
                                <h6 class="fw-bold text-primary mb-3">Buscar Atendimento</h6>
                                <form class="mb-4">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="buscarUsuario" class="form-label">Aluno / Usuário</label>
                                            <input type="text" id="buscarUsuario" class="form-control"
                                                placeholder="Digite o nome ou email">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="buscarData" class="form-label">Data</label>
                                            <input type="date" id="buscarData" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="buscarAssunto" class="form-label">Assunto</label>
                                            <input type="text" id="buscarAssunto" class="form-control"
                                                placeholder="Digite o assunto">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="bi bi-search me-1"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <h6 class="fw-bold text-secondary mb-3">Resultados</h6>
                                <table class="table table-bordered text-center rounded-3 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Aluno / Usuário</th>
                                            <th>Data</th>
                                            <th>Assunto</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ana Souza</td>
                                            <td>22/08/2025</td>
                                            <td>Solicitação de Histórico</td>
                                            <td><span class="badge bg-success">Concluído</span></td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-info rounded-pill me-1"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-primary rounded-pill"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- MEUS ATENDIMENTOS -->
                            <div class="tab-pane fade" id="v-pills-meus" role="tabpanel"
                                aria-labelledby="v-pills-meus-tab" tabindex="0">
                                <h6 class="fw-bold mb-3">Meus Atendimentos</h6>
                                <table class="table table-bordered text-center rounded-3 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Aluno / Usuário</th>
                                            <th>Data</th>
                                            <th>Assunto</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Maria Fernanda</td>
                                            <td>18/08/2025</td>
                                            <td>Trancamento de Matrícula</td>
                                            <td><span class="badge bg-warning text-dark">Aberto</span></td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-info rounded-pill me-1"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-primary rounded-pill"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- MINHAS PENDÊNCIAS -->
                            <div class="tab-pane fade" id="v-pills-pendencias" role="tabpanel"
                                aria-labelledby="v-pills-pendencias-tab" tabindex="0">
                                <h6 class="fw-bold text-danger mb-3">Minhas Pendências</h6>
                                <table class="table table-bordered text-center rounded-3 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Aluno / Usuário</th>
                                            <th>Data</th>
                                            <th>Assunto</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Eduardo Lima</td>
                                            <td>15/08/2025</td>
                                            <td>Problema no login</td>
                                            <td><span class="badge bg-warning text-dark">Aberto</span></td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-info rounded-pill me-1"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-primary rounded-pill"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>

                        <!-- NAV VERTICAL -->
                        <div class="col-lg-3">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-novo-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-novo" type="button" role="tab"
                                    aria-controls="v-pills-novo" aria-selected="false">
                                    <i class="bi bi-plus-circle me-2"></i> Novo Atendimento
                                </button>
                                <button class="nav-link" id="v-pills-buscar-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-buscar" type="button" role="tab"
                                    aria-controls="v-pills-buscar" aria-selected="false">
                                    <i class="bi bi-search me-2"></i> Buscar Atendimento
                                </button>
                                <button class="nav-link" id="v-pills-meus-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-meus" type="button" role="tab"
                                    aria-controls="v-pills-meus" aria-selected="false">
                                    <i class="bi bi-person-check me-2"></i> Meus Atendimentos
                                </button>
                                <button class="nav-link" id="v-pills-pendencias-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-pendencias" type="button" role="tab"
                                    aria-controls="v-pills-pendencias" aria-selected="false">
                                    <i class="bi bi-exclamation-triangle me-2"></i> Minhas Pendências
                                </button>
                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- CHAMADOS ABERTOS -->
    <div class="card">
        <div class="card-header" id="headingAbertos">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseAbertos" aria-expanded="true" aria-controls="collapseAbertos">
                    <div class="accordion-icon"><i class="bi bi-exclamation-circle me-2"></i> Chamados Abertos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseAbertos" class="collapse" aria-labelledby="headingAbertos"
            data-bs-parent="#accordionSuporte">
            <div class="card-body table-responsive">
                <h6 class="fw-bold text-primary mb-3">Chamados em Aberto</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lucas Pereira</td>
                            <td>20/08/2025</td>
                            <td>Problema no login</td>
                            <td><span class="badge bg-warning text-dark">Aberto</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-info rounded-pill me-1"
                                    title="Visualizar Chamado">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"
                                    title="Editar Chamado">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Maria Fernanda</td>
                            <td>18/08/2025</td>
                            <td>Erro ao gerar boleto</td>
                            <td><span class="badge bg-warning text-dark">Aberto</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-info rounded-pill me-1"
                                    title="Visualizar Chamado">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"
                                    title="Editar Chamado">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CHAMADOS RESOLVIDOS -->
    <div class="card">
        <div class="card-header" id="headingResolvidos">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseResolvidos" aria-expanded="false" aria-controls="collapseResolvidos">
                    <div class="accordion-icon"><i class="bi bi-check-circle me-2"></i> Chamados Resolvidos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseResolvidos" class="collapse" aria-labelledby="headingResolvidos"
            data-bs-parent="#accordionSuporte">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Chamados Finalizados</h6>
                <table class="table table-bordered text-center rounded-3 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Eduardo Lima</td>
                            <td>15/08/2025</td>
                            <td>Problema no login de professores</td>
                            <td><span class="badge bg-success">Resolvido</span></td>
                        </tr>
                        <tr>
                            <td>Xavier</td>
                            <td>12/08/2025</td>
                            <td>Erro ao gerar declaração</td>
                            <td><span class="badge bg-success">Resolvido</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
