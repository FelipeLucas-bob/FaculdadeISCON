  <main class="main">

<!-- Courses Hero Section -->
<section id="courses-hero" class="courses-hero section light-background">

  <div class="hero-content">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="hero-text">
            <h1>Construa Seu Futuro na Faculdade ISCON</h1>
            <p>Oferecemos cursos de graduação presenciais de alta qualidade,<br/> com corpo docente experiente e infraestrutura completa <br/> para o seu aprendizado e crescimento profissional.</p>

            <div class="hero-stats">
              <div class="stat-item">
                <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="3000" data-purecounter-duration="2"></span>
                <span class="label">Alunos Matriculados</span>
              </div>
              <div class="stat-item">
                <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="2"></span>
                <span class="label">Cursos de Graduação</span>
              </div>
              <div class="stat-item">
                <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2"></span>
                <span class="label">Taxa de Sucesso %</span>
              </div>
            </div>

            <div class="hero-buttons">
              <a href="{{ route('site.enroll') }}" class="btn btn-primary">Inscreva-se Agora</a>
              <a href="{{ route('site.courses') }}" class="btn btn-outline">Conheça Nossos Cursos</a>
            </div>

            <div class="hero-features">
              <div class="feature">
                <i class="bi bi-award"></i>
                <span>Certificação Reconhecida</span>
              </div>
              <div class="feature">
                <i class="bi bi-building"></i>
                <span>Infraestrutura Completa</span>
              </div>
              <div class="feature">
                <i class="bi bi-people"></i>
                <span>Professores Qualificados</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="hero-image">
            <div class="main-image">
              <img src="assets/img/bg/iscon.png" alt="Faculdade ISCON Campus" class="img-fluid">
            </div>

            <div class="floating-cards">
              <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-icon">
                  <i class="bi bi-briefcase"></i>
                </div>
                <div class="card-content">
                  <h6>Direito</h6>
                  <span>1,200 Alunos</span>
                </div>
              </div>

              <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-icon">
                  <i class="bi bi-hospital"></i>
                </div>
                <div class="card-content">
                  <h6>Enfermagem</h6>
                  <span>980 Alunos</span>
                </div>
              </div>

              <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                <div class="card-icon">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div class="card-content">
                  <h6>Psicologia</h6>
                  <span>1,350 Alunos</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="hero-background">
    <div class="bg-shapes">
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
    </div>
  </div>

</section><!-- /Courses Hero Section -->

<!-- Featured Courses Section -->
<section id="featured-courses" class="featured-courses section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Cursos em Destaque</h2>
    <p>Conheça alguns dos nossos principais cursos de graduação presenciais.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="course-card">
          <div class="course-image">
            <img src="assets/img/education/students-9.webp" alt="Curso de Administração" class="img-fluid">
            <div class="badge featured">Destaque</div>
            <div class="price-badge">R$ 1.200 / semestre</div>
          </div>
          <div class="course-content">
            <div class="course-meta">
              <span class="level">Bacharelado</span>
              <span class="duration">8 Semestres</span>
            </div>
            <h3><a href="#">Administração</a></h3>
            <p>Formação completa para atuar em gestão, liderança e empreendedorismo nas mais diversas áreas.</p>
            <div class="instructor">
              <img src="assets/img/person/professor-f-1.webp" alt="Professora" class="instructor-img">
              <div class="instructor-info">
                <h6>Profª. Ana Silva</h6>
                <span>Coordenadora do Curso</span>
              </div>
            </div>
            <a href="{{ route('site.enroll') }}" class="btn-course">Inscreva-se</a>
          </div>
        </div>
      </div><!-- End Course Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="course-card">
          <div class="course-image">
            <img src="assets/img/education/campus-4.webp" alt="Curso de Ciências Contábeis" class="img-fluid">
            <div class="badge new">Novo</div>
            <div class="price-badge">R$ 1.100 / semestre</div>
          </div>
          <div class="course-content">
            <div class="course-meta">
              <span class="level">Bacharelado</span>
              <span class="duration">8 Semestres</span>
            </div>
            <h3><a href="#">Ciências Contábeis</a></h3>
            <p>Prepare-se para atuar em auditoria, controle financeiro e gestão contábil com uma formação sólida.</p>
            <div class="instructor">
              <img src="assets/img/person/professor-m-2.webp" alt="Professor" class="instructor-img">
              <div class="instructor-info">
                <h6>Prof. Carlos Mendes</h6>
                <span>Coordenador do Curso</span>
              </div>
            </div>
            <a href="{{ route('site.enroll') }}" class="btn-course">Inscreva-se</a>
          </div>
        </div>
      </div><!-- End Course Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="course-card">
          <div class="course-image">
            <img src="assets/img/education/students-7.webp" alt="Curso de Direito" class="img-fluid">
            <div class="badge certificate">Reconhecido</div>
            <div class="price-badge">R$ 1.300 / semestre</div>
          </div>
          <div class="course-content">
            <div class="course-meta">
              <span class="level">Bacharelado</span>
              <span class="duration">10 Semestres</span>
            </div>
            <h3><a href="#">Direito</a></h3>
            <p>Formação para profissionais que atuarão no campo jurídico com excelência e ética.</p>
            <div class="instructor">
              <img src="assets/img/person/professor-m-3.webp" alt="Professor" class="instructor-img">
              <div class="instructor-info">
                <h6>Prof. Marcos Lima</h6>
                <span>Coordenador do Curso</span>
              </div>
            </div>
            <a href="{{ route('site.enroll') }}" class="btn-course">Inscreva-se</a>
          </div>
        </div>
      </div><!-- End Course Item -->

    </div>

    <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
      <a href="{{ route('site.courses') }}" class="btn-more">Ver Todos os Cursos</a>
    </div>

  </div>

</section><!-- /Featured Courses Section -->

<!-- Course Categories Section -->
<section id="course-categories" class="course-categories section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Categorias de Cursos</h2>
    <p>Explore as áreas de graduação oferecidas pela Faculdade ISCON para transformar seu futuro.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4">

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
        <a href="courses.html" class="category-card category-tech">
          <div class="category-icon">
            <i class="bi bi-laptop"></i>
          </div>
          <h5>Ciência da Computação</h5>
          <span class="course-count">24 Cursos</span>
        </a>
      </div><!-- End Category Item -->

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
        <a href="courses.html" class="category-card category-business">
          <div class="category-icon">
            <i class="bi bi-briefcase"></i>
          </div>
          <h5>Administração</h5>
          <span class="course-count">18 Cursos</span>
        </a>
      </div><!-- End Category Item -->

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
        <a href="courses.html" class="category-card category-health">
          <div class="category-icon">
            <i class="bi bi-heart-pulse"></i>
          </div>
          <h5>Enfermagem</h5>
          <span class="course-count">12 Cursos</span>
        </a>
      </div><!-- End Category Item -->

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
        <a href="courses.html" class="category-card category-engineering">
          <div class="category-icon">
            <i class="bi bi-gear"></i>
          </div>
          <h5>Engenharia Civil</h5>
          <span class="course-count">22 Cursos</span>
        </a>
      </div><!-- End Category Item -->

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
        <a href="courses.html" class="category-card category-law">
          <div class="category-icon">
            <i class="bi bi-journal-text"></i>
          </div>
          <h5>Direito</h5>
          <span class="course-count">9 Cursos</span>
        </a>
      </div><!-- End Category Item -->

      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="350">
        <a href="courses.html" class="category-card category-communication">
          <div class="category-icon">
            <i class="bi bi-chat-dots"></i>
          </div>
          <h5>Comunicação Social</h5>
          <span class="course-count">15 Cursos</span>
        </a>
      </div><!-- End Category Item -->

    </div>

  </div>

</section><!-- /Course Categories Section -->

<!-- Featured Instructors Section -->
<section id="featured-instructors" class="featured-instructors section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Professores Destaque</h2>
    <p>Conheça alguns dos nossos professores especializados e experientes da Faculdade ISCON.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-2.webp" class="img-fluid" alt="Professora Sarah Johnson">
            <div class="overlay-content">
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                <span>4.8</span>
              </div>
              <div class="course-count">
                <i class="bi bi-play-circle"></i>
                <span>18 Disciplinas</span>
              </div>
            </div>
          </div>
          <div class="instructor-info">
            <h5>Sarah Johnson</h5>
            <p class="specialty">Ciência da Computação</p>
            <p class="description">Especialista em desenvolvimento de software e metodologias ágeis.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">2.1k</span>
                <span class="label">Alunos</span>
              </div>
              <div class="stat">
                <span class="number">4.8</span>
                <span class="label">Avaliação</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">Ver Perfil</a>
              <div class="social-links">
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-7.webp" class="img-fluid" alt="Professor Michael Chen">
            <div class="overlay-content">
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                <span>4.9</span>
              </div>
              <div class="course-count">
                <i class="bi bi-play-circle"></i>
                <span>24 Disciplinas</span>
              </div>
            </div>
          </div>
          <div class="instructor-info">
            <h5>Michael Chen</h5>
            <p class="specialty">Engenharia Civil</p>
            <p class="description">Experiência em projetos estruturais e gestão de obras civis.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">3.5k</span>
                <span class="label">Alunos</span>
              </div>
              <div class="stat">
                <span class="number">4.9</span>
                <span class="label">Avaliação</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">Ver Perfil</a>
              <div class="social-links">
                <a href="#"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-4.webp" class="img-fluid" alt="Professora Amanda Rodriguez">
            <div class="overlay-content">
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                <span>4.6</span>
              </div>
              <div class="course-count">
                <i class="bi bi-play-circle"></i>
                <span>15 Disciplinas</span>
              </div>
            </div>
          </div>
          <div class="instructor-info">
            <h5>Amanda Rodriguez</h5>
            <p class="specialty">Comunicação Social</p>
            <p class="description">Focada em comunicação digital e jornalismo investigativo.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">1.8k</span>
                <span class="label">Alunos</span>
              </div>
              <div class="stat">
                <span class="number">4.6</span>
                <span class="label">Avaliação</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">Ver Perfil</a>
              <div class="social-links">
                <a href="#"><i class="bi bi-dribbble"></i></a>
                <a href="#"><i class="bi bi-behance"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-9.webp" class="img-fluid" alt="Professor David Thompson">
            <div class="overlay-content">
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                <span>4.7</span>
              </div>
              <div class="course-count">
                <i class="bi bi-play-circle"></i>
                <span>21 Disciplinas</span>
              </div>
            </div>
          </div>
          <div class="instructor-info">
            <h5>David Thompson</h5>
            <p class="specialty">Administração</p>
            <p class="description">Especialista em gestão empresarial e marketing estratégico.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">2.9k</span>
                <span class="label">Alunos</span>
              </div>
              <div class="stat">
                <span class="number">4.7</span>
                <span class="label">Avaliação</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">Ver Perfil</a>
              <div class="social-links">
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Featured Instructors Section -->


<!-- Seção Depoimentos -->
<section id="testimonials" class="testimonials section">
  <!-- Título da Seção -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Depoimentos</h2>
    <p>Veja o que nossos alunos e parceiros dizem sobre a Faculdade ISCON</p>
  </div><!-- Fim do Título -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-12">
        <div class="critic-reviews" data-aos="fade-up" data-aos-delay="300">
          <div class="row">
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>A Faculdade ISCON oferece uma experiência acadêmica transformadora e uma infraestrutura de ponta para nossos alunos.</p>
                <div class="critic-info">
                  <div class="critic-name">Revista Educação Hoje</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                </div>
                <p>Professores dedicados e um ambiente que estimula o crescimento pessoal e profissional dos estudantes.</p>
                <div class="critic-info">
                  <div class="critic-name">Portal Universitário</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>O compromisso da ISCON com a excelência acadêmica faz dela referência em ensino superior na região.</p>
                <div class="critic-info">
                  <div class="critic-name">Jornal Local</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonials-container">
          <div class="swiper testimonials-slider init-swiper" data-aos="fade-up" data-aos-delay="400">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": { "delay": 5000 },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                "breakpoints": { "768": { "slidesPerView": 2 }, "992": { "slidesPerView": 3 } }
              }
            </script>

            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    A experiência na ISCON foi fundamental para meu desenvolvimento acadêmico e profissional. Recomendo muito!
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-f-1.webp" alt="Jane Smith" class="img-fluid rounded-circle">
                    <div>
                      <h3>Jane Smith</h3>
                      <h4>Aluna de Administração</h4>
                    </div>
                  </div>
                </div>
              </div><!-- Fim do depoimento -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    Professores atenciosos e estrutura moderna que facilitam o aprendizado presencial. Sinto que faço parte de uma grande família.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-m-2.webp" alt="Michael Johnson" class="img-fluid rounded-circle">
                    <div>
                      <h3>Michael Johnson</h3>
                      <h4>Aluno de Engenharia Civil</h4>
                    </div>
                  </div>
                </div>
              </div><!-- Fim do depoimento -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                  </div>
                  <p>
                    Aprender na ISCON me proporcionou grandes oportunidades de estágio e networking na minha área.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-f-3.webp" alt="Emily Davis" class="img-fluid rounded-circle">
                    <div>
                      <h3>Emily Davis</h3>
                      <h4>Aluna de Comunicação Social</h4>
                    </div>
                  </div>
                </div>
              </div><!-- Fim do depoimento -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    Excelente instituição com foco na qualidade do ensino e na formação integral do estudante.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-m-4.webp" alt="Robert Wilson" class="img-fluid rounded-circle">
                    <div>
                      <h3>Robert Wilson</h3>
                      <h4>Aluno de Direito</h4>
                    </div>
                  </div>
                </div>
              </div><!-- Fim do depoimento -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center" data-aos="fade-up">
        <div class="overall-rating">
          <div class="rating-number">4.8</div>
          <div class="rating-stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
          </div>
          <p>Baseado em mais de 230 avaliações de nossos alunos</p>
          <div class="rating-platforms">
            <span>Google</span>
            <span>Facebook</span>
            <span>Instagram</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Seção Depoimentos -->

<!-- Seção Últimas Publicações do Blog -->
<section id="recent-blog-posts" class="recent-blog-posts section">

  <!-- Título da Seção -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Últimas do Blog</h2>
    <p>Notícias, dicas e artigos para apoiar sua jornada acadêmica</p>
  </div><!-- Fim do Título -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card">
          <div class="card-top d-flex align-items-center">
            <img src="assets/img/person/person-f-12.webp" alt="Autor" class="rounded-circle me-2">
            <span class="author-name">Por Ana Glamer</span>
            <span class="ms-auto likes"><i class="bi bi-heart"></i> 65</span>
          </div>
          <div class="card-img-wrapper">
            <img src="assets/img/blog/blog-post-1.webp" alt="Imagem da postagem">
          </div>
          <div class="card-body">
            <h5 class="card-title"><a href="blog-details.html">Como se preparar para o mercado de trabalho</a></h5>
            <p class="card-text">Confira dicas essenciais para ingressar com sucesso na sua carreira profissional após a graduação.</p>
          </div>
        </div>
      </div><!-- Fim do post -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="card position-relative">
          <div class="card-top d-flex align-items-center">
            <img src="assets/img/person/person-f-13.webp" alt="Autor" class="rounded-circle me-2">
            <span class="author-name">Por Denise Williamson</span>
            <span class="ms-auto likes"><i class="bi bi-heart"></i> 35</span>
          </div>
          <div class="card-img-wrapper">
            <img src="assets/img/blog/blog-post-2.webp" alt="Imagem da postagem">
          </div>
          <div class="card-body">
            <h5 class="card-title"><a href="blog-details.html">Tendências em tecnologia para o futuro</a></h5>
            <p class="card-text">Explore as principais inovações tecnológicas que impactarão o mercado nos próximos anos.</p>
          </div>
        </div>
      </div><!-- Fim do post -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="card">
          <div class="card-top d-flex align-items-center">
            <img src="assets/img/person/person-m-10.webp" alt="Autor" class="rounded-circle me-2">
            <span class="author-name">Por João Roberto</span>
            <span class="ms-auto likes"><i class="bi bi-heart"></i> 58</span>
          </div>
          <div class="card-img-wrapper">
            <img src="assets/img/blog/blog-post-3.webp" alt="Imagem da postagem">
          </div>
          <div class="card-body">
            <h5 class="card-title"><a href="blog-details.html">Dicas para manter a produtividade nos estudos</a></h5>
            <p class="card-text">Saiba como organizar sua rotina para aproveitar ao máximo seu tempo e alcançar seus objetivos acadêmicos.</p>
          </div>
        </div>
      </div><!-- Fim do post -->

    </div>

  </div>

</section><!-- /Seção Últimas Publicações do Blog -->

<!-- Seção Chamada para Ação -->
<section id="cta" class="cta section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">

      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="cta-content">
          <h2>Transforme seu Futuro com a Faculdade ISCON</h2>
          <p>Venha fazer parte de uma instituição reconhecida pela qualidade de ensino e compromisso com o seu sucesso profissional.</p>

          <div class="features-list">
            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <span>Corpo docente qualificado e experiente</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
              <i class="bi bi-check-circle-fill"></i>
              <span>Certificação reconhecida nacionalmente</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-check-circle-fill"></i>
              <span>Infraestrutura moderna e acolhedora</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Oportunidades de estágio e networking</span>
            </div>
          </div>

          <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('site.courses')}}" class="btn btn-primary">Conheça nossos cursos</a>
            <a href="{{ route('site.enroll')}}" class="btn btn-outline">Faça sua inscrição</a>
          </div>

          <div class="stats-row" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="3000" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p>Alunos Matriculados</p>
            </div>
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p>Cursos Disponíveis</p>
            </div>
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2" class="purecounter"></span>%</h3>
              <p>Índice de Aprovação</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="cta-image">
          <img src="assets/img/education/courses-4.webp" alt="Aprendizado Presencial" class="img-fluid">
          <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card-content">
              <i class="bi bi-person-check-fill"></i>
              <div class="text">
                <span class="number">2.450</span>
                <span class="label">Novos alunos</span>
              </div>
            </div>
          </div>
          <div class="floating-element course-card" data-aos="zoom-in" data-aos-delay="700">
            <div class="card-content">
              <i class="bi bi-book-half"></i>
              <div class="text">
                <span class="number">614+</span>
                <span class="label">Disciplinas oferecidas</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Seção Chamada para Ação -->


  </main>