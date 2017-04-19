<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')

</head>

<body>


@include('includes.header')


@include('includes.fahrzGewählt')


@yield('content')



@include('includes.footer')


</body>
</html>