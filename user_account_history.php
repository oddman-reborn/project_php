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
		
		<h2>
			<ul>
				<li><a href="user_account_history.php">Account History</a></li>
				<li><a href="user_account_recharge.php">Recharge</a></li>
				<li><a href="user_account_edit.php">Edit info</a></li>
			</ul>
		</h2>
		<h3>
	<?php
		
			session_start();
		$tot_credit=0;
		$tot_debit=0;
		
		if(isset($_SESSION['id']) )
		{
			include("connect_db.php");
			$user_id=$_SESSION['id'];
			
			$credit="select * from user_balance where user_id='$user_id' ";
			
			$query=mysqli_query($conn,$credit);
			
			if($query)
			{
				while($result=mysqli_fetch_assoc($query) )
				{
					$temp_credit=$result['credit'];
					$temp_debit=$result['debit'];
					
					$tot_credit=$temp_credit + $tot_credit;
					$tot_debit=$temp_debit + $tot_debit;
					
				}
				
				$balance=$tot_credit - $tot_debit;
				
				echo "Total recharge = $tot_credit Tk.<br>";
				echo "Total used = $tot_debit Tk.<br>";
				echo "Current Balance = $balance Tk.<br>";
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
	<h3>
		<P>	
	<table BORDER=1px CELLPADDING=25 CELLSPACING=25  >
<?php

	
	
	if( isset($_SESSION['id']) )
	{
		$user_id=$_SESSION['id'];
		include("connect_db.php");
		
		$balance="select * from user_balance where user_id='$user_id' ";
		
		$done=mysqli_query($conn,$balance);
		
		if($done)
		{
			echo "<tr>" . "<td>Date </td><td>Recharge</td><td>Cost</td><td>Product id</td>" . "</tr>";
			
			while($result=mysqli_fetch_assoc($done))
			{
					$recharge=$result['credit'];
					$date=$result['date'];
					$cost=$result['debit'];
					$pid=$result['source'];
					
					echo "<tr>" . "<td>$date</td><td>$recharge</td><td>$cost</td><td>$pid</td>" . "</tr>";
			}
			

		}
	}

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
	

	</body>
</html> 