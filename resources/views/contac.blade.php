@extends('tamplate.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Google Maps API -->
    <style>
        /* Style untuk mempercantik tampilan */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
            /* Warna teks utama */
        }

        .container {
            max-width: 800px;
            /* Meningkatkan lebar kontainer */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            /* Teks judul menjadi rata tengah */
            margin-bottom: 20px;
            /* Memberikan ruang di bawah judul */
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            /* Tombol mengisi lebar kontainer */
            display: block;
            /* Tombol menjadi blok untuk mendapatkan lebar penuh */
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Style untuk kontainer peta */
        #map {
            height: 400px;
            /* Atur tinggi sesuai kebutuhan Anda */
            width: 100%;
            /* Mengisi lebar */
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contact Us</h1>
        <div>
            <h2>Alamat Lengkap:</h2>
            <p>Jl. Gatot Mangkupradja Km 4 kp. Panumbangan Ds. Cibulakan</p>
        </div>
        <div>
            <h2>Foto Kantor:</h2>
            <img src="foto SMk.jpeg" alt="Foto Kantor" style="max-width: 100%;">
        </div>
        <div>
            <h2>Google Maps Lokasi Kantor:</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5332545113915!2d107.13411067403405!3d-6.826476066772392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68525760aaa209%3A0x4a4020b1836d1a1d!2sSMK%20Negeri%201%20Cianjur!5e0!3m2!1sid!2sid!4v1713880560820!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <script>
                // Fungsi untuk menginisialisasi peta Google Maps
                function initMap() {
                    var myLatLng = {
                        lat: -6.8287771,
                        lng: 107.1137275
                    }; // Koordinat lokasi kantor
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
        </div>
        <div><br>
            </head>

            <body>
                <div class="container">
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