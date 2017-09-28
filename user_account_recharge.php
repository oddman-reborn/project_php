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
		<h2>Account History</h2>
		<P>
		<h2>
			<ul>
				<li><a href="user_account_history.php">Account History</a></li>
				<li><a href="user_account_recharge.php">Recharge</a></li>
				<li><a href="user_account_edit.php">Edit info</a></li>
				<br><br><br><br>
			</ul>
		</h2>
		
		<h2>
		<form action="user_account_recharge.php" method="POST">
			
			Credit code <input type="text" name="code">
			Pin code <input type="text" name="pin"><br><br><br>
			
			<input type="submit" name="check" value="Recharge">			
		</form>
		</h2>
	<?php
		session_start();
		
			if( isset($_SESSION['id']) )
			{
				include("connect_db.php");
				
				$user_id=$_SESSION['id'];
				
				if(isset($_POST['check'] ) )
				{
					$code=$_POST['code'];
					$pin=$_POST['pin'];
					
					
					$check_card="select * from credit_card where code='$code' and pin='$pin' and status='used' ";
					$used_card=mysqli_query($conn,$check_card);
					$used=mysqli_num_rows($used_card);
					if($used==1)
					{
						echo "<script type='text/javascript'>

										alert('This card already been used....');

								</script>";
					}
					
					else
					{
						$sql="select * from credit_card where code='$code' and pin='$pin' and status='not used' ";
						$done=mysqli_query($conn,$sql);
					
						$found=mysqli_num_rows($done);
					
						if($found==1)
						{
								$result=mysqli_fetch_assoc($done);
								$credit=$result['balance'];
						
								$card="update credit_card set status='used' where code='$code' and pin='$pin' ";
						
								$current_date=date("d-m-y");
						
								$recharge="insert into user_balance(user_id,date,credit) values('$user_id' , '$current_date' , '$credit')";
							
								$card_validation=mysqli_query($conn,$card);
						
						if($card_validation)
							{
								$user_recharge=mysqli_query($conn,$recharge);
							
								if($user_recharge)
								{
									echo "<script type='text/javascript'>

													alert('Recharge successful....');

											</script>";
								}
							
							else 		{
								
									echo "<script type='text/javascript'>

													alert('Error occured....');

											</script>";
								
										}
							}
					
					
						}
							else
								{
										echo "<script type='text/javascript'>
		
													alert('Wrong code or pin number....');

												</script>";
								}
						
						
			}
					

					
					
				}
			}
			
	else 
		echo "Please <a href='login.php'>Log in</a> to get full access...";
		
	?>
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