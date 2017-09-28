
	
	<?php
	session_start();
	
	if(isset($_SESSION['id']))
	
	{
		if(isset($_GET['pid']))
			{	
				include("connect_db.php");
	
				$product_id=$_GET['pid'];
				$user_id=$_SESSION['id'];
				$price=$_GET['price'];
				$quantity=$_GET['q'];

				
				$insert="insert into cart (user_id,product_id,quantity,price) values ('$user_id' , '$product_id' , '$quantity' , '$price' )";
				
				$done=mysqli_query($conn,$insert);
				
				if($done)
				{
					header("refresh:0 ; url=user_cart.php");
					
					echo "		<script type='text/javascript'>

										alert('Inserted into cart...');

									</script>"; 
				}
				
				else
					echo "Problem occured....";
				

	
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
		
