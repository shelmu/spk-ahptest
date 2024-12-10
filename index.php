<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSS | AHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: 'Josefin Sans', sans-serif;
        color: #333;
        background: url('ahp.jpg') no-repeat center center/cover;
        color: white;
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Pastikan body mengisi 100% tinggi layar */
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1; /* Agar konten utama mengisi ruang yang tersisa */
        padding: 20px;
    }

    .main-home {
        text-align: center;
        background-color: rgba(0, 0, 0, 0.6);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .main-home h2 {
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        color: #f4f4f4;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }

    .main-home hr {
        width: 60%;
        margin: 20px auto;
        border-top: 3px solid #7ed957;
    }

    .main-home img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Footer Styling */
    footer {
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        position: relative;
        width: 100%;
        z-index: 1;
        margin-top: auto; /* Pastikan footer berada di bawah konten */
    }
    </style>
</head>
<body>
    <?php include 'fungsi.php'; ?>
    <?php include 'navbar.php'; ?>


    <!-- Footer -->
    <footer>
        <p>Copyright © 2024 - Created by Kelompok 2 - Fikri Shelmu Aqsal</p>
    </footer>
</body>
</html>
