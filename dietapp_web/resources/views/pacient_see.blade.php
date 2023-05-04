@include('nav_bar')

    <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
    <script src="{{asset('js/pacient_see.js')}}"></script>

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
            <a href="{{route('pacients')}}" class="brdcr_link">Pacients</a> >
            <a href="" class="brdcr_link brdcr_selected">Pacient</a>
        </div>

        <br/>

        <h1>{{$pacient->name_user}} {{$pacient->lastname_user}}</h1>



        <div class="form_border">

            <div class="row form-group">
                <div class="col-6">
                    <label for="pacient_email">Email:</label>
                    <span>{{$pacient->email_user}}</span>
                </div>

                <div class="col-6">
                    <label for="pacient_phone">Telèfon:</label>
                    <span>{{$pacient->phone_pacient}}</span>
                </div>

            </div>
            <br/>

        </div>

        <br/><br/>
        <h2>Dieta actual</h2>
        <hr/>

        <p>A Collapsible:</p>
        <button class="collapsible">Open Collapsible</button>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <p>Collapsible Set:</p>
        <button class="collapsible">Open Section 1</button>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="collapsible">Open Section 2</button>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="collapsible">Open Section 3</button>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>



        



    </div>





    <!-- 
        Resum dels camps d'usuari més importants
        Ordenar de més recent a més antic

        Titol: dieta actual
        Mostrar (amb detall) (en cas que tingui current_diet != null) la informació de la dieta que està fent 
            ->Informació bàsica de la dieta(diet)
            ->Tipus de dieta(type_diets)
            ->Recolliment de dades introduïdes per l'usuari(historial pacient), il·lustrat amb gràfics
    

        Titol: dieta anterior
        Mostrar (mode amagat) les anteriors dietes realitzades,
            ->Sense mostrar tot ha de sortir: nom dieta i gràfic del progrès realitzat. Indicar GRÀFICAMENT
        
        Mostrar (mode expandit) 
            ->Totes les dades introduides pel pacient (historial pacient)

        Per cada dieta, opció: Exporta els resultats de la dieta

        ->Genera un PDF amb tota la informació de la dieta, resulats i gràfica


    -->






