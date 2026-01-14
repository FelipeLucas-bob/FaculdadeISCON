<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('site.index') }}" class="logo d-flex align-items-center me-auto">
            <!-- Se quiser usar logo imagem, descomente a linha abaixo -->

            @if (app()->environment('production'))
                {{-- Produção: busca arquivos compilados pelo Vite --}}
                <img src="{{ asset('images/logo/logo.png') }}" class="logo-light navbar-logo-g ms-2" alt="logo"
                    style="width: 150px; height: 100px; text-align: center;">
            @else
                <img src="assets/img/logo/logo.png" alt="Faculdade ISCON">
            @endif
            {{-- <h1 class="sitename">Faculdade ISCON</h1> --}}
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('site.index') }}" class="{{ $catName == 'index' ? 'active' : '' }}">Início</a></li>
                <li><a href="{{ route('site.about') }}" class="{{ $catName == 'about' ? 'active' : '' }}">Sobre</a></li>
                <li><a href="{{ route('site.enroll') }}" class="{{ $catName == 'enroll' ? 'active' : '' }}">Processo Seletivo</a></li>
                <li><a href="{{ route('site.courses') }}" class="{{ $catName == 'courses' ? 'active' : '' }}">Cursos</a></li>
                {{-- <li><a href="{{ route('site.instructors') }}" class="{{ $catName == 'instructors' ? 'active' : '' }}">Professores</a></li> --}}
                {{-- <li><a href="{{ route('site.blog') }}" class="{{ $catName == 'blog' ? 'active' : '' }}">Notícias</a></li> --}}
                {{-- <li><a href="{{ route('site.events') }}" class="{{ $catName == 'events' ? 'active' : '' }}">Eventos</a></li> --}}
                {{-- <li><a href="{{ route('site.pricing') }}" class="{{ $catName == 'pricing' ? 'active' : '' }}">Inscrições</a></li> --}}
                <li class="dropdown">
                    <a href="#"><span>Portais Acadêmicos</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://sei.iscon.edu.br/" target="_blank">Portal SEI</a></li>
                        <li><a href="http://137.184.60.84/campusvirtual/login/index.php" target="_blank">AVA</a></li>
                        <li><a href="https://www.unicollege.com.br/iscon/login.aspx" target="_blank">Alunos</a></li>
                        <li><a href="https://www.unicollege.com.br/iscon/login.aspx" target="_blank">Professores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Estrutura</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://www.unicollege.com.br/iscon/io03/validador.aspx" target="_blank">Diploma</a></li>
                        <li><a href="https://drive.google.com/file/d/1MjBYcWHHMKP_GscyNeq_pwDgNglZb7rz/view" target="_blank">Regimento Interno</a></li>
                        <li><a href="https://iscon.edu.br/biblioteca/" target="_blank">Biblioteca</a></li>
                        <li><a href="https://iscon.edu.br/revista/" target="_blank">Revista</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Editais</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://iscon.edu.br/arquivos/editais/edital_processo_seletivo_2025.2.pdf" target="_blank">Processo Seletivo 2025.2</a></li>
                        <li><a href="https://iscon.edu.br/arquivos/editais/edital_rematricula_2025.2.pdf" target="_blank">Rematrícula 2025.2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Mais</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('site.terms') }}"
                                class="{{ $catName == 'terms' ? 'active' : '' }}">Termos</a></li>
                        <li><a href="{{ route('site.privacy') }}"
                                class="{{ $catName == 'privacy' ? 'active' : '' }}">Privacidade</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('site.contacts') }}" class="{{ $catName == 'contacts' ? 'active' : '' }}">Contatos</a></li>
            </ul>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('login') }}">
            <i class="bi bi-box-arrow-in-right"></i>
            Portal <b>ISCON</b>
        </a>

    </div>
</header>
