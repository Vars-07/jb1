<?php
session_start();

$id=$_SESSION['id'];
$pid=$_POST['PID'];
$pos = strpos($_SESSION['purchased'],$pid);
if($pos===false)
{


require_once('database.php');
$db=new Database();
$db->connect();

//$query="select money from profile where uid='".$id."'";
//$res=mysql_query($query);
//$money=mysql_fetch_array($res);

$db->select('package','*',"package_id='".$pid."'");
$pckdetails=$db->getResult();


if($_SESSION['packagemarket']['usermoney']>=$pckdetails['money'])
{   $_SESSION['packagemarket']['totalbuy']+=$pckdetails['money'];
    $pckdetails['success']='TRUE';
    $_SESSION['packagemarket']['usermoney']-=$pckdetails['money'];

    $pckdetails['totalbuy']=$_SESSION['packagemarket']['totalbuy'];
    $i=$_SESSION['count'];
    $i=$i+1;
    $_SESSION['count']=$i;
    $j=$_SESSION['purchased'];
    $j=$j."#".$pid;
    $_SESSION['purchased']=$j;
    
    $pckdetails['purchased']=$_SESSION['purchased'];

$pckdetails['i']=$i;
$_SESSION['num']=$i-1;


echo '{"package_id":"'.$pckdetails['package_id'].'","type":"'.$pckdetails['type'].'","name":"'.$pckdetails['name'].'","description":"'.$pckdetails['description'].'","money":"'.$pckdetails['money'].'","logo":"'.$pckdetails['logo'].'","success":"TRUE","totalbuy":'.$pckdetails['totalbuy'].',"purchased":"'.$pckdetails['purchased'].'","i":'.$pckdetails['i'].',"rem":"'.$_SESSION['packagemarket']['usermoney'].'"}';
}

else
{
   
    echo '{"success":"FALSE"}';


}
}
else{
    echo '{"success":"ALREADY"}';
}

?>