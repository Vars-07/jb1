$(document).ready(function(){
    var action = 0;
    $("#basketItemsWrap li:first").hide();

    $(".productPriceWrapRight a img").click(function() {

        if(action == 0)
        {
            action = 1;


            var productIDValSplitter 	= (this.id).split("_");
            var productIDVal 			= productIDValSplitter[1];
            var id = $(this).attr('title').split(":");
           // //console.log(id[1]);

            var productX 		= $("#productImageWrapID_" + productIDVal).offset().left;
            var productY 		= $("#productImageWrapID_" + productIDVal).offset().top;

            if( $("#productID_" + productIDVal).length > 0){
                var basketX 		= $("#productID_" + productIDVal).offset().left;
                var basketY 		= $("#productID_" + productIDVal).offset().top;
            } else {
                var basketX 		= $("#basketTitleWrap").offset().left;
                var basketY 		= $("#basketTitleWrap").offset().top;
            }

            var gotoX 			= basketX - productX;
            var gotoY 			= basketY - productY;

            var newImageWidth 	= $("#productImageWrapID_" + productIDVal).width() / 3;
            var newImageHeight	= $("#productImageWrapID_" + productIDVal).height() / 3;

            $("#productImageWrapID_" + productIDVal + " img")
                .clone()
                .prependTo("#productImageWrapID_" + productIDVal)
                .css({'position' : 'absolute'})
                .animate({opacity: 0.4}, 100 )
                .animate({opacity: 0.1, marginLeft: gotoX, marginTop: gotoY, width: newImageWidth, height: newImageHeight}, 1200, function() {
                    action = 0;

                    $("#notificationsLoader").html('<img src="images/loader.gif" width="20px">');

                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        async:true,
                        url: "packagebasket.php",
                        data: { PID: id[1]},
                        success: function(theResponse) {
                            ////console.log(theResponse.rem);
                            if(theResponse.success == 'TRUE')
                            {
                                var divid = '#package_'+productIDVal;var  path = theResponse.logo;																																																																							  			$(this).remove();
                                ////console.log(divid);
                                $("#productTaken").append('<li id="productID_'+ productIDVal+'" style="opacity:0;margin-left:10px;">'+theResponse.name+' - Rs:'+theResponse.money+'<img src=" '+path+'"  style="cursor: pointer;z-index: 154872; width:25px;height:25px;float:right;"></li>');
                                $("#productID_" + productIDVal).animate({ opacity: 1 }, 500);
                                $("#notificationsLoader").empty();
                                //console.log(theResponse);
                                // $("#total").append(+theResponse.name+' - Rs:'+theResponse.totalbuy);
                                $("#total").text(" Rs:"+theResponse.totalbuy);
                                $("#rem").text(" Rs:"+theResponse.rem);
                                // alert(theResponse.totalbuy);
                                // alert($_SESSION['purchased']);
                                //$('#basic-modal-content').modal();
                            }
                            else if(theResponse.success == 'ALREADY')
                            {
                                //$('#basic-modal-content').modal();
                                $("#notificationsLoader").empty();
                            }
                            else
                            {
                                //alert("not enough money!");
                                //alert($_SESSION['purchased']);
                                $("#notificationsLoader").empty();
                                // $('#basic-modal-content').modal();
                                // $('#basic-modal-content').load('errors.php?value=1').modal();

                                $('#basic-modal-content').load('errors.php?value=1' , function(response, status, xhr) {
                                    if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                                        $('#simplemodal-container').css('height','auto');
                                    }
                                    else{

                                    }
                                }).modal();
                                $('#simplemodal-container').animate({'height':'150px' , 'top':'20%','width':'620px','left':'30%'},1000);



                            }



                        }

                    });


                    //lol

                });
        }
    });



    $("#basketItemsWrap li img").live("click", function(event) {
        var productIDValSplitter 	= (this.id).split("_");
        var productIDVal 			= productIDValSplitter[1];
        var id = $(this).attr('title').split("_");
        ////console.log(id[1]);

        $("#notificationsLoader").html('<img src="images/loader.gif" width="20px">');

        $.ajax({

            type: "POST",
            dataType: 'json',
            async:true,
            url: "removeitems.php",
            data: { PID: id[1]},
            success: function(theResponse) {
                ////console.log(theResponse);

                $("#productID_" + productIDVal).hide("slow",  function() {$(this).remove();});
                $("#notificationsLoader").empty();
                $("#total").text(" Rs:"+theResponse.totalbuy);
                $("#rem").text(" Rs:"+theResponse.usermoney);


                // return false;


            }
        });

    });





});
