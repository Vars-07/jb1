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
		
		$sql="update gamestatus set status=2 where login='logout.php'";
		$rs=mysql_query($sql) or die(mysql_error());
		
		$sql="update gamestatus set status=1 where login='index.php?value=Game is over.'";
		$rs=mysql_query($sql) or die(mysql_error());
		
	}
	else
	{
		echo "Hacker stay outside.";
	}
}

?>
