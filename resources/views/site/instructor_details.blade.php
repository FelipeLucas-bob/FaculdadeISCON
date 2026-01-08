<main class="main">

  <!-- Título da Página -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Perfil do Instrutor</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('site.index') }}">ISCON</a></li>
          <li class="current">Perfil do Instrutor</li>
        </ol>
      </nav>
    </div>
  </div><!-- Fim do Título da Página -->

  <!-- Seção Perfil do Instrutor -->
  <section id="instructor-profile" class="instructor-profile section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row">

    <div class="col-lg-12">
      <div class="instructor-hero-banner" data-aos="zoom-out" data-aos-delay="200">
        <div class="hero-background">
          <img src="assets/img/education/showcase-4.webp" alt="Background" class="img-fluid">
          <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
          <div class="instructor-avatar">
            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Instrutora" class="img-fluid">
            <div class="status-badge">
              <i class="bi bi-patch-check-fill"></i>
              <span>Verificada</span>
            </div>
          </div>
          <div class="instructor-info">
            <h2>Profª Alberlucia</h2>
            <p class="title">Especialista em Radiologia, Enfermagem &amp; Biomedicina</p>
            <div class="credentials">
              <span class="credential">Mestrado em Saúde</span>
              <span class="credential">Mais de 12 anos de experiência</span>
              <span class="credential">12.500 Estudantes</span>
            </div>
            <div class="rating-overview">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <span class="rating-text">Avaliação 4.8 de 2.900 avaliações</span>
            </div>
            <div class="contact-actions">
              <a href="#" class="btn-contact">
                <i class="bi bi-envelope"></i>
                Contatar Instrutora
              </a>
              <div class="social-media">
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row gy-5 mt-4">

    <div class="col-lg-8">
      <div class="content-tabs" data-aos="fade-right" data-aos-delay="300">

        <ul class="nav nav-tabs custom-tabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#instructor-profile-about" type="button" role="tab">
              <i class="bi bi-person"></i>
              Sobre
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#instructor-profile-experience" type="button" role="tab">
              <i class="bi bi-briefcase"></i>
              Experiência
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#instructor-profile-courses" type="button" role="tab">
              <i class="bi bi-book"></i>
              Cursos
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#instructor-profile-reviews" type="button" role="tab">
              <i class="bi bi-star"></i>
              Avaliações
            </button>
          </li>
        </ul>

        <div class="tab-content custom-tab-content">

          <div class="tab-pane fade show active" id="instructor-profile-about" role="tabpanel">
            <div class="about-content">
              <div class="bio-section">
                <h4>Biografia Profissional</h4>
                <p>A Profª Alberlucia possui mais de 12 anos de experiência no ensino e prática de Radiologia, Enfermagem e Biomedicina. É apaixonada por formar profissionais qualificados para atuar na saúde com excelência e ética.</p>
                <p>Atua em hospitais de referência e laboratórios clínicos, trazendo experiências reais para suas aulas e projetos, garantindo aprendizado aplicado e efetivo para seus alunos.</p>
              </div>

              <div class="expertise-grid">
                <h4>Expertise Principal</h4>
                <div class="skills-grid">
                  <div class="skill-item">
                    <i class="bi bi-heart-pulse"></i>
                    <span>Radiologia Clínica</span>
                  </div>
                  <div class="skill-item">
                    <i class="bi bi-hospital"></i>
                    <span>Enfermagem Hospitalar</span>
                  </div>
                  <div class="skill-item">
                    <i class="bi bi-flask"></i>
                    <span>Biomedicina Laboratorial</span>
                  </div>
                  <div class="skill-item">
                    <i class="bi bi-activity"></i>
                    <span>Cuidados Intensivos</span>
                  </div>
                  <div class="skill-item">
                    <i class="bi bi-clipboard-check"></i>
                    <span>Gestão em Saúde</span>
                  </div>
                  <div class="skill-item">
                    <i class="bi bi-people"></i>
                    <span>Educação em Saúde</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="instructor-profile-experience" role="tabpanel">
            <div class="experience-grid">
              <div class="experience-card">
                <div class="timeline-marker">2021</div>
                <div class="experience-details">
                  <h5>Coordenadora de Enfermagem</h5>
                  <p class="institution">Hospital Santa Clara</p>
                  <p>Supervisão de equipes e implementação de protocolos hospitalares para garantir qualidade e segurança no atendimento.</p>
                </div>
              </div>

              <div class="experience-card">
                <div class="timeline-marker">2017</div>
                <div class="experience-details">
                  <h5>Pesquisadora em Radiologia</h5>
                  <p class="institution">Instituto de Saúde Avançada</p>
                  <p>Desenvolvimento de pesquisas clínicas e estudos de imagem médica, contribuindo para avanços em diagnósticos radiológicos.</p>
                </div>
              </div>

              <div class="experience-card">
                <div class="timeline-marker">2012</div>
                <div class="experience-details">
                  <h5>Docente de Biomedicina</h5>
                  <p class="institution">Universidade Federal de Saúde</p>
                  <p>Ministração de disciplinas práticas e teóricas em Biomedicina, formando profissionais qualificados para laboratórios clínicos e hospitalares.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="instructor-profile-courses" role="tabpanel">
            <div class="courses-grid">
              <div class="course-item">
                <div class="course-thumb">
                  <img src="assets/img/education/courses-5.webp" alt="Curso" class="img-fluid">
                  <div class="course-level">Avançado</div>
                </div>
                <div class="course-info">
                  <h5>Radiologia Avançada e Diagnósticos</h5>
                  <div class="course-stats">
                    <span><i class="bi bi-people"></i> 3.200 inscritos</span>
                    <span><i class="bi bi-star-fill"></i> 4.9</span>
                  </div>
                  <p class="price">R$ 299</p>
                </div>
              </div>

              <div class="course-item">
                <div class="course-thumb">
                  <img src="assets/img/education/courses-9.webp" alt="Curso" class="img-fluid">
                  <div class="course-level">Intermediário</div>
                </div>
                <div class="course-info">
                  <h5>Enfermagem Hospitalar e Cuidados Intensivos</h5>
                  <div class="course-stats">
                    <span><i class="bi bi-people"></i> 4.100 inscritos</span>
                    <span><i class="bi bi-star-fill"></i> 4.8</span>
                  </div>
                  <p class="price">R$ 249</p>
                </div>
              </div>

              <div class="course-item">
                <div class="course-thumb">
                  <img src="assets/img/education/courses-12.webp" alt="Curso" class="img-fluid">
                  <div class="course-level">Iniciante</div>
                </div>
                <div class="course-info">
                  <h5>Fundamentos de Biomedicina</h5>
                  <div class="course-stats">
                    <span><i class="bi bi-people"></i> 5.500 inscritos</span>
                    <span><i class="bi bi-star-fill"></i> 4.7</span>
                  </div>
                  <p class="price">R$ 199</p>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="instructor-profile-reviews" role="tabpanel">
            <div class="reviews-container">
              <div class="review-card">
                <div class="review-header">
                  <img src="assets/img/person/person-f-12.webp" alt="Aluno" class="reviewer-avatar">
                  <div class="reviewer-info">
                    <h6>Camila Santos</h6>
                    <p>Enfermeira no Hospital São Lucas</p>
                    <div class="review-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>"A Profª Alberlucia trouxe uma abordagem prática incrível e muito aprendizado aplicado para minha rotina no hospital."</p>
              </div>

              <div class="review-card">
                <div class="review-header">
                  <img src="assets/img/person/person-m-8.webp" alt="Aluno" class="reviewer-avatar">
                  <div class="reviewer-info">
                    <h6>Lucas Ferreira</h6>
                    <p>Biomédico em Laboratório Clínico</p>
                    <div class="review-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>"Excelente instrutora! Os cursos de Radiologia e Biomedicina realmente fizeram diferença na minha carreira."</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="sidebar-widgets" data-aos="fade-left" data-aos-delay="300">

        <div class="stats-widget">
          <h4>Impacto no Ensino</h4>
          <div class="stats-grid">
            <div class="stat-box">
              <div class="stat-icon">
                <i class="bi bi-people"></i>
              </div>
              <div class="stat-content">
                <h5>12.500</h5>
                <p>Total de Estudantes</p>
              </div>
            </div>
            <div class="stat-box">
              <div class="stat-icon">
                <i class="bi bi-book"></i>
              </div>
              <div class="stat-content">
                <h5>15</h5>
                <p>Cursos Ativos</p>
              </div>
            </div>
            <div class="stat-box">
              <div class="stat-icon">
                <i class="bi bi-award"></i>
              </div>
              <div class="stat-content">
                <h5>92%</h5>
                <p>Taxa de Conclusão</p>
              </div>
            </div>
            <div class="stat-box">
              <div class="stat-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div class="stat-content">
                <h5>Mais de 12</h5>
                <p>Anos de Ensino</p>
              </div>
            </div>
          </div>
        </div>

        <div class="achievements-widget">
          <h4>Reconhecimentos &amp; Prêmios</h4>
          <div class="achievement-list">
            <div class="achievement-item">
              <i class="bi bi-trophy"></i>
              <div class="achievement-text">
                <h6>Prêmio Excelência em Educação em Saúde</h6>
                <p>Associação Brasileira de Saúde • 2022</p>
              </div>
            </div>
            <div class="achievement-item">
              <i class="bi bi-patch-check"></i>
              <div class="achievement-text">
                <h6>Bolsa de Pesquisa em Radiologia</h6>
                <p>Fundação Nacional de Ciência • 2021</p>
              </div>
            </div>
            <div class="achievement-item">
              <i class="bi bi-mortarboard"></i>
              <div class="achievement-text">
                <h6>Reconhecimento Educadora Destaque</h6>
                <p>Sociedade Brasileira de Biomedicina • 2020</p>
              </div>
            </div>
          </div>
        </div>

        <div class="contact-widget">
          <h4>Fale Conosco</h4>
          <div class="contact-info">
            <div class="contact-item">
              <i class="bi bi-envelope"></i>
              <span>alberlucia@university.edu</span>
            </div>
            <div class="contact-item">
              <i class="bi bi-telephone"></i>
              <span>+1 (555) 789-0123</span>
            </div>
            <div class="contact-item">
              <i class="bi bi-geo-alt"></i>
              <span>Sala 304, Prédio de Ciências da Saúde</span>
            </div>
          </div>
          <div class="office-hours">
            <h6>Horário de Atendimento</h6>
            <p>Terça &amp; Quinta<br>14:00 - 16:00</p>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>


  </section><!-- /Seção Perfil do Instrutor -->

</main>
