
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')

</head>

<body>

<header>
    @include('includes.header')
</header>

<div class="container">
<div class ="col-lg-12 col-md-12">
@include('includes.fahrzeug')
</div>
</div>

<div class="container">

<div class="col-lg-12 col-md-12">
    @yield('content')
</div>
</div>




<footer class="footer">
    @include('includes.footer')
</footer>



</body>
</html>