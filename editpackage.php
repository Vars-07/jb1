<?php
//$error=$_GET['error'];

include_once('database.php');
$db=new Database();
$db->connect();

$pacid=$_GET['pacid'];

$query1="select * from package where package_id= ".$pacid;

$data1=mysql_query($query1);
$result=mysql_fetch_array($data1);
//echo($result[2]);
//echo $result[1];
//echo($result['type']);
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

            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
            	<div class="left_col">
            	  <p>&nbsp;</p>
            	  <div class="main_news_con">
                    	<div class="main_news_post">
                    	  <div class="clr">
                    	<form name="newad" method="post" enctype="multipart/form-data" action="insert_editpackage.php">
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
                          <h2 align="center">Edit Package</h2><br>
						<table cellpadding="10" cellspacing="10">
                        <tr><td><h3>Type</h3></td>
                        <td><input type="text" name="type" size="40" value="<?php echo($result['type']) ?>"/></td>
                        </tr>
                             <input type="hidden" name="pacid" value="<?php echo($pacid) ?>">
                        <tr><td><h3>Name</h3></td>
                        <td><input type="text" name="name" size="40" value="<?php echo($result['name']) ?>"/></td>
                        </tr>
                        <tr><td valign="top"><h3>Description</h3></td>
                            <td> <label>
                            <textarea name="details" id="textarea" cols="30" rows="5"><?php echo($result['description']) ?></textarea>
                          </label></td>
                        </tr>
                        <tr><td><h3>Price</h3></td>
                        <td><input type="text" name="cost" value="<?php echo($result['money']) ?>"/></td>
                        </tr>

						<!--<tr><td><h3>Image Location</h3></td>&nbsp;&nbsp;
                        <td><input type="file" name="image" value="<?php /*echo($result['logo']) */?>"></td></tr>-->
						<tr><td><input name="Submit" type="submit" value="Submit"></td></tr>
						</table>
						</form>
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
