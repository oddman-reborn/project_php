<html>
	<title>User Registration</title>
	
	
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
		<h2>Register </h2>
			<form action="reg_user.php" method="POST">
				<p>E-mail   : <input type="text" name="email"></p><br>
				<p>Username : <input type="text" name="user"></p><br>
				<p>Address : <input type="text" name="address"></p><br>
				<p>Contact : <input type="text" name="contact"></p><br>
				<p>Password : <input type="password" name="passw"></p><br>
				<input type="submit" name="submit" value="Register" >
		
			</form>


<?php
	
	if( isset($_POST['submit'] ) )
	{
		
		$server="localhost";
		$user="root";
		$pass="";
	
		$email=$_POST['email'];
		$username= $_POST['user'];
		$password= $_POST['passw'];
		$address= $_POST['address'];
		$contact= $_POST['contact'];
		
		
	
		if($email !=null and $password !=null and $username !=null ) 
		{
			$conn= mysqli_connect($server,$user,$pass);
	
			$db=mysqli_select_db($conn,"project");
	
			$query="select * from user where email='$email' ";
	
			$result=mysqli_query($conn,$query);
	
			$count= mysqli_num_rows($result);
	
			if($count==0)
				{
					$sql="insert into user (email,password,username,address,contact) values ('$email','$password','$username','$address','$contact')";
	
					mysqli_query($conn,$sql);
	
					echo "Registered successfully !!!";
				}
	
			else 
				echo "E-mail address already used... ";
		}
		
		else
			echo "E-mail,username or password cant be kept empty...";
		
		//mysql_close($conn);
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