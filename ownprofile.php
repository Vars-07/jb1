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
    $pic=$res['pic'];
    if($pic==null)
    {
        $location="user_pics/default.png";
    }
    else{
        $location=$pic;
    }

    $rank=1;
$sql="select * from profile where usertype='user' and flag=0 order by experience desc ,money desc";
$query=mysql_query($sql);

while($data=mysql_fetch_array($query))
{
    if(strtolower($data['uid'])==strtolower($_SESSION['id']))
    {
        break;
    }
    else
    {
            $rank++;
    }
}


/*
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
*/
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau-Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" />




    <script type="text/javascript" language="JavaScript" src="js/jquery-latest.js"> </script>




    <link href="fly/style.css" rel="stylesheet" type="text/css">




  <script type='text/javascript' src='js/jquery.js'></script>
  
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />





    <script type="text/javascript">


        $(document).ready(function(){

            //Hide (Collapse) the toggle containers on load
            $("#img").hide();

            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $("#upload").click(function(){
                $('#img').slideToggle("fast");
                return false; //Prevent the browser jump to the link anchor
            });


            $("#nickupdate").hide();

            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $("#nick").click(function(){
                $('#nickupdate').slideToggle("fast");
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
                    ////console.log(key);
                    //key1=split("##",key);
                    ////console.log(key1);
                    key1=key.split("##");
                   // //console.log(key1[2]);

                    if(key1[0]==1)
                    {
                         //alert("recharged by 10%");
                        details(key1[1],key1[2]);
                    }
                    else if(key1[0]==2)
                    {
                        //      $('#basic-modal-content').load('errors.php?value=3').modal();
                        $('#basic-modal-content').load('errors.php?value=3' , function(response, status, xhr) {
                            if (status == "error") {
                                /*var msg = "Sorry but there was an error: ";
                                $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                $('#simplemodal-container').css('height','auto');*/
                               // //console.log(status);
                            }
                            else{
                                // //console.log(status);
                            }
                        }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'},1000);
                        //alert("Already 100!");
                    }
                    else if(key1[0]==3)
                    {
                       //$('#basic-modal-content').load('errors.php?value=4').modal();
                        // $('#basic-modal-content').load('errors.php?value=4').modal();
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
                        //alert("No Money!");

                    }

                }
            }

            xmlhttp.open("GET","recharge.php",true);
            xmlhttp.send();


        }
    </script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
 $(document).ready(function() {          
        setInterval('AutoRefreshPage()', 60000);  
    });  
  
    function AutoRefreshPage() { location.reload(); }  
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
            height: 220px;
            position: relative;

        }

    </style>
</head>

<body>
<div class="con1">
    <?php include('header.php'); ?>

    <div class="con2">
        <div class="con3">

            <?php include ('menu.php'); ?>
            <?php include ('feedback.php'); ?>


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>
                    <div class="main_news_con">
                        <div id="pic"><p><img src="<?php echo $location;  ?>" alt="no img" width="100px" height="120px"></p> <p id="upload" style="cursor: pointer"> +Upload new Image</p>
                            <form method="post" enctype="multipart/form-data" action="uploaduserimg.php?value=0"> <p id="img" ><input type="file" name="image" size="12"><input name="Submit" type="submit" value="Submit"> </p></form>
                        </div>

                        <div id="info">
                            <p><h1>Personal Information:</h1><br /><br />


                            <!--  <p><h2>Nick:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res['nick'] ?>&nbsp;&nbsp;&nbsp;<label id="nick" style="cursor: pointer; color:#00cc00;
    font-size:11px; font-family:Arial, Helvetica, sans-serif;"> +Edit</label></h2>
                            <form method="post"  action="uploaduserimg.php?value=1"> <p id="nickupdate" ><input type="text" name="nick" size="18"><input name="Submit" type="submit" value="Rename"> </p></form>
                            </p><br/>
                          <p><h2>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res['name'] ?></h2></p><br/>
                            <p><h2>Email :&nbsp;&nbsp;<?php echo $res['email'] ?></h2></p><br/>
                            <p><h2>College:&nbsp;&nbsp;&nbsp;<?php echo $res['college'] ?></h2></p><br/>
                            <p><h2>Rank:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rank ;?></h2></p><br/><br />-->

                            <table cellpadding="8" cellspacing="10" width="100%" border="0">

                                <tr> <td width="30%"><h2>Nick:</h2></td>
                                    <td><h2><?php echo $res['nick'] ?>&nbsp;&nbsp;&nbsp;<label id="nick" style="cursor: pointer; color:#00cc00;
    font-size:11px; font-family:Arial, Helvetica, sans-serif;"> +Edit</label></h2>
                                        <form method="post"  action="uploaduserimg.php?value=1"> <p id="nickupdate" ><input type="text" name="nick" size="18"><input name="Submit" type="submit" value="Rename"> </form>
                                    </td>

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
                                <tr> <td width="30%"><h2>Rank:</h2></td>
                                    <td><h2><?php echo $rank; ?></h2></td>
                                </tr>

                            </table>

                        </div>

                        <div class="main_news_post">
                        </div>
                        <div class="main_news_post">
                            <table border="0" width="100%">
                                <tr> <td><h2>Recharge Point:</h2>
                                    <p>Click on the image to recharge the battery!</p><br /><br />
                                  <h2 align="left">Battery: &nbsp;<label id="battery"><?php echo $res['battery'];?></label>%</h2>
									
									</td> <td valign="bottom"><h2 align="center">Money:&nbsp; Rs. <label id="money"><?php echo $paisa; ?></label></h2></td>
                                </tr>
                                <br/>
                            </table>
                            <img title="Rs. 2000 per 10% Battery" src="images/recharge.jpg " onclick="loadXMLDoc()"   align="middle" style="margin-left:100px;cursor: pointer"   />

                        </div>
                    </div>
                </div>
                <div class="right_col">
                       <div class="right_col_latest_matches">
                        <div class="right_col_header">
                            <span>+ Quick <span>Links</span></span>
                        </div>
                        <div class="sponsor_img_con5">
                            <div class="footer_list1">
                                <ul>
                                    <li style="font-family: comic sans ms"><a href="ownprofile.php"><img src="images/profile-icon.png" width="40px" height="40px" style="border: none;" />Profile</a></li>
                                    <li><a href="configration.php"><img src="images/Configuration_icon.png" width="40px" height="40px" style="border: none;" />Configurations</a></li>
                                    <li><a href="userprojectcompleted.php"><img src="images/complete-icon.png" width="40px" height="40px" style="border: none;" />Projects Completed</a></li>
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
    header("Location:index.php?error=login first");
}
?>

