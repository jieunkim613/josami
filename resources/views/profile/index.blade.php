@extends('layouts.main')

@section('container')
<section class="profile section" id="profile">
  <span class="section__subtitle">Data Diri</span>
  <h3 class="section__title">Data Profil Anda</h3>
  <div class="container__2 container grid">
    <div class="profile__card">
      <div class="profile__border">
        @if (auth()->user()->image)
        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="{{ auth()->user()->name }}" class="profile__img">
        @else
        <img src="/storage/default/default-profile.png" alt="{{ auth()->user()->name }}" class="profile__img">
        @endif
      </div>
      <h3 class="profile__name">{{ auth()->user()->name }}</h3>
      @if (auth()->user()->level == 1)
      <span class="profile__profession">Admin</span>
      @elseif (auth()->user()->level == 2)
      <span class="profile__profession">Kasir</span>
      @else
      <span class="profile__profession">Dapur</span>
      @endif
      <div class="profile__social" id="profile-social">
        <div class="profile__social-control">
          <ul class="profile__social-list">
            <a href="/profile/{{ auth()->user()->slug }}/edit" class="profile__social-link">
              <i class="ri-settings-line"></i>
            </a>
            <a href="/profile/changePassword" class="profile__social-link">
              <i class="ri-lock-password-line"></i>
            </a>
            <form action="/logout" method="post">
              @csrf
              <button class="profile__social-link button__trash" onclick="return confirm('Yakin ingin keluar?')">
                <i class="ri-logout-circle-r-line"></i>
              </button>
            </form>
          </ul>
        </div>
      </div>
    </div>
    <div class="container__3 grid">
      <div class="profile__show-data">
        <h3 class="profile__show-name">Username</h3>
        <p class="profile__show-position">{{ auth()->user()->username }}</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Password</h3>
        <p class="profile__show-position">●●●●●●●●</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Nama</h3>
        <p class="profile__show-position">{{ auth()->user()->name }}</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Posisi</h3>
        @if (auth()->user()->level == 1)
        <p class="profile__show-position">Admin</p>
        @elseif (auth()->user()->level == 2)
        <p class="profile__show-position">Kasir</p>
        @else
        <p class="profile__show-position">Dapur</p>
        @endif
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Jenis Kelamin</h3>
        <p class="profile__show-position">{{ auth()->user()->gender }}</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Umur</h3>
        <p class="profile__show-position">{{ $age }}</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Nomor Telepon</h3>
        <p class="profile__show-position">{{ auth()->user()->phone_number }}</p>
      </div>
      <div class="profile__show-data">
        <h3 class="profile__show-name">Alamat</h3>
        <p class="profile__show-position">{{ auth()->user()->address }}</p>
      </div>
    </div>
  </div>
  <img src="/img/leaf-branch-1.png" alt="profile image" class="bg__leaf" />
</section>
@endsection