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



                        options.append($("<option />").val(modell.fzg_modell_id).text(modell.hersteller + " " + modell.modell));


                });
            });
    });

    $("#modell_id").change(function() {


        if(this.value==0){
            //do nothing
        } else{
            //send request
            $.get( window.location.pathname+"/fragen?modell="+this.value).done(function(data){
                var $replaceString=$(data);
                var newStringFragen=$replaceString.find(".fragenCon");
                var newStringFahrzeug = $replaceString.find("#fahrzeugAuswahl");
                //replace link for paginating

               $(".fragenCon").html(newStringFragen);
                $("#fahrzeugAuswahl").replaceWith(newStringFahrzeug);

            });


        }

    });





});