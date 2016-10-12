<?php
session_start();

$uid=$_SESSION['id'];
include_once('database.php');
//include("errors.html");
$db=new Database();
$db->connect();


$query="select * from projects p,company c where p.cid=c.cid and p.is_visible=1 and p.pid NOT IN(Select up.pid from projects p1 join undergoing_project up
on(p1.pid=up.pid)
where uid='".$uid."'

UNION

select p.pid from projects p join completed_project cp
on(p.pid=cp.pid)
where uid='".$uid."' and p.level!=0)
order by p.name
";
$res=mysql_query($query);



//$query="select * from projects p,company c where p.cid=c.cid ";
//$res=mysql_query($query);


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
    <script type="text/javascript" src="js/eas.js"></script>

    <script type="text/javascript" language="JavaScript" src="js/jquery-latest.js"> </script>




    <link href="fly/style.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="fly/jquery-1.js"></script>
    <script type="text/javascript" src="fly/custom.js"></script>

    <script src="js/dw_event.js" type="text/javascript"></script>
    <script src="js/dw_scroll.js" type="text/javascript"></script>
    <script src="js/scroll_controls.js" type="text/javascript"></script>
    <script type='text/javascript' src='js/jquery.js'></script>


    <script type="text/javascript" src="js/ajax-dynamic-content.js"></script>


    <!--for modal dialog box-->
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <!-- <script type='text/javascript' src='js/basic.js'></script>-->
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />


    <script type="text/javascript">
        function OverAll(divid)
        {
           // //console.log(divid);
            $(divid).animate({width:'100px',height:'100px'}, 500, 'linear', function() {
                $(divid).addClass('circle-label-rotate');
            }).addClass('circle').html('<div class="innertext">100%</div>').animate({"opacity":"0","margin-left":"510px"},1500,function(){      });
            $(divid).slideUp({duration: 'slow',easing: 'easeOutBounce'});
            $(divid).css('display','none');
        }
    </script>
    <style type="text/css">
        .circle-label-rotate {
            -webkit-animation-name: rotateThis;
            -webkit-animation-duration:2s;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-timing-function:linear;
        }
        @-webkit-keyframes rotateThis {
            from {-webkit-transform:scale(1) rotate(0deg);}
        to {-webkit-transform:scale(1) rotate(360deg);}
                    }
        .circle
        {
            background: url('images/thumbsup.png') no-repeat;
            border-radius: 50px;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            height:100px;
            width:100px;
        }
        #error{
            display: none;
        }
        #package
        {
            height:100px;
            width:300px;
            border:solid 1px #000;
            margin-top:10px;
        }
        .innertext
        {
            padding:40px;
        }


        div#wn	{
            position:relative;
            width:700px; height:700px;
            overflow-y:hidden;
            overflow-x:hidden;
        }

    </style>



    <script type="text/javascript">


        function init_dw_Scroll() {
            var wndo = new dw_scrollObj('wn', 'lyr1');
            wndo.setUpScrollControls('scrollLinks');
        }

        // if code supported, link in the style sheet and call the init function onload
        if ( dw_scrollObj.isSupported() ) {
            //dw_Util.writeStyleSheet('css/scroll.css');
            dw_Event.add( window, 'load', init_dw_Scroll);
        }

        function details(divid)
        {
            //$('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');

            var div="img"+divid;
            $('#basic-modal-content').load('information.php?value='+divid , function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $('#simplemodal-container').css('height','auto');
                }
                else{

                }
            }).modal();
            $('#simplemodal-container').animate({'height':'450px' , 'top':'4%','width':'600px','left':'25%'},1500);



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
                    <!--<a href="" on  <p>&nbsp;</p>-->
                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div class="clr">





                            </div>
                        </div>
                        <div class="main_news_post">
                            <div class="clr">

                                <div id="scrollLinks">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="mouseover_up" href="#"><img src="images/up.jpg" alt="" border="0" height="40px" height="40px" /></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="mouseover_down" href="#"><img src="images/down.jpg" alt="" border="0" height="40px" height="40px" /></a>

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
            <div class="productWrap" id="project_<?php echo $count;?>">
                <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">

                    <img src="<?php echo $data[17];?>" id="img<?php echo $data[0]; ?>" title="Click for Details!" style="cursor: pointer" onclick="details(<?php echo $data[0]; ?>)" width="100px" height="100px" alt="Product<?php echo $count;?>">
                </div>
                <div class="productNameWrap">
                    <?php echo $data[1]; ?>
                </div>
                <div class="productPriceWrap">
                    <!-- <div class="productPriceWrapLeft">
                       BY:<?php //echo $data[15]; ?>
                    </div>-->
                    <div class="productPriceWrapRight">
                        <a productID=<?php echo $count;?>" onclick="return false;">
                        <img src="fly/apply.png" style="cursor: pointer" alt="Add To Basket" title="Project ID : <?php echo $data[0];?>" id="featuredProduct_<?php echo $count;?>" width="111" height="32" >
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
                            <span>+ Project <span>Levels</span></span>
                        </div>

                        <div class="sponsor_img_con">
                            <div class="footer_list1">
                                <ul>
                                    <li ><a href="filteredprojects.php?level=0" style="margin-left: 80px"><img src="images/novice.png" width="40px" height="40px" />Novice</a></li>
                                    <li><a href="filteredprojects.php?level=1" style="margin-left: 80px"><img src="images/beginner.png" width="40px" height="40px" />Beginner</a></li>
                                    <li><a href="filteredprojects.php?level=2" style="margin-left: 80px"><img src="images/pro.png" width="40px" height="40px" />Professional</a></li>
                                    <li><a href="filteredprojects.php?level=3" style="margin-left: 80px"><img src="images/god.png" width="40px" height="40px" />Experienced</a></li>
                                </ul>
                                <div class="footer_list_divider"></div>
                            </div>
                        </div>



                        <div id="contentWrapRight" style=" float: left;width: 348px; margin-top: 1px;">
                            <div id="basketWrap">
                                <div id="basketTitleWrap">
                                    <div class="right_col_header">
                                        <span>+ New Projects <span> Undertaken</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="notificationsLoader"></span>
                                    </div>
                                </div>
                                <div id="basketItemsWrap">
                                    <ul id="projectTaken">

                                    </ul>
                                </div>
                            </div>
                        </div>






                    </div>

                    <div class="right_col_latest_threads">
                        <!--   <?php include('side.php'); ?>-->


                        <!-- <?php include('sponsor.php');?>-->
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
