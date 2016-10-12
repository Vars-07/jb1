<?php
session_start();
$id=$_SESSION['id'];
$pid=$_GET['value'];
require_once("database.php");
$obj=new Database();
$obj->connect();
$obj->select('undergoing_project','*',"uid='".$id."' and pid=".$pid."");
$res=$obj->getResult();
if($res!=null)
{
$perdone=$res['percentage_done'];
$obj->select('projects','*',"pid='".$pid."'");
$res1=$obj->getResult();
$exp=$res1['experience'];
$obj->select('profile','*',"uid='".$id."'");
$res2=$obj->getResult();
$expofplayer=$res2['experience'];
  print $expofplayer;

}
else
{   $obj->select('projects','*',"pid='".$pid."'");
$res1=$obj->getResult();
$exp=$res1['experience'];
$obj->select('profile','*',"uid='".$id."'");
$res2=$obj->getResult();
$expofplayer=$res2['experience'];
     $expofplayer+=$exp;
$query="update profile set experience=".$expofplayer." where uid='".$id."'";
    $res=mysql_query($query);
    print $expofplayer;
}
/*if($perdone>=100)
{
    $expofplayer+=$exp;
$query="update profile set experience=".$expofplayer." where uid='".$id."'";
    print $expofplayer;
}
else
{
    print $expofplayer;
}

*/

?>