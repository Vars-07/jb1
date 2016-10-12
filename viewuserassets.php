<?php
$id=$_GET["uid"];

include_once('database.php');
$db=new Database();
$db->connect();
include "action.php";
    $obj1=new ActionLog();
$totalmoney=0;
$totalexp=0;
$sql="SELECT sum(money),sum(experience) FROM projects p join completed_project cp on(p.pid=cp.pid) WHERE uid = '".$id."' and p.level !=0";
$data = mysql_query($sql);
$result=  mysql_fetch_array($data);

$totalmoney=$result[0];
$totalexp=$totalexp+$result[1];

$sql3=" SELECT count(*) FROM action_log where uid ='".$id."' and event=3 and id=3" ;
$result3=  mysql_fetch_array(mysql_query($sql3));

$totalmoney=$totalmoney+(1500)*$result3[0]; // pid=3 ka task


$sql4=" SELECT count(*) FROM action_log where uid ='".$id."' and event=3 and id=44" ;
$result4=  mysql_fetch_array(mysql_query($sql4));

$totalmoney=$totalmoney+(2000)*$result4[0]; // pid=3 ka task

$sql7=" SELECT count(*) FROM action_log where uid ='".$id."' and event=3 and id=44" ;
$result7=  mysql_fetch_array(mysql_query($sql7));

$totalmoney=$totalmoney+(2000)*$result7[0]; // pid=93 ka task

$sql1="select sum(money) from package p join user_package up on(p.package_id=up.package_id) WHERE uid = '".$id."' and up.offerflag=0";
$data1 = mysql_query($sql1);
$result1=  mysql_fetch_array($data1);

$totalmoney=$totalmoney-$result1[0];//$result1[0]=Income spent in purchasing packages

$sql6="select sum(dis_money) from offer o join user_package up on(o.package_id=up.package_id) WHERE uid = '".$id."' and up.offerflag=1 ";
$data6 = mysql_query($sql6);
$result6=  mysql_fetch_array($data6);

$totalmoney=$totalmoney-$result6[0];//$result1[0]=Income spent in discounted purchasing packages

$sql2=" SELECT count(*) FROM action_log where information like '0#%' and uid ='".$id."'";
$data2 = mysql_query($sql2);
$result2=  mysql_fetch_array($data2);

$totalmoney=$totalmoney-(2000)*$result2[0]; // battery ka paisa subtract kar dia

$sql5="select * FROM projects p join undergoing_project up on(p.pid=up.pid) WHERE uid = '".$id."'";
$data5=  mysql_query($sql5);
$undermoney=0;
while($result5=mysql_fetch_array($data5))
{
//$result5=  mysql_fetch_array($data5);

    $undermoney=$undermoney+($result5['percentage_done']/$result5['per_done'])*$result5['money_gain'];
}

$totalmoney=$totalmoney+$undermoney;
?>
<table cellpadding="2" cellspacing="8" width="100%" border="0" bgcolor="#ff9933"><th><h2>Details</h2></th><th width="34%"><h2>Time</h2></th></thead></table>
                    <hr>
                    <table cellpadding="4" cellspacing="14" width="100%" border="0">
                        <?php 

                        echo "<h1><br><Br>";
                        echo $totalmoney;
                        echo "<br>";
                        echo "Total experience   ".$totalexp." hrs";
                         echo "</h1>";



                        ?>
                    </table>

