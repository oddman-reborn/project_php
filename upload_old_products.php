<html>
	<title>Admin Dash Board</title>
	
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script> 
<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	
	<link href="css/demo_project.css" rel="stylesheet" type="text/css">
	<link href="css/bar/bar.css" rel="stylesheet" type="text/css"/>
	<link href="css/dark/dark.css" rel="stylesheet" type="text/css"/>
	<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
	<link href="css/default/default.css" rel="stylesheet" type="text/css"/>
	<link href="css/nivo-slider.css" rel="stylesheet" type="text/css"/>
	
	</head>
	
	<body>
	<div class="main">
	
	<div id="wrapper">
        

        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
				<img src="images/slider5.jpg" data-thumb="images/slider5.jpg" alt="" />
                <img src="images/slider1.jpg" data-thumb="images/slider1.jpg" alt="" />
                <img src="images/slider2.jpg" data-thumb="images/slider2.jpg" alt="" title="This is an example of a caption" /></a>
                <img src="images/slider3.jpg" data-thumb="images/slider3.jpg" alt="" data-transition="slideInLeft" />
                <img src="images/slider4.jpg" data-thumb="images/slider4.jpg" alt="" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div>
        </div>

    </div>	
	

	<div class="content">		
		<h1 style="float: center;">Upload old products</h1><br>
		
		
<?php
	session_start();
	
	if(isset ($_POST['submit']) ||  isset($_GET['pid']) )
	{
		include("connect_db.php");
		
		if(isset ($_POST['submit']))
		{
			$product_id=$_POST['product_id'];
			$product_amount=$_POST['product_amount'];
		}
		
		if(isset($_GET['pid']) )
		{
			$product_id=$_GET['pid'];
			echo "Product ID : $product_id<br>";
		}
		$sql_get="select * from product where id='$product_id' ";
		$search=mysqli_query($conn,$sql_get);
		
		if(isset ($_POST['submit']))
		{
			$product=mysqli_fetch_assoc($search);
			$quantity=$product['unit_avail'];
			
			$quantity=$quantity+$product_amount;
			
			$sql_update="update product set unit_avail='$quantity' where id='$product_id' ";
			$update=mysqli_query($conn,$sql_update);
			
			if($update)
			{
				echo "<script type='text/javascript'>

								alert('Product uploaded....');

						</script>";
			}	
			
			
		}
	}
	
	else
	{
		echo "<script type='text/javascript'>

						alert('Error occured....');
				</script>";
	}

?>
		
		<h2>
			<ul>
			<li><a href="upload_products.php" > New Product  </a><li>
			<li><a href="upload_old_products.php" >Old Products</a><li>
			</ul>
		</h2>
		<br><br><br>
		<form action="upload_old_products.php" method="POST" enctype="multipart/form-data"><br>
			
			<p>Product ID : <input type="text" name="product_id"></p><br>
			<p>Unit : <input type="text" name="product_amount"></p><br>
			
			<input type="submit" name="submit" value="Upload">	
			<br><br>	
		</form>			
	
	</div>
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			
			<li><a href="admin_order_list.php"> Order List </a> </li>
			<li><a href="admin_upload_products.php"> Upload Products </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="admin_reg.php">Register Admin</a> </li>
			<li><a href="admin_order_accept.php">Accept orders</a></li>
			<li><a href="admin_delivery_list.php">Delivery</a></li>
			<li><a href="logout.php"> Log Out </a> </li>
			
			</ul>
	</div>
	</div>
	
	<script> type="text/javascript" src="js/jquery.nivo.slider.pack.css" </script>
	<script> type="text/javascript" src="js/jquery.nivo.slider.css" </script>
	
	<script type="text/javascript">
	
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
		
	</script>
	
	<footer>
	@copyright monir
	</footer>
	</body>
</html> 