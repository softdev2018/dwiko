<?php

   include("koneksi.php");
  session_start();
  $isisaldo = (int)$saldo;
   $isisaldo = $_POST['isisaldo'];
   $user = $_SESSION['user'];
   if ($isisaldo>0){
   $tambahsaldo = "UPDATE user SET saldo='$isisaldo' WHERE user='{$_SESSION['user']}'";}
   if ($Koneksi->query($tambahsaldo) === TRUE) {
  echo "Berhasil menambahkan";
    } else {
  echo "Gagal menambahkan: ";
    }
    header("location:index.php");
 

 ?>
