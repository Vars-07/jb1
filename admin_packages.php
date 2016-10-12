<?php
session_start();
//include("include_db.php");
include("database.php");
 $db= new database();
$db->connect();
 if(strcmp($_SESSION['usertype'],"admin")==0)
 {

        ?>
   
<?php

    echo("<h1 align='center'>Pacakages</h1>");
        echo "<table cellpadding=\"3\" cellspacing=\"3\" border=\"2\" align=\"center\" width=\"100%\"><tr><td>Package ID</td><td>Type</td><td>Name</td><td>Description</td><td>Money</td><td>Logo</td><td>Remove</td><td>PacUsed</td></tr>";


    $query="SELECT * from package order by package_id";

	$data=mysql_query($query);

	while($rows=mysql_fetch_array($data))
	{
        $sql="Select count(*) from project_requirement where package_id='".$rows[0]."'";

        $res=mysql_fetch_array( mysql_query($sql));
		echo "<tr><td>$rows[0]</td>

		<td>$rows[1] </td><td><a href='editpackage.php?error=4 & pacid=".$rows[0]."' target='_blank'>$rows[2]</a></td><td>$rows[3] </td><td>$rows[4] </td><td>$rows[5] </td><td><a href='removepackages.php?pacid=".$rows[0]."'>Remove</a></td><td>$res[0]</td></tr>";
				
	}
	echo "</table>";
}
else
{
    header("Location: index.php?value=You are not allowed to log in");


}


?>

