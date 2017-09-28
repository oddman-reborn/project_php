<?php

session_start();
		$server="localhost";
		$user="root";
		$pass="";
	
	
		$conn= mysqli_connect($server,$user,$pass);
	
		$db=mysqli_select_db($conn,"project");
	
		if(!$conn)
		{
			die("Connection failed...".mysqli_connect_error());
			
			echo "Problem...";
		}
		
		else echo "Connected...";
?>