<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\Order;
use App\Models\User;
use PDF;
use Carbon\Carbon;

class HistoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $order_processed = Order::where('cooking_status', 'Sudah Dihidangkan')->orderBy('created_at', 'desc')->get();
    return view('histories.index', [
      "title" => "Riwayat Pesanan",
      'order_processeds' => $order_processed
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
   * @param  \App\Http\Requests\StoreHistoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreHistoryRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\History  $history
   * @return \Illuminate\Http\Response
   */
  public function show(History $history)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\History  $history
   * @return \Illuminate\Http\Response
   */
  public function edit(History $history)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateHistoryRequest  $request
   * @param  \App\Models\History  $history
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateHistoryRequest $request, History $history)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\History  $history
   * @return \Illuminate\Http\Response
   */
  public function destroy(History $history)
  {
    //
  }

  public function historiesGeneratePDF()
  {
    $orders = Order::where('cooking_status', 'Sudah Dihidangkan')->orderBy('created_at', 'desc')->get();
    $users = User::all();
    $pdf = PDF::loadView('histories.pdf', [
      'title' => 'Laporan Pesanan',
      'pdfTitle' => 'Laporan Pesanan',
      'pdfDate' => Carbon::today()->toDateString(),
      'orders' => $orders,
      'users' => $users,
    ]);

    return $pdf->download('histories.pdf');
  }
}
