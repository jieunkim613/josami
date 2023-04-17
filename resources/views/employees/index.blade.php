@extends('layouts.main')

@section('container')
<section class="employee section" id="employee">
  <span class="section__subtitle">Daftar Karyawan</span>
  <h3 class="section__title">Manajemen Karyawan</h3>
  <a href="/employees/create" class="button"> Tambah Karyawan <i class="ri-add-line"></i> </a>
  <div class="employee__container container grid">
    @foreach ($employees as $employee)
    <div class="employee__card">
      <div class="employee__border">
        @if ($employee->image)
        <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->name }}" class="employee__img">
        @else
        <img src="storage/default/default-profile.png" alt="{{ $employee->name }}" class="employee__img">
        @endif
      </div>
      <h3 class="employee__name">{{ $employee->name }}</h3>
      @if ($employee->level == 1)
      <span class="employee__profession">Admin</span>
      @elseif ($employee->level == 2)
      <span class="employee__profession">Kasir</span>
      @else
      <span class="employee__profession">Dapur</span>
      @endif
      <div class="employee__social" id="employee-social">
        <div class="employee__social-control">
          <ul class="employee__social-list">
            <a href="/employees/{{ $employee->slug }}" class="employee__social-link">
              <i class="ri-eye-line"></i>
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
    @endforeach
  </div>
  <img src="img/leaf-branch-1.png" alt="home image" class="bg__leaf-1" />
  <img src="img/leaf-branch-1.png" alt="home image" class="bg__leaf-2" />
  <img src="img/leaf-branch-4.png" alt="home image" class="bg__leaf-3" />
</section>
@endsection