<?php
if (!$_GET)
{
	header("location:index.php");
	exit();
}
else
{
	$upwd=$_GET['upwd'];
	if($upwd=="keshavisreseting")
	{
		include_once('database.php');
		$db = new Database();
		$db->connect();
		
		$sql = "TRUNCATE TABLE action_log";
		mysql_query($sql);
		
		$sql = "TRUNCATE TABLE profile";
		mysql_query($sql);
		
		$sql = "TRUNCATE TABLE completed_project";
		mysql_query($sql);
		
		$sql = "TRUNCATE TABLE undergoing";
		mysql_query($sql);
		
		$sql = "TRUNCATE TABLE undergoing_project";
		mysql_query($sql);
		
		$sql = "TRUNCATE TABLE user_package";
		mysql_query($sql);
		
		$sql = "update gamestatus set status=0";
		mysql_query($sql);
		
		$sql = "update gamestatus set status=1 where login='logincheck1.php'";
		mysql_query($sql);
		
	}
	else
	{
		echo "Hacker stay outside.";
	}
}

?>
