<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Menus</title>
</head>
<body>
    <h1>Popular Menus</h1>
    <ul>
        @foreach($popularMenus as $menu)
            <li>{{ $menu->menu->name }} - Total Pesanan: {{ $menu->total }}</li>
        @endforeach
    </ul>

    <a href="{{ route('tamplate.dashboard') }}">Kembali</a>
</body>
</html>
