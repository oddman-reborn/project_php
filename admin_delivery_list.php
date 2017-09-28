<html>
	<title>Order List</title>
	
	
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
		<h2>Order List </h2>
		
		
		<h2>
			<ul>
			<li><a href="admin_delivery_list.php" > Waiting Orders  </a><li>
			<li><a href="admin_on_delivery.php" >On the Delivery</a><li>
			<li><a href="admin_confirm_delivery.php" > Confirm Delivery  </a><li>
			</ul>
		</h2>
		
		<table BORDER= CELLPADDING=25 CELLSPACING=25>
		
<?php
	
	session_start();
	
	if(isset($_SESSION['id']))
	{
			include("connect_db.php");

		$order_list="select * from order_list where status='not delivered' ";
		
		$done=mysqli_query($conn,$order_list);
		
		if($done)
		{
			echo "<tr>" . "<td> Product Detail</td><td>Delivery Detail</td>" . "</tr>";
			
			
			while($result=mysqli_fetch_assoc($done) )
			{
				$product_id=$result['product_id'];
				$user_id=$result['user_id'];
				$quantity=$result['quantity'];
				$deliver_by=$result['deliver_type'];
				$address=$result['address'];
				$contact=$result['contact_no'];
				$price=$result['price'];
				$order_no=$result['order_no'];
				
				$sql="select * from product where id='$product_id' ";
				$search=mysqli_query($conn,$sql);
				
				$product=mysqli_fetch_assoc($search);
				$product_image=$product['image_path'];
				$product_name=$product['product_name'];
				echo $product_name;
				echo "<tr>" . "<td>Order No :$order_no<br>
												$product_name <br>
												<img src='$product_image'  style='width:150px;hieght:250px;padding:10px;margin:10px;border-bottom:1px solid #B2B9BF;'><br><br>
												Product ID : $product_id<br>
												Price : $price
											</td>
												
									 <td>Order from user ID : $user_id<br>
											$quantity unit deliver by $deliver_by<br>
											Contact : $contact <br>
											To : $address<br><br>
											<a href='order_accept.php?oid=$order_no & pid=$product_id & uid=$user_id '> <img src=site_image/admin_accept.png style='width:127px;hieght:44;'></a>
											<a href='order_cancel.php?oid=$order_no '> <img src=site_image/admin_cancel.jpg style='width:132px;hieght:49;'></a>
										</td>"
						. "</tr>";
				
			}
		
		}
	
	else
			echo "Please <a href='login.php'>Log in</a> to get full access...";
		
	}
?>

	</table>
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