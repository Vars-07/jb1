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

		$sql="update offer set is_visible=3 where is_visible=1";
		$rs=mysql_query($sql) or die(mysql_error());
		
		$sql="select package_id from offer where is_visible=0 order by RAND() limit 2";
		$rs1=mysql_query($sql) or die(mysql_error());
		
		while($data = mysql_fetch_array($rs1))
		{
			$sql="update offer set is_visible=1,time=NOW() where package_id=".$data[0];
			$rs=mysql_query($sql) or die(mysql_error());
		}
	}
	else
	{
		echo "Hacker stay outside.";
	}
}

?>
