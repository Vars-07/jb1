<?php
session_start();
if ($_SESSION['id'] != null) {
    $id = $_SESSION['id'];
    include_once('database.php');
    $db = new Database();
    $db->connect();


    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Job Bureau</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href="fly/style.css" rel="stylesheet" type="text/css">
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css"/>
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jq_slideshow.js"></script>
        <script type="text/javascript" src="js/jquery-1.2.2.pack.js"></script>

<style type="text/css">

.ajaxtooltip{
position: absolute; /*leave this alone*/
display: none; /*leave this alone*/
width: 200px;
left: 0; /*leave this alone*/
top: 0; /*leave this alone*/
    -webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;border:2px solid #0F0D0D;background:rgba(28,27,27,0.8);-webkit-box-shadow: #B3B3B3 10px 10px 10px;-moz-box-shadow: #B3B3B3 10px 10px 10px; box-shadow: #B3B3B3 5px 5px 5px;

}

</style>

<script type="text/javascript" src="js/ajaxtooltip.js">

/***********************************************
* Ajax Tooltip script- by JavaScript Kit (www.javascriptkit.com)
* This notice must stay intact for usage
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
***********************************************/

</script>


    <style type="text/css">
        #pic {
            border: solid 1px;
            margin-right: 50px;
            margin-top: 20px;
            width: 100px;
            height: 120px;
            float: right;
        }

        #info {

            margin-top: 20px;
            width: 400px;
            height: 150px;
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


                    <div class="clr">


                        <div id="contentWrapLeft">

                            <?php
$query1 = "select * from projects p,company c where p.cid=c.cid and p.pid  IN(select p.pid from projects p join completed_project cp
on (p.pid=cp.pid) where uid='" . $id . "' and p.level=1)";
							$res1 = mysql_query($query1);
                                                                            $count = 0;
                            echo "<h1 align='left'>Completed Projects</h1><br><br></bt>";
                            echo "<h2>Level 1</h2><br><br><hr><br>";
                            if ($res1) {
                                while ($data1 = mysql_fetch_array($res1))
                                {
                                    $count++;


                                    ?>

                                    <div class="productWrap" id="project_<?php echo $count;?>">
                                        <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">

                                        <a href="#" title="ajax:tooltip1.php?value=<?php echo $data1[0]; ?>">    <img src="<?php echo $data1[17];?>" border="none" id="img<?php echo $data1[1]; ?>"
                                                 style="cursor: pointer"
                                                 width="100px" height="100px"
                                                 alt="Product<?php echo $count;?>"></a>
                                        </div>
                                        <div class="productNameWrap">
                                            <?php echo $data1[1]; ?>
                                        </div>
                                        <div class="productPriceWrap">
                                            <!-- <div class="productPriceWrapLeft">
                                                       BY:<?php //echo $data[15]; ?>
                                                    </div>-->
                                            <div class="productPriceWrapRight">
                                                <a productID=<?php echo $count;?>" onclick=" return false;">

                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                    <?php

                                }
                            }
                            ?>


                        </div>

                        <div id="contentWrapLeft">

                            <?php  // include ('product.php');
$query2 = "select * from projects p,company c where p.cid=c.cid and p.pid  IN(select p.pid from projects p join completed_project cp
on(p.pid=cp.pid) where uid='" . $id . "' and p.level=2)";
							$res2 = mysql_query($query2);
                            echo "<br><hr><br><h2>Level 2</h2><br><br><hr><br>";
                            if ($res2) {


                                while ($data2 = mysql_fetch_array($res2))
                                {
                                    $count++;


                                    ?>

                                    <div class="productWrap" id="project_<?php echo $count;?>">
                                        <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">

                                       <a href="#" title="ajax:tooltip1.php?value=<?php echo $data2[0]; ?>">        <img src="<?php echo $data2[17];?>" border="none" id="img<?php echo $data2[1]; ?>"

                                                 style="cursor: pointer"  width="100px"
                                                 height="100px"
                                                 alt="Product<?php echo $count;?>"></a>
                                        </div>
                                        <div class="productNameWrap">
                                            <?php echo $data2[1]; ?>
                                        </div>
                                        <div class="productPriceWrap">
                                            <!-- <div class="productPriceWrapLeft">
                                                       BY:<?php //echo $data[15]; ?>
                                                    </div>-->
                                            <div class="productPriceWrapRight">
                                                <a productID=<?php echo $count;?>" onclick=" return false;">

                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                    <?php

                                }
                            }
                            ?>


                        </div>


                        <div id="contentWrapLeft">

                            <?php  // include ('product.php');
$query3 = "select * from projects p,company c where p.cid=c.cid and p.pid  IN(select p.pid from projects p join completed_project cp
on(p.pid=cp.pid) where uid='" . $id . "' and p.level=3)";
							$res3 = mysql_query($query3);
                            echo "<br><hr><br><h2>Level 3</h2><br><br><hr><br>";
                            if ($res3) {


                                while ($data3 = mysql_fetch_array($res3))
                                {
                                    $count++;


                                    ?>

                                    <div class="productWrap" id="project_<?php echo $count;?>">
                                        <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">

                                            <a href="#" title="ajax:tooltip1.php?value=<?php echo $data3[0]; ?>">   <img src="<?php echo $data3[17];?>" border="none" id="img<?php echo $data3[1]; ?>"

                                                 style="cursor: pointer" width="100px"
                                                 height="100px"
                                                 alt="Product<?php echo $count;?>"></a>
                                        </div>
                                        <div class="productNameWrap">
                                            <?php echo $data3[1]; ?>
                                        </div>
                                        <div class="productPriceWrap">
                                            <!-- <div class="productPriceWrapLeft">
                                                                                BY:<?php //echo $data[15]; ?>
                                                                             </div>-->
                                            <div class="productPriceWrapRight">
                                                <a productID=<?php echo $count;?>" onclick=" return false;">

                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                    <?php

                                }
                            }
                            ?>


                        </div>


                    </div>


                </div>
            </div>
            <div class="right_col">
                <div class="right_col_latest_matches">
                    <div class="right_col_header">
                        <span>+ Latest <span>Matches</span></span>
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

        <?php include('footer.php') ?>
    </div>
</div>
</div>
</body>
</html>
                            <?php

}
else {
    header("Location:index.php?error=login");
}
?>

