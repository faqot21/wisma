<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="laporan1.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>wisma</title>
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
                <a href="http://localhost/wisma/laporan.php">
                <i class="fa-solid fa-sheet-plastic"></i>
                 <span>Laporan</span>
                </a>
            </li>
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
                <span>Laporan</span>
                <h2>Sekar wangi</h2>
            </div>
    </div>
    <div class="kontak-tanggal">
        <div class="column">
        <label for="tanggal-masuk" class="label" ></label>
        <input type="date" name="tanggal-masuk" placeholder="00/00/000">

        <label for="tanggal-keluar" class="label">tanggal keluar</label>
        <input type="date" name="tanggal-masuk" placeholder="00/00/000">
        </div>
    </div>
    <div class="tablelaporan">
        <div class="row">
              <h1>Data tamu</h1>
              <table class="data-table">
                <thead>
                <tr>
                    <th>no</th>
                    <th>nik</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>jenis kelamin</th>
                    <th>no.kamar</th>
                    <th>tanggal masuk</th>
                    <th>tanggal keluar</th>
                    <th>bayar</th>
                    <th>deposit</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $datawisma = mysqli_query($conn, "select * from pemesanan");
                        $i = 1;
                        while($data = mysqli_fetch_array($datawisma)){
                            $nik = $data['nik'];
                            $nama = $data['nama'];
                            $alamat = $data['alamat'];
                            $jeniskelamin = $data['jeniskelamin'];
                            $kamar = $data['kamar'];
                            $tanggalmasuk = $data['tanggalmasuk'];
                            $tanggalkeluar = $data['tanggalkeluar'];
                            $bayar = $data['bayar'];
                            $deposit = $data['deposit'];
                            
                    ?>
                <tr>
                    <td><?=$i++;?></td>
                    <td><?=$nik;?></td>
                    <td><?=$nama;?></td>
                    <td><?=$alamat;?></td>
                    <td><?=$jeniskelamin;?></td>
                    <td><?=$kamar;?></td>
                    <td><?=$tanggalmasuk;?></td>
                    <td><?=$tanggalkeluar;?></td>
                    <td><?=$bayar;?></td>
                    <td><?=$deposit;?></td>
                </tr>
                    
                <?php
                    };

                    ?>
                    
                </tbody>
                
              </table>
        </div>
    </div> 
</div>
</body>
</html>
</body>
</html>