<?php
session_start();
if($_SESSION['id']!=null)
{
    $id=$_GET['value'];
    $rank=$_GET['name'];
    include_once('database.php');

    $db=new Database();
    $db->connect();
    $db->select('profile','*',"uid='".$id."'");
    $res=$db->getResult();
    $exp=$res['experience'];
    $paisa=$res['money'];
    $pic=$res['pic'];
    if($pic==null)
    {
        $location="user_pics/default.png";
    }
    else{
        $location=$pic;
    }
    $query1="select count(*) from user_package where uid='".$id."'";
    $total=mysql_fetch_array(mysql_query($query1));

    $query2="select count(*)from completed_project where uid='".$id."'";
    $total1=mysql_fetch_array(mysql_query($query2));



    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css" />
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>


    <script type="text/javascript">




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
            margin-top: 50px;
            width: 100px;
            height: 120px;
            float: right;
        }
        #info
        {
            margin-top: 20px;
            width: 400px;
            height: 200px;
            position: relative;

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
                        <div id="pic"><p><img src="<?php echo $location;  ?>" alt="no img" width="100px" height="120px"></p>

                        </div>
                        <p><?php echo $res['nick'] ?>'s&nbsp;&nbsp;Profile</p><hr />
                        <div id="info">

                            <p><h1>Personal Information:</h1><br /><br />
                            <!--
                            <p><h2>Nick:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res['nick'] ?></p><br/>
                            <p><h2>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res['name'] ?></h2></p><br/>
                            <p><h2>Email :&nbsp;&nbsp;<?php echo $res['email'] ?></h2></p><br/>
                            <p><h2>College:&nbsp;&nbsp;&nbsp;<?php echo $res['college'] ?></h2></p><br/>-->
                            <table cellpadding="8" cellspacing="10" width="100%" border="0">
                                <tr> <td width="30%"><h2>Nick :</h2></td>
                                    <td><h2><?php echo $res['nick'] ?></h2></td>
                                </tr>

                                 <tr> <td width="30%"><h2>Name:</h2></td>
                                    <td><h2><?php echo $res['name'] ?></h2></td>
                                </tr>
                                 <tr> <td width="30%"><h2>Email:</h2></td>
                                    <td><h2><?php echo $res['email'] ?></h2></td>
                                </tr>
                                 <tr> <td width="30%"><h2>College :</h2></td>
                                    <td><h2><?php echo $res['college'] ?></h2></td>
                                </tr>

                            </table>

                        </div>

                        <div class="main_news_post">
                        </div>
                        <div class="main_news_post">
                            <h1> &nbsp;Game Statistics </h1><br>
                            <table cellpadding="8" cellspacing="10" width="100%" border="0">
                                <tr> <td width="65%"><h2>Rank :&nbsp;&nbsp;<?php echo $rank ;?></h2></td>
                                    <td><h2>Total Packages  : &nbsp;&nbsp;<?php echo $total[0]; ?></h2></td>
                                </tr><tr><td><h2 align="left">Experience :&nbsp;<label id="battery"><?php echo $res['experience'];?> hrs</label></h2>
                            </td>
                                <td><h2>Projects Completed : &nbsp;&nbsp;<?php echo $total1[0]; ?></h2></td>
                            </tr></table>
                            <br/>
                            <br />

                        </div>
                    </div>
                </div>
                <div class="right_col">
                    <div class="right_col_latest_matches">
                        <div class="right_col_header">
                            <h4> <span>+ Quick <span>Links</span></span></h4>
                        </div>
                        <!-- <div class="sponsor_img_con">
                            <br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="ownprofile.php">Profile</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="conifigration.php">Configuration</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="projectcompleted.php">Projects Completed</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="ownprofile.php">Stats</a></h3><br />
                        </div>-->

                        <div class="sponsor_img_con5">
                            <div class="footer_list1">
                                <ul>
                                    <li style="font-family: comic sans ms"><a href="ownprofile.php"><img src="images/profile-icon.png" width="40px" height="40px" />Profile</a></li>
                                    <li><a href="configration.php"><img src="images/Configuration_icon.png" width="40px" height="40px" />Configurations</a></li>
                                    <li><a href="userprojectcompleted.php"><img src="images/complete-icon.png" width="40px" height="40px" />Projects Completed</a></li>

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


 
