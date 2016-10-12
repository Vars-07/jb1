<?php
     session_start();
         if(strcmp($_SESSION['usertype'],"admin")==0)
         {


$cid=$_GET['cid'];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="delete from company WHERE cid = ".$cid."";

$result = mysql_query($sql);
$sql1="update count set companies=(select max(cid) from company)";

$result1 = mysql_query($sql1);

 header("Location:admin_companies.php?error=1");
//echo $q;
         }
else
{
    header("Location:index.php?error=Acess Denied");


}
             ?>