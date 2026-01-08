<main class="main">

  <!-- Título da Página -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Inscrição</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('site.index') }}">ISCON</a></li>
          <li class="current">Inscrição</li>
        </ol>
      </nav>
    </div>
  </div><!-- Fim Título da Página -->

  <!-- Seção de Matrícula -->
  <section id="enroll" class="enroll section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle-fill me-2"></i>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
          </div>
      @elseif(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              <strong>Erro!</strong>
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
          </div>
      @endif

    

      <div class="row">
        <div id="form-enroll">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="enrollment-form-wrapper">

              <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <h2>Inscreva-se no Curso dos Seus Sonhos</h2>
                <p>Dê o próximo passo na sua jornada educacional.</p>
                <p>Preencha o formulário abaixo para garantir sua vaga em nosso processo seletivo.</p>
              </div>

              <!-- Alertas -->
              <div id="alert-success" class="alert alert-success text-center d-none" role="alert">
                🎉 Inscrição realizada com sucesso! Em breve entraremos em contato.
              </div>

              <div id="alert-error" class="alert alert-danger text-center d-none" role="alert">
                ⚠️ Ocorreu um erro ao enviar sua inscrição. Tente novamente.
              </div>


                <form class="enrollment-form needs-validation" id="enrollmentForm" data-aos="fade-up" data-aos-delay="300" action="{{ route('enroll.store') }}" method="POST" novalidate>
                  @csrf
                  @method('POST')
                  <div class="row mb-4">
                  <div class="col-md-8">
                    <div class="form-group">
                    <label for="firstName" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome Completo..." minlength="3" required>
                    <div class="invalid-feedback">Por favor, informe o nome.</div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" maxlength="14" minlength="14" placeholder="000.000.000-00" required >
                    <div class="invalid-feedback">Por favor, informe o CPF.</div>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-md-8">
                    <div class="form-group">
                    <label for="email" class="form-label">Endereço de Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@email.com.br" required>
                    <div class="invalid-feedback">Por favor, informe um email válido.</div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="(61) 99999-9999" required>
                    <div class="invalid-feedback">Por favor, informe o telefone.</div>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-12">
                    <div class="form-group">
                    <label for="course" class="form-label">Selecione o Curso</label>
                    <select id="course" name="course" class="form-select" required>
                      <option value="">Selecione o Curso...</option>
                      <option value="Direito">Direito</option>
                      <option value="Psicologia">Psicologia</option>
                      <option value="Enfermagem">Enfermagem</option>
                      <option value="Biomedicina">Biomedicina</option>
                      <option value="Fisioterapia">Fisioterapia</option>
                      <option value="Teologia">Teologia</option>
                      <option value="Radiologia">Radiologia</option>
                      <option value="GestaoRh">Gestão RH</option>
                      <option value="EdFisica">Ed. Física</option>
                      <option value="TecnologoGestaoHospitalar">Tecnólogo em Gestão Hospitalar</option>
                    </select>
                    <div class="invalid-feedback">Por favor, selecione o curso.</div>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="education" class="form-label">Nível de Escolaridade</label>
                    <select id="education" name="education" class="form-select" required>
                      <option value="">Selecione seu nível de escolaridade...</option>
                        <option value="ensino-medio">Ensino Médio</option>
                        <option value="curso-tecnico">Curso Técnico / Tecnólogo</option>
                        <option value="graduacao">Graduação</option>
                        <option value="mestrado">Mestrado</option>
                        <option value="doutorado">Doutorado</option>
                        <option value="outro">Outro</option>
                    </select>
                    <div class="invalid-feedback">Por favor, selecione o nível de escolaridade.</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="experience" class="form-label">Formação</label>
                    <select id="experience" name="experience" class="form-select" required>
                      <option value="">Selecione a Formação...</option>
                      <option value="Graduacao">Graduação</option>
                      <option value="PosGraduacao">Pós-Graduação</option>
                      <option value="Tecnologo">Tecnólogo</option>
                    </select>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-12">
                    <div class="form-group">
                    <label for="motivation" class="form-label">O que te motiva a fazer este curso?</label>
                    <textarea id="motivation" name="motivation" class="form-control" rows="4" placeholder="Compartilhe seus objetivos e o que espera alcançar..." required></textarea>
                    <div class="invalid-feedback">Por favor, informe sua motivação.</div>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-12">
                    <div class="form-group">
                    <label class="form-label">Forma de Ingresso</label>
                    <div class="schedule-options">
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="admission_type" id="vestibular" value="Primeira Graduação (Vestibular)" required>
                      <label class="form-check-label" for="vestibular">
                        Primeira Graduação (Vestibular)
                      </label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="admission_type" id="segunda_graduacao" value="Segunda Graduação" required>
                      <label class="form-check-label" for="segunda_graduacao">
                        Segunda Graduação
                      </label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="admission_type" id="enem" value="ENEM" required>
                      <label class="form-check-label" for="enem">
                        ENEM
                      </label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="admission_type" id="transferencia" value="Transferência" required>
                      <label class="form-check-label" for="transferencia">
                        Transferência
                      </label>
                      </div>
                    </div>
                    <div class="invalid-feedback">Por favor, selecione a forma de ingresso.</div>
                    </div>
                  </div>
                  </div>

                  <div class="row mb-4">
                  <div class="col-12">
                    <div class="form-group">
                    <div class="agreement-section">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms" required value="1">
                      <label class="form-check-label" for="terms">
                        Eu concordo com os <a href="#">Termos de Serviço</a> e a <a href="#">Política de Privacidade</a> *
                      </label>
                      <div class="invalid-feedback">Você deve concordar com os termos.</div>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                      <label class="form-check-label" for="newsletter">
                        Gostaria de receber atualizações do curso e conteúdo educacional por email
                      </label>
                      </div>
                    </div>
                    </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-enroll">
                    <i class="bi bi-check-circle me-2"></i>
                    Inscreva-se Agora
                    </button>
                    <p class="enrollment-note mt-3">
                    <i class="bi bi-shield-check"></i>
                    Suas informações estão seguras e nunca serão compartilhadas com terceiros
                    </p>
                  </div>
                  </div>
                </form>

                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                  const form = document.getElementById('enrollmentForm');
                  form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                  });
                </script>

              </div>
            </div><!-- Fim Coluna do Formulário -->

            <div class="col-lg-4 d-lg-block">
              <div class="enrollment-benefits" data-aos="fade-left" data-aos-delay="400">
                <h3>Por que escolher nossos cursos?</h3>
                <div class="benefit-item">
                  <div class="benefit-icon">
                    <i class="bi bi-trophy"></i>
                  </div>
                  <div class="benefit-content">
                    <h4>Instrutores Especializados</h4>
                    <p>Aprenda com profissionais do setor com anos de experiência prática</p>
                  </div>
                </div><!-- Fim Item de Benefício -->

                <div class="benefit-item">
                  <div class="benefit-icon">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="benefit-content">
                    <h4>Aprendizado Flexível</h4>
                    <p>Estude no seu próprio ritmo com acesso 24/7 aos materiais do curso</p>
                  </div>
                </div><!-- Fim Item de Benefício -->

                <div class="benefit-item">
                  <div class="benefit-icon">
                    <i class="bi bi-award"></i>
                  </div>
                  <div class="benefit-content">
                    <h4>Certificação</h4>
                    <p>Receba certificados reconhecidos pelo mercado ao concluir o curso</p>
                  </div>
                </div><!-- Fim Item de Benefício -->

                <div class="benefit-item">
                  <div class="benefit-icon">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="benefit-content">
                    <h4>Suporte da Comunidade</h4>
                    <p>Conecte-se com outros alunos e obtenha ajuda quando precisar</p>
                  </div>
                </div><!-- Fim Item de Benefício -->

                <div class="enrollment-stats mt-4">
                  <div class="stat-item">
                    <span class="stat-number">+3.000</span>
                    <span class="stat-label">Alunos Matriculados</span>
                  </div>
                  <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Taxa de Conclusão</span>
                  </div>
                  <div class="stat-item">
                    <span class="stat-number">4,9/5</span>
                    <span class="stat-label">Avaliação Média</span>
                  </div>
                </div><!-- Fim Estatísticas -->

              </div>
            </div><!-- Fim Coluna de Benefícios -->
          </div>
        </div>

        
        <div id="enroll-success-message" class="alert alert-success mt-4 d-none" role="alert">
          <h4 class="alert-heading">🎉 Inscrição Realizada com Sucesso!</h4>
          <p>Parabéns, sua inscrição foi concluída.</p>
          <hr>
          <p><strong>Usuário:</strong> <span id="success-username">Email informado</span></p>
          <p><strong>Senha:</strong> <span id="success-password">CPF informado<span></p>
          <a href="{{ route('login') }}" class="btn btn-primary mt-2">Acessar Área do Aluno</a>
          <p class="mt-3 mb-0 text-muted" style="font-size: 0.95em;">
            Guarde suas credenciais com segurança. Você também receberá essas informações por email.
          </p>
        </div>


      </div>

    </div>

  </section><!-- /Seção de Matrícula -->

</main>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cpfInput = document.getElementById('cpf');
    const phoneInput = document.getElementById('phone');
    const alertSuccess = document.getElementById('alert-success');
    const alertError = document.getElementById('alert-error');

    if (typeof Inputmask !== 'undefined') {
      // Máscara CPF
      if (cpfInput) {
        Inputmask({
          mask: '999.999.999-99',
          placeholder: '_',
          showMaskOnHover: false,
          showMaskOnFocus: true,
          clearIncomplete: true
        }).mask(cpfInput);
      }

      // Máscara Telefone (fixo e celular)
      if (phoneInput) {
        Inputmask({
          mask: ['(99) 9999-9999', '(99) 99999-9999'],
          placeholder: '_',
          showMaskOnHover: false,
          showMaskOnFocus: true,
          clearIncomplete: true
        }).mask(phoneInput);
      }
    }
  });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('createServiceForm');
      form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
          }
          form.classList.add('was-validated');
      }, false);
  });
</script>

<script>
  // Exemplo de uso: mostrar mensagem após inscrição bem-sucedida
  // Substitua os valores conforme necessário após o backend processar a inscrição
  function showEnrollSuccessMessage(username, password) {
    alert('teste');
    document.getElementById('success-username').textContent = username;
    document.getElementById('success-password').textContent = password;
    document.getElementById('enroll-success-message').classList.remove('d-none');
    document.getElementById('form-enroll').classList.add('d-none');
  }
  // Exemplo de chamada:
  // showEnrollSuccessMessage('usuario@email.com', 'senha123');
</script>