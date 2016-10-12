
<?php
session_start();
$id=$_SESSION['id'];

include "database.php";
$db= new Database();
$db->connect();

$pid=$_GET['value'];

$sql="select * from projects p join completed_project u on(p.pid=u.pid) where p.pid='".$pid."' and uid='".$id."'";
$data=mysql_fetch_array(mysql_query($sql));


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

<div id="main" style=" font-family: Georgia;font-size: small; ">



    <table border="0" cellspacing="3" cellpadding="3" width="100%">
     <tr>   <td  align="center"> <font color="#ffffff"> <b><?php echo $data[1]; ?></font></td></tr>
         <tr> <td>  <font color="#ffffff">Level:&nbsp;<b><?php echo $data[8]; ?></font></td></tr>
        <tr> <td>  <font color="#ffffff">Money:&nbsp; Rs<b><?php echo $data[6]; ?></font></td></tr>
        <tr>  <td><font color="#ffffff">Experience:&nbsp;<b><?php echo $data[5]; ?>Hrs</font></td></tr>
        <tr>    <td><font color="#ffffff">Battery:&nbsp;<b><?php echo $data[4]; ?></font></td></tr>
        <tr>   <td> <font color="#ffffff">Start:&nbsp;<b><?php echo $data[16]; ?></font></td></tr>
        <tr>    <td><font color="#ffffff">End:&nbsp;<b><?php echo $data[17]; ?></font></td></tr>


        <tr><td colspan="2"></td></tr>

        <tr></tr>

    </table>





</body>
</html>