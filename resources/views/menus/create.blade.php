@extends('layouts.main')

@section('container')
<section class="menu__create section" id="menu__create">
  <span class="section__subtitle">Lengkapi Data</span>
  <h3 class="section__title">Tambah Menu</h3>
  <a href="/menus" class="button__2"> <i class="ri-arrow-left-line"></i> Kembali </a>
  <div class="menu__container container">
    <form action="/menus" class="form" method="POST" enctype="multipart/form-data" spellcheck="false" autocomplete="off">
      @csrf
      <div class="column">
        <div class="input-box">
          <label>Nama Menu</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama menu" />
        </div>
        <div class="input-box">
          <label>Kategori</label>
          <div class="select-box">
            <select id="category_id" name="category_id" value="{{ old('category_id') }}">
              <option hidden>Pilih</option>
              @foreach ($categories as $category)
              @if(old('category_id') == $category)
              <option value="{{ $category }}" selected>
                @if($category == 1)
                Makanan
                @elseif ($category == 2)
                Minuman
                @else
                Camilan
                @endif
              </option>
              @else
              <option value="{{ $category }}">
                @if($category == 1)
                Makanan
                @elseif ($category == 2)
                Minuman
                @else
                Camilan
                @endif
              </option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Deskripsi</label>
          <input type="text" id="description" name="description" value="{{ old('description') }}" maxlength="28" placeholder="Masukkan deskripsi" />
        </div>
        <div class="radio-box">
          <h3>Ketersediaan Menu</h3>
          <div class="radio-option">
            @if(old('available') == "true")
            <div class="radio">
              <input type="radio" id="check-true" name="available" value="true" checked />
              <label for="check-true">Tersedia</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-false" name="available" value="false" />
              <label for="check-false">Tidak Tersedia</label>
            </div>
            @elseif (old('available') == "false")
            <div class="radio">
              <input type="radio" id="check-true" name="available" value="true" />
              <label for="check-true">Tersedia</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-false" name="available" value="false" checked />
              <label for="check-false">Tidak Tersedia</label>
            </div>
            @else
            <div class="radio">
              <input type="radio" id="check-true" name="available" value="true" />
              <label for="check-true">Tersedia</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-false" name="available" value="false" />
              <label for="check-false">Tidak Tersedia</label>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Foto Menu</label>
          <input type="file" id="image" name="image" value="{{ old('image') }}" placeholder="Pilih foto" />
        </div>
        <div class="input-box">
          <label>Harga</label>
          <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Masukkan nomor telepon" />
        </div>
      </div>
      <button> Tambah <i class="ri-add-line"></i> </button>
      <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}" readonly>
    </form>
  </div>
  <img src="/img/leaf-branch-2.png" alt="menu_create image" class="bg__leaf-1" />
</section>
@endsection

@push('scripts')
<!--=============== AUTOSLUG ===============-->
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/menus/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endpush