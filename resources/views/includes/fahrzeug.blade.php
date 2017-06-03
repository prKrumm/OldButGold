<section class="fahrzeugAuswahl">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="fahrzeugAuswahlText">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div>
                            <strong>Bitte Ihr Fahrzeug auswählen!</strong>
                            <p>
                                <i class="material-icons md-48">drive_eta</i></p>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- waterfall-style vehicle selector -->
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="vehicle-option-select vehicle-toolbar-manufacturer-select">
                            <label class="control-label"> Hersteller:</label>
                            <select class="form-control" id="fzg_id">
                                <option class="fixed" value="0" selected="selected">Hersteller / Marke
                                    ausw&#228;hlen
                                </option>
                                <optgroup class="top" label="Top-Automarken"></optgroup>
                                @foreach($fzgModelle as $fzg)
                                    <option value="{{$fzg->fzg_modell_id}}">{{$fzg->hersteller}}</option>
                                @endforeach
                                <optgroup label="Alle Automarken"></optgroup>
                                <option value="10009">AC</option>
                                <option value="10044">Aixam</option>
                                <option value="9948">Alfa Romeo</option>

                            </select>
                        </div>
                        <div class="vehicle-option-select vehicle-toolbar-model-select">
                            <label class="control-label">Modell:</label>

                            <select class="form-control" id="modell_id" disabled="disabled">
                                <option class="fixed" value="">Modell</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

