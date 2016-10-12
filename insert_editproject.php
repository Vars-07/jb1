<?php
include_once('database.php');
$db=new Database();
$db->connect();
//$db->select('count');
//$result=$db->getResult();
//$k= $result['projects'];
//echo $k;
//$k=$k+1;
$name=$_POST['projectname'];
$pid=$_POST['pid'];
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

/*$noofclicks=$battery/2;
$perclick=floor(100/$noofclicks) +1;
$moneygain=floor($money/$noofclicks);*/
$isvisible=$_POST['flag'];

$sql = "  UPDATE projects SET  name='".$name."' ,description = '".$details."', cid = '".$cid."', battery = '".$battery."', experience = '".$exp."', money = '".$money."', members = '".$mem."', level = '".$level."', is_visible = '".$isvisible."', per_done = '".$perclick."', money_gain = '".$moneygain."'
            WHERE pid = '".$pid."'";

mysql_query($sql);
//$a=mysql_affected_rows($sql);
//echo($a);
// $db->update('count',array('projects'=>$k),array('id',0));
  header("location:projectrequirement.php?error=4");


?>
