<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mochammad Fachrizal Muzakky">
  <meta name="generator" content="Hugo 0.88.1">
  @yield('meta')

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="/img/logo/Favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="/css/styles.css" />

  @yield('css')

  <!--=============== JQUERY ===============-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  @stack('headScripts')

  <title>Josami | {{ $title }} </title>
</head>

<body>
  <!--==================== Navbar ====================-->
  <div class="nav" id="nav">
    @include('layouts.navbar')
  </div>

  <!--==================== MAIN ====================-->
  <main class="main outer__container">
    @yield('container')
  </main>

  <!--==================== FOOTER ====================-->
  <footer class="footer outer__container">
    @include('layouts.footer')
  </footer>

  <!--========== SCROLL UP ==========-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-line"></i>
  </a>

  <!--=============== SCROLLREVEAL ===============-->
  <script src="assets/js/scrollreveal.min.js"></script>

  <!--=============== MIXITUP FILTER ===============-->
  <script src="/js/mixitup/mixitup.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="/js/main.js"></script>

  @stack('scripts')
</body>

</html>