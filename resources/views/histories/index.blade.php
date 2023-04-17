@extends('layouts.main')

@section('container')
<section class="history section" id="history">
  <span class="section__subtitle">Riwayat Pesanan</span>
  <h3 class="section__title">Pesanan Sudah Selesai</h3>
  <a href="/histories/historiesGeneratePDF" class="button"> Cetak Laporan <i class="ri-file-download-line"></i> </a>
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