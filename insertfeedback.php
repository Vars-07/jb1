<?php
session_start();
$id=$_SESSION['id'];
include "database.php";
$db=new Database();
$db->connect();

$name=$_POST['name'];
$type=$_POST['type'];
$message=$_POST['msg'];
if($name!=null && $type!=null && $message!=null)
{

$query="insert into feedback values('".$id."','".$name."','".$type."','".$message."',NOW())";
$res=mysql_query($query);
header("Location:ownprofile.php");
}
else
{
 header("Location:ownprofile.php");


}
?>