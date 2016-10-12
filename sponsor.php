<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
$query="select * from sponsor where status=1";
$res = @mysql_query($query);
$ro1=mysql_fetch_array($res)
?>
<body>
<div class="right_col_sponsors">
							<div class="right_col_header">
                            	<span>+ Organised<span> Under</span></span>
                            </div>
                            <div class="right_col_sponsors_box">
                            	<div class="sponsor_img_con" align="center" >
                                	<a class="sidelinks" target="_blank"><img src="images/logo600.PNG" alt="" height="200px" width="200px"  /></a>
								</div>
								<div style="float:left;">
								<?php echo $ro1[1]; ?>
								</div>
							</div>
</div>
</body>
</html>
