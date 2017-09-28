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
		<h1 style="float: center;">Edit product info</h1><br>
	
<?php
session_start();

if(isset($_GET['pid']) || isset($_POST['submit']) )
{
	include("connect_db.php");
	
	if(isset($_POST['submit']) )
	{
		$product_id=$_POST['id'];
		$name=$_POST['product_name'];
		$category=$_POST['category'];
		$price=$_POST['price'];
		$detail=$_POST['detail'];
		
		header(" refresh : 0; url='product_updater.php?pid=$product_id & name=$name & category=$category & price=$price & detail=$detail' ");
	}
	
	else if(isset($_GET['pid']) )
	{		
		$product_id=$_GET['pid'];
	
		$sql="select * from product where id='$product_id' ";
	
		$query=mysqli_query($conn,$sql);
	
		$product_info=mysqli_fetch_assoc($query);
	
		$name=$product_info['product_name'];
		$category=$product_info['category'];
		$price=$product_info['price'];
		$unit=$product_info['unit_avail'];
		$detail=$product_info['detail'];
	
	echo"
	<h3>Product ID : $product_id<h3>
	<form action='edit_product.php' method='POST'>
		
		Product ID : <input type='text' name='id' value='$product_id'><br><br>
		Product name : <input type='text' name='product_name' value='$name'><br><br>
		Select Category :	<input type='text' name='category' value='$category'>
						<input type='radio' name='category' value='Dress'>Dress
						<input type='radio' name='category' value='Electronics'>Electronics
						<input type='radio' name='category' value='Books'>Books
						<input type='radio' name='category' value='Others' checked>Others	<br><br>
							
		Product price: <input type='text' name='price' value='$price'><br><br>
		Product detail : <input type='text' name='detail' value='$detail'><br><br>
		<input type='submit' name='submit' value='update'><br><br>
	
	</form>
	
	";
	
	}
	else
		echo "HAHAHAHA";
	
	
}

else
{
	echo "<script type='text/javascript'>
					alert('Error occured...');
				</script>";
	
}

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