<?php
class toko {
    function __construct() {
      include("koneksi.php");
      session_start();
      $namatoko = $_POST['namatoko'];
      $result   = mysqli_query($Koneksi, "select * from toko");
      $int = mysqli_num_rows($result);
      $total = (int)$int;
      $final = $total+1;
      $pemilik = $_SESSION['user'];
      echo "<script type='text/javascript'>alert($pemilik);</script>";
      $sql = "INSERT INTO toko (kode, namatoko, pemilik)
      VALUES ('$final', '$namatoko', '$pemilik')";
      if ($Koneksi->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Anda berhasil menambahkan toko');</script>";
      } else {
        echo "<script type='text/javascript'>alert('Gagal menambahkan');</script>";
      }

      $Koneksi->close();
        header("location:toko.php");
    }

    function tambahitem ($namatoko){
      include("koneksi.php");
      $namabarang = $_POST['namabarang'];
      $stok = $_POST['stok'];
	  $price = $_POST['harga'];
      $kategori = $_POST['kategori'];
      $result   = mysqli_query($Koneksi, "select * from barang");
      $int = mysqli_num_rows($result);
      $total = (int)$int;
	  $harga = (int)$price;
      $final = $total+1;
      $penjual = $_SESSION["user"];
      $sql = "INSERT INTO barang (id, nama, kategori, stok, penjual, toko, harga)
      VALUES ('$final', '$namabarang', '$kategori', '$stok', '$penjual', '$namatoko', '$harga')";
      if ($Koneksi->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Anda berhasil menambahkan barang');</script>";
      } else {
        echo "<script type='text/javascript'>alert('Gagal menambahkan');</script>";
        header("location:jualbarang.php?toko=$namatoko");
      }

      $Koneksi->close();
        header("location:barang.php?toko=$namatoko");
    }

    function hapusitem (){

    }
    function edittoko () {
      include("koneksi.php");
      $namatoko = $_POST['namatoko'];
      $pemilik = $_SESSION["user"];

      $edittoko = "UPDATE toko SET namatoko='$namatoko' WHERE pemilik=$pemilik";
      if ($Koneksi->query($edittoko) === TRUE) {
     echo "<script type='text/javascript'>alert('Anda berhasil mengedit toko');</script>";
       } else {
     echo "<script type='text/javascript'>alert('Gagal mengedit');</script>";
       }
    }


}
 ?>
