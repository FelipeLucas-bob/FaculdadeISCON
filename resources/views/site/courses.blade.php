<main class="main">

    <!-- Título da Página -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Cursos</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('site.index') }}">ISCON</a></li>
                    <li class="current">Cursos</li>
                </ol>
            </nav>
        </div>
    </div><!-- Fim Título da Página -->

    <!-- Seção Cursos -->
    <section id="courses-2" class="courses-2 section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <!-- Filtros -->
                <div class="col-lg-3">
                    <div class="course-filters" data-aos="fade-right" data-aos-delay="100">
                        <h4 class="filter-title">Filtrar Cursos</h4>

<div class="filter-group">
    <h5>Categoria</h5>
    <div class="filter-options">
        <label class="filter-checkbox">
            <input type="checkbox" checked="">
            <span class="checkmark"></span>
            Todos os Cursos
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Biomedicina
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Direito
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Enfermagem
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Fisioterapia
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Gestão em RH
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Psicologia
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Radiologia
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Teologia
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Educação Física
        </label>
    </div>
</div>

<div class="filter-group">
    <h5>Nível</h5>
    <div class="filter-options">
        <label class="filter-checkbox">
            <input type="checkbox" checked="">
            <span class="checkmark"></span>
            Todos os Níveis
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Tecnológico
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Graduação
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Pós-Graduação
        </label>
    </div>
</div>

<div class="filter-group">
    <h5>Turno</h5>
    <div class="filter-options">
        <label class="filter-checkbox">
            <input type="checkbox" checked="">
            <span class="checkmark"></span>
            Todos os Turnos
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Matutino
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Vespertino
        </label>
        <label class="filter-checkbox">
            <input type="checkbox">
            <span class="checkmark"></span>
            Noturno
        </label>
    </div>
</div>

                    </div><!-- Fim Filtros -->
                </div>

                <!-- Resultados dos Cursos -->
                <div class="col-lg-9">
                    <div class="courses-header" data-aos="fade-left" data-aos-delay="100">
                        <div class="search-box">
                            <i class="bi bi-search"></i>
                            <input type="text" placeholder="Buscar cursos...">
                        </div>
                        <div class="sort-dropdown">
                            <select>
                                <option>Ordenar por: Mais populares</option>
                                <option>Mais recentes</option>
                                <option>Preço: menor para maior</option>
                                <option>Preço: maior para menor</option>
                                <option>Duração: curta para longa</option>
                            </select>
                        </div>
                    </div>

                    <!-- Lista de Cursos -->
                    <div class="courses-grid" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">

                            <!-- Biomedicina -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/biomedicina.png" alt="Biomedicina"
                                            class="img-fluid">
                                        <div class="course-badge">Saúde</div>
                                        <div class="course-price">R$ 1.441,48</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Biomedicina</h3>
                                        <p>Formação completa para atuação em análises clínicas, pesquisas e áreas
                                            laboratoriais da saúde.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>4 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>1.200 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Direito -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/direito.png" alt="Direito"
                                            class="img-fluid">
                                        <div class="course-badge">Humanas</div>
                                        <div class="course-price">R$ 1.725,85</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Direito</h3>
                                        <p>Preparação sólida para atuação como advogado, promotor, juiz ou em carreiras
                                            jurídicas públicas.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>5 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>2.100 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Enfermagem -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/enfermagem.png" alt="Enfermagem"
                                            class="img-fluid">
                                        <div class="course-badge">Saúde</div>
                                        <div class="course-price">R$ 1.197,39</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Enfermagem</h3>
                                        <p>Capacitação profissional para cuidar da saúde humana em hospitais, clínicas e
                                            unidades de saúde.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>4 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>1.800 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Fisioterapia -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/fisioterapia.png" alt="Fisioterapia"
                                            class="img-fluid">
                                        <div class="course-badge">Saúde</div>
                                        <div class="course-price">R$ 1.600,22</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Fisioterapia</h3>
                                        <p>Aprenda técnicas de reabilitação, prevenção e promoção da saúde com prática
                                            clínica intensiva.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>5 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>1.300 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Gestão em RH -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/gestao-rh.png" alt="Gestão em RH"
                                            class="img-fluid">
                                        <div class="course-badge">Gestão</div>
                                        <div class="course-price">R$ 651,87</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Tecnólogo</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Gestão em Recursos Humanos</h3>
                                        <p>Desenvolva habilidades para gerenciar pessoas e processos organizacionais de
                                            forma estratégica.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>2 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>900 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Psicologia -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/psicologia.png" alt="Psicologia"
                                            class="img-fluid">
                                        <div class="course-badge">Saúde Mental</div>
                                        <div class="course-price">R$ 1.553,90</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Psicologia</h3>
                                        <p>Aprenda fundamentos teóricos e práticos para atuar na promoção da saúde
                                            mental e bem-estar social.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>5 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>2.000 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Radiologia -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/radiologia.png" alt="Radiologia"
                                            class="img-fluid">
                                        <div class="course-badge">Tecnologia em Saúde</div>
                                        <div class="course-price">R$ 969,86</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Tecnólogo</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Radiologia</h3>
                                        <p>Capacitação em exames de imagem, radioterapia e diagnóstico por imagem com
                                            tecnologia avançada.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>3 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>1.100 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Teologia -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/teologia.png" alt="Teologia"
                                            class="img-fluid">
                                        <div class="course-badge">Humanas</div>
                                        <div class="course-price">R$ 744,99</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Teologia</h3>
                                        <p>Estudo das tradições religiosas, filosofia e prática teológica para atuação
                                            acadêmica e ministerial.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>4 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>800 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Educação Física -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="course-card">
                                    <div class="course-image">
                                        <img src="assets/img/education/courses/educacao-fisica.png"
                                            alt="Educação Física" class="img-fluid">
                                        <div class="course-badge">Saúde e Esporte</div>
                                        <div class="course-price">R$ 1.685,85</div>
                                    </div>
                                    <div class="course-content">
                                        <div class="course-meta">
                                            <span class="category">Graduação</span>
                                            <span class="level">Presencial</span>
                                        </div>
                                        <h3>Curso de Educação Física</h3>
                                        <p>Formação voltada para a promoção da saúde e prática esportiva em academias,
                                            escolas e clubes.</p>
                                        <div class="course-stats">
                                            <div class="stat"><i class="bi bi-clock"></i><span>4 anos</span></div>
                                            <div class="stat"><i class="bi bi-people"></i><span>1.500 alunos</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('site.course.details') }}"
                                            class="btn-course">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- Fim Lista de Cursos -->

                    <!-- Paginação -->
                    <div class="pagination-wrapper" data-aos="fade-up" data-aos-delay="300">
                        <nav aria-label="Paginação dos cursos">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- Fim Paginação -->

                </div>
            </div>
        </div>
    </section><!-- /Seção Cursos -->

</main>
