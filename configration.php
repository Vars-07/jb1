<?php
session_start();
if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include('database.php');
    $db=new Database();
    $db->connect();
    

    $query1="select count(*) from user_package where uid='".$id."'";
    $total=mysql_fetch_array(mysql_query($query1));

    $query2="select count(*) from package ";
    $total1=mysql_fetch_array(mysql_query($query2));

    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau-Packages Purchased</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="fly/style.css" rel="stylesheet" type="text/css">
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css" />
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
        #pic
        {
            border: solid 1px;
            margin-right: 50px;
            margin-top: 20px;
            width: 100px;
            height: 120px;
            float: right;
        }
        #info
        {

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
                            <div class="main_news_post">
                                <p><h3>Total Packages Purchased:<?php echo $total[0]; ?></h3></p>
                                <p><h3>Total Packages Available:<?php echo $total1[0]; ?></h3></p>
                                <p></p>
                            </div>
                            <div id="contentWrapLeft">
                                <?php // include ('product.php');
                                $count = 0;
								$sql="select * from user_package u,package p where u.package_id=p.package_id and u.uid='".$id."' order by p.name";
								$res = mysql_query($sql);
                                while($data=mysql_fetch_array($res))
                                { $count++;
                                    //echo "<option value='$res[0]'>$res[1]</option>";
                                    ?>
                                    <div class="productWrap" id="project_<?php echo $count;?>">
                                        <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">

                                           <a href="#" title="ajax:tooltip.php?value=<?php echo $data[1]; ?>"> <img src="<?php echo $data[9];?>" border="none" id="img<?php echo $data[1]; ?>"  style="cursor: pointer" width="100px" height="100px" alt="Product<?php echo $count;?>"></a>
                                        </div>
                                        <div class="productNameWrap">
                                            <?php echo $data[6]; ?>
                                        </div>
                                        <div class="productPriceWrap">
                                            <div class="productPriceWrapLeft">
                                                Cost: Rs.<?php echo $data[8]; ?>
                                            </div>
                                            <div class="productPriceWrapRight">
                                                <a productID=<?php echo $count;?>" onclick="return false;">

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
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

            <?php include('footer.php')?>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
else{
    header("Location:index.php?error=login");
}
?>

