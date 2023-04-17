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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('username')->unique();
      $table->string('password');
      $table->smallInteger('level');
      $table->string('phone_number')->unique()->nullable();
      $table->string('image')->nullable();
      $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
      $table->date('date_of_birth')->nullable();
      $table->text('address')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
};
