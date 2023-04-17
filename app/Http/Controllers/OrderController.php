<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Menu;
use App\Models\MenuOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('orders.index', [
      "title" => "Buat Pesanan",
      "menus" => Menu::all(),
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
   * @param  \App\Http\Requests\StoreOrderRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreOrderRequest $request)
  {
    $data = [
      'user_id' => auth()->user()->id,
    ];

    Order::create($data);

    $order_id = DB::table('orders')->latest('created_at')->first('id')->id;
    $menus_id = Menu::all();
    $total_price = 0;

    foreach ($menus_id as $menu_id) {
      $m_id = $menu_id->id;
      $quantity = (int)$request->$m_id;

      if ($quantity > 0) {
        $data_2 = [
          'order_id' => $order_id,
          'menu_id' => $m_id,
          'quantity' => $quantity,
          'temporary_total_price' => $menu_id->price * $quantity,
        ];
        MenuOrder::create($data_2);
        $total_price += $menu_id->price * $quantity;
      }
    }

    DB::table('orders')->where('id', $order_id)->update(['total_price' => $total_price]);

    return redirect()->route('orders.edit', $order_id);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order)
  {
    $orders = Order::where('id', $order->id)->get();
    $users = User::all();
    $now = Carbon::now();
    $pdf = PDF::loadView('orders.pdf', [
      'title' => 'Nota Pesanan',
      'pdfTitle' => 'Nota Pesanan',
      'pdfDate' => Carbon::today()->toDateString(),
      'orders' => $orders,
      'users' => $users,
      'now' => $now,
      'menu_orders' => DB::table('menu_orders')->where('order_id', $order->id)->get(),
    ]);

    return $pdf->download('JSM' . $order->id . '.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    return view('orders.edit', [
      "title" => "Konfirmasi Pesanan",
      'orders' => $order,
      'menu_order' => DB::table('menu_orders')->where('order_id', $order->id)->get(),
      'users' => DB::table('users')->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateOrderRequest  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateOrderRequest $request, Order $order)
  {
    if ($request->cooking_status == "Belum Dimasak") {
      $rules = [
        'customer' => 'required|max:255',
        'customer_pay' => 'required',
        'customer_change' => 'required',
      ];

      $validateData = $request->validate(
        $rules,
        [
          'customer.required' => 'Nama pelanggan menu wajib diisi.',
          'customer.max' => 'Nama pelanggan maksimal berisi 255 karakter.',
          'customer_pay.required' => 'Total bayar menu wajib dipilih.',
          'customer_change.required' => 'Kembalian menu wajib diisi.',
        ]
      );

      $validateData['cooking_status'] = 'Belum Dimasak';
      $validateData['customer_pay'] = $validateData['customer_pay'] / 1000;
      $validateData['customer_change'] = $validateData['customer_change'] / 1000;

      Order::where('id', $order->id)->update($validateData);

      return redirect('/orders')->with('success', 'Pesanan berhasil dibuat!');
    } elseif ($request->cooking_status == "Sedang Dimasak") {
      $validateData['cooking_status'] = 'Sedang Dimasak';
      Order::where('id', $order->id)->update($validateData);
      return redirect('/queues')->with('success', 'Status pesanan berhasil diperbarui!');
    } elseif ($request->cooking_status == "Sudah Dihidangkan") {
      $validateData['cooking_status'] = 'Sudah Dihidangkan';
      Order::where('id', $order->id)->update($validateData);
      return redirect('/queues')->with('success', 'Status pesanan berhasil diperbarui!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    Order::destroy($order->id);
    MenuOrder::where('order_id', $order->id)->delete();

    // $menuOrder = MenuOrder::where('order_id', '=', $order->id)->get();
    // dd($menuOrder);
    // $menuOrder->each->destroy();

    return redirect('/orders')->with('success', 'Pemesanan telah dibatalkan!');
  }

  public function total(Order $order)
  {
    //
  }
}
