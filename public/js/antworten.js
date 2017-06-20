/**
 * Created by Vk on 19.06.2017.
 */

function addVote($antwort_id, $upOrDown) {

    var path = window.location

    $.post(
        '/storeVotes',
        {
            'antwort_id': $antwort_id,
            '_token': $('input[name=_token]').val(),
            'value': parseInt($upOrDown)
        }
    )
    console.log($response);

    // /per ajax an ErsatzteilTreffpunt@storeVote schicken


    /*   $.ajax({
     url: '/storeVotes',
     type: "POST",
     dataType: 'json',
     contentType: 'json',
     cache: false,
     data: {
     'antwort_id': $antwort_id,
     '_token': $('input[name=_token]').val(),
     'value': 1
     },
     success: function (data) {
     console.log(data);
     }
     }
     )
     */
    // $(".antworten").load("/treffpunkt/id/4")
}