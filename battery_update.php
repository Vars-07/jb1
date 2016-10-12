<?php
session_start();

if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include_once('database.php');

    $db=new Database();
    $db->connect();
    $db->select('profile','*',"uid='".$id."'");
    $res=$db->getResult();
    $battery=$res['battery'];
	echo $battery;
    }
?>