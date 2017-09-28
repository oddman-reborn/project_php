<?php

session_start();
	
	if(isset($_GET['uid']) && isset($_GET['pid']))
	{
		include("connect_db.php");
		
		$product_id=$_GET['pid'];
		$user_id=$_GET['uid'];
		$cart_id=$_GET['cid'];
		
		//adrs=$address & cont=$contact & del=$delivery & pay=$payment
		
		$address=$_GET['adrs'];
		$contact=$_GET['cont'];
		$delivery=$_GET['del'];
		$payment=$_GET['pay'];
		$price=$_GET['price'];
		$quantity=1;
		
		$time= date(" H:i:s"); 
		$date=date("d-m-Y");
		
		$sql="insert into order_list(product_id,user_id,quantity,deliver_type,address,price,contact_no,time,date) values('$product_id' , '$user_id', '$quantity' , '$delivery' , '$address' , '$price' , '$contact' , '$time' , '$date' )";
		
		$done=mysqli_query($conn,$sql);
		
		if(!$done)
			die("Problem occured...".mysqli_error($conn) );
		
		else
		{
			$delete="delete from cart where id='$cart_id' ";
			$done=mysqli_query($conn,$delete);
			
			if($done)
			{
								header("refresh:0; url=user_cart.php");
			
								echo "		<script type='text/javascript'>

													alert('Your order has been made...');

												</script>";
			}

		}
	
	}
	

?>