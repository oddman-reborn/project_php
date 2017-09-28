<html>
	<head>Demo project 
	
	
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

	</div>

	<div class="content">
		<h2>Admin register</h2>

		<form action="reg_admin.php" method="POST">
				<p>E-mail   : <input type="text" name="email"></p><br>
				<p>Username : <input type="text" name="user"></p><br>
				<p>Password : <input type="password" name="passw"></p><br>
				<input type="submit" name="submit" value="Register" >
		
			</form>

<?php
	session_start();
	
	if(isset($_SESSION['id']))
{
			if( isset($_POST['submit'] ) )
	{
		
		$server="localhost";
		$user="root";
		$pass="";
	
		$email=$_POST['email'];
		$username= $_POST['user'];
		$password= $_POST['passw'];
	
		if($email !=null and $password !=null and $username !=null ) 
		{
			$conn= mysql_connect($server,$user,$pass);
	
			$db=mysql_select_db("project",$conn);
	
			$query="select * from admin where email='$email' ";
	
			$result=mysql_query($query);
	
			$count= mysql_num_rows($result);
	
			if($count==0)
				{
					$sql="insert into admin (username,password,email) values ('$_POST[user]','$_POST[passw]','$_POST[email]')";
	
					$done=mysql_query($sql,$conn);
					
					if(!$done)
						echo "Error occured...".mysql_error($conn);
					
					else
						echo "Registered successfully !!!";
				}
	
			else 
				echo "E-mail address already used... ";
		}
		
		else
			echo "E-mail,username or password cant be kept empty...";
		
		//mysql_close($conn);
	}

}

else
	echo "Please <a href='login.php'>Log in</a> to get full access...";
?>
	</div>
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			
			<li><a href="order_list.php"> Order List </a> </li>
			<li><a href="upload_products.php"> Upload Products </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_admin.php">Register Admin</a> </li>
			<li><a href="order_accept.php">Accept orders</a></li>

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