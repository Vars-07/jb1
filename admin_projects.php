<?php
session_start();
include("database.php");
$db = new Database();
$db->connect();
 if(strcmp($_SESSION['usertype'],"admin")==0)
 {
   ?>

<?php
 echo("<h1 align='center'>Projects</h1>");
echo "<table cellpadding=\"3\" cellspacing=\"3\" border=\"2\" align=\"center\" width=\"100%\"><tr><td>Project ID</td><td>Name</td><td>Description</td><td>Company ID</td><td>Battery</td><td>Experience</td><td>Money</td><td>Members</td><td>Level</td><td>Is_visible</td><td>remove</td><td>ReqMents</td></tr>";


	$query="SELECT * from projects order by level and pid";

	$data=mysql_query($query);
	while($rows=mysql_fetch_array($data))
	{
		$sql="Select count(*) from project_requirement where pid='".$rows[0]."'";

        $res=mysql_fetch_array( mysql_query($sql));

        echo "<tr><td>$rows[0]</td><td>


<a href='editproject.php?error=4 & pid=".$rows[0]."' target='_blank'>$rows[1]</a> <a href='eachprojectreq.php?error=4 & pid=".$rows[0]."' target='_blank'></a>

		 </td><td>$rows[2] </td><td>$rows[3] </td><td>$rows[4] </td><td>$rows[5] </td><td>$rows[6] </td><td>$rows[7] </td><td>  $rows[8] </td><td>  $rows[9] </td><td> <a href='removeprojects.php?pid=".$rows[0]."'>Remove</a></td><td><a href='eachprojectreq.php?error=4 & pid=".$rows[0]."' target='_blank'>$res[0]</a></td></tr>";
	}
	echo "</table>";
 }else
 {
      header("Location: index.php?value=You are not allowed to log in");

 }




     ?>

