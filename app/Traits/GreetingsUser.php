<?php

namespace App\Traits;

trait GreetingsUser
{

  public function greetings()
  {
    $greetings = "";
    $time = date("G");

    if ($time < "11") {
      $greetings = "Selamat pagi";
    } elseif ($time >= "11" && $time < "15") {
      $greetings = "Selamat siang";
    } elseif ($time >= "15" && $time < "18") {
      $greetings = "Selamat sore";
    } elseif ($time >= "18") {
      $greetings = "Selamat malam";
    }

    return $greetings;
  }
}
