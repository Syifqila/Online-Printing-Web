<?php
// Nomor WhatsApp Admin
$adminPhone = '6281413270154'; // Ganti dengan nomor WhatsApp admin

// Pesan yang akan dikirim
$message = "Halo Admin, saya ingin melakukan pembayaran dan mengirim file.";

// Buat URL WhatsApp
$whatsappUrl = "https://wa.me/$adminPhone?text=" . urlencode($message);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran & Kirim File</title>
    <link rel="stylesheet" href="./asset/css/style.css">
    <style>
        body {
            margin: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        /* Navbar Styling */
        nav {
            background-color:rgb(96, 92, 134);
            color: white;
            padding: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px; /* Jarak antara logo dan menu */
        }

        nav .nav-brand img {
            height: 50px;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 100pxpx; /* Jarak antar menu */
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Main Content Styling */
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 100px auto; /* Push content below the navbar */
            max-width: 500px;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #363062;
        }

        .btn-wa {
            display: inline-block;
            padding: 15px 30px;
            background-color: #25d366;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-wa:hover {
            background-color: #1aa351;
        }
    </style>
</head>
<body>

<!-- Navigation bar -->
<nav>
    <div class="nav-wrapper">
        <div class="nav-brand">
            <a href="edit.php">
                <img src="assets/img/Logo.png" alt="SigmaPrint">
            </a>
        </div>
        <ul>
            <li><a href="edit.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <h1>Hubungi Admin untuk Pembayaran dan Pengiriman File</h1>
    <a href="<?= $whatsappUrl ?>" class="btn-wa" target="_blank">
        Hubungi Admin di WhatsApp
    </a>
</div>

</body>
</html>
