<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>OldButGold</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<!--AJAX JQuery-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--Fonts-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap tags input -->
<script src="{{asset('/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<!-- Type aheaed -->
<script src="{{ asset('/js/typeahead/dist/typeahead.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/typeahead/dist/bloodhound.min.js') }}" type="text/javascript"></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/footer.css') }}" rel="stylesheet">
<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
<link href="{{ asset('css/allSites.css') }}" rel="stylesheet">
<link href="{{ asset('css/question.css') }}" rel="stylesheet">
<link href="{{ asset('css/fahrzeugAuswahl.css') }}" rel="stylesheet">
<link href="{{ asset('css/experts.css') }}" rel="stylesheet">
<link href="{{ asset('css/socialMedia.css') }}" rel="stylesheet">

<!-- JS -->
<script type="text/javascript" src="{{ asset('js/fzgAuswahl.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/typeahead.js') }}"></script>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });
</script>