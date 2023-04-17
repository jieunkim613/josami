@extends('layouts.main')

@section('container')
<section class="queue section" id="queue">
  <span class="section__subtitle">Antrian Pesanan</span>
  <h3 class="section__title">Pesanan Belum Dimasak</h3>
  <div class="queue__container container grid">
    @foreach ($incoming_orders as $incoming_order)
    <div class="queue__card">
      <h3 class="queue__name">JSM{{ $incoming_order->id }}</h3>
      <span class="queue__profession">{{ date('d-M-Y H:i', strtotime($incoming_order->created_at)) }}</span>
      <a href="/orders/{{ $incoming_order->id }}/edit" class="queue__button-1">
        <i class="ri-eye-line"></i>
      </a>
    </div>
    @endforeach
  </div>
  <h3 class="section__title">Pesanan Sedang Dimasak</h3>
  <div class="queue__container container grid">
    @foreach ($order_processeds as $order_processed)
    <div class="queue__card">
      <h3 class="queue__name">JSM{{ $order_processed->id }}</h3>
      <span class="queue__profession">{{ date('d-M-Y H:i', strtotime($order_processed->created_at)) }}</span>
      <a href="/orders/{{ $order_processed->id }}/edit" class="queue__button-1">
        <i class="ri-eye-line"></i>
      </a>
    </div>
    @endforeach
  </div>
  <img src="img/leaf-branch-1.png" alt="order image" class="bg__leaf-1" />
  <img src="img/leaf-branch-1.png" alt="order image" class="bg__leaf-2" />
  <img src="img/leaf-branch-4.png" alt="order image" class="bg__leaf-3" />
</section>
@endsection