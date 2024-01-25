<?php
// session_start();
// Assuming your database connection is established in 'koneksi.php'
require '../koneksi.php';
include "../auth.php";
require '../tcpdf/tcpdf.php';

function generatePDF($conn, $id_pemesanan) {
    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,true,'UTF-8',false);
    $pdf ->setPrintHeader(false);
    $pdf ->setPrintFooter(false);

    // Set document information

    // Add a page
    $pdf->AddPage();

    // Add header row to the PDF
    $pdf->SetFont('helvetica','B', 28);
    $pdf->Cell(0,22,'Wisma',0,1,'C',0,'',false,'M','M');
    $pdf->Cell(0,20,'Sekar Wangi',0,1,'C',0,'',false,'M','M');
    $pdf->setFont('helvetica','B',10);
    $pdf->Cell(0,15,'JL.Pelantar II NO.26, Kelurahan Tanjungpinangkota, Kecamatan Tanjungpinang Kota',0,1,'C',0,'',false,'M','M');
    $pdf->Cell(0,15,'Provinsi Kepulauan Riau',0,1,'C',0,'',false,'M','M');
    $pdf->SetFont('helvetica','B',10);
    $pdf->Cell(0,15,'E-mail: stoon.club@gmail.com',0,1,'C',0,'',false,'M','M');
    $pdf->Cell(0,10,'Mobile: 081990364216',0,1,'C',0,'C',false,'M','M');
    
    $pdf->Line(10,60,200,60);
    $pdf->Line(10,65,200,65);


    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0,  22, '',0,1,'C',0,'');
    $pdf->Cell(10, 10, 'No', 1);
    $pdf->Cell(20, 10, 'NIK', 1);
    $pdf->Cell(30, 10, 'Nama', 1);
    $pdf->Cell(20, 10, 'No. Kamar', 1);
    $pdf->Cell(30, 10, 'Tanggal Masuk', 1);
    $pdf->Cell(30, 10, 'Tanggal Keluar', 1);
    $pdf->Cell(20, 10, 'Bayar', 1);
    $pdf->Cell(20, 10, 'Deposit', 1);
    $pdf->Ln(); // Move to the next line

    

    // Get data for the specific id_pemesanan from the database
    $query = "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan";
    $result = mysqli_query($conn, $query);

    if ($data = mysqli_fetch_array($result)) {
        // Add data to the PDF as needed
        $pdf->Cell(10, 10, '1', 1); // Assuming you want to start with 1 for this specific case
        $pdf->Cell(20, 10, $data['nik'], 1);
        $pdf->Cell(30, 10, $data['nama'], 1);
        $pdf->Cell(20, 10, $data['id_kamar'], 1);
        $pdf->Cell(30, 10, $data['tanggalmasuk'], 1);
        $pdf->Cell(30, 10, $data['tanggalkeluar'], 1);
        $pdf->Cell(20, 10, $data['bayar'], 1);
        $pdf->Cell(20, 10, $data['deposit'], 1);
        $pdf->Ln(); // Move to the next line
    }
    $pdf->SetFont('helvetica','B',10);
    $pdf->Cell(300,150,'Hormat Kami',0,1,'C','0');

    // Save the PDF file
    $pdf->Output('Laporan_' . $id_pemesanan . '.pdf', 'D'); // 'D' will force a download
    exit();
}

if (isset($_POST['cetak']) && isset($_POST['id_pemesanan'])) {
    $id_pemesanan = $_POST['id_pemesanan'];
    generatePDF($conn, $id_pemesanan);
}

if (isset($_POST['checkout']) && isset($_POST['id_pemesanan'])) {
    $id_pemesanan = $_POST['id_pemesanan'];

    // Display a confirmation alert using JavaScript
    echo "<script>
    var confirmation = confirm('Apakah Anda ingin checkout?');
    if (confirmation) {
        // If user clicks OK, prevent the default form submission
        event.preventDefault();

        // Perform the AJAX request to update the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'checkout_process.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the server response if needed
                alert('Checkout berhasil!');
                location.reload(); // Refresh the page after successful checkout
            }
        };
        xhr.send('id_pemesanan=' + $id_pemesanan);
    }
 </script>";


 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="laporan3.css">
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
            </li>
            <li class="logout">
                <a href="../logout.php">
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
                            <td class="kotak-tanggal"><input type="date" name="tanggalkeluar" required="required"></td>
                            <td><input type="submit" name="cari" class="btn" value="cari"></td>
`
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
                            $id_kamar = $data['id_kamar'];
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
                                    <?= $id_kamar; ?>
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
        <a href="http://localhost/wisma/laporan/editlaporan.php?id_pemesanan=<?= $data['id_pemesanan']; ?>">
            <button type="submit" name="edit" class="btn">edit</button>
        </a>
        <a href="http://localhost/wisma/laporan/hapus.php?id_pemesanan=<?= $data['id_pemesanan']; ?>">
            <button type="submit" name="hapus" class="btn">hapus</button>
        </a>
        <form method="post">
            <input type="hidden" name="id_pemesanan" value="<?= $data['id_pemesanan']; ?>">
            <button type="submit" name="cetak" class="btn">cetak</button>
    
            <input type="hidden" name="id_kamar" value="<?= $data['id_kamar']; ?>">
            <button type="submit" name="checkout" class="btn">checkout</button>
        </form>
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
