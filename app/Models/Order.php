<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsToMany(User::class, 'orders');
  }

  public function menu()
  {
    return $this->belongsToMany('App\Models\Menu', 'menu_orders');
  }

  public static function enumDropdown($table_name, $column_name)
  {
    $conn = mysqli_connect("localhost", "root", "", "db_lentera");
    $result = mysqli_query($conn, "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'");
    $row = mysqli_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));
    return $enumList;
  }
}
