<?php
$id=$_GET["uid"];
if(isset($_GET['date']))
{
$date=$_GET["date"];
}
else
{
$date="";
}
include_once('database.php');
$db=new Database();
$db->connect();
include "action.php";
    $obj1=new ActionLog();
    
//$sql="SELECT * FROM action_log WHERE uid = '".$id."'";

//$result = mysql_query($sql);
?>
<table cellpadding="2" cellspacing="8" width="100%" border="0" bgcolor="#ff9933"><th><h2>Details</h2></th><th width="34%"><h2>Time</h2></th></thead></table>
                    <hr>
                    <table cellpadding="4" cellspacing="14" width="100%" border="0">
                        <?php $out=$obj1->log_action($id,$date);
                    if(mysql_num_rows($out)!=0)
                    {   while($res=mysql_fetch_array($out))
                        {
                            $array=explode('#',$res['information']);



                            echo "<tr><td><h3><hr>";
                            echo $res['action'];
                            echo "<br />";
                            echo "Now my battery : ".$array[1]."% and Experience : ".$array[2]." hrs & Money : Rs".$array[3];
                            echo "<hr></h3></td><td width='20%'><h3><hr>";
                            echo $res['timestamp'];
                            echo "<hr></h3></td></tr>";
                        }
                    }
                        else
                        {
                            echo"<br><br><h2>No Log Details for this user</h2>";


                        }
                        ?>
                    </table>

