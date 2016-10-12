<?php
     session_start();
         if(strcmp($_SESSION['usertype'],"admin")==0)
         {


$pid=$_GET["pid"];
$pacid=$_GET['pacid'];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="delete from project_requirement where pid=".$pid." and package_id=".$pacid."";

$result = mysql_query($sql);
 header("Location:eachprojectreq.php?error=4 & pid=".$pid."");
//echo $q;
         }
else
{
    header("Location:index.php?error=Acess Denied");


}
             ?>