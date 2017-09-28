<?php
session_start();
include("connect_db.php");
	
	if(isset($_SESSION['id']))
	{
		if(isset($_GET['oid']))
		{
			$order_no=$_GET['oid'];
			
			$cancel="delete from order_list where order_no='$order_no' ";
			
			mysqli_query($conn,$cancel);
			
			echo "		<script type='text/javascript'>

													alert('Your order has been cancelled...');

												</script>";
		}
	}
	
	else
	{
		echo "		<script type='text/javascript'>

								alert('Order can't be cancelled...');

						</script>";
		
	}
	
	header("refresh:0 ; url=order_list.php");

?>