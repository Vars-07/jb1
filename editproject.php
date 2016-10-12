<?php
include_once('database.php');
$db=new Database();
$db->connect();

$pid=$_GET['pid'];
$query1="select * from projects where pid= ".$pid;
$data1=mysql_query($query1);
$result=mysql_fetch_array($data1);

$query="select * from company order by cid";
$data=mysql_query($query);

$cid=$result[3];
$query3="Select company_name from company where cid=".$cid;
$data2=mysql_query($query3);
$res2=mysql_fetch_array($data2);

//$query="select * from pro ep,emp_profile ef,emp_contact ec where ep.emp_id=ef.emp_id and ep.emp_id=ec.emp_id";
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
 <?php /*include 'menu.php' */?>

            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
            	<div class="left_col">
            	  <p>&nbsp;</p>
            	  <div class="main_news_con">
                    	<div class="main_news_post">
                    	  <div class="clr">
                    	<form name="newad" method="post" enctype="multipart/form-data" action="insert_editproject.php">
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
						                          <h2 align="center">Edit project</h2><br>


						<table cellpadding="10" cellspacing="10">
                        <tr><td><h3>Project Name</h3></td>
                        <td><input type="text" name="projectname" value="<?php echo($result[1]) ?>" size="40" /></td>
                        </tr>
                            <input type="hidden" name="pid" value="<?php echo($pid) ?>">
							<hr>
                        <tr><td><h3>Description</h3></td>
                            <td> <label>
                            <textarea name="details"  id="textarea"  cols="30" rows="5" ><?php echo($result[2]) ?></textarea>
                          </label></td>
                        </tr>
                             <tr><td><h3>Company Name</h3></td>
                        <td>
		                <select id="company_name" name="company_name">
                        <option value='company_name'>name</option>
                       <?php

                        //$data=get_companyname();
                        while($res=mysql_fetch_array($data))
                        {
                         echo "<option value='$res[0]'>$res[0] -&nbsp;$res[1]</option>";
                        }
                        ?>
                        </select></td>
                        </tr>
                        <tr><td><h3>Battery</h3></td>
                        <td><input type="text" name="battery" size="25" value="<?php echo($result[4]) ?>"/></td>
                        </tr>
                            <tr><td><h3>Experience</h3></td>
                        <td><input type="text" name="experience" size="25" value="<?php echo($result[5]) ?>"/></td>
                        </tr>
                            <tr><td><h3>Money</h3></td>
                        <td><input type="text" name="money" size="25" value="<?php echo($result[6]) ?>"/></td>
                        </tr>
                          <tr><td><h3>Members</h3></td>
                        <td><input type="text" name="members" size="25" value="<?php echo($result[7]) ?>"/></td>
                        </tr>
                               <tr><td><h3>Level</h3></td>
                        <td><input type="text" name="level" size="25"value="<?php echo($result[8]) ?>"/></td>
                        </tr>
						<tr><td><h3>Release Flag</h3></td>
                        <td><input type="text" name="flag" size="25" value="<?php echo($result[9]) ?>"/></td>
                        </tr>

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
