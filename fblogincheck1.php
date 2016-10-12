<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nitin
 * Date: 29/10/12
 * Time: 10:44 PM
 * To change this template use File | Settings | File Templates.
 */
session_start();

include_once("database.php");

$db=new Database();
$db->connect();

if(isset($_REQUEST['pic_sqr'],$_REQUEST['response']))
{


    $data=$_REQUEST['response'];
    $id=$data['id'];
    $name=$data['name'];
    $birthday=date('Y-m-d',strtotime($data['birthday']));
    $hometown=$data['hometown']['name'];
    $gender=$data['gender'];
    $email=$data['email'];
    $pic=$_REQUEST['pic_sqr'];
    $username=$data['username'];
    $clg=null;

    for($i=0;$i<count($data['education']);$i++)
    {
        if($data['education'][$i]['type']=='College')
        {
            $clg=$data['education'][$i]['school']['name'];
        }
    }


    $mail = $email;
    if(strstr($mail,'@'))
    {
        $eid=explode("@", $mail);

        if($eid[1]=="gmail.com")
        {
            $email=str_replace(".", "", $eid[0]);
            $mail=$email."@gmail.com";
        }

    }
    $email = $mail;

    $query="select uid, flag from jobbureau.profile where email='".$email."'";
    $res=mysql_query($query) or die(mysql_error($db->connection));
    if(mysql_num_rows($res)==0)
    {
        /*  $query="INSERT INTO jobbureau.profile VALUES('".$id."','".$name."','','user','".$name."','".$email."','',100,0,0,NOW(),NOW(),0,'".$pic."')";
      $rs=mysql_query($query) or die(mysql_error($db->connection));*/

        include_once("DatabaseInfotsav.php");



        $query="select username from infotsav12.users where email='".$email."'";
        //echo $query;

        $resInfo=mysql_query($query) or die('Error in Infotsav select');

        if(mysql_num_rows($resInfo)==0)
        {

            if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
                $internal_ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
            {
                $internal_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $internal_ip=$_SERVER['REMOTE_ADDR'];
            }


            $external_ip= $_SERVER['REMOTE_ADDR'];


            $pass=md5($username."12345!@#$#$$");


            $query="select max(id)as max from infotsav12.users";
            $result=mysql_query($query) or die('Error in Infotsav select');
            $temp=mysql_fetch_array($result);
            //print_r($temp);
            $max=$temp['max'] +1;
            $query="INSERT INTO infotsav12.users VALUES(".$max.",'".$name."','".$clg."','','','".$id."','".$pass."','".$gender."','".$birthday."',".$max.",'".$email."','".$hometown."',1,NOW(),'".$external_ip."','".$internal_ip."')";
            //echo $query;
            $rs=mysql_query($query) or die('Error Info Insert');


            if(mysql_affected_rows()!=0)
            {


                $db1=new Database();
                $db1->connect();

                $query="INSERT INTO jobbureau.profile VALUES('".$id."','".$name."','','user','".$name."','".$email."','".$clg."',100,0,0,NOW(),NOW(),0,'".$pic."')";
                $rs=mysql_query($query) or die(mysql_error($db->connection));

                $_SESSION['id']=$id;
                $_SESSION['usertype']="user";
                $_SESSION['type']="facebook";
                //echo json_encode(array('success'=>true));
                echo 'success';
            }
            else
            {

                echo 'failure';
            }



        }
        else
        {
            $temp=mysql_fetch_array($resInfo);
            $id=$temp['username'];
            $db1=new Database();
            $db1->connect();

            $query="INSERT INTO jobbureau.profile VALUES('".$id."','".$name."','','user','".$name."','".$email."','".$clg."',100,0,0,NOW(),NOW(),0,'".$pic."')";
            $rs=mysql_query($query) or die(mysql_error($db->connection));

            $_SESSION['id']=$id;
            $_SESSION['usertype']="user";
            $_SESSION['type']="facebook";
            //echo json_encode(array('success'=>true));
            echo 'success';

        }




    }
    else
    {
        include_once("DatabaseInfotsav.php");
        $query="select username from infotsav12.users where email='".$email."'";
        $resInfo=mysql_query($query) or die('Error in Infotsav select');
        $temp=mysql_fetch_array($resInfo);
        $id=$temp['username'];


        $_SESSION['id']=$id;
        $_SESSION['usertype']="user";
        $_SESSION['type']="facebook";

        //echo json_encode(array('success'=>true));
        echo 'success';
    }


}
else
{
    echo 'failure';
}



//print_r($_REQUEST);

?>