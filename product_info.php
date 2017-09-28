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
		<h1 style="float: center;">Product info</h1><br>
		
		<form action="product_info.php" method="POST" enctype="multipart/form-data"><br>
		
			Product ID : <input type="text" name="pid">
								<input type="submit" name="search" value="Search by ID"><br><br>
								
			<p>Unit : <input type="text" name="unit"></p><br>
			
			<input type="submit" name="less" value="Less unit product list">
			<input type="submit" name="most" value="Most unit product list">
			<br><br>	
		</form>
	<table BORDER= CELLPADDING=25 CELLSPACING=25>	
<?php
	session_start();
	
	include("connect_db.php");
	
	
	if(isset($_POST['less']) )
	{
		$unit=$_POST['unit'];
		$sql="select * from product where unit_avail<'$unit' ";
	}
	else if( isset($_POST['most']) )
	{
		$unit=$_POST['unit'];
		$sql="select * from product where unit_avail>'$unit' ";
	}
	
	else if(isset($_POST['search']) )
	{
		$product_id=$_POST['pid'];
		$sql="select * from product where id='$product_id' ";
	}
	else
		$sql="select * from product";
	
	$product_query=mysqli_query($conn,$sql);
	
		echo "<tr>". "<td>Product ID</td><td>Name</td><td>Category</td><td>Price</td><td> Available Unit</td> <td>Details</td><td>Action</td>" . "</tr>";
			while($product=mysqli_fetch_assoc($product_query) )
			{
				$id=$product['id'];
				$name=$product['product_name'];
				$category=$product['category'];
				$price=$product['price'];
				$unit_avail=$product['unit_avail'];
				$detail=$product['detail'];
				
				echo"<tr>" . "<td>$id</td><td>$name</td><td>$category</td><td>$price</td><td>$unit_avail</td><td>$detail</td>
									<td><a href=upload_old_products.php?pid=$id><img src=site_image/upload.jpg style='width:127px;hieght:44;'></a><br>
									<a href=delete_product.php?pid=$id><img src=site_image/delete.png style='width:127px;hieght:44;'></a><br>
									<a href=edit_product.php?pid=$id><img src=site_image/edit.png style='width:127px;hieght:44;'></a><br>
									</td>" . "</tr>";
			}
	
	

?>		
	</table>				
	
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