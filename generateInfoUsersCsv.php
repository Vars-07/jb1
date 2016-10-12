<?php
session_start();
if(strcmp($_SESSION['usertype'],"admin")==0)
{
$error=$_GET['error'];




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
                    	
                            <?php
                        $error=$_GET['error'];
                        if($error==0)
                        {
                            echo "success";
                        }
                         elseif($error==4)
                        {
                            echo '';
                        }
                                else
                                    echo "error";
                          ?>
                          <h2 align="center">
                          Download the infotsav users email ids</h2>
						<table cellpadding="10" cellspacing="5">
						<tr><td><a href = "generate_infotsav_users_csv.php">Download</a></td></tr>
						</table>
					
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
                    <center>  <a href="logout.php" ><font color="white" size="3"> Logout</font></a></center>
                        </div>


                    </div>

                    <div class="right_col_latest_threads">
                    <?php //include('side.php'); ?>


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
    header("Location:index.php?error=You are not allowed to Login");
}
?>