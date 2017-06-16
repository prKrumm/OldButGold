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

function mail (id){
    var path="/admin/emailInhalt?emailId="
    $.ajax({
        url: path + id,
        type: "GET",
        dataType: 'json',
        contentType: 'json',
        cache: false,
        success: function (data) {
            console.log(data);
            console.log(data["0"].frage_id);
            $("#mailTitel").html("<strong>Betreff: </strong>" +data["0"].titel);
            $("#mailContent").html(data["0"].text);
        }
    });
}