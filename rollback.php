<?php
session_start();
        if(strcmp($_SESSION['usertype'],"admin")==0)
{
include_once('database.php');
$db=new Database();
$db->connect();
/*$db->select('packages','name');
$resname=$db->getResult();
$db->select('packages','id');
$resid=$db->getResult();
//$res1=$res[0];
$db->select('count');
$result=$db->getResult();
$k= $result['companies'];*/

$query="select * from package";
$data=mysql_query($query);

//$query="select * from pro ep,emp_profile ef,emp_contact ec where ep.emp_id=ef.emp_id and ep.emp_id=ec.emp_id";
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
 .<?php //include 'menu.php' ?>

            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
            	<div class="left_col">
            	  <p>&nbsp;</p>
            	  <div class="main_news_con">
                    	<div class="main_news_post">
                    	  <div class="clr">
                    	<form name="newad" method="post" enctype="multipart/form-data" action="dorollback.php">
                            <?php
                      
                          ?>
						                          <h2 align="center">Rollback</h2><br><br>


						<table cellpadding="10" cellspacing="10">


                        <tr><td><h3>enter date/timestamp</h3></td>
                        <td><input type="text" name="date" size="30"/></td>
                        </tr>


						<tr><td><input name="Submit" type="submit" value="Submit"></td></tr>
						</table>
						</form><br>
                               <div id="txtHint"><b>Person info will be listed here.</b></div>
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
                  <center>  <a href="admin.php" ><font color="white" size="3"> Main Page</font></a></center>
                        </div>

                        <div class="right_col_header">
                       <center>  <a href="logout.php" ><font color="white" size="3"> Logout</font></a></center>
                        </div>


                    </div>

                    <div class="right_col_latest_threads">
                    <?php include('side.php'); ?>


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