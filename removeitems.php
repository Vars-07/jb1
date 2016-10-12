<?php
session_start();
$id=$_SESSION['id'];
$pid=$_POST['PID'];
require_once('database.php');
$db=new Database();
$db->connect();
//$query="select money from profile where uid='".$id."'";
//$res=mysql_query($query);
//$money=mysql_fetch_array($res);
$pos = strpos($_SESSION['purchased'],$pid);
if($pos===false)
{

}
else
{

$db->select('package','*',"package_id='".$pid."'");
$pckdetails=$db->getResult();

$_SESSION['packagemarket']['totalbuy']=$_SESSION['packagemarket']['totalbuy']-$pckdetails['money'];
$_SESSION['packagemarket']['usermoney']+=$pckdetails['money'];
$pckdetails['totalbuy']=$_SESSION['packagemarket']['totalbuy'];
$pckdetails['usermoney']=$_SESSION['packagemarket']['usermoney'];
//$i=$_SESSION['count'];
//$_SESSION['purchased'][$i]=0;

$i=$_SESSION['count'];

$arr=$_SESSION['purchased'];
$seprate=explode('#',$arr);
for($j=0;$j<$i;$j++){
    if(strcmp($seprate[$j],$pid)==0)
    {
        $seprate[$j]="0";
        $h=$_SESSION['num'];
        $h-=1;
        $_SESSION['num']=$h;
    }
}
$_SESSION['purchased']=$seprate[0];
for($j=1;$j<$i;$j++)
{
    $k=$_SESSION['purchased'];
    $k=$k."#".$seprate[$j];
    $_SESSION['purchased']=$k;
}
$pckdetails['i']=$i;
$pckdetails['h']=$_SESSION['num'];
$pckdetails['loda']=$seprate;

echo '{"package_id":"'.$pckdetails['package_id'].'","type":"'.$pckdetails['type'].'","name":"'.$pckdetails['name'].'","description":"'.$pckdetails['description'].'","money":"'.$pckdetails['money'].'","logo":"'.$pckdetails['logo'].'","totalbuy":"'.$pckdetails['totalbuy'].'","usermoney":"'.$pckdetails['usermoney'].'","i":"'.$pckdetails['i'].'","h":"'.$pckdetails['h'].'","loda":"'.$pckdetails['loda'].'"}';
}
?>