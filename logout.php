

<?php
	
	session_start();
	$_SESSION['id']=null;
	$_SESSION['username']=null;
	
	if($_SESSION['id']=null && $_SESSION['username']=null )
	{
		echo "<script type='text/javascript'>

							alert('Successfully delivered....');

						</script>";
						
						
		
	}
	
	header("refresh:0;url=index.php");
		
?>
		