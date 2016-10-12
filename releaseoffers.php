<?php
     session_start();
         if(strcmp($_SESSION['usertype'],"admin")==0)
         {


$q=$_GET["flag"];
$pacid=$_GET['pid'];


$q1=$_GET["fl"];
$pacid1=$_GET['pidw'];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="update offer set is_visible=".$q." WHERE package_id = ".$pacid."";

$sql1="update offer set is_visible_hour=".$q1." WHERE package_id = ".$pacid1."";
$res = mysql_query($sql1);
$result = mysql_query($sql);
 header("Location:listoffers.php?error=4");
//echo $q;
         }
else
{
    header("Location:index.php?error=Acess Denied");


}
             ?>
