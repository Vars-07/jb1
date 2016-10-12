<?php
session_start();
$db_host = 'localhost';     // Database Host
$db_user = 'root';          // Username
$db_pass = '';          // Password
$db_infotsav = 'infotsav';  //infotsav
$db_infotsav_user_table = 'users'; // user table in infotsav database
$db_job = 'jobbureau'; //job bureau

if($_POST['uname']=="Anshul Jain" && $_POST['pass']=="bittubeyond")
{
    $_SESSION['id']=$_POST['uname'];
    $_SESSION['usertype']="admin";
    die(header("Location: admin.php"));
}
else{
/*else{
session_destroy();
die(header("Location: index.php?value=Job Bureau starts at 5:00 pm, Nov 6th 2012."));
}*/
include_once("database.php");
$db=new Database();
$db->connect();

//include("include_db.php");

$mail = stripslashes($_POST['uname']);
$uname=stripslashes($_POST['uname']);
/*if(strstr($mail,'@'))
{
    $eid=explode("@", $mail);

    if($eid[1]=="gmail.com")
    {
        $email=str_replace(".", "", $eid[0]);
        $mail=$email."@gmail.com";
    }

}*/

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_infotsav", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query = $conn->prepare("SELECT uid, password, usertype, flag FROM ".$db_job.".profile WHERE uid=? or email=?");
    $query->execute([$uname,$mail]);
    $res = $query->fetch(PDO::FETCH_ASSOC);
  //  print_r($res);
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
//$query="SELECT uid, password, usertype, flag FROM ".$db_job.".profile WHERE uid='".$uname."' or email='".$mail."'";
//$res=mysql_query($query) or die("error11");
$rowprofile = $res;
//print_r($rowprofile);
if($rowprofile['flag']==1)
{
    die(header("Location: index.php?value=You are blocked by the admin!"));
}


try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_infotsav", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query = $conn->prepare("SELECT uid, password, usertype, flag FROM ".$db_job.".profile WHERE uid=? or email=?");
    $query->execute([$uname,$mail]);
    $res = $query->fetchAll();
    
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

//$query="SELECT uid, password, usertype, flag FROM ".$db_job.".profile WHERE uid='".$uname."' or email='".$mail."'";
//$res=mysql_query($query) or die("error11");
//print_r($res);
if(count($res)==0)
{ 
    
    include_once("DatabaseInfotsav.php");
   try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_infotsav", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query1 = $conn->prepare("SELECT * FROM ".$db_infotsav.".".$db_infotsav_user_table." WHERE name=? or email=?");
     $query1->execute(array($uname,$mail));
     $res1 = $query1->fetchAll(PDO::FETCH_OBJ);
    // print_r($res1);
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
//$conn = null;
    //$query1="SELECT * FROM ".$db_infotsav.".".$db_infotsav_user_table." WHERE username='".$uname."' or email='".$mail."'";
    //$res1=mysql_query($query1) or die("error2");
    if(count($res1)==0)
    {
        header("Location: index.php?value=Register yourself at Infotsav'16.");
    }
    else
    {
        
        $query1->execute(array($uname,$mail));
       $rows1 = $query1->fetch(PDO::FETCH_ASSOC);
       //print_r($rows1);
       //echo $rows1['id'];
        while(isset($rows1['id']))
        {
			if(md5($_POST['pass'])==$rows1['password'])
            {
				/*
				if($rows1['email_act'] == 0 && $rows1['phone_act'] == 0){
					header("Location: index.php?value=Get you infotsav'16 account verified.");
					break;
				}
				*/
                $uid=$rows1['id'];
                $name=$rows1['name'];
                $college=$rows1['school'];
                $username=$rows1['name'];
                $password=md5($_POST['password']);
                $eventname="Job Bureau";
                $email = $rows1['email'];
                $xyz=0;
                $type = 'user';
                //mysql_connect($db_host,$db_user,$db_pass) or die("Error connecting to server line 80");
                //mysql_select_db($db_job) or die("Error connecting to database 1");

                $today = date("Ymd");




try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_job", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query = $conn->prepare("INSERT INTO ".$db_job.".profile VALUES(?,?,?,?,?,?,?,100,0,0,NOW(),NOW(),0,'user_pics/default.png')");
    $query->execute([$username,$name,$password,$type,$username,$email,$college]);
    //$res = $query->fetchAll();
    
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;



               // $query="INSERT INTO ".$db_job.".profile VALUES('".$username."','".$name."','".$password."','user','".$username."','".$email."','".$college."',100,0,0,NOW(),NOW(),0,'user_pics/default.png')";
//$rs=mysql_query($query) or die("error1");

                //echo "hello1";
                if(strstr($_POST['uname'],'@'))
                {
                    /*$eid=explode("@", $mail);
                    if($eid[1]=="gmail.com")
                    {
                        $email=str_replace(".", "", $eid[0]);
                        $mail=$email."@gmail.com";
                    }*/

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
                //header("Location: index.php?value=Wrong username or password");
            }
            $query1->execute(array($uname,$mail));
             $rows1 = $query1->fetch(PDO::FETCH_ASSOC);

        }

    }
}
else
{


try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_infotsav", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query1 = $conn->prepare("SELECT password FROM ".$db_infotsav.".".$db_infotsav_user_table." WHERE name=? or email=?");
    $query1->execute(array($uname,$mail));
    $rowsw = $query1->fetch(PDO::FETCH_ASSOC);
    print_r($rowsw);
    //$res = $query->fetchAll();
    
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;


    //mysql_connect($db_host,$db_user,$db_pass) or die("Error connecting to server line 120");
    //mysql_select_db($db_infotsav) or die("Error connecting to databases");

    //$query1="SELECT password FROM ".$db_infotsav.".".$db_infotsav_user_table." WHERE username='".$uname."' or email='".$mail."'";
    //$res3=mysql_query($query1) or die("error2");
     
    while(isset($rowsw['password']))
    {
        //echo 'Anshul';
        if($rowsw['password']==md5($_POST['pass']))
        {
            echo "hello";
            if(strstr($_POST['uname'],'@'))
            {
                /*$eid=explode("@", $mail);
                //if($eid[1]=="gmail.com")
                if($eid[1]=="gmail.com")
                {
                    $email=str_replace(".", "", $eid[0]);
                    $mail=$email."@gmail.com";
                }*/
                mysql_connect($db_host,$db_user,$db_pass) or die("Error connecting to server line 140");
                mysql_select_db($db_job) or die("Error connecting to database");
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
        $rowsw = $query1->fetch(PDO::FETCH_ASSOC);

    }
}
}

?>

