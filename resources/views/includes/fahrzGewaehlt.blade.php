<section class="fahrzeugAuswahl">
    <div id="fahrzeugAuswahl">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="strongText">Ausgewähltes Fahrzeug</div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                <i class="material-icons md-36">drive_eta</i>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                @if(Session::has('fzgObject'))
                <div class="strongText">{{Session::get('fzgName')}} {{Session::get('fzgModell')}}</div>
                @endif
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                <i class="material-icons md-36">delete</i>
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
