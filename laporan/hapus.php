<?php
include '../koneksi.php';

$id=$_GET['id_pemesanan'];

$hapus = mysqli_query ($conn, " DELETE FROM pemesanan WHERE id_pemesanan ='$id' ");

if ($hapus){
    echo("<script language='JavaScript'>
    window.alert('Data Berhasil Di Hapus'); 
    window.location.href='laporan.php';
    </script>");
}

?>