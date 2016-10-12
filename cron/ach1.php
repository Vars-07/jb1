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
		$aid="1";
		include_once('database.php');
		$db = new Database();
		$db->connect();
		include "action.php";
		$obj1=new ActionLog();

		$sql="select uid,battery,experience,money from profile where money>=50000 ";
		$rs=mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_row($rs))
		{
			$sql="select * from user_achievements where aid=".$aid." and uid='".$row[0]."'";
			$data = mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($data)!=0)
			{continue;}
			
			$moneynew = $row[3]+10000;
			$sql="update profile set money=".$moneynew." where uid = '".$row[0]."'";
			mysql_query($sql) or die(mysql_error());
		
			$query="insert into user_achievements values('".$row[0]."',".$aid.",NOW())";
			$rest=mysql_query($query);
			
			$info="1#".$row[1]."#".$row[2]."#".$moneynew;
			$obj1->add_achievement($aid,$row[0],$info);
		}
	}
	else
	{
		echo "Hacker stay outside.";
	}
}

?>
