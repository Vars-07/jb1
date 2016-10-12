<?php
session_start();
        if(strcmp($_SESSION['usertype'],"admin")==0)
{

include_once('database.php');
$db=new Database();
$db->connect();
include "action.php";
    $obj1=new ActionLog();

$time=$_POST['date'];

$sql="select uid from profile";
$data=mysql_query($sql);

while($result=mysql_fetch_array($data))
{

    //battery booster rollback strts
 $query="select count(*) from action_log where uid='".$result[0]."' and event=0 and timestamp > '".$time."' order by timestamp desc ";
$lol=mysql_query($query);

while($res=  mysql_fetch_array($lol))
{
//echo $res[0];
$battery="update profile set money=money+2000*'".$res[0]."' where uid='".$result[0]."' ";
mysql_query($battery);

}
$battery1="delete from action_log where uid='".$result[0]."' and event=0 and timestamp > '".$time."'";
mysql_query($battery1);

//bb rollback stop

// package rollback strts

$package="select sum(money) from package p join user_package up on(p.package_id=up.package_id) WHERE uid = '".$result[0]."' and up.offerflag=0 and
    up.package_id in (select id from action_log where uid='".$result[0]."' and event=1 and timestamp > '".$time."' order by timestamp desc)";
$data1 = mysql_query($package);

while($ans1=  mysql_fetch_array($data1));
{
    $updatepack="update profile set money=money+'".$ans1[0]."' where uid ='".$result[0]."'";
    mysql_query($updatepack);
}

$delpackage="delete from user_package where uid ='".$result[0]."' and offerflag=0
    and package_id in (select id from action_log where uid='".$result[0]."' and event=1 and timestamp > '".$time."' order by timestamp desc) ";
mysql_query($delpackage);
//package rollback done


//offer rollback strts
$offer="select sum(dis_money) from offer o join user_package up on(o.package_id=up.package_id) WHERE uid = '".$result[0]."' and up.offerflag=1 and
    up.package_id in (select id from action_log where uid='".$result[0]."' and event=1 and timestamp > '".$time."' order by timestamp desc)";
$data2 = mysql_query($offer);

while($ans2=  mysql_fetch_array($data2));
{
    $updateoffer="update profile set money=money+'".$ans2[0]."' where uid ='".$result[0]."'";
    mysql_query($updateoffer);
}

$deloffer="delete from user_package where uid ='".$result[0]."' and offerflag=0
    and package_id in (select id from action_log where uid='".$result[0]."' and event=1 and timestamp > '".$time."' order by timestamp desc) ";
mysql_query($deloffer);


$delpackagelog="delete from action_log where uid='".$result[0]."' and event=1 and timestamp > '".$time."'  ";
mysql_query($delpackage);
//offer rollback done


// PROJECT ROLLBACK STRTS HERE :)

$project="SELECT sum(money),sum(experience) FROM projects p join completed_project cp on(p.pid=cp.pid) WHERE uid = '".$result[0]."'
    and p.pid in (select id from action_log where uid='".$result[0]."' and event=3 and timestamp > '".$time."' order by timestamp desc)and p.level !=0 ";

$projectdata = mysql_query($project);

while($data3=  mysql_fetch_array($projectdata));
{
    $updateproject="update profile set money=money+'".$data3[0]."' , experience=experience+'".$data3[1]."' where uid ='".$result[0]."'";
    mysql_query($updateproject);
}
$delproject="delete from completed_project where uid ='".$result[0]."'
    and pid in (select id from action_log where uid='".$result[0]."' and event=3 and timestamp > '".$time."' order by timestamp desc) ";
mysql_query($delproject);


// PROJECT ROLLBACK ENDS HERE


//UNDERGOING PROJECT ROLLBACK STRTS HERE !

$undergoing="select * FROM projects p join undergoing_project up on(p.pid=up.pid) WHERE uid = '".$result[0]."' and start_time > '".$time."'";
$underdata=  mysql_query($undergoing);
$undermoney=0;
while($underresult=mysql_fetch_array($underdata))
{
//$result5=  mysql_fetch_array($data5);

    $undermoney=$undermoney+($underresult['percentage_done']/$underresult['per_done'])*$underresult['money_gain'];

    $updateunder="update profile set money=money+'".$undermoney."',battery=100 where uid='".$result[0]."'";
    mysql_query($updateunder);
}
$delunder="delete from undergoing_project where uid='".$result[0]."' and timestamp > '".$time."' ";
mysql_query($delunder);

$projectlog="delete from action_log where uid='".$result[0]."' and  timestamp > '".$time."'";
mysql_query($projectlog);

     header("Location:rollback.php?error=success");


}
}
else
{

     header("Location:index.php?error=You are not allowed to Login");
}
?>
