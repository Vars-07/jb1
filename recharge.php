<?php

session_start();
$id=$_SESSION['id'];
include_once('database.php');
include('action.php');
$act=new ActionLog();
$db= new Database();
$db->connect();
$db->select('profile','*',"uid='".$id."'");
$var=$db->getResult();
$dbbattery=$var['battery'];
$dbmoney=$var['money'];
$dbexp=$var['experience'];

if($dbmoney>=2000)
{
    if($var['battery']<100)
    {   $dbbattery+=10;
        if($dbbattery>100)
        {
            $dbmoney-=2000;
            $query="update profile set battery='100',money=".$dbmoney." where uid='".$id."'";
            $info="0#".$dbbattery."#".$dbexp."#".$dbmoney;
            $act->add_actionbooster($id,$dbbattery,$info);
            $res=mysql_query($query);
        }
        else{
            $dbmoney-=2000;
            $query="update profile set battery='".$dbbattery."',money=".$dbmoney." where uid='".$id."'";
            $info="0#".$dbbattery."#".$dbexp."#".$dbmoney;
            $act->add_actionbooster($id,$dbbattery,$info);
           
            $res=mysql_query($query);
        }
        print "1##".$dbbattery."##".$dbmoney;
    }
    else
    {
        print "2##".$dbbattery."##".$dbmoney;
    }
}
else{
    print "3##".$dbbattery."##".$dbmoney;
}




?>

