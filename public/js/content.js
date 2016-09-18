function content(){
    var h0 = $(window).height(),
        h1 = $("#header").height();

    $("#content").css("min-height",h0-h1-100);
}



$(document).ready(function(){
    content();
});

$(window).resize(function(){
    content(); 
});