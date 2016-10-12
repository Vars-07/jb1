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




</head>

<body>
<div class="con1">
    <?php include 'headerindex.php' ?>

    <div class="con2">
        <div class="con3">

            <!-- <?php include 'menu.php' ?> -->


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>

                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div class="clr">


                                <h1 align="center">Feedback</h1>
                                <br><br>
                                <font size=2>

                                        <table width="100%" border="0" cellpadding="4" cellspacing="10">
                                         <tr>
                                             <th><h2>Sno</h2></th>

                                          <th><h2>UserId</h2></th>
                                             <th><h2>Name</h2></th>
                                             <th><h2>Type</h2></th>

                                             <th width="50%"><h2>Message</h2></th>
                                             <th width="15%"><h2>Time</h2></th>
                                            </h2>
                                         </tr>
                                            <?php
                                             if ($error == 1) {

                                            $msg = "Offer Released :D";


                                        }
                                            $sno=1;
                                            $sql = "SELECT * FROM feedback ";
                                            $data = mysql_query($sql);
                                            while ($row = mysql_fetch_array($data))
                                            {
                                                 ?>
                                                <tr>
                                                    <td align="center"><?php echo $sno;?></td>

                                                  <td id="uid" align="center"> <?php echo $row[0];?></td>
                                                <td align="center"><?php echo $row[1];?></td>

                                                <td align="center" width="15%"><?php echo $row[2];?></td>
                                                 <td align="center"><?php echo $row[3];?></td>
                                                <td width="10%" align="center"><?php echo $row[4];?></td>
                                               

                                                </td>


                                                </tr><?php
                                            $sno++;
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

