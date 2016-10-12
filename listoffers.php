<?php
session_start();

include_once('database.php');
$db = new Database();
$db->connect();

if (strcmp($_SESSION['usertype'], "admin") == 0) {
    $error = $_GET['error'];



    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Job Bureau</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css"/>
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jq_slideshow.js"></script>
 <script type="text/javascript">
 /*   function release(flag,pid)
    {
        
    if (flag=="" && pid=="" )
      {
     // document.getElementById("flag").innerHTML="";
      return;
      }
    if (window.XMLHttpRequest)
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
        document.getElementById("flag").innerHTML=xmlhttp.responseText;
        }
      }
    xmlhttp.open("GET","releaseoffers.php?flag="+flag+"&pid="+pid,true);
    xmlhttp.send();
     //window.location.href="listoffers.php?error=4";
    }
*/

    </script>



</head>

<body>
<div class="con1">
    <?php include 'headerindex.php' ?>

    <div class="con2">
        <div class="con3">



            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>

                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div class="clr">


                                <h2 align="center">Offers</h2>
                                <br><br>
                                <font size=2>

                                        <table width="100%" border="0" cellpadding="4" cellspacing="10">
                                         <tr>
                                          <th >Packageid</th>
                                             <th>Type</th>
                                             <th>Desc</th>

                                            
                                             <th>isvisible</th>
                                             <th>Release</th>
                                             <th>isvisible</th>
                                             <th>Release</th>
                                         </tr>
                                            <?php
                                             if ($error == 1) {

                                            $msg = "Offer Released :D";


                                        }

                                            $sql = "SELECT * FROM offer ";
                                            $data = mysql_query($sql);
                                            while ($row = mysql_fetch_array($data))
                                            {
                                                 ?>
                                                <tr>
                                                  <td id="pid"> <?php echo $row[0];?></td>
                                                <td align="center"><?php echo $row[1];?></td>

                                                <td align="center" width="15%"><?php echo $row[2];?></td>
                                               <!--  <td align="center"><?php echo $row[3];?></td>
                                                <td width="10%" align="center"><?php echo $row[4];?></td>
                                                <td width="10%" align="center"><?php echo $row[5];?></td>-->
                                                 <td id="flag" align="center"><?php echo $row[7];?></td>
                                                <td width="10%" align="center"> 
                                                   <!-- <select name="release1" onchange="release(this.value,'<?php echo $row[0]; ?>')">

                                                    <option value=1>
                                                         Release
                                                    </option>
                                                      <option value=0>
                                                         Discontinue
                                                    </option>
                                                </select>
                                                -->
                                             <a href="releaseoffers.php?flag=1&pid='<?php echo $row[0];?>'">Offer of the day</a><br>
                                             <a href="releaseoffers.php?flag=0&pid='<?php echo $row[0];?>'">Discontinue</a><br>
                                              
                                                </td>
<td id="flag" align="center"><?php echo $row[8];?></td>
<td width="10%" align="center"> 
                                                   <!-- <select name="release1" onchange="release(this.value,'<?php echo $row[0]; ?>')">

                                                    <option value=1>
                                                         Release
                                                    </option>
                                                      <option value=0>
                                                         Discontinue
                                                    </option>
                                                </select>
                                                -->
                                             <a href="releaseoffers.php?fl=1&pidw='<?php echo $row[0];?>'">Offer of the hour</a><br>
                                             <a href="releaseoffers.php?fl=0&pidw='<?php echo $row[0];?>'">Discontinue</a><br>
                                              
                                                </td>


                                                </tr><?php

                                            }
                                            ?>
                                            <tr>
                                        </table>
                                </font>

                            </div>
                        </div>
                        <div class="main_news_post">
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
                <div class="right_col">
                    <div class="right_col_latest_matches">

                       <div class="right_col_header">
                  <center>  <a href="admin.php" ><font color="white" size="3"> Main Page</font></a></center>
                        </div>

                        <div class="right_col_header">
                            <center><a href="logout.php"><font color="white" size="3"> Logout</font></a></center>
                        </div>


                    </div>

                    <div class="right_col_latest_threads">
                        <?php include('side.php'); ?>


                        <?php include('sponsor.php');?>
                    </div>


                </div>


                <div class="clr"></div>
            </div>

            <?php include('footer.php')?>
        </div>
    </div>
</div>
</body>
</html>
                                            <?php

}
else
{
    header("Location:index.php?error=4");
}
?>
