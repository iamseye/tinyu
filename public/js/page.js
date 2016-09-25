function page(){

    $("#contactSelect li").click(function(){
        var index = $("#contactSelect li").index(this),
        	page = $(".contactContent").eq(index);
            
        $(".contactContent").css("display","none");
        $(page).fadeIn(200);
    });

    $("#goTop").click(function(){
        $('html,body').animate({scrollTop:$("#insideSelect").offset().top},650);
    });

}


$(window).load(function(){

    page();

});