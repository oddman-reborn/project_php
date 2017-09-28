
<?php

session_start();

	if(isset($_GET['oid']) )
	{
		include("connect_db.php");
		
		$order_no=$_GET['oid'];
		$product_id=$_GET['pid'];
		$user_id=$_GET['uid'];
		
		$sql="update order_list set status='Accepted' where order_no='$order_no' ";
		$accept=mysqli_query($conn,$sql);
		
		if($accept)
		{
			$sql_product="select * from product where id=$product_id";
			$search_product=mysqli_query($conn,$sql_product);
			$product=mysqli_fetch_assoc($search_product);
			$product_quantity=$product['unit_avail'];
			$product_quantity=$product_quantity-1;
			$product_price=$product['price'];
			$sql_update_product="update product set unit_avail='$product_quantity' where id='$product_id' ";
			$update_product=mysqli_query($conn,$sql_update_product);
			
			$current_date=date("d-M-Y");
			$sql_user="insert into user_balance(user_id,date,debit,source) values('$user_id' , '$current_date' , '$product_price' , '$product_id') ";
			$user_purchase=mysqli_query($conn,$sql_user);
			
			
			
			if($user_purchase && $update_product)
			{
				echo "<script type='text/javascript'>

							alert('Order accepted....');

						</script>";
			}
			
			
		}
		
	}
	
	else
	{
		echo "<script type='text/javascript'>

							alert('Order can't be accepted....');

						</script>";
	}
	
	header("refresh:0; url=order_list.php");
?>

	
	
