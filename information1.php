<?php
session_start();
include("database.php");
$db=new Database();
$db->connect();

$pid=$_GET['value'];
$query="select * from package where package_id='".$pid."'";
$res=mysql_query($query);
$data=mysql_fetch_array($res);




?>

<html>
<head>
    <style type="text/css">
        #img{
            width: 150px;
            height: 150px;
            float: left;
            border: 3px #FFFFFF;
        }
        #projectinfo{
            width: auto;
            height: auto;

            margin-left: 10px;


            color: #FFFFFF;
            float: left;
        }
        #main{
            width:400px;
            height: auto;

        }
        #required{
            width: 600px;
            height: 150px;
            float: left;
            margin-top: 10px;


        }
        #imgpackage{
            width: 50px;
            height: 50px;
            float: left;
            border: 3px #FFFFFF;
        }


    </style>

</head>
<body>

<div id="main" style=" font-family:Georgia;font-size: small;">



    <table border="0" cellspacing="3" cellpadding="3" width="100%">
        <tr style="color: #F2F2F2;"><td colspan="2" style="color: white;"><b>Package Details</b></td></tr>
        <tr >
            <td rowspan="7" width="40%">
                <div id="img">
                    <img src='<?php echo $data['logo'];  ?>'  height='150px' width='150px'>
                </div>
            </td>
        </tr>
        <div id="projectinfo" style="font-size: xx-small" >
            <tr>   <td > <font color="#ffffff"> <b><?php echo $data['name']; ?></font></td></tr>
            <tr>   <td ><font color="#ffffff"> Details:&nbsp;<b><?php echo $data['description']; ?></font></td></tr>

            <tr>   <td ><font color="#ffffff"> Cost:&nbsp;<b>Rs.&nbsp;<?php echo $data['money']; ?></font></b></td></tr>


            <tr><td colspan="2"><hr></td></tr>
        </div>


    </table>





</body>
</html>