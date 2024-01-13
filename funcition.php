<?php
  session_start();

      //nambah barang baru
  if (isset($_POST['tambahbarang'])) {
    //   $id_pemesanan = $_POST['id_pemesanan'];
      $nik = $_POST['nik'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $jeniskelamin = $_POST['jeniskelamin'];
      $kamar = $_POST['kamar'];
      $tanggalmasuk = $_POST['tanggalmasuk'];
      $tanggalkeluar = $_POST['tanggalkeluar'];
      $deposit = $_POST['deposit'];
      $bayar = $_POST['bayar'];
    //INSERT INTO `pemesanan` (`id_pemesanan`, `nik`, `nama`, `alamat`, `jeniskelamin`, `kamar`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) 
    //VALUES (NULL, '1221', 'andi', 'jl akaisa 3', 'laki-laki', '202', '2023-12-22', '2023-12-23', '2000', '3000');

      $addtotable = mysqli_query($conn, "INSERT INTO pemesanan (`id_pemesanan`, `nik`, `nama`, `alamat`, `jeniskelamin`, `kamar`, `tanggalmasuk`, `tanggalkeluar`, `deposit`, `bayar`) VALUES('$id_pemesanan', `$nik`, `$nama`, `$alamat`, `$jeniskelamin`, `$kamar`, `$tanggalmasuk`, `$tanggalkeluar`, `$deposit`, `$bayar`)");
      if($addtotable){
          header('location:checkin.php');
      } else {
          echo 'gagal';
          header('location:checkin.php');
      }
  }

      //nambah barang masuk
  if(isset($_POST['barangmasuk'])) {
      $barangnya = $_POST['barangnya'];
      $keterangan = $_POST['keterangan'];
      $qty = $_POST['qty'];

      $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$barangnya'");
      $ambildatanya = mysqli_fetch_array($cekstocksekarang);

      $stocksekarang = $ambildatanya['stock'];
      $tambahstock = $stocksekarang + $qty;

      $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, keterangan, qty) VALUES('$barangnya', '$keterangan','$qty')");
      $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock='$tambahstock' WHERE idbarang='$barangnya'");


      if($addtomasuk && $updatestockmasuk){
          header('location:masuk.php');
      } else {
          echo 'gagal';
          header('location:masuk.php');
      }
}
?>