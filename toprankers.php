<?php
session_start();
if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include_once('database.php');
    $db=new Database();
    $db->connect();
    $db->select('profile','*',"uid='".$id."'");
    $res=$db->getResult();
    $exp=$res['experience'];
    $paisa=$res['money'];


    $dat = mysql_query("SELECT DISTINCT experience FROM profile ORDER BY experience DESC");
    $rank = 1;
    $sss = 0;
    while ($ro = mysql_fetch_array($dat))
    {
        $data = mysql_query("SELECT uid FROM profile WHERE experience = " . $ro[0] . " ORDER BY money DESC");
        while ($row = mysql_fetch_array($data))
        {
            $query2 = "SELECT flag FROM profile where uid = '" . $row[0] . "'";
            $lockuser = mysql_query($query2);

            $datalock = mysql_fetch_array($lockuser);
            if ($row[0] != 'admin' && $datalock[0] != 1) {

                if ($_SESSION['id'] == $row[0]) {
                    $sss = 1;
                    break;

                }
                $rank++;
            }
            if ($sss == 1) {
                break;
            }
        }
        if ($sss == 1) {
            break;
        }
    }

    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="../slideshow.css" />
    <script type="text/javascript" src="../js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>


    <script type="text/javascript">

        $(document).ready(function(){

            //Hide (Collapse) the toggle containers on load
            $("#img").hide();

            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $("#upload").click(function(){
                $('#img').slideToggle("fast");
                return false; //Prevent the browser jump to the link anchor
            });

        });


        function details(battery,money)
        {
            if(battery<=100)
            {
                $('#battery').text(battery);
                $('#money').text(money);
            }
            else
            {
                $('#battery').text("100");
                $('#money').text(money);
            }
        }


        function loadXMLDoc()
        {

            //alert(divid);
            var xmlhttp;

            if (window.XMLHttpRequest )
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();

            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    key=xmlhttp.responseText;
                    //console.log(key);
                    //key1=split("##",key);
                    ////console.log(key1);
                    key1=key.split("##");
                    //console.log(key1[2]);

                    if(key1[0]==1)
                    {
                        // alert("recharged by 10%");
                        details(key1[1],key1[2]);
                    }
                    else if(key1[0]==2)
                    {
                        // $('#basic-modal-content').load('errors.php?value=3').modal();
                        $('#basic-modal-content').load('errors.php?value=3' , function(response, status, xhr) {
                            if (status == "error") {
                                var msg = "Sorry but there was an error: ";
                                $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                $('#simplemodal-container').css('height','auto');
                            }
                            else{

                            }
                        }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'},1000);




                    }
                    else if(key1[0]==3)
                    {
                        //  $('#basic-modal-content').load('errors.php?value=4').modal();
                        $('#basic-modal-content').load('errors.php?value=4' , function(response, status, xhr) {
                            if (status == "error") {
                                var msg = "Sorry but there was an error: ";
                                $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                $('#simplemodal-container').css('height','auto');
                            }
                            else{

                            }
                        }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'},1000);

                    }

                }
            }

            xmlhttp.open("GET","recharge.php",true);
            xmlhttp.send();


        }
    </script>



    <style type="text/css">
        #pic
        {
            border: solid 1px;
            margin-right: 80px;
            margin-top: 20px;
            width: 100px;
            height: 120px;
            float: right;
        }
        #info
        {

            margin-top: 20px;
            width: 400px;
            height: 200px;
            position: absolute;
        }




    </style>
</head>

<body>
<div class="con1">
    <?php include 'header.php' ?>

    <div class="con2">
        <div class="con3">

            . <?php include 'menu.php' ?>


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>
                <div class="main_news_con">


                    <!-- <div class="main_news_post">

                            <div class="clr">
                                <div class="main_news_post">

                                </div>

                            </div>

                            <table  cellspacing="20px">
                                <tr  >
                                    <td width="300px"><h2>Rank:&nbsp;<?php echo $rank ;?> </h2></td>
                                    <td ><h2>Total Players:</h2></td>

                                </tr>



                            </table>


                        </div>-->





                    <h1 align="center">Top Rankers</h1><br><br><br>
                    <table width='100%' border="0" cellpadding="2" cellspacing="8" title="Top 20 Rankers"  >
                        <tr><th style="font-size: 12pt" align="center" width="5%">Rank</th><th>    </th><th style="font-size: 12pt" align="" width="50%">Name</th><th style="font-size: 12pt" align="center" width="25%">Experience</th></tr>
                    </table>
                    <?php

                    $data=mysql_query("select * from profile where usertype='user' and flag=0 order by experience desc ,money desc limit 0,20");
                    $var=1;
                    while($row=mysql_fetch_array($data))
                    {
                        if($row[13]==null)
                        {
                            $location="user_pics/default.png";
                        }
                        else{
                            $location=$row[13];
                        }

                        // echo "<h3>";

                        ?>
                        
                        <table width='100%' border="0" cellpadding="1" cellspacing="1" title='Rank <?php echo $var; ?>' >


                            <tr>
                                <td align="center">
                                    <h1  align="center"><?php echo $var; ?></h1></td>
                                <td width="35%"> <div id="packageimg1"><img src="<?php echo $location;?>"  width="70" height="90" border="solid"  /></div></td>
                                <td> <div id="packagedetails1"><a href='viewprofile.php?value=<?php echo $row[0];?>&name=<?php echo $var;?>'	><h2 style="margin-left: 54px;font-family: cursive;"><?php echo $row[4];?></h2></a>
                                    <p ><h3 style="margin-left: 54px; text-transform: capitalize;"><?php echo $row[1];?></h3></p></div></td>
                                <td><p ><h2 style="margin-left: 54px;"><?php echo $row[8];?> hrs</h2></p></td>
                            </tr>
                            <?php  echo "<br><hr><br>"; ?>

                                </div>



                                <!--  <tr>
                                    <td> <font size='+1'> <?php	 echo $var; ?> </font></td>
                                    <td style="text-transform: capitalize;" align="left">
                                        <font size='+1' >

                                            <a href='viewprofile.php?uid=<?php echo $row[0];?>'	><?php		 echo " $row[1]"; ?></a>
                                        </font>
                                    </td>

                                    <td align='left'>
                                        <font size='+1'>
                                            <?php 	 echo "$row[8] hrs"; ?>
                                        </font>
                                    </td>
                                    <td align='left' >
                                        <font size='+1'>
                                            <?php  echo  $row[9] ?> INR
                                        </font>
                                    </td></tr>
                                </h3>-->

                         </table>

                        <?php
                                                                                                                 $var++;

                    }

                    ?>

                    <div class="clr">
                        <div class="main_news_post">
                        </div>
                    </div>




                </div>
            </div>
            <div class="right_col">
                <div class="right_col_latest_matches">
                    <div class="right_col_header">
                        <h4> <span>+ Quick <span>Links</span></span></h4>
                    </div>
                    <div class="sponsor_img_con5">
                        <div class="footer_list1">
                            <ul>
                                <li style="font-family: comic sans ms"><a href="ownprofile.php"><img src="images/profile-icon.png" width="40px" height="40px" style="border: none;" />Profile</a></li>
                                <li><a href="configration.php" style="cursor: pointer"><img src="images/Configuration_icon.png" width="40px" height="40px" style="border: none;" />Configurations</a></li>
                                <li><a href="userprojectcompleted.php" style="cursor: pointer" ><img src="images/complete-icon.png" width="40px" height="40px" style="border: none;" />Projects Completed</a></li>
                                <!--  <li><a href="#"><img src="images/statistics-icon.png" width="40px" height="40px" />Statistics</a></li>-->
                            </ul>
                            <div class="footer_list_divider"></div>
                        </div>
                    </div>

                </div>

                <div class="right_col_latest_threads">
                    <?php include('side.php'); ?>
                    <?php //include('sponsor.php');?>
                </div>
            </div>
            <div class="clr"></div>
        </div>

        <?php include('footer.php')?>
    </div>
</div>
</div>
<div id="basic-modal-content">


</div>
</body>
</html>
                    <?php
                                                                                    }
else{
    header("Location:index.php?error=login");
}
?>

