$(document).ready(function(){
    var action = 0;
    // alert('first '+action);
    $("#basketItemsWrap li:first").hide();

    $(".productPriceWrapRight a img").click(function() {
        if(action == 0)
        {
            //alert("1");
            action = 1;
            var id = $(this).attr('title').split(": ");
            ////console.log(id[1]);

            // alert("2");
            var productIDValSplitter 	= (this.id).split("_");
            var productIDVal 			= productIDValSplitter[1];
            // alert("3");
            var productX 		= $("#productImageWrapID_" + productIDVal).offset().left;
            var productY 		= $("#productImageWrapID_" + productIDVal).offset().top;

            if( $("#productID_" + productIDVal).length > 0){
                var basketX 		= $("#productID_" + productIDVal).offset().left;
                var basketY 		= $("#productID_" + productIDVal).offset().top;
            } else {
                var basketX 		= $("#basketTitleWrap").offset().left;
                var basketY 		= $("#basketTitleWrap").offset().top;
                //  alert("4");
            }

            var gotoX 			= basketX - productX;
            var gotoY 			= basketY - productY;

            var newImageWidth 	= $("#productImageWrapID_" + productIDVal).width() / 3;
            var newImageHeight	= $("#productImageWrapID_" + productIDVal).height() / 3;
            //  alert(productIDVal);
            $("#productImageWrapID_" + productIDVal + " img")
                .clone()
                .prependTo("#productImageWrapID_" + productIDVal)
                .css({'position' : 'absolute'})
                .animate({opacity: 0.8}, 100 )
                .animate({opacity: 0.0, marginLeft: gotoX, marginTop: gotoY, width: newImageWidth, height: newImageHeight}, 1200, function() {
                    action = 0;







                    $("#notificationsLoader").html('<img src="images/loader.gif" width="20px" >');

                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        async:false,
                        url: "basket.php",
                        data: { PID: id[1]},
                        success: function(theResponse) {
                            //var theResponse = jQuery.parseJSON(obj.responseText);
                            // //console.log(theResponse);
                            
							if(theResponse.success == 'true')
                            {
                                var divid = '#project_'+productIDVal;																																																																							  			$(this).remove();
                                ////console.log(divid);
                                $(divid).animate({width:'100px',height:'100px'}, 500, 'linear', function() {
                                    $(divid).addClass('circle-label-rotate');
                                }).addClass('circle').html('<div class="innertext"></div>').animate({"opacity":"0","margin-left":"510px"},100,function(){   $(divid).animate({'width':'0px','height':'0px'},function(){$(divid).css('display','none')}); });
                                $(divid).slideUp({duration: 'fast',easing: 'easeOutBounce'});
                                $("#projectTaken").append('<li id="productID_'+ productIDVal+'" style="opacity:0"> '+theResponse.name+' -Exp. '+theResponse.experience+'Hrs</li>');
                                $("#productID_" + productIDVal).animate({ opacity: 1 }, 500);
                                $("#notificationsLoader").empty();
                            }
                            else if(theResponse.success == 'already')
                            {
                                $("#notificationsLoader").empty();
                                // alert("requirements");
                                // $.modaldialog.error('The operation failed.');
                                // $('#basic-modal-content').load('errors.php?value=5').modal();

                                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                                $('#basic-modal-content').load('errors.php?value=6' , function(response, status, xhr) {
                                    if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                        $('#simplemodal-container').css('height','auto');
                                    }
                                    else{

                                    }
                                    //  $('#simplemodal-container').css({'opacity':0});


                                }).modal();
                                $('#simplemodal-container').animate({opacity:1});

                                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                                $('#simplemodal-container').css({height:'150px' , width:'350px'});


                            }
							else if(theResponse.success == 'temper')
                            {
                                $("#notificationsLoader").empty();
                                // alert("requirements");
                                // $.modaldialog.error('The operation failed.');
                                // $('#basic-modal-content').load('errors.php?value=5').modal();

                                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                                $('#basic-modal-content').load('errors.php?value=8' , function(response, status, xhr) {
                                    if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                        $('#simplemodal-container').css('height','auto');
                                    }
                                    else{

                                    }
                                    //  $('#simplemodal-container').css({'opacity':0});


                                }).modal();
                                $('#simplemodal-container').animate({opacity:1});

                                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                                $('#simplemodal-container').css({height:'150px' , width:'350px'});


                            }

                            else
                            {



                                $("#notificationsLoader").empty();
                                // alert("requirements");
                                // $.modaldialog.error('The operation failed.');
                                // $('#basic-modal-content').load('errors.php?value=5').modal();

                                $('#basic-modal-content').html('<img src="images/loadingAnimation.gif"/>');


                                $('#basic-modal-content').load('errors.php?value=5' , function(response, status, xhr) {
                                    if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                        $('#simplemodal-container').css('height','auto');
                                    }
                                    else{

                                    }
                                    //  $('#simplemodal-container').css({'opacity':0});


                                }).modal();
                                $('#simplemodal-container').animate({opacity:1});

                                $('#simplemodal-container').css({'top':'20%', 'left':'40%'});
                                $('#simplemodal-container').css({height:'150px' , width:'350px'});

                            }



                        }
                    });



                    //lol


                });
            // //console.log('last'+action);

        }
    });


//lol
    $("#basketItemsWrap li img").live("click", function(event) {
        var productIDValSplitter 	= (this.id).split("_");
        var productIDVal 			= productIDValSplitter[1];

        $("#notificationsLoader").html('<img src="images/loader.gif">');

        $.ajax({
            type: "POST",
            url: "inc/functions.php",
            data: { productID: productIDVal, action: "deleteFromBasket"},
            success: function(theResponse) {

                $("#productID_" + productIDVal).hide("slow",  function() {$(this).remove();});
                $("#notificationsLoader").empty();

            }
        });

    });

});
