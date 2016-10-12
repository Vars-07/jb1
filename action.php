<?php

Class ActionLog{
     


	function add_achievement($aid,$uid,$info)
	{

       $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";
     try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);               
              $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,4,?,?,'I completed an achievement.',NOW())");
		$userid = $uid;
	$acid = $aid;
$information = $info;
		$stmt->execute([$userid,$acid,$information]);
		//$query="INSERT INTO action_log VALUES('".$uid."',4,".$aid.",'".$info."','I completed an achievement.',NOW())";
                //$rs=mysql_query($query) or die("error");
	 	
	}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}
    function add_actionbooster($uid,$battery,$info)
    {
         $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";
        //$time=time();
        try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,0,0,?,'I purchased a power booster to charge my battery',NOW())");
        $userid = $uid;
	$battery=$battery;
        $information = $info;
        //$query="INSERT INTO action_log VALUES('".$uid."',0,0,'".$info."','I purchased a power booster to charge my battery',NOW())";
        //$rs=mysql_query($query) or die("error");

     $stmt->execute([$userid,$information]);
        }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

    }

    function add_actionpackage($uid,$pacname,$pacid,$info)
    {
           $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";
       try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,1,?,?,'I purchased a package -> \"$pacname\"',NOW())");
    $userid=$uid;
    $pacid=$pacid;
    $info=$info;
    $stmt->execute([$userid,$pacid,$info]);
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;


        //$query="INSERT INTO action_log VALUES('".$uid."',1,'".$pacid."','".$info."','I purchased a package -> \"$pacname\"',NOW())";
        //$rs=mysql_query($query) or die("error");

    }

     function add_offerpackage($uid,$pacname,$pacid,$info)
    {
       $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";


        //$query="INSERT INTO action_log VALUES('".$uid."',1,'".$pacid."','".$info."','I purchased a package from offer of the day -> \"$pacname\"',NOW())";
        //$rs=mysql_query($query) or die("error");
        try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,1,?,?,'I purchased a package from offer of the day -> \"$pacname\"',NOW())");
    $userid=$uid;
    $pacid=$pacid;
    $info=$info;
    $stmt->execute([$userid,$pacid,$info]);
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;


    }

    function add_actiontask($uid, $pid,$info)
    {
          $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";

        

        $query1="select p.name,c.company_name from projects p,company c where p.cid=c.cid and pid=".$pid."";
        $row=(mysql_fetch_array(mysql_query($query1)));
        //$query="INSERT INTO action_log VALUES('".$uid."',2,'".$pid."','".$info."','I applied for a task -> \"$row[0]\" for company \"$row[1]\"',NOW())";
        try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,2,?,?,'I applied for a task -> \"$row[0]\" for company \"$row[1]\"',NOW())");
    $userid=$uid;
    $pacid=$pid;
    $info=$info;
    $stmt->execute([$userid,$pacid,$info]);
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
        //$rs=mysql_query($query) or die("error");

    }

/*function add_actiontasklevel1($uid, $pid)
	{  $query1="select p.name,c.company_name from projects p,company c where p.cid=c.cid and pid=".$pid."";
        $row=(mysql_fetch_array(mysql_query($query1)));
		$query="INSERT INTO action_log VALUES('".$uid."','I applied for a level 1 task -> $row[0] of $row[1]',NOW())";
		$rs=mysql_query($query) or die("error");

	}

function add_actiontasklevel2($uid, $pid)
	{   $query1="select p.name,c.company_name from projects p,company c where p.cid=c.cid and pid=".$pid."";
        $row=(mysql_fetch_array(mysql_query($query1)));
		$query="INSERT INTO action_log VALUES('".$uid."','I applied for a level 2 task -> $row[0] of $row[1]',NOW())";
		$rs=mysql_query($query) or die("error");

	}

function add_actiontasklevel3($uid, $pid)
	{  $query1="select p.name,c.company_name from projects p,company c where p.cid=c.cid and pid=".$pid."";
        $row=(mysql_fetch_array(mysql_query($query1)));
		$query="INSERT INTO action_log VALUES('".$uid."','I applied for a level 3 task -> $row[0] of $row[1]',NOW())";
		$rs=mysql_query($query) or die("error");

	}
*/
    function add_actioncompletedtask($uid,$pid,$info)
    {
          $servername='localhost';
       $dbname="jobbureau";
       $username='root';
       $password="";


        $query1="select p.name,c.company_name from projects p,company c where p.cid=c.cid and pid=".$pid."";
        $row=(mysql_fetch_array(mysql_query($query1)));
       // $query="INSERT INTO action_log VALUES('".$uid."',3,'".$pid."','".$info."','I completed the task -> \"$row[0]\" of \"$row[1]\" ',NOW())";
       // mysql_query($query) or die("error");
         try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO action_log VALUES(?,3,?,?,'I completed the task -> \"$row[0]\" of \"$row[1]\" ',NOW())");
    $userid=$uid;
    $pacid=$pid;
    $info=$info;
    $stmt->execute([$userid,$pacid,$info]);
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

    }

    function log_action($uid,$date)
    {
        $query2="SELECT * FROM action_log where uid='".$uid."' and timestamp like '".$date."%' order by timestamp DESC";
        $res2=mysql_query($query2) or die("error");
        return $res2;
    }
	function get_action($uid)
    {
        $query2="SELECT * FROM action_log where uid='".$uid."'  order by timestamp DESC";
        $res2=mysql_query($query2) or die("error");
        return $res2;
    }
/*function del_company($cid)
    {

        $query1="DELETE FROM company where cid='".$cid."'";
        $res1=mysql_query($query1) or die("error");

    }
*/

/*function get_action($uid)
    {
         $query2="SELECT * FROM action_log where uid='".$uid."'";
        $res2=mysql_query($query2) or die("error");
        return $res2;
    }
    */



}
?>
