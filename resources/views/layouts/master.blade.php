
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
@include('includes.head')

</head>

<body>

    <header>
       @include('includes.header')
    </header>


    <div class="row">
    @yield('content')
    </div>




    <footer class="footer">
        @include('includes.footer')
    </footer>



</body>
</html>