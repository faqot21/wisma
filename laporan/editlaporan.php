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
    <link rel="stylesheet" href="editlaporan6.css">
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
    <h2>Edit laporan pemesanan kamar</h2>
        <form action="#" class="form" method="POST" id="$idp;">
            <input type="hidden" name="idp" value="<?= $idp; ?>" />
            <label for="nik">NIK</label>
            <div class="input-box">
                <input type="text" name="nik" value="<?php echo $data['nik'] ?>" />
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
                        <input type="radio" id="check-male" name="jeniskelamin" value="laki-laki" <?php if ($data['jeniskelamin'] == 'laki-laki')
                            echo 'checked'; ?> />
                        <label for="check-male">laki-laki</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="jeniskelamin" value="perempuan" <?php if ($data['jeniskelamin'] == 'perempuan')
                            echo 'checked'; ?> />
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
                <?php
                $selectedKamars = explode(',', $data['id_kamar']); // Assuming kamar is stored as a comma-separated string in the database
                
                $kamars = array('202', '203', '204', '205', '206', '207', '208', '209', '301', '302', '303');

                foreach ($kamars as $kamar) {
                    $isChecked = in_array($kamar, $selectedKamars) ? 'checked' : '';
                    ?>
                    <li class="item">
                        <input type="checkbox" name="id_kamar[]" class="checkbox" value="<?= $kamar; ?>" <?= $isChecked; ?>>
                        <!-- <i class="fa-solid fa-check check-icon"></i> -->
                        </input>
                        <span class="item-text">
                            <?= $kamar; ?>
                        </span>
                    </li>
                <?php } ?>
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
                <input type="number" name="deposit" value="<?php echo $data['deposit'] ?>" />
            </div>
            <label>Bayar</label>
            <div class="input-box">
                <input type="number" name="bayar" value="<?php echo $data['bayar'] ?>" />
            </div>
            <button type="submit" name="edit" class="btn" onclick="confirmEdit()">edit</button>
        </form>
    </div>
    </div>
    </div>
    <script>
function confirmEdit() {
    var confirmation = confirm("Are you sure you want to edit this data?");
    if (confirmation) {
        // If the user confirms, proceed with the form submission
        document.getElementById("$idp;").submit();
    } else {
        // If the user cancels, prevent the form submission
        return false;
    }
}
</script>
    <!-- Javascript -->
    <script src="../js/script.js"></script>
</body>

</html>