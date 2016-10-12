
<?php
session_start();

include_once('database.php');
$db=new Database();
$db->connect();

if($_SESSION['id']!=null)
{
$error=$_GET['error'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Console Frag - by ZachFlynn and Arrow816l</title>
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



                    	<form name="newad" method="post" enctype="multipart/form-data" action="insert_projectrequirement.php?error=4">
                            <?php
                        $error=$_GET['error'];
                        if($error==0)
                        {
                            echo "requirement added successfully";
                        }
                         elseif($error==4)
                        {
                            echo 'Success';
                        }
                                else
                                    echo "error";
                          ?>
                          <h2 align="center">
                          Enter the project requirements </h2>
						<br><br>
						<table cellpadding="10" cellspacing="10">
                        <tr><td><h3>Project ID</h3></td>
                        <td>
						<select name="pid">
						<option>pid</option>
						<?php
						
                            $query2="SELECT * FROM projects order by pid";
						
								$data=mysql_query($query2) or die("error");
								
						while($res=mysql_fetch_array($data))
					{
					echo "<option value='$res[0]'>$res[0] --> $res[1]</option>";
								}
						?>
</select>
        </label>
        </td>
						
						
						
						<td align="right"><a href="admin_projects.php" target="_blank">Show Projects</a></td>
  
                        </tr>
                        <tr><td valign="top"><h3>Package ID</h3></td>
                        
                         <td>
						 <select name="packageid">
						<option>packageid</option>
						<?php
						$query2="SELECT * FROM package order by package_id";
						
								$data=mysql_query($query2) or die("error");
								
						while($res=mysql_fetch_array($data))
					{
					echo "<option value='$res[0]'>$res[0] --> $res[2]</option>";
								}
						?>
						
						</select >
                           </td>
                        
						<td align="right"><a href="admin_packages.php" target="_blank">Show Packages</a></td>
  
						</tr>
						<tr></tr>
						<tr></tr>
						
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
<?php
}
else
{
    header("Location:index.php?error=logiin");
}
?>