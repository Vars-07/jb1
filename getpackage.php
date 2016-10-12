<?php
$q=$_GET["pid"];

include_once('database.php');
$db=new Database();
$db->connect();
$sql="SELECT * FROM package WHERE package_id = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1' width='100%' >
<tr>
<th>PackageID</th>
<th>Type</th>
<th width='40%'>Name</th>
<th width='30%'>Description</th>

<th width='20%'>Money</th>

</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><h3>" . $row[0] . "</h3?</td>";
  echo "<td><h3>" . $row[1] . "</h3?</td>";
  echo "<td><h3>" . $row[2] . "</h3?</td>";
   echo "<td><h3>" . $row[3] . "</h3?</td>";
   echo "<td><h3>" . $row[4] . "</h3?</td>";


  echo "</tr>";
  }
echo "</table>";


?> 