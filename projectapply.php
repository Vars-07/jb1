<?php
session_start();
$i=0;
$id=$_SESSION['id'];
$pid=$_GET['value'];
$count=0;
$count1=0;
$flag=0;
$tym=date("Y-m-d H:i:s");
require_once('database.php');
$db=new Database();
$db->connect();
//$db->select('project_requirement','*',"pid='".$pid."'");
$query="select package_id from project_requirement where pid=".$pid."";
$res=mysql_query($query);
while($required=mysql_fetch_array($res))
{
    $count++;//3
}
for($i=0;$i<$count;$i++)
{

    $sql="Select package_id from user_package where uid =='".$id."' and package_id =".$res[$i]."   ";

$data=mysql_query($sql);
    if(mysql_fetch_array($data))
    {

        $flag++;

    }


}




//$db->select('user_package','*',"uid='".$id."'");
//$res1=$db->getResult();
//$query1="select package_id from user_package where uid='".$id."'" ;
//$res1=mysql_query($query1);


//while($userhave=mysql_fetch_array($res1))
//{
  //  $count1++;//32
//}

//$userhave=$res1['package_id'];
/*
for($i=0;$i<$count;$i++)
{
    for($j=0;$j<$count1;$j++)
    {
        if($userhave[$j]==$required[$i])
        {
            $flag++;
            break;
        }
    }
}
*/
if($flag==$count)
{
    $db->insert('undergoing_project',array($id,$pid,0,$tym));
    echo 11;
}
else{
  echo 0;

}





?>
