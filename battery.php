<?php
session_start();
$id=$_SESSION['id'];
require_once("database.php");
$obj=new Database();
$obj->connect();
$obj->select('profile','*',"uid='".$id."'");
$res=$obj->getResult();
$oldbat=$res['battery'];
$obj->select('battery','*',"id='".$id."'");
$res1=$obj->getResult();
$consup=$res1['consup'];
$curbat=$oldbat-$consup;
if($curbat>=0)
{
//$obj->update('profile',array('battery'=>$curbat),array('uid',$id));
$query="update profile set battery=".$curbat." where uid='".$id."'";
$res=mysql_query($query);
}
else
{
$query="update profile set battery=0 where uid='".$id."'";
$res=mysql_query($query);
}
//$obj->delete('battery',array('id','nitin'));
// $obj->insert('battery',array('nitin',200,2,5));  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php
$percentage=(88/100)*$curbat;
echo $percentage;
//$money=$_GET['mon'];
if($percentage>0)
{
	 print "<div id=\"empty\">";
   print "<div id=\"batcolor\"  style=\"width:$percentage%\">";
print "</div>";
}
else
{
 print "<div id=\"empty\">";
   print "<div id=\"batcolor\"  style=\"width:0%\">";
print "</div>";
}
//print " <h2 align=\"center\">	MONEY<font color=\"#f8711e\">$money</font></h2>";
?>
</body>
</html>