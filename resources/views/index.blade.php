@extends('layouts.main')

@section('container')
<section class="dashboard section" id="dashboard">
  <span class="section__subtitle">Dashboard</span>
  <h3 class="section__title">Data Hari Ini</h3>
  <div class="dashboard__container container grid">
    <div class="dashboard__card">
      <a href="/profile">
        <div class="dashboard__border">
          @if (auth()->user()->image)
          <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="{{ auth()->user()->name }}" class="dashboard__img">
          @else
          <img src="storage/default/default-profile.png" alt="{{ auth()->user()->name }}" class="dashboard__img">
          @endif
        </div>
      </a>
      <h3 class="dashboard__name">{{ auth()->user()->name }}</h3>
      <span class="dashboard__profession">User yang sedang Login</span>
    </div>
    <div class="dashboard__card">
      <a href="/histories">
        <div class="dashboard__border">
          <div class="dashboard__img">
            <h3 class="dashboard__title">{{ $orders }}</h3>
          </div>
        </div>
      </a>
      <h3 class="dashboard__name">Pesanan</h3>
      <span class="dashboard__profession">Jumlah pesanan hari ini</span>
    </div>
    @if(auth()->user()->level == 2)
    <div class="dashboard__card">
      <a href="/orders">
        <div class="dashboard__border">
          <div class="dashboard__img">
            <h3 class="dashboard__title">{{ $menus }}</h3>
          </div>
        </div>
      </a>
      <h3 class="dashboard__name">Menu</h3>
      <span class="dashboard__profession">Jumlah menu tersedia hari ini</span>
    </div>
    @else
    <div class="dashboard__card">
      <div class="dashboard__border">
        <div class="dashboard__img">
          <h3 class="dashboard__title">{{ $menus }}</h3>
        </div>
      </div>
      <h3 class="dashboard__name">Menu</h3>
      <span class="dashboard__profession">Jumlah menu tersedia hari ini</span>
    </div>
    @endif
    <div class="dashboard__card">
      <a href="/queues">
        <div class="dashboard__border">
          <div class="dashboard__img">
            <h3 class="dashboard__title">{{ $orders_incoming }}</h3>
          </div>
        </div>
      </a>
      <h3 class="dashboard__name">Pesanan</h3>
      <span class="dashboard__profession">Jumlah pesanan belum dimasak hari ini</span>
    </div>
    <div class="dashboard__card">
      <a href="/queues">
        <div class="dashboard__border">
          <div class="dashboard__img">
            <h3 class="dashboard__title">{{ $orders_processed }}</h3>
          </div>
        </div>
      </a>
      <h3 class="dashboard__name">Pesanan</h3>
      <span class="dashboard__profession">Jumlah pesanan sedang dimasak hari ini</span>
    </div>
    <div class="dashboard__card">
      <a href="/histories">
        <div class="dashboard__border">
          <div class="dashboard__img">
            <h3 class="dashboard__title">{{ $orders_completed }}</h3>
          </div>
        </div>
      </a>
      <h3 class="dashboard__name">Pesanan</h3>
      <span class="dashboard__profession">Jumlah pesanan sudah selesai hari ini</span>
    </div>
  </div>
  <img src="img/leaf-branch-1.png" alt="dashboard image" class="bg__leaf-1" />
  <img src="img/leaf-branch-1.png" alt="dashboard image" class="bg__leaf-2" />
  <img src="img/leaf-branch-4.png" alt="dashboard image" class="bg__leaf-3" />
</section>
@endsection