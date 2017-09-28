<html>
	<title>Login</title>
	
	
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
		<h2>Log in </h2>
			<form action="login.php" method="POST">
				<p>E-mail   : <input type="text" name="email"></p><br>
				<p>Username : <input type="text" name="user"></p><br>
				<p>Password : <input type="password" name="passw"></p><br>
				<input type="submit" name="submit" value="Log in">
		
			</form>
		
	<?php

	if( isset($_POST['submit'] ) )
	{
		session_start();
		$server="localhost";
		$user="root";
		$pass="";
	
	
		$conn= mysqli_connect($server,$user,$pass);
	
		$db=mysqli_select_db($conn,"project");
	
		if(!$conn)
		{
			die("Connection failed...".mysqli_connect_error());
		}
		
	else{
			$email=$_POST['email'];
			$username=$_POST['user'];
			$password=$_POST['passw'];
			
		
			if($email !=null and $password !=null)
				{
					$username=stripslashes($username);
					$password=stripslashes($password);
					
					$admin_query="select * from admin where email='$email' and password='$password' ";
					$admin_result= mysqli_query($conn,$admin_query);
					$admin_count= mysqli_num_rows($admin_result);
				
					
					$user_query="select * from user where email='$email' and password= '$password' ";
					$user_result=mysqli_query($conn,$user_query);
					$user_count=mysqli_num_rows($user_result);
				
					
				
					if($admin_count==1)
						{
							echo "Admin Log in successful...";
					
							$result=mysqli_fetch_assoc($admin_result);
					
							$id=$result['id'];
							$user=$result['username'];
					
							$_SESSION['id']=$id;
							$_SESSION['user']=$user;
							echo "Admin id : ",$_SESSION['id'];
							
							header("Location: admin_dash.php");
					
				}
				
					
					else if($user_count==1)
						{
							echo "User log in successful...";
							
							$result=mysqli_fetch_assoc($user_result);
					
							$id=$result['id'];
							$user=$result['username'];
					
							$_SESSION['id']=$id;
							$_SESSION['user']=$user;
					
							echo "User id : ",$_SESSION['id'];
							
							
							header("Location: index.php");
						}
					
					else	
							echo "No match found";
				
		}		
				else
					echo"Email and password cant be kept empty...";
		}
	}			
?>

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