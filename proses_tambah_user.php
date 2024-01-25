<?php
session_start();
require 'koneksi.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["usernames"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $roles = $_POST["roles"];

    // Validate password confirmation
    if ($password != $confirmPassword) {
        $response = array("status" => "error", "message" => "Konfirmasi password tidak cocok.");
        echo json_encode($response);
        exit();
    }

    // Hash the password using password_hash()
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the data_user table
    $sql = "INSERT INTO data_karyawan (username, password, role) VALUES ('$user_name', '$hashedPassword', '$roles')";

    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "Data berhasil disimpan.");
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($response);
    }

    // Close the database connection
    $conn->close();
    exit(); // Stop further execution
}
?>
