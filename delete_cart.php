<?php
session_start();

	if( isset($_GET['cid']) )
	{
		$cart_id=$_GET['cid'];
		
		include("connect_db.php");
		
		$delete="delete from cart where id='$cart_id' ";
		$done=mysqli_query($conn,$delete);
		
		if($done)
		{
			header("refresh:0 ; url=user_cart.php");
			echo "		<script type='text/javascript'>

										alert('This product has been deleted from your cart...');

							</script>";
		}
	}	
	

?>