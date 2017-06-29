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
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="vehicle-option-select vehicle-toolbar-manufacturer-select">
                            <label class="control-label"> Hersteller:</label>
                            <select class="form-control" id="fzg_id2">
                                <option class="fixed" value="0" selected="selected">Hersteller / Marke
                                    ausw&#228;hlen
                                </option>
                                <optgroup class="top" label="Top-Automarken"></optgroup>
                                @foreach($fzgTop as $fzg)




                                    <option value="{{$fzg->hersteller_id}}">{{$fzg->marke}}</option>

                                @endforeach
                                <optgroup label="Alle Automarken"></optgroup>
                                @foreach($fzgRest as $fzg)

                                    <option value="{{$fzg->hersteller_id}}">{{$fzg->marke}}</option>


                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="experten">
    @if($experten->total()<3)
            <div class="row">
                @foreach($experten as $ex)
                    <div class="col-md-4 portfolio-item">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                        </a>
                        <h3>
                            <a href="#">{{  $ex->user_name }}</a>
                        </h3>

                    </div>
                @endforeach
            </div>
        @else
        @foreach($experten->chunk(3) as $exList)
        <!--  Row -->
        <div class="row">
            @foreach($exList as $ex)
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">{{  $ex->user_name }}</a>
                </h3>

            </div>
            @endforeach

        </div>

        <!-- /.row -->
            @endforeach

    @endif
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