<?php
session_start();

include("database.php");
include ("action.php");
$obj1=new ActionLog();

$db=new Database();
$db->connect();
$i=0;
$id=$_SESSION['id'];
$pid=$_POST['PID'];
$query="select * from projects where pid='".$pid."'";
$ram=mysql_query($query);
if(mysql_num_rows($ram)!=0 )
{
$sql="select pid from completed_project where pid='".$pid."' and uid='".$id."' and pid not in (93,95,96)" ;
$row=mysql_query($sql);
$sql1="select pid from undergoing_project where pid='".$pid."' and uid='".$id."' and pid not in (93,95,96)";
$row1=mysql_query($sql1);

if(mysql_num_rows($row)==0 && mysql_num_rows($row1)==0)
{




        $count=0;

        $flag=0;
        //$tym=date("Y-m-d H:i:s");

        $db->select('projects','level',"pid='".$pid."'");//log
        $level=$db->getResult();
        $db->select('profile','*',"uid='".$id."'");//log
        $log=$db->getResult();//log


        $query="select count(package_id) from project_requirement where pid=".$pid."";
        $res=mysql_query($query);
        $required=mysql_fetch_array($res);

        $sql="Select count(package_id) from user_package where uid ='".$id."' and package_id IN (select package_id from project_requirement where pid =".$pid.")";

        $data=mysql_query($sql);
        $result=mysql_fetch_array($data);

        if($required!=0)
        {


            if($required==$result)
            {
                $info="2#".$log['battery']."#".$log['experience']."#".$log['money'];
                $obj1->add_actiontask($id, $pid,$info);//log


                $testQ = 'select NOW()';
                $time = mysql_fetch_array(mysql_query($testQ));

                $db->insert('undergoing_project',array($id,$pid,0, $time[0]));
                $query1="select * from projects where pid=".$pid."";
                $res1=mysql_query($query1);
                $required1=mysql_fetch_array($res1);
                $try['name']=$required1['name'];
                $try['experience']=$required1['experience'];
                $try["success"]="true";
                $try['count']=$count;
                $try['flag']=$flag;
                // echo 11;

                echo '{"name":"'.$required1['name'].'","experience":"'.$required1['experience'].'","success":"true","count":"'.$count.'","flag":"'.$flag.'"}';
                // print (json_encode($try));
            }
            elseif($flag==0){
                $try["success"]="false";
                // echo 11;
                echo '{"success":"false"}';
                // print (json_encode($try));

            }
        }

        else if($required==0){

            $info="2#".$log['battery']."#".$log['experience']."#".$log['money'];
            $obj1->add_actiontask($id, $pid,$info);//log


            $db->insert('undergoing_project',array($id,$pid,0,'NOW()'));
            $query1="select * from projects where pid=".$pid."";
            // $obj1->add_actionbasictask($id, $pid);
            $res1=mysql_query($query1);
            $required1=mysql_fetch_array($res1);
            $try['name']=$required1['name'];
            $try['experience']=$required1['experience'];
            $try["success"]="true";
            // echo 11;
            echo '{"name":"'.$required1['name'].'","experience":"'.$required1['experience'].'","success":"true"}';
            //print (json_encode($try));


        }


    }


else
{
    //$try["success"]="false";
    echo '{"success":"already"}';

}

}
else
{
    //$try["success"]="false";
    echo '{"success":"temper"}';

}




?>
