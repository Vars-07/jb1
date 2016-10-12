<?php
session_start();
if ($_SESSION['id'] != null) {


    $username = $_SESSION['id'];

    include_once('database.php');
    $db1 = new Database();
    $db1->connect();
    //select * from undergoing_project u,company c,projects p where u.uid='nitin' and u.pid=p.pid and p.pid=c.cid
    $query = "select * from undergoing_project u,company c,projects p where u.uid='" . $username . "' and u.pid=p.pid and p.cid=c.cid;";
    $res = mysql_query($query);
    $db1->select('profile', '*', "uid='" . $username . "'");
    $res1 = $db1->getResult();
    $perbat = $res1['battery'];
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Job Bureau-Complete your task</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!--SlideShow Files -->
<link rel="stylesheet" type="text/css" href="slideshow.css"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/eas.js"></script>
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen'/>
<link rel="stylesheet" href="css/example.css">
<link rel="stylesheet" href="css/stroll.css">
<script src="js/stroll.min.js"></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
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
    function widthinc(per, bar, batper, money, exp) {   //alert(bar);
        // alert(per);
        var lol = (88 / 100) * batper;
        $('#batcolor').animate({width:lol + '%'});
        //$('#write').text(per+'%');
        $(bar).animate({width:per + '%'});
        $('#money').text(money);
        $('#expdiv').text(exp);
        $('#battery').text(batper + '%');
    }
	
 $(document).ready(function() {          
        setInterval('AutoRefreshPage()', 60000);  
    });  
  
    function AutoRefreshPage() { location.reload(); }  
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

</style>


<script>

    //var per1=0;
    //var bat1=100
    //var mon=1000;
    //loadXMLDoc();
    //loadXMLDoc1();


    function loadXMLDoc(divid) {

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

        }*/
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
                    if (key1[1] <=0) {
                        if (key1[0] < 100) {
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
                        }else if(key1[0] >= 100)
                        {
                            widthinc(key1[0], '.all-rounded' + divid, key1[1], key1[2], key1[3]);
                            OverAll('.sqare' + divid);


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


    /*function loadXMLDoc1()
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

        document.getElementById("yourDiv").innerHTML=xmlhttp1.responseText;
        //document.getElementById("yourDiv").innerHTML=xmlhttp.responseText;
        }
      }


      //bat1=bat1-2;
      //mon=mon+1000;
    xmlhttp1.open("GET","battery.php",true);
    xmlhttp1.send();

    }
    function loadXMLDoc2(pid)
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
                        <div class="main_news_post" id="main">
                          <ul class="helix">
							<div class="clr"></div>
									<?php
									while ($data = mysql_fetch_array($res))
									{
										$percentage = $data['2'];
									?>
										<li>
										<div id="package" class="sqare<?php echo $data[1]; ?>">
											<div id="packageimg"><img src="<?php echo $data[7];?>" width="130" height="139" border="solid"/></div>
											<div id="packagedetails"><h2 style="margin-left: 54px"><?php echo $data[9];?></h2>

												<p style="margin-left: 54px">By:<?php echo $data[5];?></p>

												<p><h4 style="margin-left: 54px">Money:Rs.<?php echo $data[14];?></h4></p>
												<p> <h4 style="margin-left: 54px">Experience:<?php echo $data[13];?></h4></p>
										
												<br/>

												<div id="<?php echo $data[1]; ?>">
													<?php print "<div id=\"progress-bar\" class=\"all-rounded\">\n";
														print "<div style=\"width: $percentage%\" class=\"all-rounded" . $data[1] . "\" id=\"progress-bar-percentage\">";
														if ($percentage > 5) {
															print "<div id=\"write\"></div>";
														} else {
															print "<div class=\"spacer\">&nbsp;</div>";
														}	
														print "</div></div>";
													?>
												</div>
												<p><input type="image" style="margin-left: 190px" src="images/doitnow.png"
													width="160px" height="35px" id="<?php echo $data[1];  ?> alt="submit button" onclick="loadXMLDoc('<?php echo $data[1];?>')"/>

												</p>


											</div>
										</div>
										</li>
										<?php

									}

									?>
						</ul>
                        </div>
                    </div>
                </div>

                <div class="right_col">
                    <!--<div class="right_col_latest_matches">
                        <div class="right_col_header">
                            <span>+ Latest <span>Matches</span></span>
                        </div>


                    </div>-->

                    <div class="right_col_latest_threads">


                        <div class="right_col_sponsors">
                            <div class="right_col_header">
                                <span>+ Batt<span>Ery</span></span>
                            </div>
                            <div class="right_col_sponsors_box">

                                <div class="sponsor_img_con">
                                    <div id="yourDiv">
                            <?php
                                                         $perbat1 = (88 / 100) * $perbat;?>
                                <div id="empty">
                                    <div id="batcolor" style="width:<?php echo $perbat1 . "%" ?>">

                                    </div>


                                </div>
                                    </div>
                                    <font color="#fff"><h1 align="middle"><label
                                            id="battery"><?php echo $perbat . "%" ?></label></h1></font>

                                    <div class="sidelinks"><h4 align="middle"><a href="ownprofile.php">Recharge your
                                        Battery !</a></h4></div>


                                </div>


                            </div>
                            <div class="right_col_header">
                                <span>+ EXP<span>ERIENCE</span></span>
                            </div>
                            <div class="right_col_sponsors_box">
                                <div class="sponsor">
                            <?php
                                                               $db1->select('profile', '*', "uid='" . $username . "'");
                                $out = $db1->getResult();
                                ?>
                                <div>
                                    <img src="images/expo.png" width="140px" height="120px"
                                         style="padding-top: 10px;float: left;"/>

                                    <h1 style="float: right;padding-right: 60px;padding-top: 50px"><font
                                            color="white"><label id="expdiv"> <?php echo $out['experience']; ?></label><label style="font-size: small;">&nbsp;HRS</label></font>
                                    </h1>
									<!--<h4 class="sidelinks" style="float: right;padding-right: 60px;padding-top: 10px"><font color="white"><label id="expdiv"> <a href="tryluck.php">Try Luck !</a></font></h4>-->
                                </div>
								
								
								
                                </div>
                            </div>

                            <div class="right_col_header">
                                <span>+ Mo<span>ney</span></span>
                            </div>
                            <div class="right_col_sponsors_box">

                                <div class="sponsor">
                                    <img src="images/inr.png" width="140px" height="120px"
                                         style="padding-top: 10px;float: left;"/>

                                    <h1 style="float: right;padding-right: 60px;padding-top: 50px"><font
                                            color="white"><label id="money"> <?php echo $out['money']; ?></label></font>
                                    </h1>

                                </div>
                            </div>
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
<script>
			stroll.bind( '#main ul' );
</script>
</body>
</html>
                            <?php

}
else {
    header("Location:index.php?error=login first");
}


?>
