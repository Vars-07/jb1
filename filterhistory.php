<?php
session_start();
if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include_once('database.php');
    include "action.php";
    $obj1=new ActionLog();
    $db=new Database();
    $db->connect();
        
		
		if(!isset($_GET['par']))
		{
		$date=$_GET['date'];
		$query2="SELECT * FROM action_log where uid='".$id."' and timestamp like '".$date."%' order by timestamp DESC";
                $out=mysql_query($query2) or die("error");
		
		}
		else
		{
		$par=$_GET['par'];
                if(strcmp($_GET['date'],"today")==0)
                {  
                $date="20".date("y-m-d");
                }
                else
                {
                    $date=$_GET['date'];


                }
        if(strcasecmp($par,'2')==0)
        { $query2="SELECT * FROM action_log where uid='".$id."' and event in(2,3) and timestamp like '".$date."%' order by timestamp DESC";
        $out=mysql_query($query2) or die("error");
        }
        elseif(strcasecmp($par,'1')==0)
        {
            $query2="SELECT * FROM action_log where uid='".$id."' and timestamp like '".$date."%' and event=1 order by timestamp DESC"; //pacakage purachased
        $out=mysql_query($query2) or die("error");
        }
        elseif(strcasecmp($par,'0')==0)
        {
            $query2="SELECT * FROM action_log where uid='".$id."' and event=0 and timestamp like '".$date."%' order by timestamp DESC";
        $out=mysql_query($query2) or die("error");
        }
}
    ?>




                            <table cellpadding="2" cellspacing="8" width="100%" border="0">
                            <?php
			if(mysql_num_rows($out)!=0)
                    {
                             while($res=mysql_fetch_array($out))
                                {
                                    $array=explode('#',$res['information']);
                                    $timestamp=explode(' ', $res['timestamp']);
                                    $date=explode('-', $timestamp[0]);
                                    echo "<tr><td><h4 style='font-family:georgia'>";
                                    echo $date[2]." Oct.&nbsp;&nbsp;&nbsp;&nbsp;".$timestamp[1];
                                    echo "<tr><td><h3 style='font-family:georgia'>";
                                    echo $res['action'];
                                    echo "<br />";
                                    echo "Now my battery : ".$array[1]."% and Experience : ".$array[2]." hrs & Money : Rs".$array[3];
                                    //echo "<hr></h3></td><td width='20%'><h3><hr>";
                                   echo "<br><br><p style='border-bottom:1px solid #D8D5D5'></p>";
                                    //echo "<hr></h3></td></tr>";
                                }
                         
				
				 }
                        else
                        {
                            echo"<br><br><h2>No Log Details</h2>";


                        }
			   ?>
                         </table>
              
<?php
}
else{
    header("Location:index.php?error=login");
}
?>

