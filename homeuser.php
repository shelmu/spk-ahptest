<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        /* Menggunakan Flexbox agar konten utama mengisi ruang dan footer tetap di bawah */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pastikan body mengisi 100% tinggi layar */
        }

        /* Navbar Styling */
        .navbar {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10; /* Agar navbar tetap di atas */
        }

        .navbar-brand {
            font-weight: bold;
        }

        .nav-link, .btn-logout {
            color: #000;
        }

        .nav-link:hover, .btn-logout:hover {
            color: #555;
        }

        .btn-logout {
            background: none;
            border: none;
            font-size: 16px;
            padding: 8px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #f8f9fa; /* Latar belakang terang saat hover */
            color: #007bff; /* Mengubah warna teks saat hover */
            border-radius: 4px; /* Memberikan efek rounded pada hover */
        }

        .btn-logout:focus {
            outline: none; /* Menghilangkan outline saat tombol di-klik */
        }

        /* Hero Image Section */
        .hero-image {
            width: 100%;
            height: 100vh; /* Mengisi seluruh tinggi layar */
            background-image: url('userimage.jpg'); /* Ganti dengan nama gambar yang sesuai */
            background-position: center center;
            background-size: cover;
            position: relative; /* Agar overlay bisa ditumpuk di atas gambar */
            z-index: 1; /* Agar gambar tidak tertutup oleh overlay */
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Warna overlay transparan */
            display: flex;
            flex-direction: column; /* Menambahkan flexbox untuk mengatur konten vertikal */
            justify-content: center;
            align-items: center;
            color: white;
            z-index: 2; /* Menempatkan teks di atas overlay */
        }

        .hero-overlay h1 {
            font-size: 48px;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        }

        .hero-overlay p {
            font-size: 20px;
            text-align: center;
            max-width: 700px;
            line-height: 1.5;
            margin-top: 20px;
            font-weight: 300;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .hero-overlay .btn-mulai {
            margin-top: 30px;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            background-color: #ffffff;
            color: #000;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            z-index: 3; /* Pastikan tombol berada di atas overlay */
        }

        .hero-overlay .btn-mulai:hover {
            background-color: #1A1A1D;
            color: white;
        }

        /* Footer Styling */
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px 0; /* Meningkatkan padding untuk tinggi footer */
            position: relative;
            width: 100%;
            z-index: 1;
            margin-top: auto; /* Pastikan footer berada di bawah konten */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Guest Homepage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="homeuser.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pilih_kriteria.php">Pemilihan Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rekomendasi.php">Rekomendasi</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" action="logout.php" style="display: inline;">
                            <button class="btn-logout" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Image Section -->
    <div class="hero-image">
        <div class="hero-overlay">
            <h1>Selamat Datang di Sistem Pemilihan Destinasi Wisata Kota Medan</h1>
            <p>Temukan destinasi wisata terbaik di Kota Medan dengan menggunakan sistem pemilihan berbasis AHP. Pilih destinasi yang sesuai dengan preferensimu dan temukan pengalaman liburan yang luar biasa.</p>
            <!-- Tombol Mulai -->
            <a href="pilih_kriteria.php" class="btn-mulai">Lihat Data</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright © 2024 - Created by Kelompok 2 - Fikri Shelmu Aqsal</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6vDsOH1A6RWaaW2xxr2n3oz1RSK6eUbGln/ll8zdf1QId4nsE5z" crossorigin="anonymous"></script>
</body>
</html>
