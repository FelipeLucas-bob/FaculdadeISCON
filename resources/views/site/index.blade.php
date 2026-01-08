<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @isset($title)
            @if ($title !== '')
                {{ config('custom.nome_do_projeto') }} ISCON | Projeto Piloto
            @else
                {{ config('custom.nome_do_projeto') }} ISCON | Development Platform
            @endif
        @endisset
    </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon-iscon.png')}}"/>
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/inputmask.min.js"></script>

<body class="index-page">

    @include('/site/layouts/header')

    @switch($catName)
        @case('index')
            @include('/site/layouts/main')
            @break
        @case('about')
            @include('/site/about')
            @break
        @case('courses')
            @include('/site/courses')
            @break
        @case('course_details')
            @include('/site/course_details')
            @break
        @case('instructors')
            @include('/site/instructors')
            @break
        @case('instructor_details')
            @include('/site/instructor_details')
            @break
        @case('blog')
            @include('/site/blog')
            @break
        @case('blog_details')
            @include('/site/blog_details')
            @break
        @case('events')
            @include('/site/events')
            @break
        @case('event_details')
            @include('/site/event_details')
            @break
        @case('terms')
            @include('/site/terms')
            @break
        @case('privacy')
            @include('/site/privacy')
            @break
        @case('contacts')
            @include('/site/contacts')
            @break
        @case('enroll')
            @include('/site/enroll')
            @break

        @default
            {{-- Inclua algo padrão ou nada --}}
    @endSwitch


    @include('/site/layouts/footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>