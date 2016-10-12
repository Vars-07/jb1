<?php
session_start();
if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include_once('database.php');
    include "action.php";
    $obj1=new ActionLog();
    $db=new Database();
    $db->connect();


    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau- History Details</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css" />
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>


    <script type="text/javascript">

       function loadXMLDoc(type)
    {
        $('#load').html('Loading...');
        var date=document.getElementById("date").value;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp1=new XMLHttpRequest();
      //xmlhttp1=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");

      }
    xmlhttp1.onreadystatechange=function()
      {
      if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
        {
         $('#load').empty();
        document.getElementById("help").innerHTML=xmlhttp1.responseText;

        }
      }


      //bat1=bat1-2;
      //mon=mon+1000;
    xmlhttp1.open("GET","filterhistory.php?par="+type+"&date="+date,true);
    xmlhttp1.send();

    }
	 

       function sortbydate(type)
    {
     $('#load').html('Loading...')
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp1=new XMLHttpRequest();
      //xmlhttp1=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");

      }
    xmlhttp1.onreadystatechange=function()
      {
      if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
        {
        $('#load').empty();
        document.getElementById("help").innerHTML=xmlhttp1.responseText;

        }
      }


      //bat1=bat1-2;
      //mon=mon+1000;
    xmlhttp1.open("GET","filterhistory.php?date="+type,true);
    xmlhttp1.send();

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
            position: relative;

        }

    </style>
</head>

<body>
<div class="con1">
    <?php include 'header.php' ?>

    <div class="con2">
        <div class="con3">

             <?php include 'menu.php' ?>


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>
                    <div class="main_news_con" >
                       



                        <div class="main_news_post">
                            <h1>History</h1><br /> <div id="load"></div>
                        
						<p align="right" style="margin-right:50px;"><select name="date" id="date" onchange="sortbydate(this.value)"> <option value="today">Select Date</option>
							 <option value="2016-10-11">11th oct</option>
							 <option value="2016-10-13">13th oct</option>
							 <option value="2016-10-14">14th oct</option>
						</select ></p>
						
						</div>
                        <div class="main_news_post">
                            <div id="help">

                           
                            
                            <table cellpadding="4" cellspacing="14" width="100%" border="0">
                                <?php
								$todaydate="20".date("y-m-d");
								$out=$obj1->log_action($id,$todaydate);
								
								if(mysql_num_rows($out)!=0)
                    { 
								
                                while($res=mysql_fetch_array($out))
                                {
                                    $array=explode('#',$res['information']);
                                    $timestamp=explode(' ', $res['timestamp']);
                                    $date=explode('-', $timestamp[0]);
                                    echo "<tr><td><h3 style='font-family:times'>";
                                    echo "<b>".$date[2]." Oct.&nbsp;&nbsp;&nbsp;&nbsp;".$timestamp[1]."</b>";
                                    echo "<tr><td><h3 style='font-family:georgia'>";
                                    echo $res['action'];
                                    echo "<br />";
                                    echo "Now my battery : ".$array[1]."% and Experience : ".$array[2]." hrs & Money : Rs".$array[3];
                                    //echo "<hr></h3></td><td width='20%'><h3><hr>";
                                   echo "<br><br><p style='border-bottom:1px solid #D8D5D5'></p>";
                                    //echo "<hr></h3></td></tr>";
                                }
								}
								else
								{
								 echo"<br><br><h2 align='center'> No Log Details For Today </h2>";
								}
                                ?>
                            </table>
                        </div>
						
                        </div>
                    </div>
                </div>
                <div class="right_col">
                    <div class="right_col_latest_matches">
                        <div class="right_col_header">
                            <h4> <span>+ History <span>Filters</span></span></h4>
                        </div>
                        <!-- <div class="sponsor_img_con">
                            <br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="ownprofile.php">Profile</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="conifigration.php">Configuration</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="projectcompleted.php">Projects Completed</a></h3><br />
                            <h3 class="sidelinks" align="left" style="margin-left: 10px"> <a href="ownprofile.php">Stats</a></h3><br />
                        </div>-->

                        <div class="sponsor_img_con1">
                            <div class="footer_list1">
                                <ul>
                                    <li style="font-family: comic sans ms"><a style="cursor:pointer" onclick="loadXMLDoc(2)"><img src="images/services.png" alt="no image"width="40px" height="40px" />Projects</a></li>
                                    <li style="font-family: comic sans ms"><a style="cursor:pointer" onclick="loadXMLDoc(1)"><img src="images/packages.png" alt="no image"width="40px" height="40px" />Packages</a></li>
                                    <li style="font-family: comic sans ms"><a style="cursor:pointer" onclick="loadXMLDoc(0)"><img src="images/histbat.gif" alt="no image"width="40px" height="40px" />Battery</a></li>

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

