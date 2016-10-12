<?php
include_once('database.php');
$db=new Database();
$db->connect();

$package_id=$_POST['package'];
$discount=$_POST['discount'];
$sql="select * from package where package_id=".$package_id."";
$query=mysql_query($sql);
$res=mysql_fetch_array($query);

$type=$res[1];
$name=$res[2];
$desc=$res[3];
$money=$res[4];
$logo=$res[5];


$isvisible=0;

$sql1="select * from offer where package_id=".$package_id."";
$query=mysql_query($sql1);
if(mysql_num_rows($query)==0)
{
$db->insert('offer',array($package_id,$type,$name,$desc,$money,$discount,$logo,$isvisible));
}
else
{

$query1="update offer set dis_money=".$discount." where package_id=".$package_id." ";
 mysql_query($query1);
}
header("location:addoffer.php?error=0");


?>
