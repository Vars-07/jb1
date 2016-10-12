<?php
session_start();
include("database.php");
include "action.php";
$obj1=new ActionLog();

$db=new Database();
$db->connect();
$id=$_SESSION['id'];
$total=$_SESSION['packagemarket']['totalbuy'];
$num=$_SESSION['num'];
$arr=$_SESSION['purchased'];
$arrid=explode('#',$arr);
$count=$_SESSION['count'];
$db->select('profile','*',"uid='".$id."'");//log
$log=$db->getResult();

$rem=$_SESSION['packagemarket']['usermoney']; //$rem == remaining money
$db->select('profile','money',"uid='".$id."'");
$moneyarr=$db->getResult();

if($_SESSION['packagemarket']['totalbuy']==($moneyarr['money']-$rem))
{
$query="update profile set money='".$rem."' where uid='".$id."'";
$res=mysql_query($query)or die("error");



for($i=0;$i<$count;$i++)
{
    if($arrid[$i]!=0)
    {
        $db->select('package','name',"package_id='".$arrid[$i]."'");
        $data=$db->getResult();
        $info="1#".$log['battery']."#".$log['experience']."#".$rem;
		$query1="INSERT INTO user_package VALUES('".$id."','".$arrid[$i]."',NOW(),0)";
		echo "1";
        $rs=mysql_query($query1) or die("error");
		echo "2";
        //$db->insert('user_package',array($id,$arrid[$i],NOW()));

        $obj1->add_actionpackage($id, $data['name'],$arrid[$i],$info);

    }
}


$result["success"]=$rem;
header("Location:packagemarket.php");
}
else
{
header("Location:packagemarket.php?value=You dont have enough money");

}


?>
