<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
        <?php
        session_start();
        include("koneksi.php");
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
          $sesi = $_SESSION['user'];
          $result   = mysqli_query($Koneksi, "select saldo from user where user='$sesi'");
          $row      = mysqli_fetch_array($result);
          $saldo = $row['saldo'];

     echo ('selamat datang, '.$sesi);
     echo "<a href='logout.php'> <button type='button' class='btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-log-out'></span> Log out
        </button> </a>
        <br>
        Saldo = $saldo";

      }
      else {
        echo "<ul>
          <li><a href='register.php'>Register</a></li>
          <li><a href='login.php'>Login</a></li>
        </ul>";
      }
         ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00
			  	   	<ul class="dropdown">
							<li>you have no items in your Shopping cart</li>
					</ul></div></p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.php">Home</a></li>
			    	<li class="active"><a href="topup.php">Top Up</a></li>
			    	<li><a href="toko.php">Toko</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form action="search.php" method="GET">

	     			<input type="text" name="query" /> <input type="submit" value="" />
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>
   </div>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <table style="width:100%">
  				<br>
          <tr>
          <td>Nama barang</td>
          <td>Kategori</td>
          <td>Stok</td>
          <td>Penjual</td>
          <td>Harga</td>
          <td>Toko</td>
		  <td>Beli</td>
          </tr>
          <?php
          $kategori = $_GET['kategori'];
          include("koneksi.php");
          $result   = mysqli_query($Koneksi, "select * FROM barang WHERE kategori = '$kategori' ");
          if (!$result) {
          die(mysqli_error($Koneksi));
          }
          else {
            $row_cnt = $result->num_rows;
            if ($row_cnt > 0){
              $count = 0;
              while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['kategori']}</td>
                <td>{$row['stok']}</td>
                <td>{$row['penjual']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['toko']}</td>
				<td>
              <h4><a href='beli.php?id={$row['id']}'>Add to Cart</a></h4>
               </td>
                </tr>";

              }
            }

        }


           ?>


  			</table>
			</div>
    </div>
 </div>
</div>
   <div class="footer">
        <div class="copy_right">
				<p>Company Name © All rights Reseverd</p>
		   </div>
    </div>
   <script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>
