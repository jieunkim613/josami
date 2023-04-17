<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class MainController extends Controller
{
  public function index()
  {
    // $numbers = [2, 3, 4, 5, 1, 6, 8];
    // $data = [];
    // $threshold = 3;
    // foreach ($numbers as $number) {
    //   if ($number >= $threshold) {
    //     $data[] = $number;
    //   }
    // }
    // return $data;
    $orders = Order::whereDate('created_at', Carbon::today())->count();
    $menus = Menu::where('available', 1)->count();
    $orders_incoming = Order::whereDate('created_at', Carbon::today())->where('cooking_status', 'Belum Dimasak')->count();
    $orders_processed = Order::whereDate('created_at', Carbon::today())->where('cooking_status', 'Sedang Dimasak')->count();
    $orders_completed = Order::whereDate('created_at', Carbon::today())->where('cooking_status', 'Sudah Dihidangkan')->count();
    return view('index', [
      "title" => "Dashboard",
      'orders' => $orders,
      'menus' => $menus,
      'orders_incoming' => $orders_incoming,
      'orders_processed' => $orders_processed,
      'orders_completed' => $orders_completed
    ]);
  }
}
