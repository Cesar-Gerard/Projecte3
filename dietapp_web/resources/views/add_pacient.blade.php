@include('nav_bar')

    <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
    <script src="{{asset('js/add_pacient.js')}}"></script>

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_afegir_pacient: "{{ route('pacient.add') }}",
                zone_pacients: "{{ route('pacients') }}",
            },
            vars: {
                nutricionist: "{{Auth::user()->id}}",
            }
        };
    </script>




    <div class="container">

        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="brdcr_link">Inici</a> >
            <a href="{{route('pacients')}}" class="brdcr_link">Pacients</a>
        </div>


        <h1 class="d-flex justify-content-center" style="margin-top:40px;margin-bottom:30px;">Alta pacient</h1>

        <span style="margin-bottom:30px;"></span>
        
        <div class="form_border">
            <form id="f_alta_pacient" method="POST">

                <div class="row form-group">
                    <div class="col-6">
                        <label for="pacient_name">Nom</label>
                        <input type="text" class="form-control" id="pacient_name" name="pacient_name"  placeholder="Nom">
                    </div>

                    <div class="col-6">
                        <label for="pacient_cognoms">Cognoms</label>
                        <input type="text" class="form-control" id="pacient_cognoms" name="pacient_cognoms" placeholder="Cognoms">
                    </div>

                </div>
                <br/>


                <div class="row form-group">
                    <div class="col-6">
                        <label for="pacient_username">Nom d'usuari</label>
                        <input type="text" class="form-control" id="pacient_username" name="pacient_username" placeholder="Nom d'usuari">
                    </div>

                    <div class="col-6">
                        <label for="pacient_password">Contrasenya</label>
                        <input type="text" class="form-control" id="pacient_password" name="pacient_password" placeholder="Contrasenya">
                    </div>

                </div>
                <br/>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="pacient_email">Email usuari</label>
                        <input type="email" class="form-control" id="pacient_email" name="pacient_email"  placeholder="Email usuari">
                    </div>

                    <div class="col-6">
                        <label for="pacient_phone">Telèfon</label>
                        <input type="phone" class="form-control" id="pacient_phone" name="pacient_phone" placeholder="Telèfon">
                    </div>

                </div>
                <br/>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="pacient_address">Adreça</label>
                        <input type="email" class="form-control" id="pacient_address" name="pacient_address"  placeholder="Adreça usuari">
                    </div>

                </div>
                <br/>

                <div class="row form-group">

                    <div class="col-12 d-flex justify-content-center" style="margin-top:20px;">
                        <input type="submit" class="button-3 btn-search " id="submit_add_pacient" value="Crea pacient"/>
                    </div>
                    
                </div>

            </form>
        </div>

        


    </div>