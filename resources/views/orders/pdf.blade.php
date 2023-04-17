<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mochammad Fachrizal Muzakky">
  <meta name="generator" content="Hugo 0.88.1">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="/img/logo/Favicon.png" type="image/x-icon">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="/css/styles.css" />

  <!--=============== JQUERY ===============-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <title>Josami | {{ $title }} </title>
</head>

<body>
  <main>
    <h3 style="text-align: center; margin-bottom: 3rem;">{{ $pdfTitle }}</h3>
    @foreach ($orders as $order)
    <p>ID Pesanan : JSM{{ $order->id }}</p>
    <p>Tanggal Pesanan : {{ date('d-M-Y', strtotime($order->created_at)) }} pada pukul {{ date('H:i', strtotime($order->created_at)) }} WIB.</p>
    @foreach ($users as $user)
    @if($user->id == $order->user_id)
    <p>Kasir : {{ $user->name }}</p>
    @endif
    @endforeach
    <p>Pemesan : {{ $order->customer }}</p>
    <p>Menu Pesanan :</p>
    <table style="border-collapse: collapse; width:100%;">
      <tbody>
        @foreach ($order->menu as $menu)
        <tr>
          <td style="text-align: left;padding: 4px;">{{ $menu->name }}</td>
          <td style="text-align: right;padding: 4px;">Rp. {{ $menu->price }}.000,-</td>
          <td style="text-align: center;padding: 4px;">x</td>
          @foreach ($menu_orders as $menu_order)
          @if ($menu_order->menu_id == $menu->id)
          <td style="text-align: left;padding: 4px;">{{ $menu_order->quantity }}</td>
          <td style="text-align: right;padding: 4px;">=</td>
          <td style="text-align: right;padding: 4px;">Rp. {{ $menu_order->temporary_total_price }}.000,-</td>
        </tr>
        @endif
        @endforeach
        @endforeach
        <tr>
          <td style="border-top:1px solid #000;text-align: left;padding: 4px;">Total Harga</td>
          <td style="border-top:1px solid #000;text-align: left;padding: 4px;"> </td>
          <td style="border-top:1px solid #000;text-align: left;padding: 4px;"> </td>
          <td style="border-top:1px solid #000;text-align: left;padding: 4px;"> </td>
          <td style="border-top:1px solid #000;text-align: right;padding: 4px;">=</td>
          <td style="border-top:1px solid #000;text-align: right;padding: 4px;">Rp. {{ $order->total_price }}.000,-</td>
        </tr>
        <tr>
          <td style="text-align: left;padding: 4px;">Total Bayar</td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: right;padding: 4px;">=</td>
          <td style="text-align: right;padding: 4px;">Rp. {{ $order->customer_pay }}.000,-</td>
        </tr>
        <tr>
          <td style="text-align: left;padding: 4px;">Kembalian</td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: left;padding: 4px;"> </td>
          <td style="text-align: right;padding: 4px;">=</td>
          <td style="text-align: right;padding: 4px;">Rp. {{ $order->customer_change }}.000,-</td>
        </tr>
      </tbody>
    </table>
    <p style="text-align: center; margin-top: 5rem;">Dicetak pada {{ date('d-M-Y', strtotime($now)) }} pada pukul {{ date('H:i', strtotime($now)) }} WIB.</p>
    @endforeach
  </main>

  <!--=============== MAIN JS ===============-->
  <script src="/js/main.js"></script>
</body>

</html>