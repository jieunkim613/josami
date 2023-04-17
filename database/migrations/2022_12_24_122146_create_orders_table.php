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
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->string('customer')->nullable();
      $table->integer('total_price')->nullable();
      $table->integer('customer_pay')->nullable();
      $table->integer('customer_change')->nullable();
      $table->enum('cooking_status', ['Belum Dimasak', 'Sedang Dimasak', 'Sudah Dihidangkan'])->nullable();
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
    Schema::dropIfExists('orders');
  }
};
