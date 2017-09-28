<?php

session_start();
include("connect_db.php");

if(isset($_GET['oid']) && isset($_GET['rid']) )
{
	
	
	$reciept_no=$_GET['rid'];
	$order_no=$_GET['oid'];
	
	$on_sql="update order_list set reciept_no='$reciept_no',status='On Delivery' where order_no='$order_no' ";
	$update=mysqli_query($conn,$on_sql);
	
	
	if($update)
	{
	echo "		<script type='text/javascript'>

					alert('Successful...');

				</script>";	
	}
}



												
header("refresh:0;url=admin_on_delivery.php");												

?>