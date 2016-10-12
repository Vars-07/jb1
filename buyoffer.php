<?php
session_start();
$id=$_SESSION['id'];

include "database.php";
$db= new Database();
$db->connect();
include "action.php";
$obj1=new ActionLog();
$package_id=$_GET['value'];

$sql ="select package_id from user_package where package_id='".$package_id."' and uid='".$id."'";
$row=mysql_query($sql);

if(mysql_num_rows($row)==0)
{
    $sql1="select * from offer where package_id='".$package_id."'";// and is_visible=1";
    $data1=mysql_query($sql1);
    if(mysql_num_rows($data1)!=0)
    {
        $row=mysql_fetch_array($data1);


    $query="select money from profile where uid='".$id."'";
    $data=mysql_fetch_array(mysql_query($query));
    if($data[0]>=$row[5])
    {

    $rem=$data[0]-$row[5];

    $sql2="insert into user_package values('".$id."','".$package_id."',NOW(),1)";
    $result=mysql_query($sql2);


       $sql="select battery,experience from profile where uid='".$id."'";
     $log=mysql_fetch_array(mysql_query($sql));
     $info="1#".$log['battery']."#".$log['experience']."#".$rem;
     $obj1->add_offerpackage($id, $row[2],$package_id,$info);

    $query="update profile set money='".$rem."' where uid='".$id."'";
    $row=mysql_query($query);


  




    echo "1#".$rem;
    }
    else
    {
        echo "3#a";
    }

    }
    else
    {
        echo "4#b";

    }

}
else{

    echo "2#c";

}




?>