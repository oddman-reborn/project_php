<?php
session_start();
include("connect_db.php");

if( isset($_SESSION['id']) )
{
	if( isset($_GET['oid']) )
	{
		$order_no=$_GET['oid'];
		$deliver="update deliver_list set status='Delivered' where order_no='$order_no' ";
		if(mysqli_query($conn,$deliver))
		{
			echo "Done...";
			header("refresh: 0; url=deliver.php");
		}
	}
}

?>