@include('nav_bar')

    <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
    <script src="{{asset('js/pacient_see.js')}}"></script>
    <script src="{{asset('js/third_party/canvas.js')}}"></script>

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_afegir_pacient: "{{ route('pacient.add') }}",
                zone_pacients: "{{ route('pacients') }}",
            },
            vars: {
                nutricionist: "{{Auth::user()->id}}",
                data_points: "{{json_encode($grafic_progres_actual)}}",
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

        @if($current_diet!=null)
            <br/><br/>
            <h2>Dieta actual</h2>
            <hr/>

            <button class="collapsible"><h2>{{$current_diet->name}}</h2></button>
            <div class="content">
                <br/>
                <div class="row">
                    <div class="col-9">
                        <p>{{$current_diet->description}}</p>
                    </div>
                    <div class="col-3 d-flex justify-content-end" >
                        <b>{{$current_diet->calories/1000}} kcal</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        Tipus de dieta: {{$type_diet->name_type}}
                    </div>
                </div>

                <br/><br/>
                <div id="chartContainer_historic_actual" style="height: 370px; width: 100%;"></div>
                
                <br/>
            </div>
            
        @endif



        
       
        @php 
        
    @endphp


        

        <br/>
        <h2>Dietes acabades</h2>
        
        @foreach($historial_diets as $historial)
            @php 
                

            @endphp
            <button class="collapsible"><h2>{{$current_diet->name}}</h2></button>
            <div class="content">
                <br/>
                <div class="row">
                    <div class="col-9">
                        <p>{{$historial->description}}</p>
                    </div>
                    <div class="col-3 d-flex justify-content-end" >
                        <b>{{$historial->calories/1000}} kcal</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        Tipus de dieta: {{$historial->name_type}}
                    </div>
                </div>

                <br/><br/>
                <div id="chartContainer_historic_actual" style="height: 370px; width: 100%;"></div>
                
                <br/>
            </div>

        @endforeach


        <!--Posar les dades inicials Hip,Arm,etc-->
        <!--Calcular el IMC cada vegada que es faci-->
        <!--POsar les dades finals, Hip,Arm,etc-->
        <!--En cas que no hagi acabat, posar la ultima introduïda-->
        <!--Fer un resum de les mides que s'han realitzat-->

        <!--(IMC = peso (kg)/ [estatura (m)]2-->


        



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