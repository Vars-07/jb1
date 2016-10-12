<?php
session_start();
if (strcmp($_SESSION['usertype'], "admin") == 0) {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Welcome Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css"/>
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jq_slideshow.js"></script>
</head>

<body>
<div class="con1">
    <?php include 'headerindex.php' ?>

    <div class="con2">
        <div class="con3">

            <?php //include 'menu.php' ?>


            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <p>&nbsp;</p>

                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div class="clr">
                                Welcome   <?php echo  $_SESSION['usertype']; ?>


                                <br>
                                <font size=4>


                                    <a href="company.php?error=4" target="_blank">Insert Company </a>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                        href="admin_companies.php" target="_blank">Show Companies</a>

                                    <br>
                                    <br>
                                    <a href="packages.php?error=4" target="_blank">Insert Package </a>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                        href="admin_packages.php" target="_blank">Show Packages</a>
                                    <br>
                                    <br>
                                    <a href="projects.php?error=4" target="_blank">Insert Project</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="admin_projects.php" target="_blank">Show Projects</a>
                                    <br>
                                    <br>
                                    <a href="projectrequirement.php?error=4" target="_blank"> Insert project requirement
                                        of packages</a>
                                    <br>
                                    <br>
                                    <a href="release_project.php?error=4" target="_blank"> Release a project</a>
                                    <br><br>
                                    <a href="lockuser.php?error=4" target="_blank"> Lock a user</a>
                                    <br><br>
                                    <a href="unlockuser.php?error=4" target="_blank"> Unlock a user</a>
                                    <br><br>
                                    <a href="addoffer.php?error=1" target="_blank"> Add offer</a>
                                    <br><br>
                                    <a href="listoffers.php?error=1"> Offers List</a>
                                      <br><br>
                                    <a href="viewfeedback.php?error=4">View Feedback</a>

                                    <br><br>
                                    <a href="actionlog.php?error=4">View Log</a>

                                    <br><br>
                                 <a href="viewusers.php?error=4">View Users</a>

                                 <br><br>
                                     <a href="userassets.php?error=4">View assets</a>

                                     <br><br>
                                     <a href="updateinfo.php">Update users info</a>
                                     
									 <br><br>
                                     <a href="rollback.php">Rollback</a>

                                    <br><br>
                                    <a href="updates_insert.php?error=4">Change Updates</a>
									
									<br><br>
                                    <a href="generateInfoUsersCsv.php?error=4">Download Infotsav users mail-id</a>

                                    <br><br><br>

                                </font>
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

                            <center><a href="logout.php"><font color="white" size="3"> Logout</font></a></center>

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
else {
    header("Location:index.php?error=login");
}
?>
