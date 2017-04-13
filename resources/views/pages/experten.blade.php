@extends('layouts.master')

@section('content')
<br>
<br><br>
<br>
<br>

    <div class="container">
        <div class="col-md-3">
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>

        </div>

        <div class="col-md-9">
            <div id="map" style="width:800px;height:400px;">
            </div>

        </div>
    </div>

    <script>
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 5,
            };
            var map = new google.maps.Map(document.getElementById("map"), mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyBpq6wXc5096z2EmVMfKYk-3U-kJoTPAbI&callback=myMap"></script>



@endsection