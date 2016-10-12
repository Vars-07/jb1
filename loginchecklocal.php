<?php
session_start();

include("database.php");
   $db=new Database();
    $db->connect();

$username =trim( $_POST['uname']);
$password = trim($_POST['pass']);

if($_POST['uname']=="admin" && $_POST['pass']=="mainhunadmin")
{
	$_SESSION['id']=$_POST['uname'];
 	$_SESSION['usertype']="admin";
 	die(header("Location: admin.php"));
}
//$username=mysql_real_escape_string($user_name);
$query="SELECT uid, password, usertype ,flag FROM profile WHERE uid='".$username."'";
$res=mysql_query($query) or die("error123");
if(mysql_num_rows($res)==0)
{
    header("Location: index.php?error=No such user exists");
}


while($rows=mysql_fetch_array($res))
{
 if(strcmp($rows[1],md5($password))==0 && $rows[3]==0)
  {
  // echo "hello";
   if(strcmp($rows[2],"admin")==0)
   {
 $_SESSION['id']=$username;
 $_SESSION['usertype']="admin";
 header("Location: admin.php");


   }
   else
   {
    $_SESSION['id']=$username;
 $_SESSION['usertype']="user";

  header("Location: ownprofile.php");
   }

  }
 elseif( $rows[3]==1)
   {
     header("Location: index.php?error=You have been blocked by admin");

   }

 else
  {
    header("Location: index.php?error=Wrong username or password");

  }


}
?>
