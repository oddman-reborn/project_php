<html>
	<title>Products</title>
	
	
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
		<h2>Products</h2>
		<form action="products.php" method="POST">
		Category :<select name="category"> 
					<option value="Dress">Dress</option>
					<option value="Electronics">Electronics</option>
					<option value="Books">Books</option>
					<option value="Others">Others</option>
					<option value="Laptop pc">Laptop pc</option>
					<option value="Desktop pc">Desktop pc</option>
					</select> 
					<input type="submit" name="submit" value="Go">
					
		</form>
		<br><br>
		<table >
<?php
	
	session_start();
	
	include"connect_db.php";
	
	if(isset($_POST['submit']) )
	{
		$category=$_POST['category'];
		$product="select * from product where category='$category'";
	}
	else
		$product="select * from product";
	
	$done=mysqli_query($conn,$product);
	
	//$user_id=$_SESSION['id'];
	
	if($done)
	{
		
		$br=1;
		echo "<tr>"."<td></td><td></td>"."</tr>";
		while($result=mysqli_fetch_assoc($done))
		{
			$image=$result['image_path'];
			$name=$result['product_name'];
			$price=$result['price'];
			$product_id=$result['id'];
			
			
			echo "<td>$name<br><br>
									<img src='$image'  style='width:250px;hieght:350px;padding:10px;margin:10px;border-bottom:1px solid #B2B9BF;'><br><br>
									<a href='view_detail.php?pid=$product_id  '> <img src=site_image/view_detail.png style='width:127px;hieght:44;'></a>
									</td>";
			
				if($br==3)
				{
					echo "<tr></tr>";
					$br=0;
				}
			$br=$br+1;
			

		}
																								
	}


?>
</table>
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
	
	
	<script> type="text/javascript" src="js/jquery.nivo.slider.pack.css" </script>
	<script> type="text/javascript" src="js/jquery.nivo.slider.css" </script>
	
	<script type="text/javascript">
	
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
		
	</script>
	

	</body>

	
</html> 