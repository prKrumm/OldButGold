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
            $("#mailTitel").html("<strong>Betreff: </strong>" +data["0"].titel);
            $("#mailContent").html(data["0"].text);
            $("#mailContent").addClass('mailContent');
            $("#mailAbsender").html("<span class=\"glyphicon glyphicon-pencil\"></span>" +"<strong>  Absender: </strong>" +data["0"].email);
            $("#mailDatum").html("  <span class=\"glyphicon glyphicon-calendar\"></span>" + "<strong>  Eingang: </strong>" +data["0"].created_at);
        }
    });
}