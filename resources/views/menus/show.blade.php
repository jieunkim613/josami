@extends('layouts.main')

@section('container')
<section class="menu__show section" id="menu__show">
  <span class="section__subtitle">Lihat Detail</span>
  <h3 class="section__title">Detail Menu</h3>
  <div class="container__2 container grid">
    <div class="menu__card">
      <div class="menu__border">
        @if ($menu->image)
        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="menu__img">
        @else
        <img src="/storage/default/default-menus.png" alt="{{ $menu->name }}" class="menu__img">
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
            <a href="/menus" class="menu__tool-link">
              <i class="ri-arrow-left-line"></i>
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
    <div class="container__3 grid">
      <div class="menu__show-data">
        <h3 class=" menu__show-title">Nama Menu</h3>
        <p class="menu__show-description">{{ $menu->name }}</p>
      </div>
      <div class="menu__show-data">
        <h3 class=" menu__show-title">Kategori Menu</h3>
        @if ($menu->category_id == 1)
        <p class="menu__show-description">Makanan</p>
        @elseif ($menu->category_id == 2)
        <p class="menu__show-description">Minuman</p>
        @else
        <p class="menu__show-description">Camilan</p>
        @endif
      </div>
      <div class="menu__show-data">
        <h3 class=" menu__show-title">Deskripsi</h3>
        <p class="menu__show-description">{{ $menu->description }}</p>
      </div>
      <div class="menu__show-data">
        <h3 class=" menu__show-title">Harga</h3>
        <p class="menu__show-description">{{ $menu->price }}K</p>
      </div>
      <div class="menu__show-data">
        <h3 class=" menu__show-title">Ketersediaan</h3>
        @if ($menu->available == 1)
        <p class="menu__show-description">Tersedia</p>
        @else
        <p class="menu__show-description">Tidak Tersedia</p>
        @endif
      </div>
    </div>
  </div>
  <img src="/img/leaf-branch-1.png" alt="menu_show image" class="bg__leaf" />
</section>

@endsection