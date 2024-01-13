<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wisma";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 

 //nambah barang baru
//  if (isset($_POST['pesan'])) {
//     //   $id_pemesanan = $_POST['id_pemesanan'];
//       $nik = $_POST['nik'];
//       $nama = $_POST['nama'];
//     //   $alamat = $_POST['alamat'];
//       $jeniskelamin = $_POST['jeniskelamin'];
//     //   $kamar = $_POST['kamar'];
//       $tanggalmasuk = $_POST['tanggalmasuk'];
//       $tanggalkeluar = $_POST['tanggalkeluar'];
//       $deposit = $_POST['deposit'];
//       $bayar = $_POST['bayar'];
//     //INSERT INTO `pemesanan` (`id_pemesanan`, `nik`, `nama`, `alamat`, `jeniskelamin`, `kamar`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) 
//     //VALUES (NULL, '1221', 'andi', 'jl akaisa 3', 'laki-laki', '202', '2023-12-22', '2023-12-23', '2000', '3000');

//       $addtotable = mysqli_query($conn, "INSERT INTO pemesanan (`nik`, `nama`, `alamat`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) VALUES(`$nik`, `$nama`, `$alamat`, `$tanggalmasuk`, `$tanggalkeluar`, `$deposit`, `$bayar`)");
//       if($addtotable){
//           header('location:checkin.php');
//       } else {
//           echo 'gagal';
//           header('location:checkin.php');
//       }
//   }


if (isset($_POST['pesan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $kamar = $_POST['kamar'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $tanggalkeluar = $_POST['tanggalkeluar'];
    $deposit = $_POST['deposit'];
    $bayar = $_POST['bayar'];
    $room=implode(",", $kamar);
    
    
    $tambahkamar = mysqli_query($conn, "INSERT INTO pemesanan (`nik`, `nama`, `alamat`, `jeniskelamin`, `kamar`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) VALUES('$nik', '$nama', '$alamat','$jeniskelamin', '$room', '$tanggalmasuk', '$tanggalkeluar', '$deposit', '$bayar')");

    if($tambahkamar){
        header('location:checkin.php');
    } else {
        echo 'gagal';
        header('location:coba.php');
    }

}

if (isset($_POST['hapus'])) {
    $idp = $_POST['idp'];

    $hapus = mysqli_query( $conn,"DELETE FROM pemesanan WHERE id_pemesanan ='$idp'");

    if($hapus){
        
    }
}









?>
