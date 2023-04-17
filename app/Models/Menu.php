<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
  use HasFactory, Sluggable;

  // protected $fillable = ['title', 'ecerpt', 'body'];
  protected $guarded = ['id'];
  protected $with = ['user', 'category'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function orders()
  {
    return $this->belongsToMany('App\Models\Order', 'menu_orders');
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
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
