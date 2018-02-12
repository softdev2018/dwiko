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
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/global.css">
<script src="js/slides.min.jquery.js"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
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
					<li><a href="topup.php">Top Up</a></li>
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
	<div class="header_slide">
			<div class="header_bottom_left">
				<div class="categories">
				  <ul>
				  	<h3>Categories</h3>
						<?php
						include("koneksi.php");
						$result   = mysqli_query($Koneksi, "select DISTINCT kategori FROM barang ");
						if (!$result) {
						die(mysqli_error($Koneksi));
						}
						else {
							$row_cnt = $result->num_rows;
							if ($row_cnt > 0){
								$count = 0;
								while ($row = $result->fetch_assoc()){

										 echo "<li><a href='kategori.php?kategori={$row['kategori']}'><h2>{$row['kategori']}</h2></a></li>";
								}
							}

					}
						?>
				  </ul>
				</div>
	  	     </div>
    	<div class="header_bottom_right">
			<br><br><br>Form Login<br>
			<table>
				<br>
				<form action="login-config.php" method="post">
				<tr><td>Username</td><td><input name="user" type="text" value="" size="33" maxlength="30" /></td></tr>
				<tr><td>&nbsp</td><td>&nbsp</td></tr>
				<tr><td>Password</td><td><input name="password" type="password" value="" size="33" maxlength="30" /></td></tr>
				<tr><td>&nbsp</td><td>&nbsp</td></tr>
				<tr><td></td><td><input value="Sign In" type="submit"></td></tr>
				</form>
			</table>
	 </div>

	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>

   <div class="section group">

			</div>
        </div>
 	</div>
    </div>
   <div class="footer">
        <div class="copy_right">
				<p>Company Name © All rights Reseverd </p>
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
