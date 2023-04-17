<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Http\Requests\StoreQueueRequest;
use App\Http\Requests\UpdateQueueRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $incoming_orders = Order::where('cooking_status', 'Belum Dimasak')->orderBy('created_at', 'asc')->get();
    $order_processed = Order::where('cooking_status', 'Sedang Dimasak')->orderBy('created_at', 'asc')->get();
    return view('queues.index', [
      "title" => "Antrian",
      'incoming_orders' => $incoming_orders,
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
   * @param  \App\Http\Requests\StoreQueueRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreQueueRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function show(Queue $queue)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function edit(Queue $queue)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateQueueRequest  $request
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateQueueRequest $request, Queue $queue)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function destroy(Queue $queue)
  {
    //
  }
}
