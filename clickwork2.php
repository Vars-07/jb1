<?php
session_start();
session_destroy();
header("location:logout.php");
exit();
$id=$_SESSION['id'];
require_once("database.php");
include "action.php";
$obj1=new ActionLog();
$pid=$_GET['per'];
$obj=new Database();
$obj->connect();
//$obj->select('undergoing_project u,profile p,projects pr','*',"u.uid='".$id."'and u.pid='".$pid."'and u.uid=p.uid and pr.pid=u.pid ");
//select u.uid,u.pid,u.percentage_done,u.start_time,pr.per_done,pr.battery,pr.experience,pr.money,pr.money_gain from undergoing_project u,profile p,projects pr where u.uid='nitin' and u.pid=48 and u.uid=p.uid and pr.pid=u.pid
//$res=$obj->getResult();
$query="select u.uid,u.pid,u.percentage_done,u.start_time,pr.per_done,pr.battery,pr.experience,pr.money,pr.money_gain from undergoing_project u,profile p,projects pr where u.uid='".$id."' and u.pid='".$pid."' and u.uid=p.uid and pr.pid=u.pid";
$data=mysql_query($query);
$res=mysql_fetch_array($data);

$percentage1=$res['percentage_done'];
$tym=$res['start_time'];
$inc=$res['per_done'];
$taskbattery=$res['battery'];
$taskexp=$res['experience'];
$taskmoney=$res['money'];
$perclickmoney=$res['money_gain'];
$noofclicks=$taskbattery/2;

$query="select u.uid,u.pid,p.battery,p.experience,p.money from undergoing_project u,profile p,projects pr where u.uid='".$id."' and u.pid='".$pid."' and u.uid=p.uid and pr.pid=u.pid";
$data1=mysql_query($query);
$res1=mysql_fetch_array($data1);
$userbattery=$res1['battery'];
$userexp=$res1['experience'];
$usermoney=$res1['money'];

if($userbattery>=2)
{
    $percentage=$percentage1+$inc;
    $userbatterynew=$userbattery-2;
    $moneynew=$usermoney+$perclickmoney;
    //$expnew=$userexp+$taskexp;

    if($percentage<100)
    {
        $query="update profile set money=".$moneynew." where uid='".$id."'";
        $rest=mysql_query($query);
        $query="UPDATE undergoing_project SET percentage_done=".$percentage." WHERE pid=".$pid." and uid='".$id."'";
        $result=mysql_query($query);
        $query="update profile set battery=".$userbatterynew." where uid='".$id."'";
        $res=mysql_query($query);

        print $percentage."###".$userbatterynew."###".$moneynew."###".$userexp;

    }
    else if($percentage>=100)
    {
        $expnew=$userexp+$taskexp;
        $moneynew=$usermoney+($taskmoney-(($noofclicks-1)*$perclickmoney));
        $query="update profile set money=".$moneynew." where uid='".$id."'";
        $rest=mysql_query($query);
        $query="update profile set experience=".$expnew." where uid='".$id."'";
        $rest=mysql_query($query);


        $query="update profile set battery=".$userbatterynew." where uid='".$id."'";
        $res=mysql_query($query);

        $query1="insert into completed_project values('".$pid."','".$id."','".$tym."',NOW())";
        $res1=mysql_query($query1);
                
			$sql1="delete from undergoing_project where pid='".$pid."' and uid='".$id."'";
			mysql_query($sql1);
				

        //$obj->insert('completed_project',array($pid,$id,$tym,'NOW()'));

        $obj->select('projects','level',"pid='".$pid."'");//log
        $level=$obj->getResult();
        $info="3#".$userbatterynew."#".$expnew."#".$moneynew;
        $obj1->add_actioncompletedtask($id,$pid,$info);

        print $percentage."###".$userbatterynew."###".$moneynew."###".$expnew;
    }



}
else
{

    print $percentage1."###".$userbattery."###".$usermoney."###".$userexp;
}



/*

$percentage=$percentage1+$inc;
$userbatterynew=$userbattery-2;
$moneynew=$usermoney+$perclickmoney;
$expnew=$userexp+$taskexp;
//$obj->update('undergoing_project',array('percentage_done'=>$percentage),array('pid',$pid));




if(($percentage<100)&&($userbatterynew>=0))
{
    $query="update profile set money=".$moneynew." where uid='".$id."'";
    $rest=mysql_query($query);
    $query="UPDATE undergoing_project SET percentage_done=".$percentage." WHERE pid=".$pid."";
    $result=mysql_query($query);
    $query="update profile set battery=".$userbatterynew." where uid='".$id."'";
    $res=mysql_query($query);

    print $percentage."###".$userbatterynew."###".$moneynew."###".$userexp;

}
elseif(($percentage<100)&&($userbatterynew<0))//warning
{
    $query="UPDATE undergoing_project SET percentage_done=".$percentage1." WHERE pid=".$pid."";
    $result=mysql_query($query);
    $query="update profile set battery=0 where uid='".$id."'";
    $res=mysql_query($query);
    print $percentage."###".$userbatterynew."###".$moneynew."###".$userexp;
}
elseif(($percentage>=100)&&($userbatterynew>=0))
{
    $query="update profile set experience=".$expnew." where uid='".$id."'";
    $rest=mysql_query($query);

    $query="update profile set battery=".$userbatterynew." where uid='".$id."'";
    $res=mysql_query($query);
    $obj->delete('undergoing_project',"pid='".$pid."'");
    $obj->insert('completed_project',array($pid,$id,$tym,''));
    print $percentage."###".$userbatterynew."###".$usermoney."###".$expnew;

}
elseif(($percentage>=100)&&($userbatterynew<0))//warning
{
    $query="UPDATE undergoing_project SET percentage_done=".$percentage1." WHERE pid=".$pid."";
    $result=mysql_query($query);
    $query="update profile set battery=0 where uid='".$id."'";
    $res=mysql_query($query);
} print $percentage."###".$userbatterynew."###".$moneynew."###".$userexp;

*/
?>
