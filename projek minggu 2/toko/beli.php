<?php
include("koneksi.php");
  session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {

  $sesi = $_SESSION['user'];
  $id = $_GET['id'];
$result   = mysqli_query($Koneksi, "select stok from barang where id = $id");
$row=mysqli_fetch_array($result);
$result1   = mysqli_query($Koneksi, "select saldo from user where user = '$sesi'");
$row1=mysqli_fetch_array($result1);
$result2   = mysqli_query($Koneksi, "select harga from barang where id = $id");
$row2=mysqli_fetch_array($result2);

$stok = $row['stok'];
$setok = (int)$stok;
$setokfinal = $setok-1;

$harga = $row2['harga'];
$price = (int)$harga;
$saldo = $row1['saldo'];
$sisa = (int)$saldo;
$left = $sisa-$price;
if(setok==1){
	$delete = "DELETE FROM barang WHERE id=$id";
	
}
$beli = "UPDATE barang SET stok='$setokfinal' WHERE id=$id";
$beli1 = "UPDATE user SET saldo='$left' WHERE user='$sesi'";
if ($Koneksi->query($beli1) === TRUE && $Koneksi->query($beli) === TRUE && $Koneksi->query($delete) === TRUE){
echo "<script type='text/javascript'>alert('berhasil beli');</script>";
 } else {
echo "Gagal menambahkan: ";
 }
 }
 else{
   echo "<script type='text/javascript'>alert('Login Dulu');</script>";
 }
  header("location:index.php");

?>
