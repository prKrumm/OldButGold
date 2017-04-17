<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')

</head>

<body>


@include('includes.header')


@include('includes.fahrzeug')

<div class="container">
    <div class="row">
        <div class="col-9 col-md-9 col-sm-9">
            @yield('content')
        </div>
        <div class="col-3 col-md-3 col-sm-3">
            @include('includes.sidebar')

        </div>
    </div>
</div>


@include('includes.footer')


</body>
</html>