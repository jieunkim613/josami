@extends('layouts.main')

@section('container')
<section class="menu section" id="menu">
  <span class="section__subtitle">Daftar Menu</span>
  <h3 class="section__title">Manajemen Menu</h3>
  <a href="/menus/create" class="button"> Tambah Menu <i class="ri-add-line"></i> </a>
  <ul class="menu__filters">
    <li class="menu__item menu__line menu__line-2" data-filter=".camilan">
      <h3 class="section__title">Camilan</h3>
    </li>
    <li class="menu__item menu__line menu__line-2 active-menu" data-filter=".makanan">
      <h3 class="section__title">Makanan</h3>
    </li>
    <li class="menu__item " data-filter=".minuman">
      <h3 class="section__title">Minuman</h3>
    </li>
  </ul>
  <div class="menu__container container grid">
    @foreach ($menus as $menu)
    @if ($menu->category_id == 1)
    <div class="menu__card makanan">
      @elseif ($menu->category_id == 2)
      <div class="menu__card minuman">
        @else
        <div class="menu__card camilan">
          @endif
          <div class="menu__border">
            @if ($menu->image)
            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="menu__img">
            @else
            <img src="storage/default/default-menus.png" alt="{{ $menu->name }}" class="menu__img">
            @endif
          </div>
          <h3 class="menu__name">{{ $menu->name }}</h3>
          @if ($menu->category_id == 1)
          <span class="menu__category">Makanan</span>
          @elseif ($menu->category_id == 2)
          <span class="menu__category">Minuman</span>
          @else
          <span class="menu__category">Camilan</span>
          @endif
          <div class="menu__tool" id="menu-tool">
            <div class="menu__tool-control">
              <ul class="menu__tool-list">
                <a href="/menus/{{ $menu->slug }}" class="menu__tool-link">
                  <i class="ri-eye-line"></i>
                </a>
                <a href="/menus/{{ $menu->slug }}/edit" class="menu__tool-link">
                  <i class="ri-settings-line"></i>
                </a>
                <form action="/menus/{{ $menu->slug }}" method="post" spellcheck="false" autocomplete="off">
                  @method('delete')
                  @csrf
                  <button class="menu__tool-link button__trash" onclick="return confirm('Yakin menghapus data?')">
                    <i class="ri-delete-bin-3-line"></i>
                  </button>
                </form>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <img src="img/leaf-branch-1.png" alt="home image" class="bg__leaf-1" />
      <img src="img/leaf-branch-1.png" alt="home image" class="bg__leaf-2" />
      <img src="img/leaf-branch-4.png" alt="home image" class="bg__leaf-3" />
</section>
@endsection

@push('scripts')
<!-- =============== MIXITUP FILTER MENU =============== -->
<script>
  let mixerMenu = mixitup(".menu__container", {
    selectors: {
      target: ".menu__card",
    },
    animation: {
      duration: 300,
    },
  });

  // Default filter menu
  mixerMenu.filter(".makanan");

  // Link active menu
  const linkMenu = document.querySelectorAll(".menu__item");

  function activeMenu() {
    linkMenu.forEach((l) => l.classList.remove("active-menu"));
    this.classList.add("active-menu");
  }
  linkMenu.forEach((l) => l.addEventListener("click", activeMenu));
</script>
@endpush