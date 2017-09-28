<html>
	<title>Online Shopping</title>
	
	
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
		<h2>Order Information</h2>
		
		<h2><ul>
			
			<li><a href="user_cart.php">View Cart</a></li>
			<li><a href="user_cart_order_info.php">Make Order</a></li>
			
			<br><br><br><br>
		</ul>
		</h2>
		<P>
		
		<?php
		
		
		session_start();
		if(isset($_SESSION['id']))
		{
		if( isset($_POST['submit'] ) )
		{
			$address=$_POST['address'];
			$contact=$_POST['contact_no'];
			$payment=$_POST['payment'];
			$delivery=$_POST['deliver_by'];
			
			$contact_length=strlen($contact);
			
			if ($contact_length<=11)
			{
			if($address !=null and $contact !=null)
			{
				header("refresh:0; url='user_cart_order.php?adrs=$address & cont=$contact & pay=$payment & del=$delivery' ");
				
			}
			
			else
			{
				echo "<script type='text/javascript'>

							alert('Please insert your address and contact no to proceed...');

						</script>";
			}
			}
			else
			{
								echo "<script type='text/javascript'>

							alert('Invalid contact number...');

						</script>";
				
			}
		}
	}
		
			else 
	{
							echo "		<script type='text/javascript'>

										alert('Please Log in to get full access...');

									</script>"; 
							header("refresh:0 ; url=login.php");
	}
		
		
		?>
		
		<br>
		<form action="user_cart_order_info.php" method="POST" >
			
			Deliver By : <input type="radio" name="deliver_by" value="Mail" checked> Mail
							 <input type="radio"	name="deliver_by" value="Home Delivey"> Home Delivery<br><br>
							 
			Payment Via : <input type="radio" name="payment" value="Account" checked> Account
								<input type="radio" name="payment" value="Cash on delivey">Cash on delivey<br><br>
								
			Address :		<input type="text" name="address" required><br><br>
			Contact No :	<input type="number" name="contact_no" required><br><br>
								
								<input type="submit" name="submit" value="Confirm"><br><br>
								
		</form>
		
		
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