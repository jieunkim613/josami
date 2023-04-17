@extends('layouts.main')

@section('container')
<section class="employee__show section" id="employee__show">
  <span class="section__subtitle">Detail Pesanan</span>
  <h3 class="section__title">Detail Pesanan Anda</h3>
  <div class="container__2 container grid">
    <div class="employee__show-data">
      <h3 class="employee__show-name">{{$request->name}}</h3>
    </div>
    <div class="employee__show-data">
      <p class="employee__show-position">50K x 2</p>
    </div>
    <div class="employee__show-data">
      <h3 class="employee__show-name">100K</h3>
    </div>
  </div>
  <img src="/img/leaf-branch-1.png" alt="employee__show image" class="bg__leaf" />
</section>
@endsection