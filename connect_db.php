<?php

		$server="localhost";
		$user="root";
		$pass="";
	
	
		$conn= mysqli_connect($server,$user,$pass);
	
		$db=mysqli_select_db($conn,"project");
		
	

?>