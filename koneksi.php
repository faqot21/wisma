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

if (isset($_POST['pesan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $id_kamar = $_POST['id_kamar'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $tanggalkeluar = $_POST['tanggalkeluar'];
    $deposit = $_POST['deposit'];
    $bayar = $_POST['bayar'];
    $room = implode(",", $id_kamar);


    $updatekamar = mysqli_query($conn, "UPDATE data_kamar SET status_kamar = 'terisi' WHERE id_kamar = '$room'");
    $tambahkamar = mysqli_query($conn, "INSERT INTO pemesanan (`nik`, `nama`, `alamat`, `jeniskelamin`, `id_kamar`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) VALUES('$nik', '$nama', '$alamat','$jeniskelamin', '$room', '$tanggalmasuk', '$tanggalkeluar', '$deposit', '$bayar')");

    if ($tambahkamar && $updatekamar) {
        header('location:checkin.php');
    } else {
        echo 'gagal';
        header('location:coba.php');
    }

}

if (isset($_POST['hapus'])) {
    $idp = $_POST['idp'];

    $hapus = mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan ='$idp'");

    if ($hapus) {

    }
}

if (isset($_POST["edit"])) {
    $idp = $_POST['idp'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $id_kamar = $_POST['id_kamar'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $tanggalkeluar = $_POST['tanggalkeluar'];
    $deposit = $_POST['deposit'];
    $bayar = $_POST['bayar'];
    $room = implode(",", $id_kamar);

    $update = mysqli_query($conn, " UPDATE pemesanan SET nik='$nik',nama='$nama',alamat='$alamat',jeniskelamin='$jeniskelamin',id_kamar='$room',tanggalmasuk='$tanggalmasuk',tanggalkeluar='$tanggalkeluar',deposit='$deposit',bayar='$bayar' WHERE id_pemesanan='$idp'");

    if ($update) {
        echo ("<script language='JavaScript'>
        window.alert('Data Berhasil Di Update'); 
        window.location.href=location:laporan.php;';
        </script>");
    } else {
        echo 'gagal';
        header('location:coba.php');
    }
}



if (isset($_POST['checkout']) && isset($_POST['id_kamar'])) {
    $id_kamar = $_POST['id_kamar'];

    
    $updatekamar = mysqli_query($conn, "UPDATE data_kamar SET status_kamar = 'kosong' WHERE id_kamar = '$id_kamar'");

    if ($updatekamar) {
        echo ("<script language='JavaScript'>
        window.alert('Berhasil checkout kamar'); 
        window.location.href=location:laporan.php;';
        </script>");
    } else {
        echo 'gagal';
        header('location:coba.php');
    }
}

// if (isset($_POST['tambahuser'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $role = $_POST['role'];

//     $tambahuser = mysqli_query($conn, "INSERT INTO data_karyawan (username, password, role) VALUES('$username', '$password', '$role')");
    
//     if ($tambahuser) {
//         header('location:checkin.php');
//     } else {
//         echo 'gagal';
//         header('location:coba.php');
//     }

// }


if(isset($_POST['tambahuser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo ("<script language='JavaScript'>
        window.alert('Password tidak sesuai'); 
        window.location.href='tambahuser.php';
        </script>");
        exit();
    }

    $password = md5($password); // Using MD5 for password hashing (not recommended, consider bcrypt)


    // Check if the username already exists
    $check_query = mysqli_query($conn, "SELECT * FROM data_karyawan WHERE username = '$username'");
    if(mysqli_num_rows($check_query) > 0) {
        echo ("<script language='JavaScript'>
        window.alert('Username sudah ada'); 
        window.location.href='tambahuser.php';
        </script>");
        exit();
    }

    // Insert the new user if the username is unique
    $queryinsert = mysqli_query($conn, "INSERT INTO data_karyawan (username, password, role) VALUES ('$username', '$password', '$role')");

    if ($queryinsert){
        header('location:dashboard.php');
    } else {
        echo 'gagal';
        header('location:tambahuser.php');
    }
}


?>