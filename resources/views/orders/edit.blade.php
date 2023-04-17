@extends('layouts.main')

@section('container')
<section class="order__edit section" id="order__edit">
  <span class="section__subtitle">Detail Pesanan</span>
  @if($orders->customer_change)
  <h3 class="section__title">Detail Pesanan</h3>
  @else
  <h3 class="section__title">Detail Pesanan Anda</h3>
  @endif
  @if($orders->customer_change && $orders->cooking_status == "Sudah Dihidangkan")
  <div class="text-align-center">
    <a href="/histories" class="button__2"> <i class="ri-arrow-left-line"></i> Kembali </a>
  </div>
  @elseif($orders->customer_change)
  <div class="text-align-center">
    <a href="/queues" class="button__2"> <i class="ri-arrow-left-line"></i> Kembali </a>
  </div>
  @endif
  <form action="/orders/{{ $orders->id }}" class="form" method="POST" enctype="multipart/form-data" spellcheck="false" autocomplete="off">
    @method('put')
    @csrf
    <div class="container__2 container grid">
      <div>
        <div class="order__edit-card">
          <span class="order__edit-title no__margin">ID Pemesanan</span>
          <h3 class="order__edit-desc">JSM{{$orders->id}}</h3>
          <span class="order__edit-title no__margin">Tanggal Pemesanan</span>
          <h3 class="order__edit-desc">{{ date('d-M-Y', strtotime($orders->created_at)) }}</h3>
          <span class="order__edit-title no__margin">Jam Pemesanan</span>
          <h3 class="order__edit-desc">{{ date('H:i', strtotime($orders->created_at)) }} WIB</h3>
          <span class="order__edit-title">Kasir</span>
          @foreach($users as $user)
          @if($user->id == $orders->user_id)
          <h3 class="order__edit-desc">{{$user->name}}</h3>
          @endif
          @endforeach
          <span class="order__edit-title">Pemesan</span>
          @if($orders->customer)
          <h3 class="order__edit-desc">{{ $orders->customer }}</h3>
          @else
          <div class="input-box no__margin">
            <input type="text" class="no__margin" id="customer" name="customer" value="{{ old('customer') }}">
          </div>
          @endif
          <span class="order__edit-title">Total Harga</span>
          <h3 class="order__edit-desc">Rp. {{ $orders->total_price }}.000,-</h3>
        </div>
      </div>
      <div>
        <div class="container__3 order__edit-grid grid">
          @foreach($orders->menu as $m)
          <div class="order__edit-data">
            <h3 class="order__edit-name">{{$m->name}}</h3>
          </div>
          <div class="order__edit-data2">
            @foreach($menu_order as $mo)
            @if($mo->menu_id == $m->id)
            <p class="order__edit-price">Rp. {{$m->price}}.000&nbsp;&nbsp; x &nbsp;&nbsp;{{$mo->quantity}}&nbsp;&nbsp; = &nbsp;&nbsp;Rp. {{$mo->temporary_total_price}}.000,-</p>
            @endif
            @endforeach
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="container__3 container grid no_padding">
      <div>
        <div class="order__edit-card">
          <span class="order__edit-title no__margin">Total Bayar</span>
          @if($orders->customer_pay)
          <h3 class="order__edit-desc">Rp. {{ $orders->customer_pay }}.000,-</h3>
          @else
          <div class="input-box no__margin">
            <input type="text" class="no__margin" id="customer_pay" name="customer_pay" value="{{ old('customer_pay') }}" onchange="customerChange()">
            <input type="hidden" id="total_price" value="{{ $orders->total_price }}">
          </div>
          @endif
        </div>
      </div>
      <div>
        <div class="order__edit-card">
          <span class="order__edit-title no__margin">Kembalian</span>
          @if($orders->customer_change)
          <h3 class="order__edit-desc">Rp. {{ $orders->customer_change }}.000,-</h3>
          @else
          <div class="input-box no__margin">
            <input type="text" class="no__margin" id="customer_change" name="customer_change" value="{{ old('customer_change') }}" readonly>
          </div>
          @endif
        </div>
      </div>
    </div>
    @if($orders->customer_change && $orders->cooking_status == "Belum Dimasak")
    <input type="hidden" name="cooking_status" value="Sedang Dimasak" readonly>
    <div class="container__3 container">
      <div class="text-align-center">
        <a class="button_3" href="/orders/{{ $orders->id }}"> Cetak Nota Pesanan <i class="ri-file-download-line"></i> </a>
      </div>
    </div>
    @can('dapur')
    <div class="container__3 container">
      <div class="text-align-center">
        <button type="submit" class="button"> Konfirmasi <i class="ri-checkbox-circle-line"></i> </button>
      </div>
    </div>
    @endcan
  </form>
  @elseif($orders->customer_change && $orders->cooking_status == "Sedang Dimasak")
  <input type="hidden" name="cooking_status" value="Sudah Dihidangkan" readonly>
  <div class="container__3 container">
    <div class="text-align-center">
      <a class="button_3" href="/orders/{{ $orders->id }}"> Cetak Nota Pesanan <i class="ri-file-download-line"></i> </a>
    </div>
  </div>
  @can('dapur')
  <div class="container__3 container">
    <div class="text-align-center">
      <button type="submit" class="button"> Selesai <i class="ri-checkbox-circle-line"></i> </button>
    </div>
  </div>
  @endcan
  </form>
  @elseif($orders->customer_change && $orders->cooking_status == "Sudah Dihidangkan")
  <div class="container__3 container">
    <div class="text-align-center">
      <a class="button_3" href="/orders/{{ $orders->id }}"> Cetak Nota Pesanan <i class="ri-file-download-line"></i> </a>
    </div>
  </div>
  </form>
  @else
  <input type="hidden" name="cooking_status" value="Belum Dimasak" readonly>
  <div class="container__3 container">
    <div class="text-align-center">
      <button type="submit" class="button"> Konfirmasi <i class="ri-checkbox-circle-line"></i> </button>
    </div>
  </div>
  </form>
  <div class="container__3 container">
    <div class="text-align-center">
      <form action="/orders/{{ $orders->id }}" method="post" spellcheck="false" autocomplete="off">
        @method('delete')
        @csrf
        <button class="button_3" onclick="return confirm('Yakin membatalkan pesanan?')"> Batalkan <i class="ri-error-warning-line"></i> </button>
      </form>
    </div>
  </div>
  @endif
  <img src="/img/leaf-branch-1.png" alt="order__edit image" class="bg__leaf" />
</section>
@endsection

@push('scripts')
<!-- =============== CUSTOMER CHANGE =============== -->
<script>
  function customerChange() {
    var total_price = document.getElementById("total_price");
    var customer_pay = document.getElementById("customer_pay");
    var customer_change = document.getElementById("customer_change");
    customer_change.value = customer_pay.value - total_price.value * 1000;
    console.log(customer_change.value);
  }
</script>
@endpush