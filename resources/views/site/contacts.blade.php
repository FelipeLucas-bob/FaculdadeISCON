<main class="main">

  <!-- Título da Página -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Contato</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('site.index') }}">ISCON</a></li>
          <li class="current">Contatos</li>
        </ol>
      </nav>
    </div>
  </div><!-- Fim Título da Página -->

  <!-- Seção de Contato -->
  <section id="contact" class="contact section">
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

      <div class="contact-main-wrapper">
        <div class="map-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9130.33692531864!2d-47.918586014808035!3d-15.812715418126857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a3aa47a013aad%3A0xdb29b9d3193465ce!2sInstituto%20Superior%20da%20Conven%C3%A7%C3%A3o%20Nacional%20das%20Assembleias%20de%20Deus!5e0!3m2!1spt-BR!2sbr!4v1753731802936!5m2!1spt-BR!2sbr" width="600" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>]
        </div>

        <div class="contact-content">
          <div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="contact-text">
                <h4>Endereço</h4>
                <p>SGAS I SGAS 910 Lote 33/34 <br> Asa Sul, Brasília - DF <br>70390-100</p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="contact-text">
                <h4>E-mail</h4>
                <p>atendimento@iscon.edu.br</p>
                <p>sac@iscon.edu.br</p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="contact-text">
                <h4>Telefone</h4>
                <p>(61) 98119-2489</p>
              </div>
            </div>

            <div class="contact-card">
              <div class="icon-box">
                <i class="bi bi-clock"></i>
              </div>
              <div class="contact-text">
                <h4>Horário de Funcionamento</h4>
                <p>Segunda a Sexta: 8h às 22h</p>
              </div>
            </div>
          </div>

          <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
            <h3>Fale Conosco</h3>
            <p>Estamos à disposição para esclarecer dúvidas e fornecer mais informações.</p>


            <form action="{{ route('site.contactsTalk') }}" method="post" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="name" class="fw-bold text-primary">Nome</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nome Completo..." required maxlength="50">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                  <label for="phone" class="fw-bold text-primary">Telefone</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="(00) 00000-0000" required maxlength="15">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="email" class="fw-bold text-primary">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@email.com.br" required maxlength="50">
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="subject" class="fw-bold text-primary">Assunto</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Informe o assunto..." required maxlength="100">
              </div>
              <div class="form-group mt-3">
                <label for="message" class="fw-bold text-primary">Mensagem</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Informe sua mensagem..." required maxlength="250"></textarea>
              </div>

              <div class="my-3">
                <div class="loading">Carregando</div>
                <div class="error-message"></div>
                <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>
              </div>

              <div class="form-submit">
                <button type="submit">Enviar Mensagem</button>
                <div class="social-links">
                  <a href="https://wa.me/5561981192489" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                  <a href="https://www.instagram.com/faculdade_iscon/" target="_blank"><i class="bi bi-instagram"></i></a>
                  {{-- <a href="#"><i class="bi bi-twitter"></i></a>
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a> --}}
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Seção de Contato -->

</main>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cpfInput = document.getElementById('cpf');
    const phoneInput = document.getElementById('phone');
    const alertSuccess = document.getElementById('alert-success');
    const alertError = document.getElementById('alert-error');

    if (typeof Inputmask !== 'undefined') {

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