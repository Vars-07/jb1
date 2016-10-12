<?php
session_start();

 if($_SESSION['id']!=null)
   header("Location: index.php?value=You are not allowed to log in");
   ?>

<?php

 include_once('database.php');
echo '<script>alert(111)</script>';
   $db=new database();
    $db->connect();

$i=0;
$sql="SELECT * FROM projects where is_visible=0 order by level";
$data=mysql_query($sql);
//echo '<script>alert(111)</script>';
 while($row=mysql_fetch_array($data))
 {
 $id="visible".$i;
 $i++;
 $ex=$_POST[$id];
 /*echo $ex;
 exit;*/
  if($ex)
  	{

	    $qu="UPDATE projects SET is_visible=1 where pid='".$row[0]."'" ;
          //echo $qu;
		$rs=mysql_query($qu) or die("error1");
        header("Location: release_project.php?error=4");

	}
 }

?>
