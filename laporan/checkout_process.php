<?php
// checkout_process.php

// Assuming your database connection is established in 'koneksi.php'
require '../koneksi.php';

if (isset($_POST['id_pemesanan'])) {
    $id_pemesanan = $_POST['id_pemesanan'];

    // Get the id_kamar associated with the id_pemesanan
    $getIdKamarQuery = "SELECT id_kamar FROM pemesanan WHERE id_pemesanan = $id_pemesanan";
    $result = mysqli_query($conn, $getIdKamarQuery);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $id_kamar = $row['id_kamar'];

        // Update the room status in the data_kamar table
        $updateQuery = "UPDATE data_kamar SET status_kamar = 'kosong' WHERE id_kamar = $id_kamar";
        mysqli_query($conn, $updateQuery);

        // You can perform additional actions or checks here if needed

        // Send a response back to the client (you can customize the response if necessary)
        echo "Checkout process successful!";
    } else {
        // Handle the case where the id_kamar is not found
        echo "Error: Unable to retrieve id_kamar for checkout.";
    }
}
?>
