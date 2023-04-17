<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    FacadesGate::define('admin', function (User $user) {
      return $user->level === 1;
    });
    FacadesGate::define('kasir', function (User $user) {
      return $user->level === 2;
    });
    FacadesGate::define('dapur', function (User $user) {
      return $user->level === 3;
    });
  }
}
