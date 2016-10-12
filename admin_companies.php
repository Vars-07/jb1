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

    echo("<h1 align='center'>Companies</h1>");
        echo "<table cellpadding=\"3\" cellspacing=\"3\" border=\"2\" align=\"center\" width=\"100%\"><tr><td>CID</td><td>Name</td><td>Description</td><td>Logo</td><td>Remove</td><td>Usage</td></tr>";


    $query="SELECT * from company order by cid";

	$data=mysql_query($query);

	while($rows=mysql_fetch_array($data))
	{
        $sql="Select count(*) from projects where cid='".$rows[0]."'";

        $res=mysql_fetch_array( mysql_query($sql));
		echo "<tr><td>$rows[0]</td>

		<td>$rows[1] </td><td>$rows[2]</a></td><td>$rows[3]</td><td><a href='removecompany.php?cid=".$rows[0]."'>Remove</a></td><td>$res[0]</td></tr>";

	}
	echo "</table>";
}
else
{
    header("Location: index.php?value=You are not allowed to log in");


}


?>

