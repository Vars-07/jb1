<?php
include("database 2.php");
$db=new Database1();
$db->connect();
$query="select * from projects";
$res=mysql_query($query);

include("database.php");
$db1=new Database();
$db1->connect();


while($row=mysql_fetch_array($res))
{
    echo $row[1];
    $db1->insert('projects',array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[11],$row[12],$row[13]));
}
//$db->select('company');
//$res=$db->getResult();

//include("database.php");
//$db1=new Database();
//$/db1->connect();
//$db->insert('company',$res);
//echo $loda;
//print_r($loda);
?>