<?php
if (!$_GET)
{
	header("location:index.php");
	exit();
}
else
{
	$upwd=$_GET['upwd'];
	if($upwd=="p@ss@job")
	{
		include_once('database.php');
		$db = new Database();
		$db->connect();
		include "action.php";
		$obj1=new ActionLog();

		$sql="update gamestatus set status=0";
		$rs=mysql_query($sql) or die(mysql_error());
		
		$sql="update gamestatus set status=1 where login='logincheck1.php'";
		$rs=mysql_query($sql) or die(mysql_error());
		
	}
	else
	{
		echo "Hacker stay outside.";
	}
}

?>
