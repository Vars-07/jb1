<?php
session_start();
error_reporting(0);
 if(strcmp($_SESSION['usertype'],"admin")!=0)
   header("Location: index.php?value=1");
   ?>

<?php
 include("database.php");
$db=new Database();
$db->connect();

 $i=0;
    $sql="SELECT * FROM profile where flag=1 and usertype='user'  ";
    $data=mysql_query($sql);

 while($row=mysql_fetch_array($data))
 {
 $id="visible".$i;
 $i++;
 $ex=$_POST[$id];

  if($ex)
  	{
	    $qu="UPDATE profile SET flag = '0' WHERE `profile`.`uid` = '".$row[0]."'  " ;
		$rs=mysql_query($qu) or die("error in update query in lockuserdata.php ".$row[0]."");
           header("Location: unlockuser.php?error=4");

	}
 }

?>