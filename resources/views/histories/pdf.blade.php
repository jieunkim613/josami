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
    <h3>{{ $pdfTitle }}</h3>
    <p>Dicetak pada {{ $pdfDate }}</p>
    <table style="border-spacing: -1px; width:100%;">
      <thead>
        <tr>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Tanggal</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Jam</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Kasir</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Pelanggan</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Total Harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
          <td style="border:1px solid #000; text-align: center;padding: 4px;">{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
          <td style="border:1px solid #000; text-align: center;padding: 4px;">{{ date('H:i', strtotime($order->created_at)) }} WIB.</td>
          @foreach ($users as $user)
          @if ($user->id == $order->user_id)
          <td style="border:1px solid #000; text-align: center;padding: 4px;">{{ $user->name }}</td>
          @endif
          @endforeach
          <td style="border:1px solid #000; text-align: center;padding: 4px;">{{ $order->customer }}</td>
          <td style="border:1px solid #000; text-align: center;padding: 4px;">Rp. {{ $order->total_price }}.000,-</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Tanggal</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Jam</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Kasir</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Pelanggan</th>
          <th style="border:1px solid #000; text-align: center;padding: 4px;">Total Harga</th>
        </tr>
      </tfoot>
    </table>
  </main>

  <!--=============== MAIN JS ===============-->
  <script src="/js/main.js"></script>
</body>

</html>