/**
 * Created by patrickkrumm on 29.06.2017.
 */
$().ready(function() {



    $("#fzg_id2").change(function() {

        $.get( "/experten?fahrzeug="+this.value)
            .done(function( data ) {
                var $replaceString=$(data);
                var newStringExperten=$replaceString.find(".experten");

                //replace link for paginating

                $(".experten").replaceWith(newStringExperten);

            });
    });
});