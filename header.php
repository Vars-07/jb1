<?php

$id=$_SESSION['id'];
//include_once('database.php');
//$db=new Database();
//$db->connect();
$query="select nick from profile where uid='".$id."'";
$nick=mysql_fetch_array(mysql_query($query));
$query1="select NOW()";
$tym=mysql_fetch_array(mysql_query($query1));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="images/logo.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script>
   /* function swapImages(){
        var rand=Math.floor(Math.random()*5)
     $('#ttt').load("updateheader.php?value="+rand);
   
    }

    $(document).ready(function(){
      // Run our swapImages() function every 5secs
     
      setInterval('swapImages()', 5000);
    });*/
  </script>

</head>

<body>
<div class="top_bar_con">
    	<div class="top_bar_con2">
            <div class="top_bar_text">
               <div align="left"> Welcome<font color="#00cc00"> <?php echo $nick[0]; ?></font> to Job Bureau!</div>
            </div>
        </div>
    </div>
<div class="header_bar_con1">
    	<div class="header_bar_con2">
        	<div class="logo_con" style="margin-left:50px;margin-top: -10px;">

            </div>
            <div class="twitter_update_con">
            	<div class="twitter_title"> UPDATES</div>
                <div class="twitter_text_con">
                	<div class="twitter_text" id="ttt">
                    	  <!--The Game will end on 4th Nov at 11.59 pm. Please share your experience and give us suggestions in feedback tab.-->
                        <?php
                            include_once('database.php');
                            $db=new Database();
                            $db->connect();
							$db->select('updates', 'update_text', 'is_visible = 2');
                            $resultPBJ=$db->getResult();
							@$update = $resultPBJ['update_text'];
                            echo $update;
                        ?>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>

</body>
</html>
