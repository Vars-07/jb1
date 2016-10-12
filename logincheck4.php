<?php
session_start();
if($_POST['uname']=="admin" && $_POST['pass']=="@isjobrunning!")
{
    $_SESSION['id']=$_POST['uname'];
    $_SESSION['usertype']="admin";
    die(header("Location: admin.php"));
}
include_once("database.php");
$db=new Database();
$db->connect();
$mail = $_POST['uname'];
if(strstr($mail,'@'))
{
    $eid=explode("@", $mail);
    if($eid[1]=="gmail.com")
    {
        $email=str_replace(".", "", $eid[0]);
        $mail=$email."@gmail.com";
    }
}
$uname=stripslashes($_POST['uname']);
$query="SELECT uid, password, usertype, flag FROM jobbureau.profile WHERE uid='".$uname."' or email='".$mail."'";
$res=mysql_query($query) or die("error11");
$rowprofile = mysql_fetch_array($res);
if($rowprofile[3]==1)
{
    die(header("Location: index.php?value=You are blocked by the admin!"));
}
$query="SELECT uid, password, usertype, flag FROM jobbureau.profile WHERE uid='".$uname."' or email='".$mail."'";
$res=mysql_query($query) or die("error11");
if(mysql_num_rows($res)==0)
{
    include_once("DatabaseInfotsav.php");
    $query1="SELECT * FROM infotsav12.users WHERE username='".$uname."' or email='".$mail."'";
    $res1=mysql_query($query1) or die("error2");
    if(mysql_num_rows($res1)==0)
    {
        header("Location: index.php?value=Register yourself at Infotsav'12.");
    }
    else
    {
        while($rows1=mysql_fetch_array($res1))
        {
            if(md5($_POST['pass'])==$rows1[6])
            {
                $uid=$rows1[0];
                $name=$rows1[1];
                $college=$rows1[2];
                $username=$rows1[5];
                $password=md5($_POST['pass']);
                $eventname="Job Bureau";
                $email = $rows1[10];
                $xyz=0;
                mysql_connect("localhost","jobbureau","job123$") or die("Error connecting to server line 80");
                mysql_select_db("jobbureau") or die("Error connecting to database");
                $today = date("Ymd");
                $query="INSERT INTO jobbureau.profile VALUES('".$username."','".$name."','".$password."','user','".$username."','".$email."','".$college."',100,0,100000,NOW(),NOW(),0,'user_pics/default.png')";
                $rs=mysql_query($query) or die("error1");
                if(strstr($_POST['uname'],'@'))
                {
                    $eid=explode("@", $mail);
                    if($eid[1]=="gmail.com")
                    {
                        $email=str_replace(".", "", $eid[0]);
                        $mail=$email."@gmail.com";
                    }
                    $query2="SELECT uid FROM profile where email='".$mail."'";
                    $res2=mysql_query($query2) or die("error");
                    $aaa = mysql_fetch_array($res2);
                    $_SESSION['id']=$aaa[0];
                }
                else
                {
                    $_SESSION['id']=$_POST['uname'];
                }
                $_SESSION['usertype']="user";
                header("Location: ownprofile.php");
                //header("Location: thankyou.php");
            }
            else
            {
                header("Location: index.php?value=Wrong username or password");
            }
        }
    }
}
else
{
    mysql_connect("localhost","jobbureau","job123$") or die("Error connecting to server line 120");
    mysql_select_db("infotsav12") or die("Error connecting to databases");
    $query1="SELECT password FROM infotsav12.users WHERE username='".$uname."' or email='".$mail."'";
    $res3=mysql_query($query1) or die("error2");
    while($rowsw=mysql_fetch_array($res3))
    {
        if($rowsw[0]==md5($_POST['pass']))
        {
            echo "hello";
            if(strstr($_POST['uname'],'@'))
            {
                $eid=explode("@", $mail);
                //if($eid[1]=="gmail.com")
                if($eid[1]=="gmail.com")
                {
                    $email=str_replace(".", "", $eid[0]);
                    $mail=$email."@gmail.com";
                }
                mysql_connect("localhost","jobbureau","job123$") or die("Error connecting to server line 140");
                mysql_select_db("jobbureau") or die("Error connecting to database");
                $query2="SELECT uid FROM profile where email='".$mail."'";
                $res2=mysql_query($query2) or die("errorv");
                $aaa = mysql_fetch_array($res2);
                $_SESSION['id']=$aaa[0];
            }
            else
            {
                $_SESSION['id']=$_POST['uname'];
            }
            $_SESSION['usertype']="user";
            header("Location: ownprofile.php");
            //header("Location: thankyou.php");
        }
        else
        {
            header("Location: index.php?value=Wrong username or password");
        }
    }
}

?>
