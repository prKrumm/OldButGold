/**
 * Created by floriankaiser on 11.04.17.
 */

$(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
    } else {
        $('nav').removeClass('shrink');
    }
});


$(".anchor").click(function(){
    $(".anchor").removeClass("active");
    $(this).addClass("active");
});