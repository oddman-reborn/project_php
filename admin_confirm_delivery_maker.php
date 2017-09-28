<?php

	session_start();

	if(isset($_GET['oid']) && isset($_GET['c']) )
	{
		include("connect_db.php");
		
		$order_no=$_GET['oid'];
		$cost=$_GET['c'];
		
		$c_sql="update order_list set cost='$cost' , status='Delivered' where order_no='$order_no' ";
		
		$done=mysqli_query($conn,$c_sql);
		
		if($done)
		{
			echo "<script type='text/javascript'>

							alert('Successfully delivered....');

						</script>";
						
		header("refresh:0;url=admin_confirm_delivery.php");
		}
	}		
	
	

?>