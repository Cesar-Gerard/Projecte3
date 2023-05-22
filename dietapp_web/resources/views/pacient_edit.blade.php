@include('nav_bar')

    <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
    <script src="{{asset('js/edit_pacient.js')}}"></script>

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_editar_pacient: "{{ route('pacient.edit') }}",
                zone_pacients: "{{ route('pacients') }}",
            },
            vars: {
                pacient: "{{$pacient->id}}",
            }
        };
    </script>




<div class="container">

    <div class="breadcrumbs">
        <a href="{{route('home')}}" class="brdcr_link">Inici</a> >
        <a href="{{route('pacients')}}" class="brdcr_link">Pacients</a> >
        <a href="" class="brdcr_link brdcr_selected">Pacient</a>
    </div>

    <!-- 

        object(stdClass)#336 (12) { ["id"]=> int(1) ["name_user"]=> string(6) "Gerard" ["lastname_user"]=> string(7) "César " ["nickname_user"]=> string(6) "gcesar" 
        ["password"]=> string(60) "$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha" ["type_user"]=> string(1) "P" ["email_user"]=> string(25) 
        "gcesar@milaifontanals.org" ["id_pacient"]=> int(1) ["assigned_nutricionist"]=> int(2) ["phone_pacient"]=> string(10) "+656394050" 
        ["address_pacient"]=> string(9) "Can Debot" ["current_diet"]=> int(1) }

    -->


    <h1 class="d-flex justify-content-center" style="margin-top:40px;margin-bottom:30px;">Edició pacient</h1>

    <span style="margin-bottom:30px;"></span>
    
    <div class="form_border">
        <form id="f_edit_pacient" method="POST">

            <div class="row form-group">
                <div class="col-6">
                    <label for="pacient_name">Nom</label><label class="text-danger">*</label>
                    <input type="text" class="form-control" id="pacient_name" name="pacient_name" value="{{$pacient->name_user}}" placeholder="Nom">
                </div>

                <div class="col-6">
                    <label for="pacient_cognoms">Cognoms</label><label class="text-danger">*</label>
                    <input type="text" class="form-control" id="pacient_cognoms" name="pacient_cognoms" value="{{$pacient->lastname_user}}" placeholder="Cognoms">
                </div>

            </div>
            <br/>


            <div class="row form-group">
                <div class="col-6">
                    <label for="pacient_email">Email usuari</label><label class="text-danger">*</label>
                    <input type="email" class="form-control" id="pacient_email" name="pacient_email" value="{{$pacient->email_patient}}" placeholder="Email usuari">
                </div>

                <div class="col-6">
                    <label for="pacient_phone">Telèfon</label>
                    <input type="phone" class="form-control" id="pacient_phone" name="pacient_phone" value="{{$pacient->phone_patient}}" placeholder="Telèfon">
                </div>

            </div>
            <br/>

            <div class="row form-group">

                <div class="col-6">
                    <label for="pacient_address">Adreça</label>
                    <input type="email" class="form-control" id="pacient_address" name="pacient_address" value="{{$pacient->address_patient}}" placeholder="Adreça usuari">
                </div>

            </div>
            <br/>

            <div class="row form-group">

                <div class="col-12 d-flex justify-content-center" style="margin-top:20px;">
                    <input type="submit" class="button-3 btn-search " id="submit_edit_pacient" value="Guarda"/>
                </div>
                
            </div>

        </form>
    </div>