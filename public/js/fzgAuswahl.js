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

                } else{ options.empty()}
               
                $.each(data, function(i,modell) {


                        options.append($("<option />").val(modell.hersteller+" "+modell.modell).text(modell.hersteller+" "+modell.modell));

                });
            });
    });


});