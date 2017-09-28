<?php
session_start();
include("connect_db.php");

if(isset($_GET['pid']) )
{
	include("connect_db.php");
	$id=$_GET['pid'];
	$sql="delete from product where id='$id' ";
	$delete=mysqli_query($conn,$sql);
	
	
	if($delete)
	{
		echo "<script type='text/javascript'>
					alert('Product has been deleted...');
				</script>";
		
	}
}

else
{
	echo "<script type='text/javascript'>
					alert('Error occured...');
				</script>";
	
}
	header("refresh: 0; url=product_info.php ");

?>