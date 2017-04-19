@extends('layouts.master')

@section('content')


    <div class="container">
        <h2 class="left">Experten</h2>

        <div class="row">
            <div class="col-md-12">
                <div id="map">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <select class="form-control">
                        <option class="fixed" value="" selected="selected">Hersteller / Marke
                            ausw&#228;hlen
                        </option>
                        <optgroup class="top" label="Top-Automarken"></optgroup>
                        <option class="top" value="9950">Audi</option>
                        <option class="top" value="9953">BMW</option>
                        <option class="top" value="9960">Fiat</option>
                        <option class="top" value="9961">Ford</option>
                        <option class="top" value="10004">Hyundai</option>
                        <option class="top" value="9971">Mercedes-Benz</option>
                        <option class="top" value="9977">Opel</option>
                        <option class="top" value="9980">Renault</option>
                        <option class="top" value="9983">Seat</option>
                        <option class="top" value="9984">Skoda</option>
                        <option class="top" value="9988">Toyota</option>
                        <option class="top" value="9992">VW</option>
                        <optgroup label="Alle Automarken"></optgroup>
                        <option value="10009">AC</option>
                        <option value="10044">Aixam</option>
                        <option value="9948">Alfa Romeo</option>
                    </select>
                </div>
            </div>
        </div>

        <!--  Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
        </div>
        <!-- /.row -->

        <!--  Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Classic Parts GmbH</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida
                    pellentesque urna varius vitae.</p>
            </div>
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