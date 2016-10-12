
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Magical Feedback form with jQuery</title>
    
    <script type="text/javascript" src="js/jquery.easing.1.3.js.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var feed_width = $('#feedback').width();
            var scr_w = screen.width; // Screen Width
            // 26 is width of the veritcal feedback button
            var btn_width = 40;
            var move_right = scr_w -  btn_width;
            var move_left = -(feed_width - btn_width);
            var slide_from_left = 0;
            var slide_from_right = scr_w - (feed_width - btn_width);
            var center = ( scr_w / 2 ) - ( feed_width / 2 );

            // Positioning the feedback form at the time of page loading
            positioningForm();

            // Handling the right_btn and lift_btn event animations
            $('.right_btn').click(function(){
                slideFromRight();
            });
            $('.left_btn').click(function(){
                slideFromleft();
            });
            // Moving left or right by clicking close button
            $('.feed_close').click(function(){
                var pos = $('#feedback').position();
                var ls = pos.left;
                if(ls ==  slide_from_left){
                    // feedback form is at LEFT
                    moveRight();
                }else if(ls == center){
                    // feedback form is at RIGHT
                    moveRight();
                }else{
                    // feedback form is at CENTER
                    moveRight();
                }
            });



            function positioningForm(){
                $('.left_btn').hide();
                $('#feedback').css({"left": move_right+"px"}).show();
            }
            function slideFromRight(){
                $('#feedback').animate({left: slide_from_right+"px"},{duration: 'slow',easing: 'easeOutElastic'});
                $('.left_btn').hide();
            }
            function slideFromleft(){
                $('#feedback').animate({left: slide_from_left+"px"},{duration: 'slow',easing: 'easeOutElastic'});
                $('.right_btn').hide();
            }
            /* function moveLeft(){
             $('#feedback').animate({left: move_left+"px"},{duration: 'slow',easing: 'easeOutElastic'});
             $('.left_btn').show();
             }*/

            function moveRight(){
                $('#feedback').animate({left: move_right+"px"},{duration: 'slow',easing: 'easeOutElastic'});
                $('.right_btn').show();
            }


        });
    </script>
    <script type="text/javascript ">  function validate(){

                var name=$('#name').val();
                var email=$('#email').val();
                var msg=$('#msg').val();

                if(name.length>0 && email.length>0 && msg.length>0)
                {


                   // $('.left_btn').hide();
                   // $('.right_btn').hide();
                     //$('.box').hide();
                    // $('#feedback').animate({left: center+"px"},{duration: 'slow',easing: 'easeOutElastic'});
                   // $('.thankyou').show();
                    moveRight();
                    return true;

                }
                else
                {
                    $('#error').html('*All fields are mandatory!');
                }
                return false;

            }</script>
    <style type="text/css">
        body{
            width: 100%;
            overflow: auto; /* This is IMP */
            padding: 0;
            margin: 0;
            font-family:arial;
        }
       
        #feedback{
            width: 400px;
            position: fixed;
            top: 100px;
            display: none;
            padding-right:20px;

        }
        #feedback .formdiv{
            width: auto;
            float: left;
            background-color:#333;
            -moz-border-radius-bottomright: 6px;
            -moz-border-radius-bottomleft: 6px;
            border-bottom-right-radius:6px;
            border-bottom-left-radius:6px;
            min-height:100px;
        }
        #feedback label{
            font:bold 11px arial;
            color:#fff;
        }
        #feedback textarea{
            width: 290px;
            height: 100px;
            color: #000;
            font: normal 11px verdana;
            border: none;
            padding: 5px;
            background-color: #fff;
            -moz-box-shadow: inset 1px 1px 1px ;
            -webkit-box-shadow: inset 1px 1px 1px ;
            resize: none;  /* disable extending textarea in chrome */
        }
        #feedback input[type="text"]{
            color: #000;
            font: normal 11px verdana;
            padding: 3px;
            width: 150px;
            height: 25px;
            border: none;
            color: #000;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            background-color: #fff;
            -moz-box-shadow: inset 1px 1px 1px ;
            -webkit-box-shadow: inset 1px 1px 1px ;
        }
        #feedback input[type="submit"]{
            background-color: #666;
            border: none;
            color: #fff;
            font:bold 11px arial;
            padding: 2px 6px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            cursor: pointer;
        }
        #feedback .left_btn,
        #feedback .right_btn{
            width: 26px;
            height: 100px;
            float: left;
            cursor: pointer;
        }

        #feedback .feed_close{
            cursor: pointer;
            margin:-15px -5px 0px 0px;

        }
        #error
        {
            color:#fff;
            padding:4px;
            font-size:11px;

        }
        .thankyou
        {
            text-align:center;
            display:none;

        }
        .textmsg
        {
            font-size:28px;
            font-family:'Georgia',Times New Roman,Times,serif;
            text-align:center;


        }

    </style>
</head>
<body>
<div id="feedback">
    <div class="right_btn"><img src="images/feed_right_btn.png" width="26px" height="99px"/></div>
    <div class="formdiv">

        <div class='thankyou'>
            <h3>Thank you !</h3>
            <div class="feed_close"><img src="images/feed_close_btn.png" width="25px" height="29px"/></div>
        </div>
        <div class="box" style="width: auto">
            <form method="post" action="insertfeedback.php"  onsubmit="return validate()">
                <table border="0">
                    <tr>
                        <td><label>name:</label><br/><input type="text" name="name"  id="name"/> </td>
                        <td valign="middle" align="right"><div class="feed_close"><img src="images/feed_close_btn.png" width="16px" height="15px"/></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Type (bug/suggestion):</label><br/><input type="text" name="type" id="email"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>message: </label><br/><textarea rows="5" cols="15" name="msg" id="msg"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="submit_btn" type="submit" value="Submit"/><span id="error"></span></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="form_submit"></div>
    <div class="left_btn"><img src="images/feed_left_btn.png" width="26px" height="99px"/></div>

</div>

</body>
</html>
