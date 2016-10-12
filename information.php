<?php
session_start();
include("database.php");
$db=new Database();
$db->connect();

$pid=$_GET['value'];
$query="select * from projects p join company c on (p.cid=c.cid) where pid='".$pid."'";
$res=mysql_query($query);
$data=mysql_fetch_array($res);
$path=$data['logo'];
//echo "<img src='".$path."'  height='200' width='200'>";


$query1="select * from package p join project_requirement pr on(p.package_id=pr.package_id) where pid='".$pid."'";
$result=mysql_query($query1);




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
            height: 150px;

            margin-left: 10px;
            font-family: cursive;
            color: #FFFFFF;
            float: left;
        }
        #main{
            width:600px;
            height: 450px;

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

<div id="main" style=" font-family: Georgia;font-size: small; ">



    <table border="0" cellspacing="3" cellpadding="3" width="100%">
        <tr><td colspan="2" style="color: white;"><b>Project Details</b></td></tr>
        <tr >
            <td rowspan="7" width="40%">
                <div id="img">
                    <img src='<?php echo $data['logo'];  ?>'  height='150px' width='150px'>
                </div>
            </td>
        </tr>
        <tr>   <td > <font color="#ffffff"> <b><?php echo $data['name']; ?></font></td></tr>
        <tr>   <td ><font color="#ffffff"> By:&nbsp;<b><?php echo $data['company_name']; ?></font></td></tr>
        <tr>   <td > <font color="#ffffff">Experience:&nbsp;<b><?php echo $data['experience']; ?>Hrs</font></td></tr>
        <tr>   <td ><font color="#ffffff"> Money:&nbsp;<b><?php echo $data['money']; ?></font></b></td></tr>
        <tr>   <td ><font color="#ffffff"> Battery Required:&nbsp;<b><?php echo $data['battery']; ?>%</font></b></td></tr>
        <tr>   <td ><font color="#ffffff"> Level:&nbsp;<b><?php echo $data['level']; ?></b></font></td></tr>

        <tr><td colspan="2"><hr></td></tr>

        <tr></tr>

    </table>

    
    <table border="0" cellpadding="5" cellspacing="5" width="100%" >
        <td colspan="5" style="color: white;"> Package Required</td><?php if($data['level']!=0){?><td align="right"><a href="projectreq.php?pid=<?php echo $data[0];?>" > Buy these Packages..</a></td><?php } ?></tr>
        <tr></tr>
<?php
	  	$i =0;
        while($details=mysql_fetch_array($result))
        {
            $name=$details[2];

            $logo=$details[5];
            $cost=$details[4];


            //  $pack=mysql_fetch_array($name);
            $i++;
            // $str = "Rs".$rowpack['money'];
            if($i%2 == 1){
                echo "<tr>";

                echo "<td align='center'><img src='$logo' width='70' height='70'></td>";
                echo "<td ><font size='-1' color='#ffffff'>$name<br></font><font size='-1' color='#ffffff'>Rs. &nbsp;$cost<br></font></td>";

            }
            else
            {
                echo "<td>";

                echo "<td align='center'><img src='$logo' width='70' height='70'></td>";
                echo "<td ><font size='-1' color='#ffffff'>$name<br></font><font size='-1' color='#ffffff'>Rs. &nbsp;$cost<br></font></td>";
                echo "</td>";
            }
            if($i%2 == 0)
            {
                echo "</tr>";
            }
        }
        ?>



    </table>



</body>
</html>