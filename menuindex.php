

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({appId: '152922538135936', status: true, cookie: true, xfbml: true});

        /* All the events registered */
        FB.Event.subscribe('auth.login', function(response) {
            // do something with response
            console.log(response);
            console.log('fbAsyncInit');
            login();
        });
        FB.Event.subscribe('auth.logout', function(response) {
            // do something with response
            logout();
        });

        FB.getLoginStatus(function(response) {
            if (response.session) {
                // logged in and connected user, someone you know
                console.log(response);
                console.log('getLoginStatus');
                login();
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

    function login(){
        FB.api('/me', function(response) {
            console.log(response);
            /* document.getElementById('login').style.display = "block";
     document.getElementById('login').innerHTML = response.name + " succsessfully logged in!";*/
            //   window.location='http://job.infotsav.org/logincheck1.php?response='+response;

            /*   $.ajax({
                type: "POST",
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                async:false,
                url: "fblogincheck1.php",
                data:(response),
                success: function(theResponse) {



                }
            });*/


            $.post("fblogincheck1.php", response,
                function(data){
                    console.log(data);
                    //alert(1);
                    if(data=='success')
                    {
                        window.location='http://job.infotsav.org/ownprofile.php';
                    }
                });



        });
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
            var query = FB.Data.query('select name, hometown_location, sex, pic_square from user where uid={0}', response.id);
            query.wait(function(rows) {

                document.getElementById('name').innerHTML =
                    'Your name: ' + rows[0].name + "<br />" +
                        '<img src="' + rows[0].pic_square + '" alt="" />' + "<br />";
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
<div class="menu_bar_con">
    <ul class="top_menu">
		<li><a href="index.php" >Home</a></li>
    </ul>
</div>
</body>
</html>
