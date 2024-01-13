<?php
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="laporan.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
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
                <a href="http://localhost/wisma/laporan/laporan.php">
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
        <div class="tablelaporan">
            <div class="row">
                <h1>Data tamu</h1>
                <form>
                    <table>
                        <tr>
                            <td class="input-tanggal">tanggal masuk</td>
                            <td class="kotak-tanggal"><input type="date" name="tanggalmasuk" required="required"></td>
                            <td class="input-tanggal">tanggal keluar</td>
                            <td><input type="date" name="tanggalkeluar" required="required"></td>
                            <td><input type="submit" name="cari" value="cari"></td>

                        </tr>
                    </table>
                </form>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nik</th>
                            <th>nama</th>
                            <th>alamat</th>
                            <th>no.kamar</th>
                            <th>tanggal masuk</th>
                            <th>tanggal keluar</th>
                            <th>bayar</th>
                            <th>deposit</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $datawisma = mysqli_query($conn, "select * from pemesanan");
                        $i = 1;
                        while ($data = mysqli_fetch_array($datawisma)) {
                            $nik = $data['nik'];
                            $nama = $data['nama'];
                            $alamat = $data['alamat'];
                            $jeniskelamin = $data['jeniskelamin'];
                            $kamar = $data['kamar'];
                            $tanggalmasuk = $data['tanggalmasuk'];
                            $tanggalkeluar = $data['tanggalkeluar'];
                            $bayar = $data['bayar'];
                            $deposit = $data['deposit'];
                            $idp = $data['id_pemesanan'];

                            ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $nik; ?>
                                </td>
                                <td>
                                    <?= $nama; ?>
                                </td>
                                <td>
                                    <?= $alamat; ?>
                                </td>
                                <td>
                                    <?= $kamar; ?>
                                </td>
                                <td>
                                    <?= $tanggalmasuk; ?>
                                </td>
                                <td>
                                    <?= $tanggalkeluar; ?>
                                </td>
                                <td>
                                    <?= $bayar; ?>
                                </td>
                                <td>
                                    <?= $deposit; ?>
                                </td>
                                <td>
                                    <div class="button">
                                        <a href="http://localhost/wisma/laporan/editlaporan.php?id_pemesanan=<?= $idp; ?>">
                                            <button type="submit" name="edit" class="btn">edit</button>
                                        </a>
                                        <a href="http://localhost/wisma/laporan/hapus.php?id_pemesanan=<?php echo $data['id_pemesanan']; ?>">
                                        <button type="submit" name="hapus" class="btn">hapus</button>
                                        </a>
                                        <button type="submit" name="cetak" class="btn" >cetak</button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ;

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