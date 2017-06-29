/**
 * Created by Vk on 19.06.2017.
 */

function addVote($antwort_id, $upOrDown, $frage_id) {
   try {
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
               error: function (xhr) {

               }
           });
   }

}