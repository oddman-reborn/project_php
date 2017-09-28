<?php
	
	$server="localhost";
	$user="root";
	$pass="";
	
	
	$conn= mysql_connect($server,$user,$pass);
	
	$db=mysql_select_db("project",$conn);
	
	if(!$conn)
	{
		die("Connection failed...".mysqli_connect_error());
	}
	
	echo "Connection successful...";
	
	$username=$_POST['user'];
	$password=$_POST['passw'];
	
	$username=stripslashes($username);
	$password=stripslashes($password);
	
	$query="select * from admin where username='$username' and password='$password' ";
	
	$result= mysql_query($query);
	
	$count= mysql_num_rows($result);
	
	if($count==1)
		echo "Log in successful...";
	
?>