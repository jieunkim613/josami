@if(auth()->user()->level == 2)
@extends('layouts.main')

@section('container')
<section class="order section" id="order">
  <span class="section__subtitle">Pilihan Menu</span>
  <ul class="order__filters">
    <li class="order__item order__line order__line-2" data-filter=".camilan">
      <h3 class="section__title">Camilan</h3>
    </li>
    <li class="order__item order__line order__line-2 active-order" data-filter=".makanan">
      <h3 class="section__title">Makanan</h3>
    </li>
    <li class="order__item " data-filter=".minuman">
      <h3 class="section__title">Minuman</h3>
    </li>
  </ul>
  <form action="/orders" class="form" method="POST" enctype="multipart/form-data" spellcheck="false" autocomplete="off">
    @csrf
    <div class="order__create">
      <button type="submit" class="button order__button-3"> Pesan <i class="ri-shopping-cart-line"></i> </button>
    </div>
    <div class="order__container container grid">
      @foreach ($menus as $menu)
      @if ($menu->available == 1)
      @if ($menu->category_id == 1)
      <article class="order__card makanan">
        @elseif ($menu->category_id == 2)
        <article class="order__card minuman">
          @else
          <article class="order__card camilan">
            @endif
            @if ($menu->image)
            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }} image" class="order__img">
            @else
            <img src="storage/default/default-menus-2.png" alt="{{ $menu->name }} image" class="order__img">
            @endif
            <h3 class="order__name">{{ $menu->name }}</h3>
            <span class="order__description">{{ $menu->description }}</span>
            <span class="order__price">IDR {{ $menu->price }}K</span>
            <button class="order__button-2">
              <i class="ri-subtract-line"></i>
            </button>
            <input type="number" name="{{$menu->id}}" class="order__quantity" value="00" max="99" maxlength="2" readonly>
            <button class="order__button-1">
              <i class="ri-add-line"></i>
            </button>
          </article>
          @endif
          @endforeach
        </article>
    </div>
  </form>
  <img src="img/leaf-branch-2.png" alt="order image" class="bg__leaf-1" />
  <img src="img/leaf-branch-4.png" alt="order image" class="bg__leaf-2" />
  <img src="img/leaf-branch-4.png" alt="order image" class="bg__leaf-3" />
</section>
@endsection

@push('scripts')
<!-- =============== ORDERS QUANTITY =============== -->
<script>
  $(document).ready(function() {
    $('.order__button-1').click(function(e) {
      e.preventDefault();
      var increase_value = $(this).parents('.order__card').find('.order__quantity').val();
      var value = parseInt(increase_value, 10);
      value = isNaN(value) ? 0 : value;
      if (value < 99) {
        value++;
        if (value < 10) {
          value = "0" + value;
        }
        $(this).parents('.order__card').find('.order__quantity').val(value);
      }
    })
    $('.order__button-2').click(function(e) {
      e.preventDefault();
      var decrease_value = $(this).parents('.order__card').find('.order__quantity').val();
      var value = parseInt(decrease_value, 10);
      value = isNaN(value) ? 0 : value;
      if (value > 0) {
        value--;
        if (value < 10) {
          value = "0" + value;
        }
        $(this).parents('.order__card').find('.order__quantity').val(value);
      }
    })
  });
</script>

<!-- =============== MIXITUP FILTER ORDERS =============== -->
<script>
  let mixerOrders = mixitup(".order__container", {
    selectors: {
      target: ".order__card",
    },
    animation: {
      duration: 300,
    },
  });

  // Default filter orders
  mixerOrders.filter(".makanan");

  // Link active orders
  const linkOrders = document.querySelectorAll(".order__item");

  function activeOrders() {
    linkOrders.forEach((l) => l.classList.remove("active-order"));
    this.classList.add("active-order");
  }
  linkOrders.forEach((l) => l.addEventListener("click", activeOrders));
</script>
@endpush
@else
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mochammad Fachrizal Muzakky">
  <meta name="generator" content="Hugo 0.88.1">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="/img/logo/Favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="/css/styles.css" />

  <!--=============== JQUERY ===============-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <title>Josami | Akses Dilarang </title>
</head>

<body>
  <div class="container" style="text-align:center; margin:auto;">
    <h1 class="forbidden__title">403</h1>
    <h3 class="forbidden__name">Akses Dilarang!!!</h3>
    <p class="forbidden__desc">Anda mencoba mengakses halaman yang memiliki akses terbatas.</p>
    <p class="forbidden__desc">Halaman ini hanya bisa diakses level user tertentu.</p>
    <a href="/" class="button__2" style="margin-top: 2rem;"> <i class="ri-arrow-left-line"></i> Kembali </a>
  </div>

  <!--=============== MAIN JS ===============-->
  <script src="/js/main.js"></script>
</body>

</html>
</body>
@endif