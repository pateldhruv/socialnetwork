<?php

	$hometown='';
	$location='';
	$school='';
	$workplace='';
	$birthday='';
	$description='';
		
	session_start();	
	$u_id=$_SESSION['u_id'];

	if (isset($_GET['hometown']) && !empty($_GET['hometown']))
	{
		$hometown=$_GET['hometown'];
	}
	if (isset($_GET['location']) && !empty($_GET['location']))
	{
		$location=$_GET['location'];
	}	
	if (isset($_GET['school']) && !empty($_GET['school']))
	{
		$school=$_GET['school'];
	}
	if (isset($_GET['workplace']) && !empty($_GET['workplace']))
	{
		$workplace=$_GET['workplace'];
	}
	if (isset($_GET['birthday']) && !empty($_GET['birthday']))
	{
		$birthday=$_GET['birthday'];
	}
	if (isset($_GET['description']) && !empty($_GET['description']))
	{
		$description=$_GET['description'];
	}
	
	require_once __DIR__ . '/db_connect.php';
	$mysqli = connect();

	$query= "UPDATE user_info SET hometown='$hometown',location='$location', school='$school', workplace='$workplace', birthday='$birthday', description='$description' WHERE u_id='$u_id'";
	$result=$mysqli->query($query);
	$mysqli->close();
	if($result !== false)
	{
		header('location:../profile_settings.php?updated=1');
		exit();
	}
	else 
	{
		header('location:../profile_settings.php?error=query_fail');
		exit();
	}
	

?>
