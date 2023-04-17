<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    //=============== USER ===============
    User::create([
      'name' => 'Isabella Khairiah Hadid',
      'slug' => 'isabella-khairiah-hadid',
      'username' => 'bellahadid',
      'password' => bcrypt('password'),
      'level' => 1,
      'phone_number' => '082132728323',
      'image' => 'profile-images/pVMD7CGcwo46vo6MUkw09aIZ9PQbWh8JlUqrOKtP.jpg',
      'gender' => 'Perempuan',
      'date_of_birth' => '1996-10-09',
      'address' => 'Jl KH Hasyim Ashari 125, Roxy Mas Bl C-5/20, Dki Jakarta',
    ]);
    User::create([
      'name' => 'Dea Rizky Erikarisma',
      'slug' => 'dea-rizky-erikarisma',
      'username' => 'dearizkye',
      'password' => bcrypt('password'),
      'level' => 2,
      'phone_number' => '087212664567',
      'image' => 'profile-images/u3pxUzxrlqA7etOZz13sDQMaxwb85FEIB9tFiwzC.jpg',
      'gender' => 'Perempuan',
      'date_of_birth' => '2001-06-03',
      'address' => 'Jl Pesona Alam D-1/22, RT 07/06, Kompl Griya Bandung Indah, Jawa Barat',
    ]);
    User::create([
      'name' => 'Arifah Nurmila Lubai',
      'slug' => 'arifah-nurmila-lubai',
      'username' => 'arifahlubai',
      'password' => bcrypt('password'),
      'level' => 2,
      'phone_number' => '082142877404',
      'image' => 'profile-images/jnwZwiNBEeGR584aWwqTivjVccoAlcWpLbZ16PhJ.jpg',
      'gender' => 'Perempuan',
      'date_of_birth' => '2001-11-11',
      'address' => 'Jl Mangga Dua Raya, Pasar Pagi, Mangga Dua Bl A/188, Dki Jakarta',
    ]);
    User::create([
      'name' => 'Kharisma Cahya Putri',
      'slug' => 'kharisma-cahya-putri',
      'username' => 'ewkharis',
      'password' => bcrypt('password'),
      'level' => 2,
      'phone_number' => '082166603606',
      'image' => 'profile-images/RNRvhzpf1MeD3jMPeyzWtBcRfvBBJqohhLwO9s0z.jpg',
      'gender' => 'Perempuan',
      'date_of_birth' => '2003-05-13',
      'address' => 'Jl Letjen TB Simatupang, Kav 38 Graha Simatupang, Tower I Bl D Lt 4,Bandung',
    ]);
    User::create([
      'name' => 'Furry Setya Purnomo Raharja',
      'slug' => 'furry-setya-raharja',
      'username' => 'furrysetya',
      'password' => bcrypt('password'),
      'level' => 3,
      'phone_number' => '082180880017',
      'image' => 'profile-images/xi9uzddA9bK0izKk7KtsesXg67moBLqGkpFLsv7C.jpg',
      'gender' => 'Laki-laki',
      'date_of_birth' => '1983-04-07',
      'address' => 'Jl Dharmahusada Indah Tmr 37, Mal Galaxy 237 Lt 2, Semarang',
    ]);
    User::create([
      'name' => 'Muhammad Ikhsan Lemon',
      'slug' => 'muhammad-ikhsan',
      'username' => 'ikhsanlemon',
      'password' => bcrypt('password'),
      'level' => 3,
      'phone_number' => '082142900047',
      'image' => 'profile-images/NNiRHM9UQcPRzs8iyhzyOFz3jycE1vBgdM0kZwLk.jpg',
      'gender' => 'Laki-laki',
      'date_of_birth' => '1998-12-30',
      'address' => 'Jl Wijaya II Kompl Wijaya, Graha Puri Bl C/18-20, Dki Jakarta',
    ]);
    User::create([
      'name' => 'Brando Franco Windah',
      'slug' => 'brando-franco-windah',
      'username' => 'windahbasudara',
      'password' => bcrypt('password'),
      'level' => 3,
      'phone_number' => '082172796046',
      'image' => 'profile-images/1JekVz4RD1PkXo5hH0FKTa4lbSKzMo0rvGgfsGkf.jpg',
      'gender' => 'Laki-laki',
      'date_of_birth' => '1992-03-14',
      'address' => 'Jl Mampang Prapatan Raya 106, Plaza Basmar, Dki Jakarta',
    ]);

    //=============== CATEGORY ===============
    Category::create([
      'name' => 'Makanan',
      'slug' => 'makanan'
    ]);
    Category::create([
      'name' => 'Minuman',
      'slug' => 'minuman'
    ]);
    Category::create([
      'name' => 'Camilan',
      'slug' => 'camilan'
    ]);

    //=============== MENU ===============
    Menu::create([
      'name' => 'Tumpeng',
      'slug' => 'tumpeng',
      'category_id' => 1,
      'image' => 'menu-images/wL6WZuiIzEe2S764HZKH6lH8IDgKb2eIRG8XGX5Z.png',
      'description' => 'Nasi Kuning Lauk Lengkap',
      'price' => '50',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Bakso',
      'slug' => 'bakso',
      'category_id' => 1,
      'image' => 'menu-images/EJUGhvvbW4cni5hbzox1HuMjyDCcUg446KEWRe3N.png',
      'description' => 'Daging Sapi Wagyu A5',
      'price' => '30',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Mi Goreng',
      'slug' => 'mi-goreng',
      'category_id' => 1,
      'image' => 'menu-images/YaPnFlCCTE1X5ja8TzEgePbSUouDqEbLGpa720TB.png',
      'description' => 'Selera anak bangsa',
      'price' => '10',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Nugget',
      'slug' => 'nugget',
      'category_id' => 1,
      'image' => 'menu-images/OogetLaR0X7LBm2qwEUi9RUud8bP2qCGPrSXtrkY.png',
      'description' => 'Sekotak nugget yang nikmat',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Nasi',
      'slug' => 'nasi',
      'category_id' => 1,
      'image' => 'menu-images/4YBIWFzdBT2SPl0YeKGoG8HrAp5lqG5HwIsVMjl1.png',
      'description' => 'Nasi Aja Gapake Lauk',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Pizza',
      'slug' => 'pizza',
      'category_id' => 1,
      'image' => 'menu-images/8TArjhMrSPYNLBGmzloS6kfFQDC7vpJxBLBaAX9k.png',
      'description' => 'Dibuat oleh chef Italia',
      'price' => '115',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Ayam Goreng',
      'slug' => 'ayam-goreng',
      'category_id' => 1,
      'image' => 'menu-images/ODia1XhMDewcqoGUf5Y7AkXcsczJ73E9v5up8Cxa.png',
      'description' => 'Ayamnya dari brazil',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Sereal',
      'slug' => 'sereal',
      'category_id' => 1,
      'image' => 'menu-images/OMn33UJ9abUxoTDUEGnDZhehnljZrOysywIdUogn.png',
      'description' => 'Susu asli + oat Finlandia',
      'price' => '20',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Pai Apel',
      'slug' => 'pai-apel',
      'category_id' => 1,
      'image' => 'menu-images/c3X1V3Rv8MgRG12hm5TjuvGyVUnrVdCiqIhuQFk4.png',
      'description' => 'Pai dari apel yang segar',
      'price' => '75',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Es Kelapa Muda',
      'slug' => 'es-kelapa-muda',
      'category_id' => 2,
      'image' => 'menu-images/SP3LYSYGCjnvWdLZYvZJEYm91VzfFvVZaNbBqV4n.png',
      'description' => 'Kelapa muda asli',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Kopi Susu',
      'slug' => 'kopi-susu',
      'category_id' => 2,
      'image' => 'menu-images/ppriTxBqxCHckYIJY90ubplgUE9WZdFPzN80Mbau.png',
      'description' => 'Dicampur dengan sempurna',
      'price' => '10',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Smoothie Stroberi',
      'slug' => 'smoothie-stroberi',
      'category_id' => 2,
      'image' => 'menu-images/mBDmD75e1z47gn8JsCxVKpG2VgwnFo7QxpDk7iik.png',
      'description' => 'Susu + Stroberi pilihan',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Smoothie Melon',
      'slug' => 'smoothie-melon',
      'category_id' => 2,
      'image' => 'menu-images/wU8uveydbyFnLp1XHPj8l7zAqxyKK3rYsrcjBRFm.png',
      'description' => 'Buah Melon + Susu segar',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Smoothie Cokelat',
      'slug' => 'smoothie-cokelat',
      'category_id' => 2,
      'image' => 'menu-images/ZdPO2iCwlKuDvlY43gSVCaVflRQMhBBP2MNDM2ev.png',
      'description' => 'Cokelat asli + Susu segar',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Smoothie Vanila',
      'slug' => 'smoothie-vanila',
      'category_id' => 2,
      'image' => 'menu-images/rXcSSvram7wVfR2nK3ltkAKfvF8K83MS5Y5kMoTp.png',
      'description' => 'Vanili + Susu segar',
      'price' => '15',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Teh',
      'slug' => 'teh',
      'category_id' => 2,
      'image' => 'menu-images/4sQcNuLYeiNnRrXxBwvWdEPF49nJN8JOujz9ATFB.png',
      'description' => 'Dari daun teh pilihan',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Kopi',
      'slug' => 'kopi',
      'category_id' => 2,
      'image' => 'menu-images/OhUBrgnWPmljAsXX9BZSpqHLtaGpCvzLRRMqCP6L.png',
      'description' => 'Dari biji kopi pilihan',
      'price' => '7',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Yogurt',
      'slug' => 'yogurt',
      'category_id' => 2,
      'image' => 'menu-images/VHq0uBP9dPE4sg1B8dk36emvs2moJWaY2Hk39UH1.png',
      'description' => 'Rasa susu strawberry asli',
      'price' => '10',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Wafer',
      'slug' => 'wafer',
      'category_id' => 3,
      'image' => 'menu-images/I9nbQLbCcx72MEILi0SRzVOW1dQldBFki8vfr3Ey.png',
      'description' => 'Wafer renyah rasa cokelat',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Kudapan',
      'slug' => 'kudapan',
      'category_id' => 3,
      'image' => 'menu-images/jhMSeNJaJ2T0Ig7V5fEJ3Da2wxS9dRQBGEg5CBB4.png',
      'description' => 'Cocok buat nyemil',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Bakpao',
      'slug' => 'Bakpao',
      'category_id' => 3,
      'image' => 'menu-images/VVcDL3TcCxGYuD4voUbT8eMRKGm3VZpsCAOT9Rs8.png',
      'description' => 'Asli buatan Xi Jin Ping',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Marshmallow',
      'slug' => 'marshmallow',
      'category_id' => 3,
      'image' => 'menu-images/o6o9oOENXHugN9ojSbM4boQzT8VPKiOEcBsLcgqm.png',
      'description' => 'Sangat lembut dan kenyal',
      'price' => '30',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Dim Sum',
      'slug' => 'dim-sum',
      'category_id' => 3,
      'image' => 'menu-images/2xjSVaHoHTOh5cwhiCCByGI1ic2Vu9oVsPn8dSPp.png',
      'description' => 'Isi daging ayam pilihan',
      'price' => '20',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Nacho',
      'slug' => 'nacho',
      'category_id' => 3,
      'image' => 'menu-images/CHa1joypn6uDEP7F8D0S1JXtlrjzbQllcgTA5qiB.png',
      'description' => 'Keripik tortilla yang renyah',
      'price' => '12',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Biskuit',
      'slug' => 'biskuit',
      'category_id' => 3,
      'image' => 'menu-images/ZsxWIuWgYxbz9sHIxywpZbFgiPRtC6sWBVURElQF.png',
      'description' => 'Biskuit enak nan gurih',
      'price' => '5',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Kue',
      'slug' => 'kue',
      'category_id' => 3,
      'image' => 'menu-images/ym41ez6XOYvsxdP94B7QXENwtUJg1wlRWct9LBJS.png',
      'description' => 'Sepotong kue ulang tahun',
      'price' => '10',
      'available' => true,
    ]);
    Menu::create([
      'name' => 'Cokelat',
      'slug' => 'cokelat',
      'category_id' => 3,
      'image' => 'menu-images/dv992A0woLCGfJTrJc9LyK1nBHLFRR31qR8LXpfT.png',
      'description' => 'Cokelat asli dari Swiss',
      'price' => '10',
      'available' => true,
    ]);

    //=============== ORDER ===============
    Order::create([
      'user_id' => 2,
      'customer' => 'Gustavo',
      'total_price' => 199,
      'customer_pay' => 200,
      'customer_change' => 1,
      'cooking_status' => 'Sudah Dihidangkan',
    ]);
    Order::create([
      'user_id' => 2,
      'customer' => 'Vior',
      'total_price' => 95,
      'customer_pay' => 100,
      'customer_change' => 5,
      'cooking_status' => 'Sudah Dihidangkan',
    ]);
    Order::create([
      'user_id' => 2,
      'customer' => 'Mobazane',
      'total_price' => 542,
      'customer_pay' => 550,
      'customer_change' => 8,
      'cooking_status' => 'Sudah Dihidangkan',
    ]);
    Order::create([
      'user_id' => 3,
      'customer' => 'Vonzy',
      'total_price' => 135,
      'customer_pay' => 150,
      'customer_change' => 15,
      'cooking_status' => 'Sedang Dimasak',
    ]);
    Order::create([
      'user_id' => 3,
      'customer' => 'Kairi',
      'total_price' => 197,
      'customer_pay' => 200,
      'customer_change' => 3,
      'cooking_status' => 'Sedang Dimasak',
    ]);
    Order::create([
      'user_id' => 3,
      'customer' => 'Kheitna',
      'total_price' => 220,
      'customer_pay' => 250,
      'customer_change' => 30,
      'cooking_status' => 'Belum Dimasak',
    ]);
    Order::create([
      'user_id' => 4,
      'customer' => 'Mega',
      'total_price' => 180,
      'customer_pay' => 200,
      'customer_change' => 20,
      'cooking_status' => 'Belum Dimasak',
    ]);
    Order::create([
      'user_id' => 4,
      'customer' => 'Skylar',
      'total_price' => 67,
      'customer_pay' => 100,
      'customer_change' => 33,
      'cooking_status' => 'Belum Dimasak',
    ]);
    Order::create([
      'user_id' => 4,
      'customer' => 'Albert',
      'total_price' => 75,
      'customer_pay' => 100,
      'customer_change' => 25,
      'cooking_status' => 'Belum Dimasak',
    ]);

    //=============== MENU ORDER ===============
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 5,
      'quantity' => 3,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 6,
      'quantity' => 1,
      'temporary_total_price' => 115,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 2,
      'quantity' => 1,
      'temporary_total_price' => 30,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 16,
      'quantity' => 1,
      'temporary_total_price' => 5,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 17,
      'quantity' => 1,
      'temporary_total_price' => 7,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 20,
      'quantity' => 3,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 1,
      'menu_id' => 24,
      'quantity' => 1,
      'temporary_total_price' => 12,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 2,
      'quantity' => 1,
      'temporary_total_price' => 30,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 3,
      'quantity' => 1,
      'temporary_total_price' => 10,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 14,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 15,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 19,
      'quantity' => 1,
      'temporary_total_price' => 5,
    ]);
    MenuOrder::create([
      'order_id' => 2,
      'menu_id' => 23,
      'quantity' => 1,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 6,
      'quantity' => 3,
      'temporary_total_price' => 345,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 17,
      'quantity' => 1,
      'temporary_total_price' => 7,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 11,
      'quantity' => 1,
      'temporary_total_price' => 10,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 12,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 13,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 14,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 15,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 22,
      'quantity' => 3,
      'temporary_total_price' => 90,
    ]);
    MenuOrder::create([
      'order_id' => 3,
      'menu_id' => 26,
      'quantity' => 3,
      'temporary_total_price' => 30,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 25,
      'quantity' => 5,
      'temporary_total_price' => 25,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 27,
      'quantity' => 2,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 19,
      'quantity' => 10,
      'temporary_total_price' => 50,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 10,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 11,
      'quantity' => 1,
      'temporary_total_price' => 10,
    ]);
    MenuOrder::create([
      'order_id' => 4,
      'menu_id' => 12,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 1,
      'quantity' => 2,
      'temporary_total_price' => 100,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 5,
      'quantity' => 1,
      'temporary_total_price' => 5,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 10,
      'quantity' => 3,
      'temporary_total_price' => 45,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 13,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 17,
      'quantity' => 1,
      'temporary_total_price' => 7,
    ]);
    MenuOrder::create([
      'order_id' => 5,
      'menu_id' => 20,
      'quantity' => 5,
      'temporary_total_price' => 25,
    ]);
    MenuOrder::create([
      'order_id' => 6,
      'menu_id' => 9,
      'quantity' => 2,
      'temporary_total_price' => 150,
    ]);
    MenuOrder::create([
      'order_id' => 6,
      'menu_id' => 18,
      'quantity' => 2,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 6,
      'menu_id' => 22,
      'quantity' => 1,
      'temporary_total_price' => 30,
    ]);
    MenuOrder::create([
      'order_id' => 6,
      'menu_id' => 26,
      'quantity' => 2,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 7,
      'menu_id' => 6,
      'quantity' => 1,
      'temporary_total_price' => 115,
    ]);
    MenuOrder::create([
      'order_id' => 7,
      'menu_id' => 8,
      'quantity' => 1,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 7,
      'menu_id' => 11,
      'quantity' => 1,
      'temporary_total_price' => 10,
    ]);
    MenuOrder::create([
      'order_id' => 7,
      'menu_id' => 15,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 7,
      'menu_id' => 26,
      'quantity' => 2,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 8,
      'menu_id' => 23,
      'quantity' => 2,
      'temporary_total_price' => 40,
    ]);
    MenuOrder::create([
      'order_id' => 8,
      'menu_id' => 4,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 8,
      'menu_id' => 16,
      'quantity' => 1,
      'temporary_total_price' => 5,
    ]);
    MenuOrder::create([
      'order_id' => 8,
      'menu_id' => 17,
      'quantity' => 1,
      'temporary_total_price' => 7,
    ]);
    MenuOrder::create([
      'order_id' => 9,
      'menu_id' => 3,
      'quantity' => 2,
      'temporary_total_price' => 20,
    ]);
    MenuOrder::create([
      'order_id' => 9,
      'menu_id' => 7,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 9,
      'menu_id' => 21,
      'quantity' => 2,
      'temporary_total_price' => 10,
    ]);
    MenuOrder::create([
      'order_id' => 9,
      'menu_id' => 12,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
    MenuOrder::create([
      'order_id' => 9,
      'menu_id' => 14,
      'quantity' => 1,
      'temporary_total_price' => 15,
    ]);
  }
}
