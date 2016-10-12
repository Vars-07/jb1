<?php
session_start();

if($_SESSION['id']!=null)
{
    $id=$_SESSION['id'];
    include_once('database.php');

    $db=new Database();
    $db->connect();


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
    <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/basic.js'></script>


    <script type="text/javascript">

    function loadXMLDoc(type)
    {

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
        document.getElementById("help").innerHTML=xmlhttp1.responseText;
        }
      }


      //bat1=bat1-2;
      //mon=mon+1000;
    xmlhttp1.open("GET","ajaxhelp.php?value="+type,true);
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
        #help{
            margin-top: 30px;
            margin-left: 60px;

        }
    </style>
</head>

<body>
<div class="con1">
    <?php include 'header.php' ?>

    <div class="con2">
        <div class="con3">

             <?php include 'menu.php' ?>
            <?php //include 'feedback.php' ?>


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>
                    <div class="main_news_con">
                        <div id="help" style="margin-left: 20px;margin-top: 20px">
                            <h1> Guidelines</h1><br>
                            <font size="-1"><li >As soon as you register, you become a freelancer/software engineer/project leader who<p> gets paid for completing tasks of various companies. The user is provided with a laptop<p> of basic configuration with fully charged battery.<br><br></li><li>
                                The criteria for completing a task include your battery level and fulfilment of minimum <p>requirements by a task which may include various softwares and hardware.<br><br></li><li>
                                The tasks are categorized into four levels.<br><br></li><li>

                                User will get paid for completing a task and gains experience associated with that task.<br><br></li><li>
                                The battery gets consumed in doing a task/job. If battery gets over, one needs to wait<p> for sometime to recharge the battery or buy a power booster for the laptop for instant <p>recharge.<br><br></li><li>
                                User can upgrade his/her system by buying available packages (hardware and software).<br><br></li><li>
                                The basis of ranking is the "experience" gained by the user.<br><br></li><li>
                                There are three basic tasks kept for the user in case if he runs out of money. These <p>tasks will not give him experience.<br><br></li>
                               <br />

                            </font>
                        </div>

                    </div>
                </div>
                <div class="right_col">
                    <div class="right_col_sponsors">
                        <div class="right_col_header">
                            <span>+ Quick <span> Links</span></span>
                        </div>
                        <div class="right_col_sponsors_box">
                            <div class="sponsor_img_con" >
                            <div class="footer_list1">
                                <ul>
                                    <li style="font-family: comic sans ms;cursor: pointer"><a onclick="loadXMLDoc(1)">About  Projects</a></li>
                                    <li style="font-family: comic sans ms;cursor: pointer"><a  onclick="loadXMLDoc(2)"  >About  MarketPlace</a></li>
                                    <li style="font-family: comic sans ms;cursor: pointer"><a onclick="loadXMLDoc(3)">About  Offers</a></li>
									<!--<li style="font-family: comic sans ms;cursor: pointer"><a  onclick="loadXMLDoc(4)">About Try Luck!</a></li>-->
                                    <li style="font-family: comic sans ms;cursor: pointer"><a  onclick="loadXMLDoc(5)">Administrator Rights</a></li>
                                     
                                 
                                </ul>
                                <div class="footer_list_divider"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <div class="right_col_sponsors">
                        <div class="right_col_header">
                            <span>Like<span> Us </span></span>
                        </div>
                        <div class="right_col_sponsors_box">
                            <div class="sponsor_img_con" >
                               <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finfotsav&amp;width=320&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:200px;" allowTransparency="true"></iframe>
                               <!--<iframe style=" margin-top: 20px; margin-left: 60px;" src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlq6v1vh12aqgdsv87hvvframi2lfq3g699sd9knnfp9s63413cl5usf59ujq888p6sfnea2222b0g2dpkjfomgknin8gmmb53qdoge1ntp2a3olo4vs792j1vfodib79297c9kpmt0fbdrcqnk6vpulmnoemik6vs9toe3c2bqsqpuca9962jrtbaabuqdbi7e13k7m8jkrbtftqbqphd0&w=200&h=60" allowtransparency="true" frameborder="0" height="60" width="200"></iframe>-->
                                <!--<iframe style=" margin-top: 20px; margin-left: 60px;" src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlqeug5cr2lnlo0sbltffhkb99r9cgt6ibuac3dt210pndgr2kqal49ifnp9q45o9kg2tdilt9cj5p9urnapgsnebvism3jkbd04f0p0mt955l95iee17ocj2k4pi71i7j21ecr3e1fn1sg8h6muog3dhte5p0msd9cufbkhh8ceq2fdm7n0kuk6mn7a283ijch40hqlhh7fa1444gb0cb0&amp;w=200&amp;h=60" allowtransparency="true" frameborder="0" height="60" width="200"></iframe>-->

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
</body>
</html>
<?php
}
else{
    header("Location:index.php?error=login");
}
?>

