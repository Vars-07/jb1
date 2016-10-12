<?php
     session_start();
         if(strcmp($_SESSION['usertype'],"admin")==0)
         {


$pid=$_GET['pid'];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="delete from projects WHERE pid = ".$pid."";

$result = mysql_query($sql);
$sql1="update count set projects=(select max(pid) from projects)";

$result1 = mysql_query($sql1);

 header("Location:admin_projects.php?error=1");
//echo $q;
         }
else
{
    header("Location:index.php?error=Acess Denied");


}
             ?>