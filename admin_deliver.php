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
		
		<h1>Delivery Panel </h1>
		
		
		
		<table BORDER= CELLPADDING=25 CELLSPACING=25> 
		
		<?php
		session_start();
		
		if(isset($_SESSION['id']))
		{
			include("connect_db.php");
			
			$query="select * from deliver_list where status='not delivered' ";
			
			$search=mysqli_query($conn,$query);
			
			echo "<tr>" . "<td>order_no</td>
										<td>Category</td>
										<td>Product ID</td>
										<td>User ID</td>
										<td>Status</td>
										<td>Price</td>
										<td>Destination</td>
										<td>Delivery Type</td>
										<td>Cost</td>
										<td>Action</td>"
									."</tr>";
			while( $result=mysqli_fetch_assoc($search) )
			{
				$order_no=$result['order_no'];
				$category=$result['category'];
				$product_id=$result['product_id'];
				$user_id=$result['user_id'];
				$status=$result['status'];
				$price=$result['price'];
				$destination=$result['destination'];
				$delivery_type=$result['type'];
				$cost=$result['cost'];
				
				
				echo "<tr>" . "<td>$order_no</td>
										<td>$category</td>
										<td>$product_id</td>
										<td>$user_id</td>
										<td>$status</td>
										<td>$price</td>
										<td>$destination</td>
										<td>$delivery_type</td>
										<td>$cost</td>
										<td><a href='deliver_maker.php?oid=$order_no'>Delivered</a> "
										
									."</tr>";
									
			}
	
		}
		
		?>
		
		</table>
	</div>
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			
			<li><a href="order_list.php"> Order List </a> </li>
			<li><a href="upload_products.php"> Upload Products </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_admin.php">Register Admin</a> </li>
			<li><a href="order_accept.php">Accept orders</a></li>
			<li><a href="deliver.php">Delivery</a></li>
			
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