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
		
				<p>Output</>


<?php
	

	
	
		$server="localhost";
		$user="root";
		$pass="";
		
		$conn=mysql_connect($server,$user,$pass);
		$db=mysql_select_db("project",$conn);
		
		$query= mysql_query("select image from product ");
		
		while($row= mysql_fetch_assoc($query) )
		{
			$imagedata=$row["image"];
			
		}
		
        header('Content-Type: image/jpeg');
		echo $imagedata;
		
	
		
?>			
		 	
		
	</div>
	
	
	<div class="sidebar"><h2>Sidebar</h2>
			<ul>
			<li><a href=""> Home </a> </li>
			<li><a href=""> Products </a> </li>
			<li><a href=""> About </a> </li>
			<li><a href=""> Contact </a> </li>
			<li><a href="login.php"> Log In </a> </li>
			<li><a href="reg_user.php">Register</a> </li>
			<li><a href="">Accept orders</a></li>
			<li><a href="upload_products.php">Upload products </a> </li>
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