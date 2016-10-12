<?php
session_start();
$id=$_SESSION['id'];
include_once('database.php');
$db=new Database();
$db->connect();
// use to show packages required to do a particular job redirected from information.php

$pid=$_GET['pid'];

$query="select * from package where package_id NOT IN (select package_id from user_package where uid='".$id."') and package_id IN(select package_id from project_requirement where pid='".$pid."')order by name";
$res=mysql_query($query);




$query1="select money from profile where uid='".$id."'";
$res1=mysql_query($query1);
$paisa=mysql_fetch_array($res1);

$_SESSION['packagemarket']['usermoney']=$paisa['money'];
$_SESSION['packagemarket']['totalbuy']=0;
$_SESSION['count']=1;
$_SESSION['purchased']=0;
//print_r($_SESSION['packagemarket']['totalbuy']);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css" />
    <!--SlideShow Files -->
    <!--<link rel="stylesheet" type="text/css" href="slideshow.css" />
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jq_slideshow.js"></script>
    <script type="text/javascript" src="js/page.js"></script>-->
    <style type="text/css">
        div#wn	{
            position:relative;
            width:600px; height:700px;
            overflow-y:hidden;
            overflow-x:hidden;

        }

        #container ul { list-style: none; }
        #container .buttons { margin-bottom: 20px; }

        #container .list li { width: 100%; border-bottom: 1px dotted #CCC; margin-bottom: 10px; padding-bottom: 10px; }

        #container .grid li { float: left; width: 30%; height: 150px; border-right: 1px dotted #CCC; border-bottom: 1px dotted #CCC; padding: 20px; }
    </style>
	
    <link href="fly/style.css" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" src="fly/jquery-1.js"></script>
	
    <script type="text/javascript" src="fly/custom1.js"></script>
	
    <script type="text/javascript">window.addEventListener('load', function() {document.addEventListener('DOMNodeInserted', function(e) {if(e.target.tagName.toLowerCase() == 'object' || e.target.tagName.toLowerCase() == 'embed'){try{FlashFirebug_init();}catch(e){}}}, false);try{FlashFirebug_init();}catch(e){}},false);</script><script type="text/javascript">window.addEventListener('load', function() {document.addEventListener('DOMNodeInserted', function(e) {if(e.target.tagName.toLowerCase() == 'object' || e.target.tagName.toLowerCase() == 'embed'){try{FlashFirebug_init();}catch(e){}}}, false);try{FlashFirebug_init();}catch(e){}},false);</script>
    <script src="js/dw_event.js" type="text/javascript"></script>
    <script src="js/dw_scroll.js" type="text/javascript"></script>
    <script src="js/scroll_controls.js" type="text/javascript"></script>
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
   <link href="css/smart_cart.css" rel="stylesheet" type="text/css">
   <link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>

    <script type="text/javascript">

        //alert('<?php echo $_SESSION['packagemarket']['usermoney'];  ?>')

        function init_dw_Scroll() {
            var wndo = new dw_scrollObj('wn', 'lyr1');
            wndo.setUpScrollControls('scrollLinks');
        }

        // if code supported, link in the style sheet and call the init function onload
        if ( dw_scrollObj.isSupported() ) {
            //dw_Util.writeStyleSheet('css/scroll.css');
            dw_Event.add( window, 'load', init_dw_Scroll);
        }




    </script>
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
                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div class="clr">





                            </div>
                        </div>
                        <div class="main_news_post">
                            <div class="clr">

                                <div id="scrollLinks">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="mouseover_up" href="#"><img src="images/up.jpg" alt="" border="0" height="40px" height="40px" /></a>

                                        <a class="mouseover_down" href="#"><img src="images/down.jpg" alt="" border="0" height="40px" height="40px"  style="margin-left: 500px"/></a>

                                </div>

                                <div id="wn">
                                    <div id="lyr1">
<?php

    //$data=get_companyname();
    /* while($data=mysql_fetch_array($res))
{
//echo "<option value='$res[0]'>$res[1]</option>";
?>
<div id="container">


<ul class="list">
<li><div id="package">
<div id="packageimg"><img src="<?php echo $data[5];?>"  width="130" height="139" /></div>
<div id="packagedetails"><h2><?php echo $data[2];?></h2>
<p><?php echo $data[3];?></p>
<p><h3><?php echo $data[4];?></h3></p>
<p></p>
<p> <input type="image" src="images/add.jpg" width="160px" height="35px" id="<?php echo $data[0]; ?>" alt="submit button" onclick="add()"/>
</p>

</div>
</div></li>


</ul>
</div>
<?php
    }*/
    ?>


    <div id="contentWrapLeft">
        <?php // include ('product.php');
        $count = 0;

        while($data=mysql_fetch_array($res))
        { $count++;
            //echo "<option value='$res[0]'>$res[1]</option>";
            ?>
            <div class="productWrap" id="package_<?php echo $count;?>">
                <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">
                    <img src="<?php echo $data[5];?>" width="100px" height="100px" alt="Product<?php echo $count;?>">
                </div>
                <div class="productNameWrap">
                    <?php echo $data[2]; ?>
                </div>
                <div class="productPriceWrap">
                    <div class="productPriceWrapLeft">
                        Cost: Rs. <?php echo $data[4]; ?>
                    </div>
                    <div class="productPriceWrapRight">
                        <a href="#" productID=<?php echo $count;?>" onclick="return false;">
                        <img src="fly/add-to-basket2.gif" alt="Add To Basket" title="Package Id:<?php echo $data[0]; ?>" id="featuredProduct_<?php echo $count;?>" width="111" height="32">
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





                        </div>
                    </div>
                </div>


                <div class="right_col">
                    <div class="right_col_latest_matches">
                        <div class="right_col_header">
                            <span>+ Search By <span>Keyword</span></span>

                        </div>
                        <form action="searchpackage.php" method="get">
                            &nbsp;&nbsp;&nbsp;&nbsp;   <input type="submit" value="Search"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="param" size="20"/>
                        </form>

                        <div class="sponsor_img_con">
                            <div class="footer_list1">
                                <ul>
                                    <li ><a href="filteredpackage.php?param=L2H" style="margin-left: 100px">Low To High</a></li>
                                    <li><a href="filteredpackage.php?param=H2L" style="margin-left: 100px">High To Low</a></li>
                                    <li><a href="filteredpackage.php?param=soft" style="margin-left: 100px">Software</a></li>
                                    <li><a href="filteredpackage.php?param=hard" style="margin-left: 100px">Hardware</a></li>
                                </ul>
                                <div class="footer_list_divider"></div>
                            </div>
                        </div>

                        <div id="contentWrapRight" style=" float: left;width: 348px; margin-top: 1px;">
                            <div id="basketWrap">
                                <div id="basketTitleWrap">
                                    <div class="right_col_header">
                                        <span>+ Your <span>Basket</span></span> <span id="notificationsLoader"></span>
                                    </div>


                                </div>
                                <div id="basketItemsWrap">
                                    <ul id="productTaken">

                                    </ul>

                                </div>
                            </div>

                            <div class="right_col_sub_header">

                                <span style="margin-left: 40px">+ Total <span>amount:&nbsp;</span></span><label id="total">Rs. 0</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>+Balance&nbsp;&nbsp;</span><label id="rem">Rs.<?php echo $paisa['money']; ?></label>

                            </div>


                            <a class="scCheckoutButton" href="confirmpurchase.php">Checkout</a>


                        </div>

                    </div>

                    <!-- <div class="right_col_latest_threads">
                        <?php include('side.php'); ?>
                        <?php include('sponsor.php');?>
                    </div>-->
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

