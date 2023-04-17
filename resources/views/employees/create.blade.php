@extends('layouts.main')

@section('container')
<section class="employee__create section" id="employee__create">
  <span class="section__subtitle">Lengkapi Data</span>
  <h3 class="section__title">Tambah Karyawan</h3>
  <a href="/employees" class="button__2"> <i class="ri-arrow-left-line"></i> Kembali </a>
  <div class="employee__container container">
    <form action="/employees" class="form" method="POST" enctype="multipart/form-data" spellcheck="false" autocomplete="off">
      @csrf
      <div class="column">
        <div class="input-box">
          <label>Username</label>
          <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" required />
        </div>
        <div class="input-box">
          <label>Password</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan password" required />
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Nama</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required />
        </div>
        <div class="radio-box">
          <h3>Jenis Kelamin</h3>
          <div class="radio-option">
            @if(old('gender') == "Laki-laki")
            <div class="radio">
              <input type="radio" id="check-male" name="gender" value="Laki-laki" checked />
              <label for="check-male">Laki-laki</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-female" name="gender" value="Perempuan" />
              <label for="check-female">Perempuan</label>
            </div>
            @elseif (old('gender') == "Perempuan")
            <div class="radio">
              <input type="radio" id="check-male" name="gender" value="Laki-laki" />
              <label for="check-male">Laki-laki</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-female" name="gender" value="Perempuan" checked />
              <label for="check-female">Perempuan</label>
            </div>
            @else
            <div class="radio">
              <input type="radio" id="check-male" name="gender" value="Laki-laki" />
              <label for="check-male">Laki-laki</label>
            </div>
            <div class="radio">
              <input type="radio" id="check-female" name="gender" value="Perempuan" />
              <label for="check-female">Perempuan</label>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Foto</label>
          <input type="file" id="image" name="image" value="{{ old('image') }}" placeholder="Pilih foto" required />
        </div>
        <div class="input-box">
          <label>Tanggal Lahir</label>
          <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Masukkan tanggal lahir" required />
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Posisi</label>
          <div class="select-box">
            <select id="level" name="level" value="{{ old('level') }}">
              <option hidden>Pilih</option>
              @foreach ($levels as $level)
              @if(old('level') == $level)
              <option value="{{ $level }}" selected>
                @if($level == 1)
                Admin
                @elseif($level == 2)
                Kasir
                @else
                Dapur
                @endif
              </option>
              @else
              <option value="{{ $level }}">
                @if($level == 1)
                Admin
                @elseif($level == 2)
                Kasir
                @else
                Dapur
                @endif
              </option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="input-box">
          <label>Nomor Telepon</label>
          <input type="number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Masukkan nomor telepon" required />
        </div>
      </div>
      <div class="input-box address">
        <label>Alamat</label>
        <textarea id="address" name="address" value="{{ old('address') }}" cols="30" rows="5"></textarea>
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
    fetch('/employees/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endpush