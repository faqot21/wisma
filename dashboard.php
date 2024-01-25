<?php
ob_start();
// session_start();
include "koneksi.php";
include "auth.php";
require 'koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard2.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="http://localhost/wisma/dashboard.php">
                <i class="fas fa-solid fa-house"></i>
                 <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/wisma/checkin.php">
                <i class=" fas fa-regular fa-bed"></i>
                 <span>Check in</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/wisma/laporan/laporan.php">
                <i class="fa-solid fa-sheet-plastic"></i>
                 <span>Laporan</span>
                </a>
            </li>
            <?php
            if ($_SESSION['role'] == 'pimpinan') {
                echo '<li>
                <a href="http://localhost/wisma/tambahuser.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Tambah user</span>
                </a>
            </li>';
            }
            ?>
            <li class="logout">
                <a href="logout.php">
                 <i class="fas fa-sign-out-alt"></i>
                 <span>logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Wisma</span>
                <h2>Sekar wangi</h2>
            </div>      
        </div>
        <div class="card--container">
        <h3 class="main--title">Today's data</h3>
        <div class="card--wrapper">
                <div class="payment--card light-red">
                    <div class="card--header">
                        <?php
                            $query = mysqli_query($conn, "SELECT SUM(bayar) AS uang_masuk FROM pemesanan");
                            $data = mysqli_fetch_array($query);
                        ?>
                        <div class="amount">
                            <span class="title">Uang Masuk
                            </span>
                            <span class="amount--value">Rp <?php echo $data['uang_masuk'] ?>
                            </span>
                        </div>
                        <i class="fa-solid fa-coins icon"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
                <div class="payment--card light-blue">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Uang Keluar
                            </span>
                            <span class="amount--value">Rp 1.000.000
                            </span>
                        </div>
                        <i class="fa-solid fa-coins icon"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Kamar Yang Tersedia
                            </span>
                            <?php
                             $query = mysqli_query($conn, "SELECT COUNT(status_kamar) AS kosong FROM data_kamar WHERE status_kamar = 'kosong'");
                             $data = mysqli_fetch_array($query);
                            ?>
                            <span class="amount--value"> <?php echo $data['kosong'] ?> kamars
                            </span>
                        </div>
                        <i class="fa-solid fa-bed icon"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Kamar Yang Terpakai
                            </span>
                            <?php
                             $query = mysqli_query($conn, "SELECT COUNT(status_kamar) AS terisi FROM data_kamar WHERE status_kamar = 'terisi'");
                             $data = mysqli_fetch_array($query);
                            ?>
                            <span class="amount--value"> <?php echo $data['terisi'] ?> kamars
                            </span>
                        </div>
                        <i class="fa-solid fa-bed icon"></i>
                    </div>
                    <span class="card-detail"></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>