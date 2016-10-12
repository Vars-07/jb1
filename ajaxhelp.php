<?php
$var= $_GET['value'];
if($var==1){
?>

<h1> Projects</h1><br>
<font size="-1"><li>There are 4 levels of projects<br/><br/><p>1)&nbsp;Novice:-&nbsp;No experience ,can be performed anytime in order to earn money<br/></p>
                                <p>2)&nbsp;Beginner:-&nbsp;Easy category task,Low Money and Low experience<br/></p>
                                <p>3)&nbsp;Professional:-&nbsp;Relatively more difficult than beginner requiring more battery & giving more money and experience.<br /> </p>
                                <p>4)&nbsp;Experienced:-&nbsp;Most Difficult level ,requiring high usage of battery and giving huge amount of money and experience<br><br></p></li>
                                <li>By clicking on the images of projects user will get the details of that particular task .
                                <br><br></li>
                                <li>The User can buy the packages required for the task by simply clicking on "buy these packages" on getting details. <br><br></li>

                            

                            </font>

<?php
}
else if($var==2)
{
?>
<h1> MarketPlace</h1><br>
                            <font size="-1"><li>There are 2 types of packages<p>1)Software</p>
                                <p>2)Hardware</p>
                              <br><br></li>
                                <li>By clicking on the images of package user will get the details of that particular package.<br/><br /></li>

                                <li>User can buy packages just by simply clicking on the "Add to basket" button and purchasing all the packages that are added in the Basket.<br><br></li>
                                <li>User can check the list of all the purchased packages on the Configuration tab in My Account Page.<br /><br /></li>




                            </font>
<?php
}
else if($var==3)
{

?>
<h1> Offer of the Hour</h1><br>
<font size="-1"><li>The offer of the hour will be exclusive for every user, i.e. each user may have different offer of the hour
    at a time.<br /><br /></li>
    <li>The offer will remain for two hours and will change after that, i.e. 12 offers will be there in 24 hours for
        each user.<br /><br/></li>
    <li>The offer will be selected randomly for each user from a pool of offers.<br /><br/></li>
    <li>The pool of offers will be same for every user.<br /><br/></li>
</font>
<br/><br/>
<h1> Offer of the Day</h1><br>
                            <font size="-1"><li>There will be 2 offers each day, The offers are only on Packages.<br /><br /></li>
                                <li>The user can purchase the listed packages at the discounted price.<br /><br/></li>
                                <li>The offers will get updated at 00:00 hrs each day.<br /><br/></li>
                            </font>



<?php
}
else if($var==4)
{
    ?>
<h1> Try yours Luck !</h1><br>
                            <font size="-1"><!--<li>The Admin can block any user if the user is found guilty of some mischievous activity. <br /><br /></li>
                                <li>Admin can add more Projects and Packages anytime ,if required.<br /><br/></li>
                                <li>Admin can RollBack all the user accounts in case of some coding error found. <br /><br/></li>
                                <li>All the Offer of the day are decided by the admin . </li>-->



                            </font>
<?php
}
else if($var==5)
{
    ?>
<h1> Administrator Rights</h1><br>
                            <font size="-1"><li>The Admin can block any user if the user is found guilty of some mischievous activity. <br /><br /></li>
                                <li>Admin can add more Projects and Packages anytime ,if required.<br /><br/></li>
                                <li>Admin can RollBack all the user accounts in case of some coding error found. <br /><br/></li>
                                <li>All the Offer of the day are decided by the admin . </li>



                            </font>
<?php
}


?>