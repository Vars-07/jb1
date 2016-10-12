<?php
session_start();
$username=$_SESSION['id'];

include_once('database.php');
$db1=new Database();
$db1->connect();
//select * from undergoing_project u,company c,projects p where u.uid='nitin' and u.pid=p.pid and p.pid=c.cid
$query="select * from undergoing_project u,company c,projects p where u.uid='".$username."' and u.pid=p.pid and p.pid=c.cid";
$res=mysql_query($query);
$db1->select('battery');
$res1=$db1->getResult();
$perbat=$res1['current'];
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
<script type="text/javascript" src="js/jq_slideshow.js"></script>

<style type="text/css">
    .all-rounded {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.spacer {
	display: block;
}

#progress-bar {
	width: 300px;
	margin: 0 auto;
	background: #cccccc;
	border: 3px solid #f2f2f2;
}

#progress-bar-percentage {
	background: #3063A5;
	padding: 5px 0px;
 	color: #FFF;
 	font-weight: bold;
 	text-align: center;


}
#battery-bar {
	width: 200px;
	margin: 0 auto;
	background: #cccccc;
	border: 3px solid #f2f2f2;
}

#battery-bar-percentage {
	width:200;
	height:120px;
	background-image:url(images/battery.png);

	padding: 5px 0px;
 	color: #FFF;
 	font-weight: bold;
 	text-align: center;


}



    .circle
{
border-radius: 50px; // Chrome & IE9
-moz-border-radius: 50px; // Firefox
-webkit-border-radius: 50px; // Safari
height:100px;
width:100px;
background:#dedede;
}
    @-webkit-keyframes rotateThis
{
from {-webkit-transform:scale(1) rotate(0deg);}
to {-webkit-transform:scale(1) rotate(360deg);}
}
.circle-label-rotate
{
-webkit-animation-name: rotateThis;
-webkit-animation-duration:2s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-timing-function:linear;
}
    .square
{
height:150px;
width:600px;
border:dashed 1px #000;
margin-top:10px;
}

</style>

    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<!--<script type="text/javascript" src="js/eas.js"></script>
<script type="text/javascript" src="easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".square").click(function()
{
    alert("kik");
$(".square").animate({width:'100px',height:'100px'}, 500, 'linear', function()
{
$(".square").addClass('circle-label-rotate');
}).addClass('circle').html('<div class="innertext">Bye</div>').animate({"opacity":"0","margin-left":"510px"},1500);
$(".square").slideUp({duration: 'slow',easing: 'easeOutBounce'}).hide();
});
});
</script>-->



    <script>

//var per1=0;
//var bat1=100
//var mon=1000;
//loadXMLDoc();
//loadXMLDoc1();




function loadXMLDoc(divid)
{

   //alert(divid);
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
 //console.log(xmlhttp);
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById(divid).innerHTML=xmlhttp.responseText;

    }
  }


  //per1=per1+10;

xmlhttp.open("GET","clickwork.php?per="+divid,true);
xmlhttp.send();


}



function loadXMLDoc1()
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

   . <?php include 'menu.php' ?>


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

                            <?php
                                while($data=mysql_fetch_array($res))
                                {
                                $percentage=$data['2'];
                                    ?>



                                  <div id="package" class="sqare">
                        <div id="packageimg"><img src="<?php echo $data[7];?>"  width="130" height="139" /></div>
                        <div id="packagedetails"><h2><?php echo $data[9];?></h2>
                          <p><?php echo $data[5];?></p>
                            <p><h3><?php //echo $data[4];?></h3></p>
                            <p></p>
                            <div id="<?php echo $data[1]; ?>">
                           <?php print "<div id=\"progress-bar\" class=\"all-rounded\">\n";
	                        print "<div style=\"width: $percentage%\" class=\"all-rounded\" id=\"progress-bar-percentage\">";
		                    if ($percentage > 5) {print "$percentage%";} else {print "<div class=\"spacer\">&nbsp;</div>";}
	                        print "</div></div>";?>


                            </div>
                            <p> <input type="image" src="images/add.jpg" width="160px" height="35px" id="<?php echo $data[1];  ?>" alt="submit button" onclick="loadXMLDoc1(),loadXMLDoc('<?php echo $data[1];?>')"/>
                            </p>

                        </div>
           				 </div>
                                    <?php
                                }
                                ?>
                           
                          <div class="clr"></div>
                    </div>
                  </div>
                </div>
                <div class="right_col">
<div class="right_col_latest_matches">
                    	<div class="right_col_header">
                        	<span>+ LOG<span>IN</span></span>
                        </div>

                        <div class="right_col_latest_matches_box">

                               <div id="yourDiv">
                            <?php
                             print "<div id=\"battery-bar\" class=\"all-rounded\">\n";
	print "<div id=\"battery-bar-percentage\" class=\"all-rounded\" style=\"width: $perbat%\">";
		//if ($percentage > 5) {print "$percentage%";} else {print "<div class=\"spacer\">&nbsp;</div>";}
	print "</div></div>";
                                ?>
                        </div>





                        </div>
                    </div>

                    <?php include 'side.php'?>


                        <div class="right_col_sponsors">
                      <?php include'sponsor.php' ?>

                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>


           <?php include'footer.php' ?>


        </div>
    </div>
</div>
</body>
</html>

