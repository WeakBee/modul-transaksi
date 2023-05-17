$( ".sign-indicator" ).on( "click", function() {
    if($(this).hasClass("aktif")){

    } else {
        if($(this).hasClass("sign-in-indicator")){
            $(".sign-up-indicator").removeClass( "aktif" );
            $(".sign-in-indicator").addClass( "aktif" );
            $(".signup-box").removeClass( "aktif" );
            $(".login-box").addClass( "aktif" );
        } else if($(this).hasClass("sign-up-indicator")){
            $(".sign-in-indicator").removeClass( "aktif" );
            $(".sign-up-indicator").addClass( "aktif" );
            $(".login-box").removeClass( "aktif" );
            $(".signup-box").addClass( "aktif" );
        }
        
    }
} );