<?php
session_start();

if ($_SESSION['id'] != null) {


    $username = $_SESSION['id'];

    include('database.php');
    $db1 = new Database();
    $db1->connect();
    $query = "select discription from achievements  where status=1 and aid not in (select aid from user_achievements where uid='".$username."')";
	$achiv = mysql_query($query);
    $query = "select discription from achievements  where aid in (select aid from user_achievements where uid='".$username."')";
	$achivcomplete = mysql_query($query);
	$db1->select('profile', '*', "uid='" . $username . "'");
    $res1 = $db1->getResult();
    $perbat = $res1['battery'];
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Job Bureau-Achievements</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!--SlideShow Files -->
<link rel="stylesheet" type="text/css" href="slideshow.css"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/eas.js"></script>
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen'/>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<link href="css/smart_cart.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src='js/basic.js'></script>

<script type="text/javascript">
    function OverAll(divid) {
        $(divid).animate({width:'100px',height:'100px'}, 500, 'linear',
                function() {
                    $(divid).addClass('circle-label-rotate');
                }).addClass('circle').html('<div class="innertext">100%</div>').animate({"opacity":"0","margin-left":"510px"}, 1500, function() {
                });
        $(divid).slideUp({duration: 'slow',easing: 'easeOutBounce'});
    }
    /*function widthinc(per, bar, batper, money, exp) {   //alert(bar);
        // alert(per);
        var lol = (88 / 100) * batper;
        $('#batcolor').animate({width:lol + '%'});
        //$('#write').text(per+'%');
        $(bar).animate({width:per + '%'});
        $('#money').text(money);
        $('#expdiv').text(exp);
        $('#battery').text(batper + '%');
    }*/
</script>


<style>
    .circle-label-rotate {
        -webkit-animation-name: rotateThis;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
    }

    @-webkit-keyframes rotateThis {
	from {-webkit-transform:scale(1) rotate(0deg);}
to {-webkit-transform:scale(1) rotate(360deg);}
            }
    .circle {
        background: url('images/thumbsup.png') no-repeat;
        border-radius: 50px;
        -moz-border-radius: 50px;
        -webkit-border-radius: 50px;
        height: 100px;
        width: 100px;
    }

    #package {
        height: 100px;
        width: 300px;
        border: solid 1px #000;
        margin-top: 10px;
    }

    .innertext {
        padding: 40px;
    }

    .spacer {
        display: block;
    }

    #progress-bar {
        width: 300px;
        margin: 0 auto;
        background: #cccccc;
        border: 3px solid #f2f2f2;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
    }

    #progress-bar-percentage {
        background-image: url("images/prg.png");
        height: 20px;
        padding: 5px 0px;
        color: #FFF;
        font-weight: bold;
        text-align: center;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px

    }

    #battery-bar {
        width: 200px;
        margin: 0 auto;
        background: #cccccc;
        border: 3px solid #f2f2f2;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
    }

    #battery-bar-percentage {
        width: 200;
        height: 120px;
        background-image: url(images/battery.png);

        padding: 5px 0px;
        color: #FFF;
        font-weight: bold;
        text-align: center;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px

    }

    #empty {
        width: 294px;
        height: 133px;
        margin-top: 2px;
        margin-left: 20px;

        background-image: url("images/123.png");
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px

    }

    #batcolor {
        width: 252px;
        height: 130px;
        background-image: url("images/batbg1.jpg");
        position: relative;
        margin-top: 0px;
        margin-left: 7px;
        top: 2px;
        left: 2px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;

    }
    #sale{
        float: right;
        background-image:url("images/sale.png");
        width: 58px;
        height: 59px;
        margin-top: 20px;
        margin-right: 60px;
}

</style>


<script>

//var per1=0;
//var bat1=100
//var mon=1000;
//loadXMLDoc();
//loadXMLDoc1();


/* function loadXMLDoc(divid) {

        //alert(divid);

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
        var xmlhttp=GetXmlHttpObject();
/*
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            //console.log(xmlhttp);
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                key = xmlhttp.responseText;
                if (key == "#########") {

                }
                else {


                    ////console.log(key);
                    key1 = key.split("###");
                   // //console.log(key1);
                    //per=key1[1].split("</body>");
                    if (key1[1] <= 0) {
                        widthinc(key1[0], '.all-rounded' + divid, key1[1], key1[2], key1[3]);
                        //$('#basic-modal-content').load('errors.php?value=2').modal();


                        $('#basic-modal-content').load('errors.php?value=2',
                                function(response, status, xhr) {
                                    if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                        $('#simplemodal-container').css('height', 'auto');
                                    }
                                    else {

                                    }
                                }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'}, 1000);


                    }
                    else {


                        if (key1[0] >= 100) {
                            widthinc(key1[0], '.all-rounded' + divid, key1[1], key1[2], key1[3]);
                            OverAll('.sqare' + divid);

                        }
                        else {   ////console.log(per);
                            widthinc(key1[0], '.all-rounded' + divid, key1[1], key1[2], key1[3]);
                            // document.getElementById(divid).innerHTML=key1[0];

                        }
                    }
                }

            }
        };


        //per1=per1+10;

        xmlhttp.open("GET", "clickwork.php?per=" + divid, true);
        xmlhttp.send();


    }
*/
  function update( money)
  {
       $('#money').text(money);
  }
function discount(package_id)
{
    $("#"+package_id).html('<img src="images/loader.gif" width="20px" >');

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp1=new XMLHttpRequest();
        //xmlhttp1=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
        // xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp1.onreadystatechange=function()
    {
        if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
        {
            pee= xmlhttp1.responseText;
            key=pee.split('#');
            ////console.log(key);
            if(key[0]==1)
            {
                $("#"+package_id).empty();
                update(key[1]);
                document.getElementById(package_id).innerHTML="Thank You";
                  $('#basic-modal-content').load('errors.php?value=9' , function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                        $('#simplemodal-container').css('height','auto');
                    }
                    else{

                    }
                    //  $('#simplemodal-container').css({'opacity':0});


                }).modal();
                $('#simplemodal-container').animate({opacity:1});

                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                $('#simplemodal-container').css({height:'150px' , width:'350px'});



                //document.getElementById("yourDiv").innerHTML=xmlhttp.responseText;
            }
            else if(key[0]==2)
            {
                $("#"+package_id).empty();
                document.getElementById(package_id).innerHTML="Thank You";
                //alert("already");

                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                $('#basic-modal-content').load('errors.php?value=7' , function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                        $('#simplemodal-container').css('height','auto');
                    }
                    else{

                    }
                    //  $('#simplemodal-container').css({'opacity':0});


                }).modal();
                $('#simplemodal-container').animate({opacity:1});

                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                $('#simplemodal-container').css({height:'150px' , width:'350px'});


            }
            else if(key[0]==3)

            {
                $("#"+package_id).empty();
                document.getElementById(package_id).innerHTML="Buy Now";
                //alert("not enough money");

                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                $('#basic-modal-content').load('errors.php?value=1' , function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                        $('#simplemodal-container').css('height','auto');
                    }
                    else{

                    }
                    //  $('#simplemodal-container').css({'opacity':0});


                }).modal();
                $('#simplemodal-container').animate({opacity:1});

                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                $('#simplemodal-container').css({height:'150px' , width:'350px'});


            }
            else if(key[0]==4)
            {
                $("#"+package_id).empty();
                //document.getElementById(package_id).innerHTML="Buy Now";
                //alert("ohho...tempering!");

                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                $('#basic-modal-content').load('errors.php?value=8' , function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                        $('#simplemodal-container').css('height','auto');
                    }
                    else{

                    }
                    //  $('#simplemodal-container').css({'opacity':0});


                }).modal();
                $('#simplemodal-container').animate({opacity:1});

                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                $('#simplemodal-container').css({height:'150px' , width:'350px'});

            }


        }
    }


    //bat1=bat1-2;
    //mon=mon+1000;
    xmlhttp1.open("GET","buyoffer.php?value="+package_id,true);
    xmlhttp1.send();

}
/*function loadXMLDoc2(pid)
    {

    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp1=new XMLHttpRequest();
      //xmlhttp1=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
     // xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp1.onreadystatechange=function()
      {
      if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
        {

        document.getElementById("expdiv").innerHTML=xmlhttp1.responseText;
        //document.getElementById("yourDiv").innerHTML=xmlhttp.responseText;
        }
      }


      //bat1=bat1-2;
      //mon=mon+1000;
    xmlhttp1.open("GET","experience.php?value="+pid,true);
    xmlhttp1.send();

    }

*/
/*$(document).ready(function() {
$('#progress').click(function (){
  //document.write("loda!");
  //alert("chut");
  per1=per1+10;
  $("#yourDiv").load("battery.php");
  $('#myDiv').load("clickwork.php?per="+per1);
  });
});*/


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
						<?php 
						if(mysql_num_rows($achiv)>0)
						{
						?>
                        <div class="main_news_post">
                            <div class="clr"></div>
                            <center><h1 style="font-size:30px;">Achievements</h1></center>
							<ul>
							<br/>
							<?php
								while ($data = mysql_fetch_array($achiv))
								{
							?>
									<li style="font-size:14px;margin-left:20px;"><?php echo $data[0] ?></li>
                            <?php
								}
                            ?>
							</ul>
						</div>
						<?php
						}
						?>
						<?php 
						if(mysql_num_rows($achivcomplete)>0)
						{
						?>
						<div class="main_news_post">
                            <div class="clr"></div>
							<center><h1 style="font-size:30px;">Achievements Completed</h1></center>
							<ul>
							<br/>
							<?php
                            while ($data = mysql_fetch_array($achivcomplete))
						{
                            ?>
								<li style="font-size:14px;margin-left:18px;"><?php echo $data[0] ?></li>
                            <?php
                        }
                            ?>
							</ul>
                        </div>
						<?php
						}
						?>
                    </div>
                </div>

                <div class="right_col">
                        <div class="right_col_header">
                                <span>+ Mo<span>ney</span></span>
                            </div>
                            <div class="right_col_sponsors_box">

                                <div class="sponsor">
                                    <?php $sql="select money from profile where uid='".$username."'";
                                    $data=  mysql_fetch_array(mysql_query($sql));
                                    ?>
                                    <img src="images/inr.png" width="140px" height="120px"
                                         style="padding-top: 10px;float: left;"/>

                                    <h1 style="float: right;padding-right: 60px;padding-top: 50px"><font
                                            color="white"><label id="money"> <?php echo $data['money']; ?></label></font>
                                    </h1>

                                </div>
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
else {
    header("Location:index.php?error=login first");
}


?>
