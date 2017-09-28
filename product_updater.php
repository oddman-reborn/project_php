<?php
session_start();
include("connect_db.php");

	if( isset($_GET['pid']) )
	{
		//pid=$product_id & name=$name & category=$category & price=$price & detail=$detail
		
		$product_id=$_GET['pid'];
		$name=$_GET['name'];
		$category=$_GET['category'];
		$price=$_GET['price'];
		$detail=$_GET['detail'];
		
		$sql="update product set product_name='$name' , category='$category' , price='$price' , detail='$detail' where id='$product_id'  ";
		
		$update=mysqli_query($conn,$sql);
		echo "here...........";
		if($update)
		{
			echo "<script type='text/javascript'>
					alert('Product info updated...');
				</script>";
				
				header("refresh: 0; url='product_info.php' ");
		}
		
		else
		{
			echo "<script type='text/javascript'>
					alert('Product info not updated...');
				</script>";
		}
		
	}
?>