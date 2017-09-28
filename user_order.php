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
		<ul>
			<li><a href="index.php"> Home </a> </li>
			<li><a href=""> Products </a> </li>
			<li><a href=""> About </a> </li>
			<li><a href=""> Contact </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_user.php">Register</a> </li>
		</ul>	
	</div>

	
	
	
	<div class="content">
		<h2>User Order Authentication </h2>
		
<?php

	$server="localhost";
	$user="root";
	$pass="";
	
	
	$conn= mysql_connect($server,$user,$pass);
	
	$db=mysql_select_db("project",$conn);
						
			
			if(isset($_GET['product_id']))
		{
				//echo $id=$_GET['product_id'];			
				$id=$_GET['product_id'];	
					//static $pid=$id;	
	
					if(!$conn)
							die("Connection failed...".mysqli_connect_error());
							//echo "Connection successful...";
	
					$sql="select * from product where product_id=$id";

					$done=mysql_query($sql,$conn);
					
					if($result=mysql_fetch_assoc($done))
					{
						$path=$result['image_path'];
						//echo $path;
						$price=$result['price'];
						$unit=$result['unit_avail'];
						
						 echo "<h3>Price =$price tk  <br></h3>";
				 
						echo "<h3> Unit available=$unit<br></h3>";
						echo "<p><img src='$path' style='width:400px;hieght:500px' ></p>";
					}
		}

				if(isset($_POST['submit']))
			
			{			
			
			
				$email=$_POST['email'];
				$password=$_POST['passw'];
				
				$email=stripslashes($email);
				$password=stripslashes($password);
					
				
				$query="select * from user where email='$email' and password='$password' ";
				
				$result=mysql_query($query,$conn);
				
				$count=mysql_num_rows($result);
				
				if($count==1)
				{
					
					
					$order="insert into orders(product_id , user_email , user_passw) values( '$id' , '$email' , '$password' ) ) ";
					echo"success...";
				}
				
			
				

			}			

?>

			<form action="user_order.php" method="POST">
				<p>E-mail   : <input type="text" name="email"></p><br>
				<p>Password : <input type="password" name="passw"></p><br>
				<input type="submit" name="submit" value="Confirm">
		
			</form>
			
			
			
	</div>
	
	
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			<li><a href=""> Home </a> </li>
			<li><a href=""> Products </a> </li>
			<li><a href=""> About </a> </li>
			<li><a href=""> Contact </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_user.php">Register</a> </li>
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