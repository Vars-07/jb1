<?php
session_start();
if(isset($_SESSION["usertype"]))
	header('location:ownprofile.php');
error_reporting(0);

if($_GET['value']!="")
{
    $error=$_GET['value'];
}
echo $_GET['value'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="js/jq_1.4.4.js"></script>
    <script type="text/javascript" src="js/jq_slideshow.js"></script>
    <script type="text/javascript" src="js/json2.js"></script>
    <script type="text/javascript" src="js/fblogin.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Bureau: A Ride In A Journey To Get Hired</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--SlideShow Files -->
    <link rel="stylesheet" type="text/css" href="slideshow.css" />

	    <link rel="stylesheet" href="css/login.css" />
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>-->
    <script src="js/login.js"></script>
</head>

<body>


<div class="con1">
    <?php include_once ('headerindex.php'); ?>

    <div class="con2">
        <div class="con3">

             <!--<?php include_once ('menu.php'); ?>-->


        <div class="menu_bar_border_bottom"></div>
            <div class="main_con">
                <div class="left_col">
                    <div class="slideshow_con">
                        <div class="wrapper">
                            <div id="slidewrap">
                                <ul class="slideshow">
                                    <li><a href="#"><img src="images/index1.jpg" height="222px" width="667px" title="Job Bureau v3.0" alt="The best way to appreciate your job is to imagine yourself without one."/></a></li>
                                    <li><a href="#"><img src="images/index2.jpg" height="222px" width="667px" title="Job Bureau v3.0" alt="If a job is worth doing, it's worth doing well"/></a></li>
                                    <li><a href="#"><img src="images/index3.jpg" height="222px" width="667px" title="Job Bureau v3.0" alt="If you do a good job for others, you heal yourself at the same time, because a dose of joy is a spiritual cure"/></a></li>
                                    <li><a href="#"><img src="images/index4.jpg" height="222px" width="667px" title="Job Bureau v3.0" alt="If a job is worth doing, it's worth doing well"/></a></li>
                                    <li><a href="#"><img src="images/index5.jpg" height="222px" width="667px" title="Job Bureau v3.0" alt="Big jobs usually go to the men who prove their ability to outgrow small ones."/></a></li>
                                </ul>
                            </div>
                            <div class="clr" ></div>
                        </div>
                    </div>
                    <div class="main_news_con">
                        <div class="main_news_post">
                            <div id="fblike">
                                <div class="main_news_post_img1">

                                    <img src="images/jobs_pic.jpg"  alt="" width="200" height="181" /><br>
                                </div>

                                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fjobbureau&amp;width=200&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=258" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:258px;" allowTransparency="true"></iframe>

                            </div>

 <!--<h2 style="margin-top: 5px; margin-left: 20px; color:blue;text-align:justify;" align="center">The Game is Over !!Thank You For playing 'Job Bureau-A Real Time Office Simulation' and giving us your valuable time.</h2>--->

                           <div class="main_news_post_text_con1">
                                <div class="main_news_post_text_details">
                                    <div class="clr">
                                        <h1 style="margin-top: 5px;margin-left: 10px">Welcome to the Job Bureau</h1><br />
                                        <p style="font-size: 12pt;margin-left: 10px"> Want to get hired!!!<br />
                                    </div>
                                </div>
                                <div class="main_news_post_text" style="margin-top: 30px" >
                                    <br><br>
                                    <p style="margin-left: 10px;font-size:110%">Get to use the world's latest technologies and software.
                                        It's time for you to experience the professional serene and achieve what you desire and are really capable of.
                                        Infotsav gives you a chance to get placed before the actual campus drive in a virtual world where you learn to be an efficient project leader and a skilled coder. The simulation takes you into the flock of assignments where you move ahead by gaining experience and money. </p><br /><br /><br /><br/>
                                    
                                   <p  style="padding-left: 10px;font-size: 120%">Login by using your <strong>Infotsav 'Username' and 'Password'</strong>. If you have not registered yet then visit the link: <a href="http://www.infotsav.org" target="_blank">http://infotsav.org </a>and kindly register yourself. </p>
                                </div>
								
                            </div>
							
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>

                <div class="right_col">
                    <div class="right_col_latest_matches">

							<!-- Login Starts Here -->
            <!--<div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" action="logincheck1.php" onsubmit="" method="post">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="uname" id="uname" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="pass" />
                            </fieldset>
							<p align="center" style="color: red;"><?php /*echo $error; */?></p>
                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                        </fieldset>
                        <span><a href="http://www.infotsav.org">Forgot your password?</a></span>
                    </form>
                </div>
            </div>-->
            <!-- Login Ends Here -->
								    <div class="right_col_header">
                            <span>+ Infotsav <span>&nbsp;Login</span> OR <fb:login-button autologoutlink="true" perms="email"></fb:login-button><img title="To allow login through facebook, you may need to allow pop-ups in your web browser." src="images/question_fb_help.jpg " /></span>
                        </div>

                        <div class="sponsor_img_con2">

                            <form action="logincheck1.php" onsubmit="" method="post">
                                <h2 align="center"><font color="#FFFFFF" face="calibri">	User</font><font color="#F8711E">name</font></h2><br/>
                                <input type="text" name="uname" id="uname" style="margin-left: 100px"  /><br/><br/>
                                <h2 align="center">	<font color="#FFFFFF" face="calibri">	Pass</font><font color="#F8711E">word</font></h2><br/>
                                <input type="password" style="margin-left: 100px" name="pass"/><br/><br/>
                                <p align="center" style="color: red;"><?php echo $error; ?></p>
                                <input type="image" style="margin-left: 150px" src="images/login.png" alt="Submit button" width="50px" height="50px" align="middle" /><br/><br/>


                            </form>


                        </div>

                    </div>

                    <div class="right_col_latest_threads">

                        <!--<script type="text/javascript">alert(1)</script>-->
<?php
    include_once('database.php');


    $db = new Database();
                        //echo '<script type="text/javascript">alert(2)</script>';
    $db->connect();
                        //echo '<script type="text/javascript">alert(3)</script>';

    include('side1.php');
    ?>
	<?php  include('sponsor.php');?>
                    </div>
					
					<!--<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fjobbureau&amp;width=347&amp;colorscheme=dark&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=158" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:347px; height:158px;" allowTransparency="true"></iframe>-->
					
                </div>
                <div class="clr"></div>
            </div>

            <?php include('indexfooter.php')?>
        </div>
    </div>
</div>
<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({appId: '152922538135936', status: true, cookie: true, xfbml: true});

        /* All the events registered */
        FB.Event.subscribe('auth.login', function(response) {
            // do something with response

            login(response);
        });
        FB.Event.subscribe('auth.logout', function(response) {
            // do something with response
            logout();
        });

        FB.getLoginStatus(function(response) {
            console.log(response);
            if (response.status=='connected') {
                // logged in and connected user, someone you know

                login(response);
            }
        });
    };
    (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());

    function login(response){
        FB.login(function(response) {
            if (response.authResponse) {

                FB.api('/me', function(response) {
                    var query = FB.Data.query('select  pic_square from user where uid={0}', response.id);
                    query.wait(function(rows) {

                        var pic = rows[0].pic_square;

                        $.post("fblogincheck1.php", {pic_sqr:pic,response:response},
                            function(data){

                                console.log(data);
                                if(data=='success')
                                {
                                    window.location='http://job.infotsav.org/ownprofile.php';
                                }
                            });



                    });
                });
            } else {

            }
        },{scope: 'user_education_history,user_birthday,user_hometown,user_about_me'});

    }
    function logout(){
        window.location='http://job.infotsav.org/logout.php';
        document.getElementById('login').style.display = "none";
        window.location='http://job.infotsav.org/logout.php';
    }

    //stream publish method
    function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
        FB.ui(
            {
                method: 'stream.publish',
                message: '',
                attachment: {
                    name: name,
                    caption: '',
                    description: (description),
                    href: hrefLink
                },
                action_links: [
                    { text: hrefTitle, href: hrefLink }
                ],
                user_prompt_message: userPrompt
            },
            function(response) {

            });

    }
    function showStream(){
        FB.api('/me', function(response) {
            //console.log(response.id);
            streamPublish(response.name, 'Job contains geeky stuff', 'hrefTitle', 'http://thinkdiff.net', "Share thinkdiff.net");
        });
    }

    function share(){
        var share = {
            method: 'stream.share',
            u: 'http://thinkdiff.net/'
        };

        FB.ui(share, function(response) { console.log(response); });
    }

    function graphStreamPublish(){
        var body = 'asdsadsa';
        FB.api('/me/feed', 'post', { message: body }, function(response) {
            if (!response || response.error) {
                alert('Error occured');
            } else {
                alert('Post ID: ' + response.id);
            }
        });
    }

    function fqlQuery(){
        FB.api('/me', function(response) {
            var query = FB.Data.query('select  pic_square from user where uid={0}', response.id);
            query.wait(function(rows) {

                console.log(rows);
            });
        });
    }

    function setStatus(){
        status1 = document.getElementById('status').value;
        FB.api(
            {
                method: 'status.set',
                status: status1
            },
            function(response) {
                if (response == 0){
                    alert('Your facebook status not updated. Give Status Update Permission.');
                }
                else{
                    alert('Your facebook status updated');
                }
            }
        );
    }
</script>

</body>
</html>
