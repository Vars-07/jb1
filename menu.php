<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="menu_bar_con">
            	<ul class="top_menu">
				<?php
				$sql = "select * from gamestatus where status=2";
				$res2 = mysql_query($sql);
				if(mysql_num_rows($res2)==0)
				{
				?>
                	<li><a href="ownprofile.php" >My Account</a></li>
                    <li><a href="undergoing.php">Undergoing Tasks</a></li>
                    <li><a href="showprojects.php">Projects</a></li>
                    <li><a href="packagemarket.php">Marketplace</a></li>
                    <li><a href="offer.php">Offers</a></li>
					<li><a href="achievements.php"><img src="images/new.png" width="30px" height="25px" align="bottom"/> Achievements</a></li>
                    <li><a href="history.php">My History</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="logout.php">Logout</a></li>
				<?php
				}
				else
				{
				?>
					<li><a href="logout.php" >My Account</a></li>
                    <li><a href="logout.php">Undergoing Tasks</a></li>
                    <li><a href="logout.php">Projects</a></li>
                    <li><a href="logout.php">Marketplace</a></li>
                    <li><a href="logout.php">Offers</a></li>
					<li><a href="logout.php"><img src="images/new.png" width="30px" height="25px" align="bottom"/> Achievements</a></li>
                    <li><a href="logout.php">My History</a></li>
                    <li><a href="logout.php">Help</a></li>
                    <li><a href="logout.php">Logout</a></li>
				<?php 
				}
				?>
                </ul>
            </div>
</body>
</html>