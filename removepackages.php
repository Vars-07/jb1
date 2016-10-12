<?php
     session_start();
         if(strcmp($_SESSION['usertype'],"admin")==0)
         {


$pacid=$_GET['pacid'];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="delete from package WHERE package_id = ".$pacid."";

$result = mysql_query($sql);
$sql1="update count set packages=(select max(package_id) from package)";

$result1 = mysql_query($sql1);


 header("Location:admin_packages.php?error=1");
//echo $q;
         }
else
{
    header("Location:index.php?error=Acess Denied");


}
             ?>