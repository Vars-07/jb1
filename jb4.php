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

        $(document).ready(function(){

            //Hide (Collapse) the toggle containers on load
            $("#img").hide();

            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $("#upload").click(function(){
                $('#img').slideToggle("fast");
                return false; //Prevent the browser jump to the link anchor
            });


              $("#nickupdate").hide();

            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $("#nick").click(function(){
                $('#nickupdate').slideToggle("fast");
                return false; //Prevent the browser jump to the link anchor
            });

        });


        function details(battery,money)
        {
            if(battery<=100)
            {
                $('#battery').text(battery);
                $('#money').text(money);
            }
            else
            {
                $('#battery').text("100");
                $('#money').text(money);
            }
        }


        function loadXMLDoc()
        {

            //alert(divid);
            var xmlhttp;

            if (window.XMLHttpRequest )
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
                    key=xmlhttp.responseText;
                    ////console.log(key);
                    //key1=split("##",key);
                    ////console.log(key1);
                    key1=key.split("##");
                    //console.log(key1[2]);

                    if(key1[0]==1)
                    {
                        // alert("recharged by 10%");
                        details(key1[1],key1[2]);
                    }
                    else if(key1[0]==2)
                    {
                        // $('#basic-modal-content').load('errors.php?value=3').modal();
                        $('#basic-modal-content').load('errors.php?value=3' , function(response, status, xhr) {
                            if (status == "error") {
                                var msg = "Sorry but there was an error: ";
                                $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                $('#simplemodal-container').css('height','auto');
                            }
                            else{

                            }
                        }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'},1000);




                    }
                    else if(key1[0]==3)
                    {
                        //  $('#basic-modal-content').load('errors.php?value=4').modal();
                        $('#basic-modal-content').load('errors.php?value=4' , function(response, status, xhr) {
                            if (status == "error") {
                                var msg = "Sorry but there was an error: ";
                                $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                $('#simplemodal-container').css('height','auto');
                            }
                            else{

                            }
                        }).modal();
                        $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'400px','left':'30%'},1000);

                    }

                }
            }

            xmlhttp.open("GET","recharge.php",true);
            xmlhttp.send();


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
                    <h1 align="left"><u>Developers of Job Bureau v4.0<u></u></h1><br><Br>
                        <table cellpadding="5" cellspacing="10" width="100%">

                            <tr>
                           <td width="50%">
                                <h2>Rishabh Upadhyay</h2>


                        <h4>rishabhupadhyay@infotsav.org</h4>
                        <h4>
                            (+91-8989931102)
                        </h4></td>
                                <td width="50%">
                                     <h2>Yogendra Singh</h2>


                             <h4>yogendrasingh@infotsav.org</h4>
                             <h4>
                                 (+91-9407243036)
                             </h4></td>

                            </tr>

                        </table><br><br><br>

                  <h2 align="left"><u>Event Executives of Job Bureau v4.0<u></u></h2><br>
                          <table cellpadding="5" cellspacing="10" width="100%">

                            <tr>
                           <td width="50%">
                                <h2>Abhishek Kr. Yadav</h2>


                        <h4>
                            (+91-9755402625)
                        </h4></td>
                                <td width="50%">
                                     <h2>Aakash Sharma</h2>


                             <h4>
                                 (+91-8989923557)
                             </h4></td>

                            </tr>

                        </table>



                    </div>
                </div>
                <div class="right_col1">


                    <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F%23%21%2Finfotsav&amp;width=347&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=false&amp;height=750&amp;appId=215647478499479" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:347px; height:750px;" allowTransparency="true"></iframe>

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

