<?php
// session_start();
require 'koneksi.php';
require 'auth.php';

// // Handle form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST["Username"];
//     $password = $_POST["password"];
//     $confirmPassword = $_POST["confirm_password"];
//     $role = $_POST["role"];

//     // Validate password confirmation
//     if ($password != $confirmPassword) {
//         $response = array("status" => "error", "message" => "Konfirmasi password tidak cocok.");
//         echo json_encode($response);
//         exit();
//     }

//     // Hash the password using a more secure method (e.g., password_hash())
//     // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     // Insert data into the data_user table
//     $tambahuser = mysqli_query ($conn, "INSERT INTO data_karyawan (username, password, role) VALUES ('$username', '$password', '$role')");

//     if ($tambahuser === TRUE) {
//         $response = array("status" => "success", "message" => "Data berhasil disimpan.");
//         echo json_encode($response);
//     } else {
//         $response = array("status" => "error", "message" => "Error: " . $tambahuser . "<br>" . $conn->error);
//         echo json_encode($response);
//     }

//     // Close the database connection
//     $conn->close();
//     exit(); // Stop further execution
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambahuser2.css">
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
            <li>
                <a href="http://localhost/wisma/tambahuser.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Tambah user</span>
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
    <form action="#" class="form" method="POST" >
        <h2>Tambah user</h2>
        <label for="Username">Username</label>
        <div class="input-box">
            <input type="text" name="username" placeholder="username" required/>
        </div>
        <label>Password</label>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" />
        </div>
        <label>confirm password</label>
        <div class="input-box">
            <input type="password" name="confirm_password" placeholder="konfirmasiPassword" />
        </div>
        <label for="Role">Role</label>
        <div class="input-box">
            <select name="role">
                <!-- <option value="pimpinan" name="role">pimpinan</option> -->
                <option value="admin" name="role">admin</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <button type="submit" name="tambahuser" class="btn" id="submitBtn">Submit</button>
    </form>
</div>
</body>
</html>
<!-- <script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Your existing AJAX code for form submission
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'proses_tambah_user.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message);
            }
        };
        var formData = new FormData(document.getElementById('userForm'));
        xhr.send(formData);
    });
</script> -->

