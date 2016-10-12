<?php
session_start();
if($_SESSION['id']!=null)
{


include_once('database.php');
$db=new Database();
$db->connect();
$query="select * from package";
$res=mysql_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Bureau</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--SlideShow Files -->

<style type="text/css">
div#wn	{ 
    position:relative; 
    width:600px; height:100%;
    overflow:hidden;	
	}
	#container ul { list-style: none; }
#container .buttons { margin-bottom: 20px; }

#container .list li { width: 100%; border-bottom: 1px dotted #CCC; margin-bottom: 10px; padding-bottom: 10px; }

#container .grid li { float: left; width: 30%; height: 150px; border-right: 1px dotted #CCC; border-bottom: 1px dotted #CCC; padding: 20px; }
</style>

<script src="js/dw_event.js" type="text/javascript"></script>
<script src="js/dw_scroll.js" type="text/javascript"></script>
<script src="js/scroll_controls.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$('button').click(function(e) {
    if ($(this).hasClass('grid')) {
        $('#container ul').removeClass('list').addClass('grid');
		//alert("lol");
    }
    else if($(this).hasClass('list')) {
        $('#container ul').removeClass('grid').addClass('list');
    }
});
});

function init_dw_Scroll() {
    var wndo = new dw_scrollObj('wn', 'lyr1');
    wndo.setUpScrollControls('scrollLinks');
}

// if code supported, link in the style sheet and call the init function onload
if ( dw_scrollObj.isSupported() ) {
    //dw_Util.writeStyleSheet('css/scroll.css');
    dw_Event.add( window, 'load', init_dw_Scroll);
}




</script>
</head>

<body>
<div class="con1">
   <!-- <?php include 'header.php' ?>-->

        <div class="con2">
        <div class="con3">

   <!-- <?php include 'menu.php' ?>-->

   
            <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
            	<div class="left_col">
            	  <p>&nbsp;</p>
            	  <div class="main_news_con">
                    	<div class="main_news_post">
                    	  <div class="clr">
                    	    <p>
                    	<p><!--<div id="packagediv">
                        <div id="package">
                        <div id="packageimg"><img src="package_logo/Adobe_JRun_5.png.jpg" width="101" height="102" /></div>
                        <div id="packagedetails"><h2>loda</h2>
                          <p>loda</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                        </div>
                        
                        </div>
                        </div>-->
            <div id="scrollLinks">
                    	  <p><a class="mouseover_up" href="#"><img src="images/tri-up.gif" alt="" border="0" /></a>
                    	    <a class="mouseover_down" href="#"><img src="images/tri-dn.gif" alt="" border="0" /></a>
                  	    </p>
                    	  <p>&nbsp;</p>
                    	  <p>&nbsp;</p>
                    	</div>  
                      <div id="wn">
   					 <div id="lyr1">
       					   <?php

                        //$data=get_companyname();
                        while($data=mysql_fetch_array($res))
                        {
                         //echo "<option value='$res[0]'>$res[1]</option>";
                        ?>
                       <div id="container">
   				
    
   					 <ul class="list">
                    <li><div id="package">
                        <div id="packageimg"><img src="<?php echo $data[5];?>"  width="130" height="139" /></div>
                        <div id="packagedetails"><h2><?php echo $data[2];?></h2>
                          <p><?php echo $data[3];?></p>
                            <p><h3><?php echo $data[4];?></h3></p>
                            <p></p>
                            <p> <input type="image" src="images/add.jpg" width="160px" height="35px" id="<?php echo $data[0]; ?>" alt="submit button" onclick="add()"/>
                            </p>
                       
                        </div>
           				 </div></li>
                          
       
    </ul>
</div>  
                                <?php
                                    }
                                  ?>
                        </div>
   						 </div>







						</div>  
                    	<p>&nbsp;</p>
                    	<p>&nbsp;</p>
                    	<p>
  <!-- end wn div -->
                    	  
                    	  
  <!-- border attribute added to reduce support questions on the subject. 
    If you like valid strict markup, remove and place a img {border:none;} spec in style sheet -->
                  	  </p>
                    	
                    	<p>&nbsp;</p>
                    	<p>&nbsp;</p>
                    	<p></p>
                    	<p></p>
                    	<p></p>
                    	<p>                                                                        
                  	  </p>
                        
                        
                        
                        
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
                        	<span>+ LOG<span>IN</span></span>
                        </div>

                        <div class="right_col_latest_matches_box">

                            <br/>
                            <br/>






                        </div>
                    </div>

                    <?php include 'side.php'?>


                        <div class="right_col_sponsors">
                      <?php include'sponsor.php' ?>

                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
 <?php include'footer.php'  ?>
 
</div>
    </div>
</div>
</body>
</html>

<?php
}
else{
    header("Location:index.php?error=login first");
}
?>