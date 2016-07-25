<?php

	session_start();

	
	//$_POST['submit']=1;
	//$_POST['username']="Trial User";
	//$_POST['message']="Trial Message";
	include("database.php");

	if(isset($_POST['submit']))
	{
		$username=mysqli_real_escape_string($con, $_POST['username']);

		$_SESSION['name']=$username;

		$message=mysqli_real_escape_string($con, $_POST['message']);
		date_default_timezone_set('Asia/Kolkata');

		$time=date('h:i:s a', time());

		$query= "INSERT INTO `shouts` (`username`, `message`, `time`) values ('$username', '$message', '$time')";

		mysqli_query($con, $query);

		header("Location: index.php");

		exit();
		

				

	}
	else
	{
		echo "Error";
	}

?>