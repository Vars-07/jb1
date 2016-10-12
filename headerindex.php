<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="images/logo.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<div class="top_bar_con">
    	<div class="top_bar_con2">
            <div class="top_bar_text">
                Welcome to Job Bureau!
            </div>
        </div>
    </div>
<div class="header_bar_con1">
    	<div class="header_bar_con2">
        	<div class="logo_con" style="margin-left:50px;margin-top: -10px">

            </div>
            <div class="twitter_update_con">
            	<div class="twitter_title"> UPDATES</div>
                <div class="twitter_text_con">
                	<div class="twitter_text">
			<!--The Game will start on 2nd Nov at 12.00 pm and end on 4th Nov. at 11.59 pm. Be ready to explore the great world of job!.-->
                        <?php
                            //echo "1111";
                            include_once('database.php');
                            $db=new Database();
                            $db->connect();
                            $db->select('updates', 'update_text', 'is_visible = 1');
                            $resultPB=$db->getResult();
                            $update = $resultPB['update_text'];
                            echo $update;
                        ?>
                    <!--	Due To some Technical Problems, The game has been rolled back to 7th nov 11:22 P.M .The game will now end on 9th nov 11:59 P.M. Sorry For the inconvenience caused. -->
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</body>
</html>
