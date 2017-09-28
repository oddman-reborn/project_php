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
	

	
	<?php
	
session_start();
	if(isset($_SESSION['id']))
	{
			if( isset($_POST['submit'] ) )
		{
			include("connect_db.php");

			if(!$conn)
				die("Connection failed...");
		
		
		
			$product_name=$_POST ['product_name'];
			$price=$_POST['price'];
			$unit=$_POST['unit'];
			$category=$_POST['category'];
			$detail=$_POST['detail'];
		
			$img_tmp = $_FILES["image"]["tmp_name"];
			$img_name = $_FILES["image"]["name"];
			$img_type = $_FILES["image"]["type"];
			$img_path = "product_images/".$img_name;
			move_uploaded_file($img_tmp,$img_path);
			$sql="insert into product ( image_path, product_name , category , price , unit_avail,detail ) values('$img_path' , '$product_name' , '$category' , '$price ' , '$unit','$detail' ) ";
		
			$done=mysqli_query($conn,$sql);
		
			if(!$done)
			{
				die("Problem occured...".mysqli_error($conn) );
			}
			else
			{
			
			
			echo "<br><br>";
			echo "<script type='text/javascript'>
							alert('Product Uploaded....');

					</script>";
								
			
			}
		}
	}
	else
			echo "Please <a href='login.php'>Log in</a> to get full access...";
		
		echo "<br><br>";

		
?>
		
		<h1 style="float: center;">Upload new products</h1><br>
	

		
		<P>
		<h2>
			<ul>
			<li><a href="upload_products.php" > New Product  </a><li>
			<li><a href="upload_old_products.php" >Old Products</a><li>
			</ul>
		</h2>
		<br><br><br>
		<form action="admin_upload_products.php" method="POST" enctype="multipart/form-data"><br>
			<p>Choose image : <input type="file" name="image"></p><br>
			<p>Product name : <input type="text" name="product_name"></p><br>
			<p>Detail : <input type="text" name="detail"></p><br>
			<p>Price : <input type="text" name="price"></p><br>
			<p>Unit : <input type="text" name="unit"></P><br>
			<p> Category :	 <select name="category" required> 
					<option value="Others">Others</option>
					<option value="Dress">Dress</option>
					<option value="Electronics">Electronics</option>
					<option value="Books">Books</option>
					<option value="Laptop pc">Laptop pc</option>
					<option value="Desktop pc">Desktop pc</option>
					</select>
									 </p><br><br>
			<input type="submit" name="submit" value="Upload">	
			<br><br>	
		</form>			
	
	</div>
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			
			<li><a href="admin_order_list.php"> Order List </a> </li>
			<li><a href="admin_upload_products.php"> Upload Products </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="admin_reg.php">Register Admin</a> </li>
			<li><a href="admin_order_accept.php">Accept orders</a></li>
			<li><a href="admin_delivery_list.php">Delivery</a></li>
			<li><a href="logout.php"> Log Out </a> </li>
			
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