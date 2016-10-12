<?php
session_start();
require_once("database.php");
include "action.php";
$obj1=new ActionLog();
$obj=new Database();
$obj->connect();
$sql = "select * from gamestatus where status=2";
$res2 = mysql_query($sql);
if(mysql_num_rows($res2)!=0)
{
	session_destroy();
	header("location:logout.php");
	exit();
}
$id=$_SESSION['id'];
$pid=$_GET['per'];
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
		

    }
    else if($percentage>=100)
    {
        $userexp=$userexp+$taskexp;
        $moneynew=$usermoney+($taskmoney-(($noofclicks-1)*$perclickmoney));
        $query="update profile set money=".$moneynew." where uid='".$id."'";
        $rest=mysql_query($query);
        $query="update profile set experience=".$userexp." where uid='".$id."'";
        $rest=mysql_query($query);


        $query="update profile set battery=".$userbatterynew." where uid='".$id."'";
        $res=mysql_query($query);

        $query="select * from projects where pid=".$pid." and level=0";
		$res=mysql_query($query);
		
		if(!($data = mysql_fetch_array($res)))
        {
			$query1="insert into completed_project values('".$pid."','".$id."','".$tym."',NOW())";
			$res1=mysql_query($query1);
		}
                
		$sql1="delete from undergoing_project where pid='".$pid."' and uid='".$id."'";
		mysql_query($sql1);
				

        //$obj->insert('completed_project',array($pid,$id,$tym,'NOW()'));

        $obj->select('projects','level',"pid='".$pid."'");//log
        $level=$obj->getResult();
        $info="3#".$userbatterynew."#".$userexp."#".$moneynew;
        $obj1->add_actioncompletedtask($id,$pid,$info);        
    }
	
	/*achievement verification code start*/
	$query = "select aid,type,required,exp,money from achievements  where s_time<=NOW() and e_time>=NOW() and status=1 and aid not in (select aid from user_achievements where uid='".$id."')";
	$res = mysql_query($query);
	while($data = mysql_fetch_array($res))
	{
		if($data[1]==2 and $data[2]==$pid)
		{
			$query = "select * from completed_project where pid=".$pid;
			$res=mysql_query($query);
			if(mysql_num_rows($res)>0)
			{
				$moneynew = $moneynew + $data[4];
				$userexp = $userexp + $data[3];
				
				$query="insert into user_achievements values('".$id."',".$data[0].",NOW())";
				$rest=mysql_query($query);
				
				$query="update profile set experience=".$userexp." , money=".$moneynew." where uid='".$id."'";
				$rest=mysql_query($query);	
				
				$info="4#".$userbatterynew."#".$userexp."#".$moneynew;
				$obj1->add_achievement($data[0],$id,$info);
			}
		}
		else if($data[1]==3)
		{
			$query = "select pid from completed_project, achievements where s_time <= completion_time and e_time >= completion_time and uid='".$id."' and aid=".$data[0];
			$res1=mysql_query($query);
			if(mysql_num_rows($res1)==$data[2])
			{
				$moneynew = $moneynew + $data[4];
				$userexp = $userexp + $data[3];
				
				$query="insert into user_achievements values('".$id."',".$data[0].",NOW())";
				$rest=mysql_query($query);
				
				$query="update profile set experience=".$userexp." , money=".$moneynew." where uid='".$id."'";
				$rest=mysql_query($query);
				
				$info="4#".$userbatterynew."#".$userexp."#".$moneynew;
				$obj1->add_achievement($data[0],$id,$info);
			}
		}
		else if($data[1]==4)
		{
			$query = "select pid from projects where is_visible=1 and level=".$data[2];
			$res1=mysql_query($query);
			
			$query = "select pid from projects natural join completed_project where is_visible=1 and level=".$data[2]." and uid='".$id."'";
			$res2=mysql_query($query);
			
			if(mysql_num_rows($res1) == mysql_num_rows($res2))
			{
				$moneynew = $moneynew + $data[4];
				$userexp = $userexp + $data[3];
				
				$query="insert into user_achievements values('".$id."',".$data[0].",NOW())";
				$rest=mysql_query($query);
				
				$query="update profile set experience=".$userexp." , money=".$moneynew." where uid='".$id."'";
				$rest=mysql_query($query);
				
				$info="4#".$userbatterynew."#".$userexp."#".$moneynew;
				$obj1->add_achievement($data[0],$id,$info);
			}
			
		}
		else if($data[1] == 5)
		{
			$query = "select pid from projects where is_visible=1 and cid=".$data[2];
			$res1=mysql_query($query);
			
			$query = "select pid from projects natural join completed_project where is_visible=1 and cid=".$data[2]." and uid='".$id."'";
			$res2=mysql_query($query);
			
			if(mysql_num_rows($res1) == mysql_num_rows($res2))
			{
				$moneynew = $moneynew + $data[4];
				$userexp = $userexp + $data[3];
				
				$query="insert into user_achievements values('".$id."',".$data[0].",NOW())";
				$rest=mysql_query($query);
				
				$query="update profile set experience=".$userexp." , money=".$moneynew." where uid='".$id."'";
				$rest=mysql_query($query);
				
				$info="5#".$userbatterynew."#".$userexp."#".$moneynew;
				$obj1->add_achievement($data[0],$id,$info);
			}
		}
		else if ($data[1] == 6)
		{
			$query = "select * from profile where money>=".$data[2]." and uid='".$id."'";
			$res1=mysql_query($query);
			if(mysql_num_rows($res1)>0)
			{
				$moneynew = $moneynew + $data[4];
				$userexp = $userexp + $data[3];
				
				$query="insert into user_achievements values('".$id."',".$data[0].",NOW())";
				$rest=mysql_query($query);
				
				$query="update profile set experience=".$userexp." , money=".$moneynew." where uid='".$id."'";
				$rest=mysql_query($query);
				
				$info="5#".$userbatterynew."#".$userexp."#".$moneynew;
				$obj1->add_achievement($data[0],$id,$info);
			}
		}
	}
	/*achievement verification code end*/
	print $percentage."###".$userbatterynew."###".$moneynew."###".$userexp;
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