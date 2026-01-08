<!-- SUPORTE TÉCNICO -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <!-- Ícone atualizado para headset/usuário de suporte -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-headphones">
            <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
            <path d="M21 18a3 3 0 0 1-6 0v-6a3 3 0 0 1 6 0v6z"></path>
            <path d="M3 18a3 3 0 0 0 6 0v-6a3 3 0 0 0-6 0v6z"></path>
        </svg>
        <i class="bi bi-headset me-2 fs-5"></i>
        <strong class="me-1">Área de Suporte Técnico:</strong> Acompanhe e gerencie chamados técnicos.
    </div>
</div>


<div id="accordionSuporte" class="accordion-icons accordion">

    <!-- CHAMADOS ABERTOS -->
    <div class="card">
        <div class="card-header" id="headingAbertos">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseAbertos" aria-expanded="true" aria-controls="collapseAbertos">
                    <div class="accordion-icon"><i class="bi bi-exclamation-circle me-2"></i> Chamados Abertos</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseAbertos" class="collapse show" aria-labelledby="headingAbertos"
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

    <!-- NOVO CHAMADO -->
    <div class="card">
        <div class="card-header" id="headingNovoChamado">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseNovoChamado" aria-expanded="false" aria-controls="collapseNovoChamado">
                    <div class="accordion-icon"><i class="bi bi-plus-circle me-2"></i> Abrir Novo Chamado</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseNovoChamado" class="collapse" aria-labelledby="headingNovoChamado"
            data-bs-parent="#accordionSuporte">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição do Problema</label>
                        <textarea class="form-control" id="descricao" name="description" rows="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                            <i class="bi bi-plus-circle me-1"></i> Abrir Chamado
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
