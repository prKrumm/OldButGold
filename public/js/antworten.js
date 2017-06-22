/**
 * Created by Vk on 19.06.2017.
 */

function addVote($antwort_id, $upOrDown, $frage_id) {

    /*
     TODO
     Autorisierung: Hinweis, wenn User nicht eingeloggt!
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
                $.each($('.detailAntwortenCount p'), function (index) {
                    if (data[index].value === null) {
                    }
                    else {
                        $(this).replaceWith('<p>' + data[index].value + '</p>')
                    }
                    ;
                    console.log(index, data[index].value)
                });
            }
        }
    )
}