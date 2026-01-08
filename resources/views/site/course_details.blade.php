<main class="main">

  <!-- Título da Página -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Detalhes do Curso</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('site.index') }}">ISCON</a></li>
          <li class="current">Detalhes do Curso</li>
        </ol>
      </nav>
    </div>
  </div><!-- Fim Título da Página -->

  <!-- Seção Detalhes do Curso -->
  <section id="course-details" class="course-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

<div class="row">
  <div class="col-lg-8">

    <!-- Destaque do Curso -->
    <div class="course-hero" data-aos="fade-up" data-aos-delay="200">
      <div class="hero-content">
        <div class="course-badge">
          <span class="category">Direito</span>
          <span class="level">Avançado</span>
        </div>
        <h1>Domínio Completo em Direito Civil e Penal</h1>
        <p class="course-subtitle">Aprenda todos os fundamentos do Direito, desde legislação civil até penal, com casos práticos e exemplos reais.</p>

        <div class="instructor-card">
          <img src="assets/img/person/person-m-10.webp" alt="Instrutor" class="instructor-image">
          <div class="instructor-details">
            <h5>Prof. Alberto Barreto Martins</h5>
            <span>Advogado e Professor de Direito</span>
            <div class="instructor-rating">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
              <span>4.9 (1.032 avaliações)</span>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-image">
        <img src="assets/img/education/courses-8.webp" alt="Preview do Curso" class="img-fluid">
        <div class="play-overlay">
          <button class="play-btn">
            <i class="bi bi-play-fill"></i>
          </button>
          <span>Assistir Prévia</span>
        </div>
      </div>
    </div><!-- Fim Destaque do Curso -->

    <!-- Abas de Navegação do Curso -->
    <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">
      <ul class="nav nav-tabs" id="course-detailsCourseTab" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="course-detailsoverview-tab" data-bs-toggle="tab" data-bs-target="#course-detailsoverview" type="button" role="tab">
            <i class="bi bi-layout-text-window-reverse"></i>
            Visão Geral
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="course-detailscurriculum-tab" data-bs-toggle="tab" data-bs-target="#course-detailscurriculum" type="button" role="tab">
            <i class="bi bi-list-ul"></i>
            Conteúdo
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="course-detailsreviews-tab" data-bs-toggle="tab" data-bs-target="#course-detailsreviews" type="button" role="tab">
            <i class="bi bi-star"></i>
            Avaliações
          </button>
        </li>
      </ul>

      <div class="tab-content" id="course-detailsCourseTabContent">

        <!-- Aba Visão Geral -->
        <div class="tab-pane fade show active" id="course-detailsoverview" role="tabpanel">

          <div class="overview-section">
            <h3>Descrição do Curso</h3>
            <p>Este curso oferece uma visão completa do Direito, abordando legislação civil, penal e trabalhista, com estudo de casos reais.</p>
            <p>O aluno desenvolverá habilidades de análise jurídica, interpretação de leis e elaboração de peças processuais.</p>
          </div>

          <div class="skills-grid">
            <h3>Habilidades que Você Vai Desenvolver</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="skill-item">
                  <div class="skill-icon">
                    <i class="bi bi-book"></i>
                  </div>
                  <div class="skill-content">
                    <h5>Legislação Civil</h5>
                    <p>Contratos, Responsabilidade Civil e Direitos Reais</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="skill-item">
                  <div class="skill-icon">
                    <i class="bi bi-gavel"></i>
                  </div>
                  <div class="skill-content">
                    <h5>Direito Penal</h5>
                    <p>Crimes, Penas e Processos Penais</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="skill-item">
                  <div class="skill-icon">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="skill-content">
                    <h5>Direito Trabalhista</h5>
                    <p>Legislação trabalhista e práticas jurídicas</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="skill-item">
                  <div class="skill-icon">
                    <i class="bi bi-shield-check"></i>
                  </div>
                  <div class="skill-content">
                    <h5>Ética &amp; Prática Jurídica</h5>
                    <p>Ética profissional, análise de casos e simulações de julgamentos</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="requirements-section">
            <h3>Requisitos</h3>
            <ul class="requirements-list">
              <li><i class="bi bi-check2"></i>Interesse em Direito e Legislação</li>
              <li><i class="bi bi-check2"></i>Conhecimentos básicos de leitura e interpretação de textos</li>
              <li><i class="bi bi-check2"></i>Computador com acesso à internet</li>
              <li><i class="bi bi-check2"></i>Caneta e caderno para anotações</li>
            </ul>
          </div>

        </div><!-- Fim Aba Visão Geral -->

        <!-- Aba Conteúdo -->
        <div class="tab-pane fade" id="course-detailscurriculum" role="tabpanel">

          <div class="curriculum-overview">
            <div class="curriculum-stats">
              <div class="stat">
                <i class="bi bi-collection-play"></i>
                <span>10 Módulos</span>
              </div>
              <div class="stat">
                <i class="bi bi-play-circle"></i>
                <span>72 Aulas</span>
              </div>
              <div class="stat">
                <i class="bi bi-clock"></i>
                <span>38h 10m</span>
              </div>
            </div>
          </div>

          <div class="accordion" id="curriculumAccordion">

            <div class="accordion-item curriculum-module">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#module1">
                  <div class="module-info">
                    <span class="module-title">Introdução ao Direito Civil</span>
                    <span class="module-meta">6 aulas • 3h 20m</span>
                  </div>
                </button>
              </h2>
              <div id="module1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body">
                  <div class="lessons-list">
                    <div class="lesson">
                      <i class="bi bi-play-circle"></i>
                      <span class="lesson-title">Princípios e Fontes do Direito Civil</span>
                      <span class="lesson-time">25 min</span>
                    </div>
                    <div class="lesson">
                      <i class="bi bi-play-circle"></i>
                      <span class="lesson-title">Contratos e Obrigações</span>
                      <span class="lesson-time">40 min</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item curriculum-module">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                  <div class="module-info">
                    <span class="module-title">Direito Penal</span>
                    <span class="module-meta">8 aulas • 5h 15m</span>
                  </div>
                </button>
              </h2>
              <div id="module2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body">
                  <div class="lessons-list">
                    <div class="lesson">
                      <i class="bi bi-play-circle"></i>
                      <span class="lesson-title">Código Penal e Estrutura Criminal</span>
                      <span class="lesson-time">45 min</span>
                    </div>
                    <div class="lesson">
                      <i class="bi bi-file-earmark-text"></i>
                      <span class="lesson-title">Processos Penais e Julgamentos</span>
                      <span class="lesson-time">1h 10min</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item curriculum-module">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module3">
                  <div class="module-info">
                    <span class="module-title">Direito Trabalhista</span>
                    <span class="module-meta">6 aulas • 4h 20m</span>
                  </div>
                </button>
              </h2>
              <div id="module3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body">
                  <div class="lessons-list">
                    <div class="lesson">
                      <i class="bi bi-play-circle"></i>
                      <span class="lesson-title">Leis Trabalhistas e Direitos do Trabalhador</span>
                      <span class="lesson-time">35 min</span>
                    </div>
                    <div class="lesson">
                      <i class="bi bi-file-earmark-text"></i>
                      <span class="lesson-title">Contratos e Obrigações Trabalhistas</span>
                      <span class="lesson-time">50 min</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div><!-- Fim Aba Conteúdo -->

        <!-- Aba Avaliações -->
        <div class="tab-pane fade" id="course-detailsreviews" role="tabpanel">

          <div class="reviews-summary">
            <div class="rating-overview">
              <div class="overall-rating">
                <div class="rating-number">4.9</div>
                <div class="rating-stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
                <div class="rating-text">1.032 avaliações</div>
              </div>
            </div>
          </div>

          <div class="reviews-list">
            <div class="review-item">
              <div class="reviewer-info">
                <img src="assets/img/person/person-f-10.webp" alt="Avaliadora" class="reviewer-avatar">
                <div class="reviewer-details">
                  <h6>Laura Mendes</h6>
                  <div class="review-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <span class="review-date">Há 1 semana</span>
              </div>
              <p class="review-text">Conteúdo extremamente detalhado e instrutor muito didático. Excelente para quem deseja aprofundar no Direito.</p>
            </div>

            <div class="review-item">
              <div class="reviewer-info">
                <img src="assets/img/person/person-m-12.webp" alt="Avaliador" class="reviewer-avatar">
                <div class="reviewer-details">
                  <h6>Fernando Souza</h6>
                  <div class="review-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                  </div>
                </div>
                <span class="review-date">Há 3 semanas</span>
              </div>
              <p class="review-text">Curso completo, com exercícios práticos que ajudam a fixar o conteúdo jurídico.</p>
            </div>

          </div>

        </div><!-- Fim Aba Avaliações -->

      </div>
    </div><!-- Fim Abas de Navegação -->

  </div>

  <div class="col-lg-4">

    <!-- Cartão de Matrícula -->
    <div class="enrollment-card" data-aos="fade-up" data-aos-delay="200">

      <div class="card-header">
        <div class="price-display">
          <span class="current-price">R$ 699</span>
          <span class="original-price">R$ 1.199</span>
          <span class="discount">42% OFF</span>
        </div>
        <div class="enrollment-count">
          <i class="bi bi-people"></i>
          <span>2.984 alunos matriculados</span>
        </div>
      </div>

      <div class="card-body">
        <div class="course-highlights">
          <div class="highlight-item">
            <i class="bi bi-trophy"></i>
            <span>Certificado incluído</span>
          </div>
          <div class="highlight-item">
            <i class="bi bi-clock-history"></i>
            <span>38 horas de conteúdo</span>
          </div>
          <div class="highlight-item">
            <i class="bi bi-download"></i>
            <span>Recursos para download</span>
          </div>
          <div class="highlight-item">
            <i class="bi bi-infinity"></i>
            <span>Acesso vitalício</span>
          </div>
          <div class="highlight-item">
            <i class="bi bi-phone"></i>
            <span>Acesso pelo celular</span>
          </div>
        </div>

        <div class="action-buttons">
          <button class="btn-primary">Inscreva-se Agora</button>
          <button class="btn-secondary">Adicionar à Lista de Desejos</button>
        </div>

        <div class="guarantee">
          <i class="bi bi-shield-check"></i>
          <span>Garantia de reembolso de 30 dias</span>
        </div>
      </div>

    </div><!-- Fim Cartão de Matrícula -->

    <!-- Detalhes do Curso -->
    <div class="course-details-card" data-aos="fade-up" data-aos-delay="300">
      <h4>Detalhes do Curso</h4>

      <div class="detail-grid">
        <div class="detail-row">
          <span class="detail-label">Duração</span>
          <span class="detail-value">16 semanas</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Nível</span>
          <span class="detail-value">Avançado</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Idioma</span>
          <span class="detail-value">Português</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Quizzes</span>
          <span class="detail-value">20</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Trabalhos</span>
          <span class="detail-value">8 projetos</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Atualizado</span>
          <span class="detail-value">Julho 2025</span>
        </div>
      </div>
    </div><!-- Fim Detalhes do Curso -->

    <!-- Compartilhar Curso -->
    <div class="share-course-card" data-aos="fade-up" data-aos-delay="400">
      <h4>Compartilhe este Curso</h4>
      <div class="social-links">
        <a href="#" class="social-link facebook" aria-label="Facebook">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="#" class="social-link twitter" aria-label="Twitter">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="#" class="social-link linkedin" aria-label="LinkedIn">
          <i class="bi bi-linkedin"></i>
        </a>
        <a href="#" class="social-link email" aria-label="Email">
          <i class="bi bi-envelope"></i>
        </a>
      </div>
    </div><!-- Fim Compartilhar Curso -->

  </div>

</div>


    </div>

  </section><!-- /Seção Detalhes do Curso -->

</main>
