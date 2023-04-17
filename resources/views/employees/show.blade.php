@extends('layouts.main')

@section('container')
<section class="employee__show section" id="employee__show">
  <span class="section__subtitle">Detail Data</span>
  <h3 class="section__title">Detail Data Karyawan</h3>
  <div class="container__2 container grid">
    <div class="employee__card">
      <div class="employee__border">
        @if ($employee->image)
        <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->name }}" class="employee__img">
        @else
        <img src="/storage/default/default-profile.png" alt="{{ $employee->name }}" class="employee__img">
        @endif
      </div>
      <h3 class="employee__name">{{ $employee->name }}</h3>
      @if (auth()->user()->level == 1)
      <span class="employee__profession">Admin</span>
      @elseif (auth()->user()->level == 2)
      <span class="employee__profession">Kasir</span>
      @else
      <span class="employee__profession">Dapur</span>
      @endif
      <div class="employee__social" id="employee-social">
        <div class="employee__social-control">
          <ul class="employee__social-list">
            <a href="/employees" class="employee__social-link">
              <i class="ri-arrow-left-line"></i>
            </a>
            <a href="/employees/{{ $employee->slug }}/edit" class="employee__social-link">
              <i class="ri-settings-line"></i>
            </a>
            <form action="/employees/{{ $employee->slug }}" method="post" spellcheck="false" autocomplete="off">
              @method('delete')
              @csrf
              <button class="employee__social-link button__trash" onclick="return confirm('Yakin menghapus data?')">
                <i class="ri-delete-bin-3-line"></i>
              </button>
            </form>
          </ul>
        </div>
      </div>
    </div>
    <div class="container__3 grid">
      <div class="employee__show-data">
        <h3 class="employee__show-name">Username</h3>
        <p class="employee__show-position">{{ $employee->username }}</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Password</h3>
        <p class="employee__show-position">●●●●●●●●</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Nama</h3>
        <p class="employee__show-position">{{ $employee->name }}</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Posisi</h3>
        @if (auth()->user()->level == 1)
        <p class="employee__show-position">Admin</p>
        @elseif (auth()->user()->level == 2)
        <p class="employee__show-position">Kasir</p>
        @else
        <p class="employee__show-position">Dapur</p>
        @endif
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Jenis Kelamin</h3>
        <p class="employee__show-position">{{ $employee->gender }}</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Umur</h3>
        <p class="employee__show-position">{{ $age }}</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Nomor Telepon</h3>
        <p class="employee__show-position">{{ $employee->phone_number }}</p>
      </div>
      <div class="employee__show-data">
        <h3 class="employee__show-name">Alamat</h3>
        <p class="employee__show-position">{{ $employee->address }}</p>
      </div>
    </div>
  </div>
  <img src="/img/leaf-branch-1.png" alt="employee__show image" class="bg__leaf" />
</section>
@endsection