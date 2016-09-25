$(document).ready(function(){

    $("#openMenu").click(function(){

        var w = $("#wrapper").width();

        if ( w < 768 ){
            $("#closeMenu").show();
            $("#BgMenu").css("left","0%");
            $("#wrapper").addClass("blur");

            $("#openMenuBefore").addClass("rotateBefore");
            $("#openMenuAfter").addClass("rotateAfter");
            $("#openMenu").css("background","rgba(0,0,0,0)");
        }

    });
    
    $("#closeMenu").click(function(){

        var w = $("#wrapper").width();

        if ( w < 768 ){
            $("#closeMenu").hide();
            $("#BgMenu").css("left","-90%");
            $("#wrapper").removeClass("blur");

            $("#openMenuBefore").removeClass("rotateBefore");
            $("#openMenuAfter").removeClass("rotateAfter");
            $("#openMenu").css("background","rgb(0, 0, 0)");
        }

    });

});


$(window).resize(function(){

        var w = $("#wrapper").width();

        if ( w > 768 ){
            $("#closeMenu").hide();
            $("#BgMenu").css("left","-90%");
            $("#wrapper").removeClass("blur");

            $("#openMenuBefore").removeClass("rotateBefore");
            $("#openMenuAfter").removeClass("rotateAfter");
            $("#openMenu").css("background","rgb(0, 0, 0)");
        }
        
});
