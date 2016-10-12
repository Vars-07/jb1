<?php
   include("database.php");

session_start();
if($_SESSION['usertype']!="admin")
   header("Location: index.php?value=You are not allowed to log in");
$db=new Database();
$db->connect();
    $pid=$_POST['pid'];
	$pacid=$_POST['packageid'];




        $db->insert('project_requirement',array(".$pid.",".$pacid."));

        header("location:projectrequirement.php?error=0");

?>
