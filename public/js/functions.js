/**
 * Created by floriankaiser on 28.06.17.
 */
/**
 * Created by Patrick on 03.06.2017.
 */

$().ready(function() {



    $("#fzg_id").change(function() {

        //delete old modelle
        var options = $("#modell_id");
        $('#modell_id')
            .empty()
            .append(' <option class="fixed" value="">Modell</option>')
        ;

        if (($("#modell_id").attr('disabled'))&&(this.value!=0) ) {
            $("#modell_id").removeAttr('disabled');
        }
        if(this.value==0){
            $("#modell_id").attr({
                'disabled': 'disabled'
            });
        }
        //load modelle via ajax
        $("#modell_id").load("" + $("#first-choice").val());
        $.get( "/modelle?fahrzeug="+this.value)
            .done(function( data ) {
                var options = $("#modell_id");
                if(data.length==0){

                } else{

                    options.empty().append(' <option class="fixed" value="">Modell</option>')}

                $.each(data, function(i,modell) {



                    options.append($("<option />").val(modell.fzg_modell_id).text(modell.modell));


                });
            });
    });

    var anfrage =function () {
        if(this.value==0){
            //do nothing
        } else{

            var path=window.location.pathname+"/fragen?modell=";
            if(path.indexOf("treffpunkt")!==-1){
                path="/treffpunkt/fragen?modell="
            }
            if(path.indexOf("ersatzteil")!==-1){
                path="/ersatzteil/fragen?modell="
            }

            //send request
            $.get( path+this.value).done(function(data){
                var $replaceString=$(data);
                var newStringFragen=$replaceString.find(".fragenCon");
                var newStringFahrzeug = $replaceString.find("#fahrzeugAuswahl");
                var newStringSideBar = $replaceString.find("#sidebarContainer");
                //replace link for paginating

                $(".fragenCon").html(newStringFragen);
                $("#fahrzeugAuswahl").replaceWith(newStringFahrzeug);
                $("#sidebarContainer").replaceWith(newStringSideBar);
            });
        }
    }

    var anfrage2 =function () {
        var thema=$(this).attr("value");

        var path=window.location.pathname+"/fragen?thema=";
        if(path.indexOf("treffpunkt")!==-1){
            path="/treffpunkt/fragen?thema="
        }
        if(path.indexOf("ersatzteil")!==-1){
            path="/ersatzteil/fragen?thema="
        }

        //send request
        $.get( path+thema).done(function(data){
            var $replaceString=$(data);
            var newStringFragen=$replaceString.find(".fragenCon");
            var newStringFahrzeug = $replaceString.find("#fahrzeugAuswahl");
            var newStringSideBar = $replaceString.find("#sidebarContainer");
            //replace link for paginating

            $(".fragenCon").html(newStringFragen);
            $("#fahrzeugAuswahl").replaceWith(newStringFahrzeug);
            $("#sidebarContainer").replaceWith(newStringSideBar);
        });
        $( this ).css( "color", "yellow" );

        //return false;
    }

    $("#modell_id").change(anfrage);




    $("#frageKnopf").click(function() {
        if($("#modell_id").val()!=''){

        } else {
            $("#fahrzeugAuswahl").effect( "shake", {times:4}, 1000 );
            return false;
        }
    });

});


function addVote($antwort_id, $upOrDown, $frage_id) {

    /*
     TODO
     - Autorisierung: Hinweis, wenn User nicht eingeloggt!
     - Autorisierung: User darf nur einmal pro Frage voten!
     */
    $.ajax({
            url: '/storeVotes',
            type: "POST",
            cache: false,
            data: {
                'antwort_id': $antwort_id,
                '_token': $('input[name=_token]').val(),
                'value': $upOrDown,
                'frage_id': $frage_id,
            },
            success: function (data) {
                $.each($('.col-md-10 p'), function (index) {
                    $(this).replaceWith('<p>' + data[index].text + '</p>');
                });

                $.each($('.detailAntwortenCount p'), function (index) {
                    if (data[index].value === null) {
                    }
                    else {
                        $(this).replaceWith('<p>' + data[index].value + '</p>')
                    }

                });
            },
            error: function () {
            }
        }
    )
};


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
};





