<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('menu_orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('order_id');
      $table->foreignId('menu_id');
      $table->integer('quantity');
      $table->integer('temporary_total_price');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('menu_orders');
  }
};
