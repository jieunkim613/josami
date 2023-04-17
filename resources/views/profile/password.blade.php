@extends('layouts.main')

@section('container')
<section class="profile__password section" id="profile__password">
  <span class="section__subtitle">Perbarui Password</span>
  <h3 class="section__title">Ubah Password Anda</h3>
  <a href="/profile" class="button__2"> <i class="ri-arrow-left-line"></i> Kembali </a>
  <div class="profile__container container">
    <form action="/profile/updatePassword" class="form" method="POST" spellcheck="false" autocomplete="off">
      @csrf
      <div class="column">
        <div class="input-box">
          <label>Password Lama</label>
          <input type="password" id="oldPassword" name="oldPassword" placeholder="Masukkan password lama" />
        </div>
        <div class="input-box">
          <label></label>
          <input type="hidden" />
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Password Baru</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password baru" />
        </div>
        <div class="input-box">
          <label>Konfirmasi Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru" />
        </div>
      </div>
      <button> Perbarui <i class="ri-key-line"></i> </button>
    </form>
  </div>
  <img src="/img/leaf-branch-2.png" alt="profile__password image" class="bg__leaf-1" />
</section>
@endsection

@push('scripts')
<!--=============== AUTOSLUG ===============-->
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/profile/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endpush