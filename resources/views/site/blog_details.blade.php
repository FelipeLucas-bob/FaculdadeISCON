<main class="main">

  <!-- Título da Página -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Detalhes do Blog</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('site.index') }}">ISCON</a></li>
          <li class="current">Detalhes do Blog</li>
        </ol>
      </nav>
    </div>
  </div><!-- Fim Título da Página -->

  <!-- Seção Detalhes do Blog -->
  <section id="blog-details" class="blog-details section">
    <div class="container" data-aos="fade-up">

      <article class="article">
        <div class="article-header">
          <div class="meta-categories" data-aos="fade-up">
            <a href="#" class="category">Tecnologia</a>
            <a href="#" class="category">Inovação</a>
          </div>

          <h1 class="title" data-aos="fade-up" data-aos-delay="100">A Evolução do Design de Interface do Usuário: Do Skeuomorfismo ao Neumorfismo</h1>

          <div class="article-meta" data-aos="fade-up" data-aos-delay="200">
            <div class="author">
              <img src="assets/img/person/person-m-6.webp" alt="Autor" class="author-img">
              <div class="author-info">
                <h4>David Wilson</h4>
                <span>Líder de Design UI/UX</span>
              </div>
            </div>
            <div class="post-info">
              <span><i class="bi bi-calendar4-week"></i> 15 de Abril de 2025</span>
              <span><i class="bi bi-clock"></i> Leitura de 10 minutos</span>
              <span><i class="bi bi-chat-square-text"></i> 32 Comentários</span>
            </div>
          </div>
        </div>

        <div class="article-featured-image" data-aos="zoom-in">
          <img src="assets/img/blog/blog-hero-1.webp" alt="Evolução do Design de UI" class="img-fluid">
        </div>

        <div class="article-wrapper">
          <aside class="table-of-contents" data-aos="fade-left">
            <h3>Sumário</h3>
            <nav>
              <ul>
                <li><a href="#introduction" class="active">Introdução</a></li>
                <li><a href="#skeuomorphism">A Era do Skeuomorfismo</a></li>
                <li><a href="#flat-design">Revolução do Design Plano</a></li>
                <li><a href="#material-design">Material Design</a></li>
                <li><a href="#neumorphism">Ascensão do Neumorfismo</a></li>
                <li><a href="#future">Tendências Futuras</a></li>
              </ul>
            </nav>
          </aside>

          <div class="article-content">
            <div class="content-section" id="introduction" data-aos="fade-up">
              <p class="lead">
                A jornada do design de interface do usuário foi marcada por mudanças significativas nas abordagens estéticas, cada era trazendo sua perspectiva única sobre como as interfaces digitais devem parecer e funcionar.
              </p>

              <p>
                Desde os primeiros dias das interfaces gráficas até os sofisticados sistemas de design atuais, a evolução do design de UI reflete não apenas o avanço tecnológico, mas também as expectativas do usuário e mudanças culturais na forma como interagimos com produtos digitais.
              </p>

              <div class="highlight-quote">
                <blockquote>
                  <p>O design não é apenas como parece e como se sente. Design é como funciona.</p>
                  <cite>Steve Jobs</cite>
                </blockquote>
              </div>
            </div>

            <div class="content-section" id="skeuomorphism" data-aos="fade-up">
              <h2>A Era do Skeuomorfismo</h2>
              <div class="image-with-caption right">
                <img src="assets/img/blog/blog-hero-2.webp" alt="Exemplo de Design Skeuomórfico" class="img-fluid" loading="lazy">
                <figcaption>Design inicial do iOS mostrando elementos skeuomórficos</figcaption>
              </div>
              <p>
                O design skeuomórfico dominou os primeiros anos das interfaces digitais, tentando espelhar objetos do mundo real em formato digital. Essa abordagem ajudou os usuários a fazer a transição das interações físicas para as digitais por meio de metáforas visuais familiares.
              </p>

              <div class="feature-points">
                <div class="point">
                  <i class="bi bi-layers"></i>
                  <div>
                    <h4>Texturas Realistas</h4>
                    <p>Representações detalhadas de materiais como couro, metal e papel</p>
                  </div>
                </div>
                <div class="point">
                  <i class="bi bi-lightbulb"></i>
                  <div>
                    <h4>Metáforas Familiares</h4>
                    <p>Elementos digitais que imitam seus equivalentes físicos</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="content-section" id="flat-design" data-aos="fade-up">
              <h2>Revolução do Design Plano</h2>
              <p>
                À medida que os usuários se tornaram mais confortáveis com interfaces digitais, o design começou a se mover para a simplificação. O design plano surgiu como uma reação aos detalhes ornamentados do skeuomorfismo, enfatizando clareza e eficiência.
              </p>

              <div class="comparison-grid">
                <div class="row g-4">
                  <div class="col-md-6">
                    <div class="comparison-card">
                      <div class="icon"><i class="bi bi-check-circle"></i></div>
                      <h4>Vantagens</h4>
                      <ul>
                        <li>Melhor tempo de carregamento</li>
                        <li>Melhor escalabilidade</li>
                        <li>Hierarquia visual mais limpa</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="comparison-card">
                      <div class="icon"><i class="bi bi-exclamation-circle"></i></div>
                      <h4>Desafios</h4>
                      <ul>
                        <li>Redução dos indicativos visuais</li>
                        <li>Potenciais problemas de usabilidade</li>
                        <li>Percepção de profundidade limitada</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="content-section" id="material-design" data-aos="fade-up">
              <h2>Material Design: Encontrando o Equilíbrio</h2>
              <p>
                O Material Design do Google surgiu como um sistema de design abrangente que combinava a simplicidade do design plano com sutis indicações de profundidade, criando uma experiência do usuário mais intuitiva, mantendo uma estética moderna.
              </p>

              <div class="key-principles">
                <div class="principle">
                  <span class="number">01</span>
                  <h4>Propriedades Físicas</h4>
                  <p>Superfícies e bordas fornecem pistas significativas para interação</p>
                </div>
                <div class="principle">
                  <span class="number">02</span>
                  <h4>Gráficos Marcantes</h4>
                  <p>Escolhas deliberadas de cor e espaços em branco intencionais</p>
                </div>
                <div class="principle">
                  <span class="number">03</span>
                  <h4>Movimento Significativo</h4>
                  <p>Animações que informam e reforçam as ações do usuário</p>
                </div>
              </div>
            </div>

            <div class="content-section" id="neumorphism" data-aos="fade-up">
              <h2>A Ascensão do Neumorfismo</h2>
              <p>
                O neumorfismo representa a evolução mais recente no design de UI, combinando aspectos do skeuomorfismo com estética minimalista moderna. Esse estilo cria superfícies suaves e extrudadas que parecem emergir do fundo.
              </p>

              <div class="info-box">
                <div class="icon">
                  <i class="bi bi-info-circle"></i>
                </div>
                <div class="content">
                  <h4>Características Principais</h4>
                  <p>O design neumórfico depende de um trabalho sutil com sombras para criar a ilusão de elementos que parecem estar protuberantes ou pressionados na superfície de fundo.</p>
                </div>
              </div>
            </div>

            <div class="content-section" id="future" data-aos="fade-up">
              <h2>Olhando para o Futuro</h2>
              <p>
                Ao olharmos para o futuro, o design de UI continua a evoluir com novas tecnologias e expectativas dos usuários. O futuro pode trazer interfaces mais personalizadas e adaptativas que respondem às preferências e contextos individuais.
              </p>

              <div class="future-trends">
                <div class="trend">
                  <i class="bi bi-phone"></i>
                  <h4>Interfaces Adaptativas</h4>
                  <p>Interfaces que ajustam automaticamente com base no comportamento e preferências do usuário</p>
                </div>
                <div class="trend">
                  <i class="bi bi-eye"></i>
                  <h4>Experiências Imersivas</h4>
                  <p>Integração de elementos de AR e VR em interfaces do dia a dia</p>
                </div>
                <div class="trend">
                  <i class="bi bi-hand-index"></i>
                  <h4>Controles por Gestos</h4>
                  <p>Interações avançadas baseadas em movimento e gestos</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="article-footer" data-aos="fade-up">
          <div class="share-article">
            <h4>Compartilhe este artigo</h4>
            <div class="share-buttons">
              <a href="#" class="share-button twitter">
                <i class="bi bi-twitter-x"></i>
                <span>Compartilhar no X</span>
              </a>
              <a href="#" class="share-button facebook">
                <i class="bi bi-facebook"></i>
                <span>Compartilhar no Facebook</span>
              </a>
              <a href="#" class="share-button linkedin">
                <i class="bi bi-linkedin"></i>
                <span>Compartilhar no LinkedIn</span>
              </a>
            </div>
          </div>

          <div class="article-tags">
            <h4>Tópicos Relacionados</h4>
            <div class="tags">
              <a href="#" class="tag">Design de UI</a>
              <a href="#" class="tag">Experiência do Usuário</a>
              <a href="#" class="tag">Tendências de Design</a>
              <a href="#" class="tag">Inovação</a>
              <a href="#" class="tag">Tecnologia</a>
            </div>
          </div>
        </div>

      </article>

    </div>
  </section><!-- /Seção Detalhes do Blog -->

  <!-- Seção Comentários do Blog -->
  <section id="blog-comments" class="blog-comments section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="blog-comments-4">
        <div class="comments-header">
          <h3 class="title">Feedback da Comunidade</h3>
          <div class="comments-stats">
            <span class="count">12</span>
            <span class="label">Comentários</span>
          </div>
        </div>

        <div class="comments-container">
          <!-- Comentário #1 -->
          <div class="comment-thread">
            <div class="comment-box">
              <div class="comment-wrapper">
                <div class="avatar-wrapper">
                  <img src="assets/img/person/person-f-9.webp" alt="Avatar" loading="lazy">
                  <span class="status-indicator"></span>
                </div>

                <div class="comment-content">
                  <div class="comment-header">
                    <div class="user-info">
                      <h4>Thomas Anderson</h4>
                      <span class="time-badge">
                        <i class="bi bi-clock"></i>
                        2 horas atrás
                      </span>
                    </div>
                    <div class="engagement">
                      <span class="likes">
                        <i class="bi bi-heart"></i>
                        24
                      </span>
                    </div>
                  </div>

                  <div class="comment-body">
                    <p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc.</p>
                  </div>

                  <div class="comment-actions">
                    <button class="action-btn like-btn" aria-label="Curtir comentário">
                      <i class="bi bi-heart"></i>
                      <span>Curtir</span>
                    </button>
                    <button class="action-btn reply-btn" aria-label="Responder comentário">
                      <i class="bi bi-chat"></i>
                      <span>Responder</span>
                    </button>
                    <button class="action-btn share-btn" aria-label="Compartilhar comentário">
                      <i class="bi bi-share"></i>
                      <span>Compartilhar</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Container de Respostas -->
            <div class="replies-container">
              <!-- Resposta #1 -->
              <div class="comment-box reply">
                <div class="comment-wrapper">
                  <div class="avatar-wrapper">
                    <img src="assets/img/person/person-m-9.webp" alt="Avatar" loading="lazy">
                    <span class="status-indicator"></span>
                  </div>

                  <div class="comment-content">
                    <div class="comment-header">
                      <div class="user-info">
                        <h4>Maria Rodriguez</h4>
                        <span class="time-badge">
                          <i class="bi bi-clock"></i>
                          1 hora atrás
                        </span>
                      </div>
                      <div class="engagement">
                        <span class="likes">
                          <i class="bi bi-heart"></i>
                          8
                        </span>
                      </div>
                    </div>

                    <div class="comment-body">
                      <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae.</p>
                    </div>

                    <div class="comment-actions">
                      <button class="action-btn like-btn" aria-label="Curtir comentário">
                        <i class="bi bi-heart"></i>
                        <span>Curtir</span>
                      </button>
                      <button class="action-btn reply-btn" aria-label="Responder comentário">
                        <i class="bi bi-chat"></i>
                        <span>Responder</span>
                      </button>
                      <button class="action-btn share-btn" aria-label="Compartilhar comentário">
                        <i class="bi bi-share"></i>
                        <span>Compartilhar</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Resposta #2 -->
              <div class="comment-box reply">
                <div class="comment-wrapper">
                  <div class="avatar-wrapper">
                    <img src="assets/img/person/person-f-9.webp" alt="Avatar" loading="lazy">
                    <span class="status-indicator"></span>
                  </div>

                  <div class="comment-content">
                    <div class="comment-header">
                      <div class="user-info">
                        <h4>Alex Chen</h4>
                        <span class="time-badge">
                          <i class="bi bi-clock"></i>
                          30 minutos atrás
                        </span>
                      </div>
                      <div class="engagement">
                        <span class="likes">
                          <i class="bi bi-heart"></i>
                          5
                        </span>
                      </div>
                    </div>

                    <div class="comment-body">
                      <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                    </div>

                    <div class="comment-actions">
                      <button class="action-btn like-btn" aria-label="Curtir comentário">
                        <i class="bi bi-heart"></i>
                        <span>Curtir</span>
                      </button>
                      <button class="action-btn reply-btn" aria-label="Responder comentário">
                        <i class="bi bi-chat"></i>
                        <span>Responder</span>
                      </button>
                      <button class="action-btn share-btn" aria-label="Compartilhar comentário">
                        <i class="bi bi-share"></i>
                        <span>Compartilhar</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Comentário #2 -->
          <div class="comment-thread">
            <div class="comment-box">
              <div class="comment-wrapper">
                <div class="avatar-wrapper">
                  <img src="assets/img/person/person-f-7.webp" alt="Avatar" loading="lazy">
                  <span class="status-indicator"></span>
                </div>

                <div class="comment-content">
                  <div class="comment-header">
                    <div class="user-info">
                      <h4>Emily Watson</h4>
                      <span class="time-badge">
                        <i class="bi bi-clock"></i>
                        3 horas atrás
                      </span>
                    </div>
                    <div class="engagement">
                      <span class="likes">
                        <i class="bi bi-heart"></i>
                        15
                      </span>
                    </div>
                  </div>

                  <div class="comment-body">
                    <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                  </div>

                  <div class="comment-actions">
                    <button class="action-btn like-btn" aria-label="Curtir comentário">
                      <i class="bi bi-heart"></i>
                      <span>Curtir</span>
                    </button>
                    <button class="action-btn reply-btn" aria-label="Responder comentário">
                      <i class="bi bi-chat"></i>
                      <span>Responder</span>
                    </button>
                    <button class="action-btn share-btn" aria-label="Compartilhar comentário">
                      <i class="bi bi-share"></i>
                      <span>Compartilhar</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Seção Comentários do Blog -->

  <!-- Seção Formulário de Comentário do Blog -->
  <section id="blog-comment-form" class="blog-comment-form section">
    <div class="container">

      <form action="">

        <h4>Postar Comentário</h4>
        <p>Seu endereço de e-mail não será publicado. Campos obrigatórios estão marcados com *</p>
        <div class="row">
          <div class="col-md-6 form-group">
            <input name="name" type="text" class="form-control" placeholder="Seu Nome*">
          </div>
          <div class="col-md-6 form-group">
            <input name="email" type="text" class="form-control" placeholder="Seu E-mail*">
          </div>
        </div>
        <div class="row">
          <div class="col form-group">
            <input name="website" type="text" class="form-control" placeholder="Seu Site">
          </div>
        </div>
        <div class="row">
          <div class="col form-group">
            <textarea name="comment" class="form-control" placeholder="Seu Comentário*"></textarea>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Postar Comentário</button>
        </div>

      </form>

    </div>
  </section><!-- /Seção Formulário de Comentário do Blog -->

</main>
