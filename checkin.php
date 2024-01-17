<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkin1.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="http://localhost/wisma/dashboard.php#">
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
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Tambah user</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
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
            <div class="chair">
                <div class="row">
                    <table>
                        <tr>
                            <td class="seat">202</td>
                            <td class="seat">203</td>
                            <td class="seat">204</td>
                        </tr>
                        <tr>
                            <td class="seat">205</td>
                            <td class="seat">206</td>
                            <td class="seat">207</td>
                        </tr>
                        <tr>
                            <td class="seat">208</td>
                            <td class="seat">209</td>
                            <td class="seat">301</td>
                        </tr>
                        <tr>
                            <td class="seat">302</td>
                            <td class="seat">303</td>
                            <td class="seat">304</td>
                        </tr>
                        <tr>
                            <td class="seat">305</td>
                            <td class="seat">306</td>
                            <td class="seat">307</td>
                        </tr>
                        <tr>
                            <td class="seat">308</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="kotakpemesanan">
                <header>pemesanan kamar</header>
                <form action="#" class="form" method="POST">
                    <label for="nik">NIK</label>
                    <div class="input-box">
                        <input type="text" name="nik" placeholder="Masukkan Nik" />
                    </div>
                    <label>NAMA</label>
                    <div class="input-box">
                        <input type="text" name="nama" placeholder="Masukkan Nama" />
                    </div>

                    <label>ALAMAT</label>
                    <div class="input-box">
                        <input type="text" name="alamat" placeholder="Masukkan Alamat" />
                    </div>

                    <div class="gender-box">
                        <label>Jenis kelamin</label>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-male" name="jeniskelamin" value="laki-laki"/>
                                <label for="check-male">laki-laki</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-female" name="jeniskelamin" value="perempuan"/>
                                <label for="check-female">perempuan</label>
                            </div>
                        </div>
                    </div>

                    <label>Kamar</label>
                    <div class="select-btn">
                        <span class="btn-text">Pilih kamar</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                    <ul class="list-items">
                        <li class="item">
                            <input type="checkbox" name="kamar[]" class="checkbox" value="202">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </input>
                            <span class="item-text">202</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="203">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </input>
                            <span class="item-text">203</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="204">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </input>
                            <span class="item-text">204</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="205">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">205</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="206">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">206</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="207">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">207</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="208">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">208</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="209">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">209</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="301">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">301</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="302">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">302</span>
                        </li>
                        <li class="item">
                            <span class="checkbox">
                            <input type="checkbox" class="checkbox" name="kamar[]" value="303">
                                <!-- <i class="fa-solid fa-check check-icon"></i> -->
                            </span>
                            <span class="item-text">303</span>
                        </li>
                    </ul>
                    <div class="column">
                        <label>tanggal Masuk</label>
                        <div class="input-box">
                            <input type="Date" name="tanggalmasuk" placeholder="Masukkan Deposit" />
                        </div>
                        <label>tanggal Keluar</label>
                        <div class="input-box">
                            <input type="Date" name="tanggalkeluar" placeholder="Masukkan Pembayaran" />
                        </div>
                    </div>
                    <label>Deposit</label>
                    <div class="input-box">
                        <input type="text" name="deposit" placeholder="Masukkan Deposit" />
                    </div>
                    <label>Bayar</label>
                    <div class="input-box">
                        <input type="text" name="bayar" placeholder="Masukkan Pembayaran" />
                    </div>
                    <button type="submit" name="pesan" class="btn">Pesan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="js/script.js"></script>
</body>

</html>