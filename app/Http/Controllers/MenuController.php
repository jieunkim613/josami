<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('menus.index', [
      "menus" => Menu::all(),
      "title" => "Menu"
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('menus.create', [
      "title" => "Tambah Menu",
      'categories' => ['1', '2', '3']
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreMenuRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreMenuRequest $request)
  {
    $validateData = $request->validate(
      [
        'name' => 'required|max:255',
        'slug' => 'required|unique:users',
        'category_id' => 'required',
        'description' => 'required',
        'available' => 'required',
        'image' => 'image|file|max:1024',
        'price' => 'required',
      ],
      [
        'name.required' => 'Nama menu wajib diisi.',
        'name.max' => 'Nama maksimal berisi 255 karakter.',
        'category_id.required' => 'Kategori menu wajib dipilih.',
        'description.required' => 'Deskripsi menu wajib diisi.',
        'available.required' => 'Ketersediaan menu wajib dipilih.',
        'image.image' => 'Foto menu harus berupa gambar.',
        'image.max' => 'Foto menu maksimal berukuran 1 Mb.',
        'price.required' => 'Harga menu wajib diisi.',
      ]
    );

    if ($request->file('image')) {
      $validateData['image'] = $request->file('image')->store('menu-images');
    }

    if ($validateData['available'] == true) {
      $validateData['available'] = 1;
    } else {
      $validateData['available'] = 0;
    }


    Menu::create($validateData);

    return redirect('/menus')->with('success', 'Menu baru berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function show(Menu $menu)
  {
    return view('menus.show', [
      'menu' => $menu,
      "title" => "Detail Karyawan",
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function edit(Menu $menu)
  {
    return view('menus.edit', [
      "title" => "Tambah Menu",
      'categories' => ['1', '2', '3'],
      'menu' => $menu
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateMenuRequest  $request
   * @param  \App\Models\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateMenuRequest $request, Menu $menu)
  {
    $rules = [
      'name' => 'required|max:255',
      'category_id' => 'required',
      'description' => 'required',
      'available' => 'required',
      'image' => 'image|file|max:1024',
      'price' => 'required',
    ];

    if ($request->slug != $menu->slug) {
      $rules['slug'] = 'required|unique:users';
    }

    $validateData = $request->validate(
      $rules,
      [
        'name.required' => 'Nama menu wajib diisi.',
        'name.max' => 'Nama maksimal berisi 255 karakter.',
        'category_id.required' => 'Kategori menu wajib dipilih.',
        'description.required' => 'Deskripsi menu wajib diisi.',
        'available.required' => 'Ketersediaan menu wajib dipilih.',
        'image.image' => 'Foto menu harus berupa gambar.',
        'image.max' => 'Foto menu maksimal berukuran 1 Mb.',
        'price.required' => 'Harga menu wajib diisi.',
      ]
    );

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validateData['image'] = $request->file('image')->store('menu-images');
    }

    if ($validateData['available'] == "true") {
      $validateData['available'] = 1;
    } else {
      $validateData['available'] = 0;
    }


    Menu::where('id', $menu->id)
      ->update($validateData);

    return redirect('/menus')->with('success', 'Data menu berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function destroy(Menu $menu)
  {
    if ($menu->image) {
      Storage::delete($menu->image);
    }
    Menu::destroy($menu->id);

    return redirect('/menus')->with('success', 'Data menu berhasil dihapus!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Menu::class, 'slug', $request->name);
    return response()->json(['slug' => $slug]);
  }
}
