<?php
require '../koneksi.php';

// Periksa apakah ada parameter 'id' dalam URL
if (isset($_GET['id_pemesanan'])) {
    // Ambil ID karyawan dari URL
    $idp = $_GET['id_pemesanan'];
    // Query basis data untuk mengambil data karyawan berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $idp");
    $data = mysqli_fetch_array($query);
} else {
    // Jika tidak ada ID yang valid, mungkin Anda ingin mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan.
    echo "ID  tidak valid.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editlaporan1.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
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
            <li class="logout">
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="kotakpemesanan">
        
        <header>Edit laporan pemesanan kamar</header>
        <form action="#" class="form" method="POST" id="$id_pemesanan;">
            <label for="nik">Id</label>
            <div class="input-box">
                <input type="text" name="idp" value="<?= $idp; ?>" />
            </div>
            <label for="nik">NIK</label>
            <div class="input-box">
                <input type="text" name="nik" value="<?php echo $data['nik'] ?>"  />
            </div>
            <label>NAMA</label>
            <div class="input-box">
                <input type="text" name="nama" value="<?php echo $data['nama'] ?>" />
            </div>

            <label>ALAMAT</label>
            <div class="input-box">
                <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" />
            </div>

            <div class="gender-box">
                <label>Jenis kelamin</label>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="jeniskelamin" value="laki-laki" <?php if ($data['jeniskelamin'] == 'laki-laki') echo 'selected'; ?> />
                        <label for="check-male">laki-laki</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="jeniskelamin" value="perempuan" <?php if ($data['jeniskelamin'] == 'perempuan') echo 'selected'; ?> />
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
                    <input type="checkbox" name="kamar[]" class="checkbox" value="<?= $kamar; ?>">
                    <!-- <i class="fa-solid fa-check check-icon"></i> -->
                    </input>
                    <span class="item-text">202</span>
                </li>
                <li class="item">
                    <input type="checkbox" class="checkbox" name="kamar[]" value="<?= $kamar; ?>">
                    <!-- <i class="fa-solid fa-check check-icon"></i> -->
                    </input>
                    <span class="item-text">203</span>
                </li>
                <li class="item">
                    <input type="checkbox" class="checkbox" name="kamar[]" value="<?= $kamar; ?>">
                    <!-- <i class="fa-solid fa-check check-icon"></i> -->
                    </input>
                    <span class="item-text">204</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">205</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">206</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">207</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">208</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">209</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">301</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">302</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">303</span>
                </li>
            </ul>
            <div class="column">
                <label>tanggal Masuk</label>
                <div class="input-box">
                    <input type="Date" name="tanggalmasuk" value="<?php echo $data['tanggalmasuk'] ?>" />
                </div>
                <label>tanggal Keluar</label>
                <div class="input-box">
                    <input type="Date" name="tanggalkeluar" value="<?php echo $data['tanggalkeluar'] ?>" />
                </div>
            </div>
            <label>Deposit</label>
            <div class="input-box">
                <input type="text" name="deposit" value="<?php echo $data['deposit'] ?>" />
            </div>
            <label>Bayar</label>
            <div class="input-box">
                <input type="text" name="bayar" value="<?php echo $data['bayar'] ?>" />
            </div>
            <button type="submit" name="pesan" class="btn">edit</button>
        </form>
    </div>
    </div>
    </div>

    <!-- Javascript -->
    <script src="../js/script.js"></script>
</body>

</html>