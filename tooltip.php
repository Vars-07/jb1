<?php
session_start();
$id=$_SESSION['id'];

include "database.php";
$db= new Database();
$db->connect();

$package_id=$_GET['value'];

$sql="select * from package p join user_package u on(p.package_id=u.package_id) where p.package_id='".$package_id."' and uid='".$id."'";
$data=mysql_fetch_array(mysql_query($sql));

$arr=explode(" ",$data[8]);
?>
 
<html>
<head>
    <style type="text/css">

      
        #main{
            width:200px;

        }



    </style>

</head>
<body>

<div id="main" style=" font-family:Georgia;font-size: small;">



    <table border="0" cellspacing="3" cellpadding="3" width="100%">
     <tr>  <td>  <font color="#ffffff"> <b><?php echo $data[2]; ?></font></td></tr>
        <tr> <td>  <font color="#ffffff"> <b> Rs.&nbsp;<?php echo $data[4]; ?></b></font></td></tr>
        <tr><td>  <font color="#ffffff"><b><?php echo $data[8]; ?></b></font></td></tr>
       


        <tr><td colspan="2"></td></tr>

        <tr></tr>

    </table>





</body>
</html>