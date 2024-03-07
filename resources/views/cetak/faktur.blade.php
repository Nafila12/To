<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P I SPY</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            border: 2px solid #000;
            padding: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
        }

        .info {
            margin-top: 20px;
        }

        .info h5 {
            margin: 5px 0;
        }

        .items {
            margin-top: 20px;
        }

        .item {
            margin-bottom: 5px;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        hr {
            border: 0;
            border-top: 1px solid #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2> S A P I SPY</h2>
            <h5>Jalan Setia budi NO.5</h5>
            <hr>
            <h5>No. Faktur : {{ $transaksi->id }}</h5>
            <h5>{{ $transaksi->tanggal }}</h5>
            <h5>Kasir : fila</h5>
        </div>
        
        <div class="info">
            <h4>Detail Transaksi:</h4>
            @foreach ($transaksi->DetailTransaksi as $item)
            <div class="item">
                <p>{{ $item->jumlah }}x {{ $item->menu->nama_menu }}</p>
                <p>Harga: {{ number_format($item->menu->harga, 0, ',', '.') }}</p>
                <p>Subtotal: {{ number_format($item->subtotal, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>

        <div class="total">
            <p>Total: {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
        </div>
    </div>
</body>

</html>