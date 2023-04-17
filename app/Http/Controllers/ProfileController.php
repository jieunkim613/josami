<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\GreetingsUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  use GreetingsUser;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('profile.index', [
      'age' => Carbon::parse(auth()->user()->date_of_birth)->age,
      'title' => "Profil"
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $profile)
  {
    return view('profile.edit', [
      "title" => "Ubah Data Profil",
      'genders' => User::enumDropdown('users', 'gender'),
      'levels' => ['1', '2', '3']
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $profile)
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

    if ($request->slug != $profile->slug) {
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

    User::where('id', $profile->id)
      ->update($validateData);

    return redirect('/profile')->with('success', 'Data profil berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(User::class, 'slug', $request->name);
    return response()->json(['slug' => $slug]);
  }

  public function changePassword()
  {
    return view('profile.password', [
      "title" => "Perbarui Password"
    ]);
  }

  public function updatePassword(Request $request)
  {
    // Validation
    $request->validate(
      [
        'oldPassword' => 'required',
        'password' => 'required|confirmed',
      ],
      [
        'oldPassword.required' => 'Password lama wajib diisi.',
        'password.required' => 'Password baru wajib diisi.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
      ]
    );

    // Match The Old Password
    if (!Hash::check($request->oldPassword, auth()->user()->password)) {
      return back()->with("error", "Password lama tidak sesuai");
    }

    // Update the new Password
    User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->password)
    ]);

    return redirect('/profile')->with("status", "Password berhasil diperbarui");
  }
}
