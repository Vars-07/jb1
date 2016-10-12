<?php
include_once("database.php");
$db=new Database();
$db->connect();


session_start();
 if(strcmp($_SESSION['usertype'],"admin")==0)
 {
   
    $pid=$_GET['pid'];
	$sql="select * from projects where pid='".$pid."'";
    $data1=mysql_query($sql);
     $res=mysql_fetch_array($data1);


    $query="select p.package_id,p.name,p.money from package p join project_requirement pr on(p.package_id=pr.package_id) where pr.pid=".$pid." order by pr.package_id";
	$data=mysql_query($query);
     $pname=$res['name'];
     echo"<h3 align='left'>Project Id $pid &nbsp;&nbsp;&nbsp;&nbsp;$pname </h3> ";
	echo "<table border='1'>";
	echo "<tr><td>Package id</td><td>Package</td><td>Money</td><td>Action</td></tr>";
	while($row=mysql_fetch_array($data))


    {echo "<tr>";
		 echo "<td>";
		 echo $row[0];
		 echo "</td><td>";
		 echo $row[1];
         echo "</td><td>";
         echo $row[2];
         echo "</td><td>";
                 ?><a href="removeprojectreq.php?pid=<?php echo $pid;?>&pacid=<?php echo $row[0]?>">Remove</a>
            <?php
 
        

		  echo "</td></tr>";
		}
	echo "</table>";
}
else
{

     header("Location: index.php?value=You are not allowed to log in");
}
?>	