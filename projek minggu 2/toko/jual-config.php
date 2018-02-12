<?php

include("toko-config.php");
$tokoNew = new toko ();
$shop = $_GET["toko"];
$tokoNew->tambahitem($shop);


?>
