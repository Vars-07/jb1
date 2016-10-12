
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div class="right_col_header">
    <span >+ Top <span>Scorers</span></span>


    

</div>


<div class="right_col_sub_header">

    <div class="right_col_sub_lt_user">
        <a style="text-transform: capitalize;float:left; ;font-size: 08PT; margin-left: 10px; "  >Rank</a>
    </div>
    <div class="right_col_sub_lt_topicthreads">
        <a style="text-transform: capitalize;font-size: 8PT ; color:"#F8711E" " >Username</a>
    </div>
    <div class="right_col_sub_lt_user">
        <a style="text-transform: capitalize;float:left; ;font-size: 08PT; " >Experience</a>
    </div>

</div>

<?php
$i=0;
$sql="select * from profile where usertype='user' and flag=0 order by experience desc ,money desc Limit 0,10";
$query=mysql_query($sql);

while($data=mysql_fetch_array($query))
{$i++;
    ?>


<div class="right_col_latest_matches_box">
    <ul>
        <li>
            <div class="lt_box_users1">
                <a style="text-transform: capitalize;font-size: 12PT"><?php echo $i;?></a>
            </div>

            <div class="lt_box_topicthreads">
                <a style="text-transform: capitalize;font-size: 12PT" >    <?php echo $data['name'];?></a>
            </div>
            <div class="lt_box_users">
                <a style="text-transform: capitalize;font-size: 12PT"><?php echo $data['experience'];?></a>
            </div>
            <div class="right_col_box_devider"></div>
        </li>


    </ul>
</div>
    <?php

}

?>

<div class="right_col_sub_header">
    <div class="right_col_sub_lt_user">
   <label class="sidelinks"> <a style="text-transform: capitalize;float:left; ;font-size: 08PT;margin-left: 6px " href="toprankers.php">+See <font color="#ff6600">More</font></a></label></div>
</div>


</body>
</html>
