<?php
if (isset($_POST['login'])){
    include 'koneksi.php';
    $pesan='';
    $redirect='';
    $un=$_POST['username'];
    $ps=$_POST['password'];

    $q = $conn->query("SELECT * FROM data_karyawan WHERE username='$un'");
    $get_data = mysqli_fetch_array($q);
    $passwordbaru = $get_data['password'];

    if (empty($get_data)){
        $pesan = 'Username & Password tidak terdaftar!';
    } else {
        // Menggunakan password_verify untuk memeriksa kata sandi
        // Anda perlu menambahkan konversi MD5 di sini
        $ps_md5 = md5($ps);

        if ($ps_md5 === $passwordbaru) { // Membandingkan MD5 hash
            $role = $get_data['role'];

            session_start();
            $_SESSION['id'] = $get_data['id'];
            $_SESSION['username'] = $un;
            $_SESSION['role'] = $role;

             // Tentukan halaman redirect berdasarkan peran
             if ($role === 'pimpinan') {
                $redirect = 'dashboard.php';
            } elseif ($role === 'admin') {
                $redirect = 'dashboard.php';
            } else {
                // Peran lain bisa ditambahkan di sini
            }

            $pesan = 'Login Sukses';
        } else {
            $pesan = 'Password salah!';
        }
    }
    echo("<script language='JavaScript'>
    window.alert('$pesan'); 
    window.location.href='$redirect';
    </script>");
}
// require 'koneksi.php';

// if (isset($_POST["login"])) {
    
    
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $query = "SELECT * FROM data_karyawan WHERE username = '$username'";
//     $result = mysqli_query($conn, $query);

//     // Pengecekan hasil query
//     if ($result) {
//         // Pengecekan jumlah baris yang ditemukan
//         if (mysqli_num_rows($result) === 1) {
//             $row = mysqli_fetch_assoc($result);

//             // Verifikasi password
//             if (password_verify($password, $row["password"])) {
//                 header("Location: dashboard.php");
//                 exit;
//             } else {
//                 echo "password salah";
//             }
//         } else {
//             echo "Username tidak ditemukan";
//         }
//     } else {
//         // Kesalahan dalam menjalankan query
//         echo "Error: " . mysqli_error($conn);
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='style'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class ="input-box">
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class ="input-box">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn">login</button>
        </form>
    </div>
</body>
</html>