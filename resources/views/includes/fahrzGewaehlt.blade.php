<section class="fahrzeugAuswahl">
    <div id="fahrzeugAuswahl" style="display: flex; justify-content: center">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="rahmenText">
                <div id="strongText">Ausgewähltes Fahrzeug</div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                <i class="material-icons md-36">drive_eta</i>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-3 col-xs-12">
                <div id="selectedCar">
                @if(Session::has('fzgName'))
                        <div class="strongText"><strong>{{Session::get('fzgName')->marke}} {{Session::get('fzgModell')}}</strong></div>
                @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div>
                    @yield('content2')
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
