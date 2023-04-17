<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $employees = User::where('level', '!=', 1)->orderBy('name', 'asc')->get();
    foreach ($employees as $employee) {
      $employee->date_of_birth = Carbon::parse($employee->date_of_birth)->age;
    }
    return view('employees.index', [
      "title" => "Karyawan",
      'employees' => $employees
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('employees.create', [
      "title" => "Tambah Karyawan",
      'genders' => User::enumDropdown('users', 'gender'),
      'levels' => ['1', '2', '3']
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validateData = $request->validate(
      [
        'image' => 'image|file|max:1024',
        'username' => 'required|unique:users',
        'phone_number' => 'required|unique:users',
        'name' => 'required|max:255',
        'slug' => 'required|unique:users',
        'gender' => 'required|in:Laki-laki,Perempuan',
        'date_of_birth' => 'required',
        'address' => 'required',
        'password' => 'required|min:8|max:255',
        'level' => 'required'
      ],
      [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal berisi 255 karakter.',
        'username.required' => 'Username wajib diisi.',
        'username.unique' => 'Username sudah terdaftar sebelumnya.',
        'phone_number.required' => 'Nomor Telepon wajib diisi.',
        'phone_number.unique' => 'Nomor Telepon sudah terdaftar sebelumnya.',
        'image.image' => 'Foto profil harus berupa gambar.',
        'image.max' => 'Foto profil maksimal berukuran 1 Mb.',
        'gender.required' => 'Jenis kelamin wajib diisi.',
        'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
        'address.required' => 'Alamat wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal berisi 8 karakter.',
        'password.max' => 'Password maksimal berisi 255 karakter.',
        'level.required' => 'Pilih posisi.',
      ]
    );

    if ($request->file('image')) {
      $validateData['image'] = $request->file('image')->store('profile-images');
    }

    $validateData['password'] = Hash::make($validateData['password']);

    User::create($validateData);

    return redirect('/employees')->with('success', 'Data karyawan berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $employee)
  {
    $age = Carbon::parse($employee->date_of_birth)->age;

    return view('employees.show', [
      'employee' => $employee,
      'age' => $age,
      "title" => "Detail Karyawan",
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $employee)
  {
    return view('employees.edit', [
      "title" => "Ubah Data Karyawan",
      'employee' => $employee,
      'genders' => User::enumDropdown('users', 'gender'),
      'levels' => ['1', '2', '3']
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $employee)
  {
    $rules = [
      'image' => 'image|file|max:1024',
      'phone_number' => 'required',
      'name' => 'required|max:255',
      'gender' => 'required|in:Laki-laki,Perempuan',
      'date_of_birth' => 'required',
      'address' => 'required',
      'level' => 'required'
    ];

    if ($request->slug != $employee->slug) {
      $rules['slug'] = 'required|unique:users';
    }

    $validateData = $request->validate(
      $rules,
      [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal berisi 255 karakter.',
        'phone_number.required' => 'Nomor Telepon wajib diisi.',
        'image.image' => 'Foto profil harus berupa gambar.',
        'image.max' => 'Foto profil maksimal berukuran 1 Mb.',
        'gender.required' => 'Jenis kelamin wajib diisi.',
        'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
        'address.required' => 'Alamat wajib diisi.',
        'level.required' => 'Pilih posisi.',
      ]
    );

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validateData['image'] = $request->file('image')->store('profile-images');
    }

    User::where('id', $employee->id)
      ->update($validateData);

    return redirect('/employees')->with('success', 'Data karyawan berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $employee)
  {
    if ($employee->image) {
      Storage::delete($employee->image);
    }
    User::destroy($employee->id);

    return redirect('/employees')->with('success', 'Data karyawan berhasil dihapus!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(User::class, 'slug', $request->name);
    return response()->json(['slug' => $slug]);
  }
}
