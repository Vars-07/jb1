<?php

$value=$_GET['value'];

if($value==1)
{    echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
     echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
     echo '<p><h3>You Don\'t have enough money to buy this package</h3></p>';

}
elseif($value==2)
{
    echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
    echo '<p><h3>You Don\'t have enough Battery!</h3></p>';
    echo '<p><h2><code>Please Recharge your battery 10% for Rs 2000</code></h2></p>';

}
elseif($value==3)
{ echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
  echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
  echo '<p><h3>Already 100%! Don\'t waste your Energy!</h3></p>';
}
elseif($value==4)
{ echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
  echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
  echo '<p><h3>You Don\'t have enough money!</h3></p>';

}
elseif($value==5)
{
    echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
    echo '<p><h3>Requirements do not match!!</h3></p>';

}
elseif($value==6)
{
    echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
    echo '<p><h3>Project has been already completed or is in undergoing!!</h3></p>';

}

elseif($value==7)
{
    echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">WARNING!</h2><br /><br />';
    echo '<p><h3>You have already purchased this package!</h3></p>';

}

elseif($value==8)
{
    //echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">ERROR!</h2><br /><br />';
   // echo '<p><h3</h3></p>';

}
elseif($value==9)
{
    //echo '<img src="images/warning.png" alt="" height="100px" width="100px" style="float: left;">';
    echo '<h2 style="color: white;float: left">Thank You!</h2><br /><br />';
    //echo '<p><h3>ohho!</h3></p>';

}

?>