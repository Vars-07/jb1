<?php

include_once('database.php');
$db=new Database();
$db->connect();

$type=$_GET['type'];
//$sql="SELECT * FROM action_log WHERE uid = '".$id."'";

//$result = mysql_query($sql);
if($type==1){
$uid=$_GET['uid'];
    $sql="select * from profile where uid='".$uid."'";
$out=  mysql_query($sql);
?>
<table cellpadding="2" cellspacing="8" width="100%" border="0" bgcolor="#ff9933"></table>
                   
                    <table cellpadding="4" cellspacing="14" width="100%" border="0">
                        <?php 
                    if(mysql_num_rows($out)!=0)
                    {   while($res=mysql_fetch_array($out))
                        {
                            //$array=explode('#',$res['information']);



                            echo "<tr><td><h3>";
                            echo $res['name'];
                            echo "<br />";
                            echo " Battery:".$res['battery']."% and Experience : ".$res['experience']." hrs & Money : Rs".$res['money'];
                           // echo "</h3></td><td width='20%'><h3>";
                            //echo $res['timestamp'];
                            echo "</h3></td>";
                        }
                    }
                        else
                        {
                            echo"<br><br><h2>No Log Details for this user</h2>";


                        }
                        ?>
                    </table>

  <?php }
  else if($type==2)
  {
     $uid= $_POST['uid'];
     $battery= $_POST['battery'];
     $exp= $_POST['experience'];
     $money= $_POST['money'];



    
     if($uid=="all")
     {

     $sql="update profile set battery='".$battery."',experience='".$exp."',money='".$money."'";
     $row=mysql_query($sql);
     header("Location:updateinfo.php?value=success");
  }
  else{
     $sql="update profile set battery='".$battery."',experience='".$exp."',money='".$money."' where uid='".$uid."'";
     $row=mysql_query($sql);
     header("Location:updateinfo.php?value=success");
  }
  
  }
  else if($type==3)
  {
    $uid= $_POST['uid'];
     $battery= $_POST['battery'];
     $exp= $_POST['experience'];
     $money= $_POST['money'];

     $sql="select uid,money,experience, battery from profile where uid='".$uid."'";
     $data=mysql_fetch_array(mysql_query($sql));

     $sql="select uid,money,experience, battery from profile";
     $row=mysql_query($sql);

    

      if($uid=="all")
         {
         while($data=  mysql_fetch_array($row))
         {
    
         $sql="update profile set battery=battery+'".$battery."',experience=experience+'".$exp."',money=money+'".$money."'";
         $row=mysql_query($sql);
         header("Location:updateinfo.php?value=success");
         }
     //echo "done";
        }
  else{
      $batterynew=$battery+$data['battery'];
     $expnew=$exp+$data['experience'];
     $moneynew=$money+$data['money'];

     $sql="update profile set battery=battery+'".$battery."',experience=experience+'".$exp."',money=money+'".$money."' where uid='".$uid."'";
     $row=mysql_query($sql);
     header("Location:updateinfo.php?value=success");
     //echo "done2";
  }

  }
  ?>