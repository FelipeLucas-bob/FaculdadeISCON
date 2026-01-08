<!-- BIBLIOTECA -->
<div class="col-12 mt-4">
    <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-book">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
            <path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20V20H6.5A2.5 2.5 0 0 1 4 17.5V4.5Z"></path>
        </svg>

        <i class="bi bi-book-half me-2 fs-5"></i>
        <strong class="me-1">Área da Biblioteca:</strong> Acompanhe empréstimos, devoluções e acervo disponível.
    </div>
</div>


<div id="accordionBiblioteca" class="accordion-icons accordion">



    <!-- INFORMAÇÕES GERAIS -->
    <div class="card">
        <div class="card-header" id="headingInformacoes">
            <section class="mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseInformacoes" aria-expanded="true" aria-controls="collapseInformacoes">
                    <div class="accordion-icon"><i class="bi bi-info-circle me-2"></i> Informações Gerais</div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseInformacoes" class="collapse show" aria-labelledby="headingInformacoes"
            data-bs-parent="#accordionBiblioteca">
            <div class="card-body">

                <!-- Indicadores com cores nas fontes -->
                <div class="row text-center mb-2">
                    <div class="col">
                        <i class="bi bi-book-half fs-4 d-block"></i>
                        <h5 class="text-primary">Livros</h5>
                        <div class="fw-bold fs-5 text-primary">{{ $booksQtd }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-journal fs-4 d-block"></i>
                        <h5 class="text-primary">Exemplares</h5>
                        <div class="fw-bold fs-5 text-info">{{ $booksItemsQtd }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-journal-check fs-4 d-block"></i>
                        <h5 class="text-primary">Empréstimos</h5>
                        <div class="fw-bold fs-5 text-warning">{{ $loansQtd }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-box-arrow-in-right fs-4 d-block"></i>
                        <h5 class="text-primary">Empréstimos Hoje</h5>
                        <div class="fw-bold fs-5 text-warning">{{ $loansQtdToday }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-arrow-return-left fs-4 d-block"></i>
                        <h5 class="text-primary">Devoluções Hoje</h5>
                        <div class="fw-bold fs-5 text-success">{{ $returnsQtdToday }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- EMPRÉSTIMOS REALIZADOS HOJE -->
    <div class="card">
        <div class="card-header" id="headingEmprestimosHoje">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseEmprestimosHoje" aria-expanded="false"
                    aria-controls="collapseEmprestimosHoje">
                    <div class="accordion-icon"><i class="bi bi-journal-plus me-2"></i> Empréstimos Realizados Hoje
                    </div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseEmprestimosHoje" class="collapse" aria-labelledby="headingEmprestimosHoje"
            data-bs-parent="#accordionBiblioteca">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Empréstimos de {{ date('d/m/Y') }}</h6>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Aluno</th>
                                <th scope="col">Livro</th>
                                <th scope="col">Responsável</th>
                                <th class="text-center" scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loansToday as $loan)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="avatar me-2">
                                                @php
                                                    $user = \App\Models\User::find($loan->student_user_id);
                                                    $avatar = $user?->currentAvatar()->first();
                                                    $avatarSrc = $avatar
                                                        ? asset('storage/' . $avatar->path)
                                                        : Vite::asset('resources/images/users/user-icon.png');
                                                @endphp
                                                <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle"
                                                    width="50" height="50" style="object-fit: cover;">
                                            </div>

                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0 text-primary">{{ $loan->student_name }}</h6>
                                                <span class="text-info">
                                                    {{ $loan->cpf ? vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split(preg_replace('/\D/', '', $loan->cpf))) : '' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-primary">{{ $loan->title }}</h6>
                                        <span class="text-info">{{ $loan->publisher_name }}</span>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-primary">{{ $loan->author_name }}</h6>
                                        <span class="text-info">{{ $loan->author_email }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2"
                                                data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DEVOLUÇÕES REALIZADAS HOJE -->
    <div class="card">
        <div class="card-header" id="headingEmprestimosHoje">
            <section class="mb-0 mt-0">
                <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#collapseDevolucoesHoje" aria-expanded="false"
                    aria-controls="collapseDevolucoesHoje">
                    <div class="accordion-icon"><i class="bi bi-journal-plus me-2"></i> Devoluções Realizadas Hoje
                    </div>
                    <div class="icons"><i class="bi bi-chevron-down"></i></div>
                </div>
            </section>
        </div>
        <div id="collapseDevolucoesHoje" class="collapse" aria-labelledby="headingEmprestimosHoje"
            data-bs-parent="#accordionBiblioteca">
            <div class="card-body">
                <h6 class="fw-bold text-primary mb-3">Devoluções de {{ date('d/m/Y') }}</h6>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Aluno</th>
                                <th scope="col">Livro</th>
                                <th scope="col">Responsável</th>
                                <th class="text-center" scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($returnsToday as $return)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="avatar me-2">
                                                @php
                                                    $user = \App\Models\User::find($return->student_user_id);
                                                    $avatar = $user?->currentAvatar()->first();
                                                    $avatarSrc = $avatar
                                                        ? asset('storage/' . $avatar->path)
                                                        : Vite::asset('resources/images/users/user-icon.png');
                                                @endphp
                                                <img src="{{ $avatarSrc }}" alt="avatar" class="rounded-circle"
                                                    width="50" height="50" style="object-fit: cover;">
                                            </div>
                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0 text-primary">{{ $return->student_name }}</h6>
                                                <span class="text-info">
                                                    {{ $return->cpf ? vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split(preg_replace('/\D/', '', $return->cpf))) : '' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-primary">{{ $return->title }}</h6>
                                        <span class="text-info">{{ $return->publisher_name }}</span>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-primary">{{ $return->author_name }}</h6>
                                        <span class="text-info">{{ $return->author_email }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2"
                                                data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
