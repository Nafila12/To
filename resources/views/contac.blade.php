@extends('tamplate.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Google Maps API -->
    <script src="https://www.google.com/maps/place/Jl.+Gatot+Mangkupraja,+Nagrak,+Kec.+Cianjur,+Kabupaten+Cianjur,+Jawa+Barat/@-6.8287771,107.1137275,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68527c835b47c1:0x7afec5f1f2817627!8m2!3d-6.8287824!4d107.1163024!16s%2Fg%2F1hm24p7th?entry=ttu" async defer></script>
    <style>
        /* Style untuk mempercantik tampilan */
        body {
            font-family: Arial, sans-serif;
        }
        #map {
            height: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            font-weight: bold;
        }
        h2 {
            font-weight: bold;
        }
        .p {
            display: table-cell;
            padding: 5px 10px;
            border-bottom: 1px solid #ccc;
        }
        /* Tambahkan style lain sesuai kebutuhan */
                /* Style untuk kontainer peta */
                #map {
            height: 400px; /* Atur tinggi sesuai kebutuhan Anda */
            width: 100%; /* Mengisi lebar */
        }
        /* Style untuk memastikan kontainer peta memiliki tinggi yang memadai */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
    <script>
        // Fungsi untuk menginisialisasi peta Google Maps
        function initMap() {
            var myLatLng = {lat: -7.797068, lng: 110.370529}; // Ganti dengan koordinat lokasi kantor Anda
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Kantor Kami'
            });
        }
    </script>
</head>
<body>
    <h1>Contact Us</h1>
    <div>
        <h2>Alamat Lengkap:</h2>
        <p>Jl. GatotMangkupradja Km 4 kp.Panumbangan Ds.Cibulakan</p>
    </div>
    <div>
        <h2>Foto Kantor:</h2>
        <img src="Botani.jpg" alt="Foto Kantor">
    </div>
    <div>
        <h2>Google Maps Lokasi Kantor:</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.592048320188!2d107.11291217410515!3d-6.819369166700475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e685288de440d6f%3A0x6a16ae95cd5f15f!2sGg.%20Banten%2C%20Limbangansari%2C%20Kec.%20Cianjur%2C%20Kabupaten%20Cianjur%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1713838740745!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div>
    <h2>Hubungi Developer</h2>
<form action="submit_form.php" method="POST">
    <!-- Ganti submit_form.php dengan file yang menangani form -->

    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="message">Pesan:</label><br>
    <textarea id="message" name="message" rows="4" required></textarea><br>

    <button type="submit">Kirim</button>
</form>
    </div>
</body>
</html>
@endsection
