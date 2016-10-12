<?php
include_once('database.php');
$db=new Database();
$db->connect();
$db->select('count');
$result=$db->getResult();
$k= $result['projects'];
//echo $k;
$k=$k+1;

$name=$_POST['project'];
$details=$_POST['details'];
$cid=$_POST['company_name'];
$battery=$_POST['battery'];
$exp=$_POST['experience'];
$money=$_POST['money'];
$level=$_POST['level'];
$mem=$_POST['members'];

$noofclicks=$battery/2;
$perclick=(ceil((100/$noofclicks)*100))/100;
$moneygain=floor($money/$noofclicks);
$isvisible=0;
$db->insert('projects',array($k,$name,$details,$cid,$battery,$exp,$money,$mem,$level,$isvisible,0,$perclick,$moneygain,"NOW()"));
$db->update('count',array('projects'=>$k),array('id',0));
header("location:projects.php?error=0");


?>
