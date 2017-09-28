<html>
	<title>My Cart</title>
	
	
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

	<div class="mainmenu">
	<h2>
			<ul>
				<li><a href="user_cart.php">My cart</a> </li>
				<li><a href="index.php"> Home </a> </li>
				<li><a href="products.php"> Products </a> </li>
				<li><a href="about.php"> About </a> </li>
				<li><a href="contact.php"> Contact </a> </li>
				<li><a href="login.php"> Log In </a> </li>
				<li><a href="reg_user.php">Register</a> </li>
				<li><a href="user_account_history.php"> My Account</a> </li>
				<li><a href="logout.php"> Log out </a> </li>
			</ul>
			</h2>
	</div>

	<div class="content">
		<h2>My Cart</h2>

	
	<p>
		<table BORDER= CELLPADDING=25 CELLSPACING=25 >
	
	<?php

	session_start();
	
	if(isset($_SESSION['id']))
	
{
	
			//adrs=$address & cont=$contact & pay=$payment & del=$delivery
			$address=$_GET['adrs'];
			$contact=$_GET['cont'];
			$payment=$_GET['pay'];
			$delivery=$_GET['del'];
			
			
			include("connect_db.php");
	
			if(!$conn or !$db)
			die("Connection failed...".mysqli_connect_error());
		
			$user_id=$_SESSION['id'];
		
			$cart_list="select * from cart where user_id='$user_id'";
		
			$done=mysqli_query($conn,$cart_list);
			

		
			if($done)
			
			{
				echo "<tr>" . "<td>Product image</td><td> </td>" . "</tr>";
				
				while($result=mysqli_fetch_assoc($done))
				{
				$product_id=$result['product_id'];
			
				$product="select * from product where id='$product_id' ";
			
				$search_product=mysqli_query($conn,$product);
				
				if($search_product)
				
				$product_info=mysqli_fetch_assoc($search_product);
			
				$image_path=$product_info['image_path'];
				$price=$product_info['price'];
				$detail=$product_info['detail'];
				$name=$product_info['product_name'];
				$cart_id=$result['id'];
				
					echo "<td>
									<img src=$image_path  style='width:250px;hieght:350px;padding:10px;margin:10px;border-bottom:1px solid #B2B9BF;'><br><br>
								</td>
								<td>
									$name <br><br> 
									Price =$price TK<br><br>
									$detail <br><br>
									<a href='delete_cart.php?cid=$cart_id' ><img src='site_image/cancel1.png' style='width:80px;hieght:50px'></a>
											<a href='confirm_order.php?uid=$user_id & pid=$product_id & cid=$cart_id & adrs=$address & cont=$contact & del=$delivery & pay=$payment & price=$price'> <img src='site_image/confirm.png' style='width:80px;hieght:50px'></a> 
								</td>"
									. "</tr>";

				}
			
		
			}
		
		else 
			echo "    Not done";
	}
	
		else
			echo "Please <a href='login.php'>Log in</a> to get full access...";
		
		
?>
	
		</table>
		
		</p>
	</div>
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			
			<li><a href="index.php"> Home </a> </li>
			<li><a href="user_cart.php">My cart</a> </li>
			<li><a href="products.php"> Products </a> </li>
			<li><a href="about.php"> About </a> </li>
			<li><a href="contact.php"> Contact </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_user.php">Register</a> </li>
			<li><a href="user_account_history.php"> My Account</a> </li>
			<li><a href="logout.php"> Log out</a> </li>
			
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