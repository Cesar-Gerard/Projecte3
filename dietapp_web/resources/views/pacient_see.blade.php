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
                zone_diet_assigna: "{{ route('pacient.canvia_dieta') }}",
                zone_canvia_dieta: " route('canvia_dieta') ",
            },
            vars: {
                nutricionist: "{{Auth::user()->id}}",
                data_points: "{{json_encode($grafic_progres_actual)}}",
                pacient: "{{$pacient->id_pacient}}",
            }
        };


        let data_points_historics = [];
        let data_points_historics_chest = [];
        let data_points_historics_leg = [];
        let data_points_historics_arm = [];
        let data_points_historics_hip = [];
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
                    <label for="pacient_email"><i class="fa-solid fa-envelope"></i></label>
                    <span>{{$pacient->email_patient}}</span>
                </div>

                <div class="col-6">
                    <label for="pacient_phone"><i class="fa-solid fa-phone"></i></label>
                    <span>{{$pacient->phone_patient}}</span>
                </div>

            </div>
            <br/>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <div class="container">

            <!-- Button to trigger modal -->
            
             
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Canvi de dieta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background-color:white !important;border:3px solid white !important;">x</button>
                            
                        </div>
                        <div class="modal-body">
                            
                            <h4 class="d-flex justify-content-center">Escull la nova dieta:</h4>
                            
                            <div class="main-container">
                                <div class="radio-buttons">
                                    @foreach($dietes_no_assignades as $dietes_no_assignades)
                                    <!--
                                        <div>
                                            <input type="radio" id="d-{{$dietes_no_assignades->id_diet}}" name="radio" value="{{$dietes_no_assignades->id_diet}}" /> {{$dietes_no_assignades->name}} 
                                        </div>
                                    -->
                                        
                                            
                                        <label class="custom-radio">
                                            <input type="radio" name="radio" value="{{$dietes_no_assignades->id_diet}}">
                                            <span class="radio-btn"><i class="las la-check"></i>
                                            <div class="hobbies-icon">
                                                <h2>{{$dietes_no_assignades->name}}</h2>
                                            </div>
                                            </span>
                                        </label>
                                        
                                        
                                    @endforeach
                                </div>

                            </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Tanca</button>-->
                            <button type="button" class="btn btn-primary" id="canvia_dieta" disabled>Canvia dieta</button>
                        </div>
                    </div>
                </div>
            </div>
              
              
        </div>


        @if($current_diet!=null)
            <br/><br/>
            <div class="row">
                <div class="col-2">
                    <h2>Dieta actual</h2>
                </div>
               
                <div class="col-3">
                    <a href="#myModal" class="btn btn-primary" data-toggle="modal">Canvia de dieta</a>
                </div>
                
                
                
            </div>
            
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
                <div class="row">
                    <div class="col-12">
                        
                        @if(strlen($s_historial_patient)==1)
                            Sense cap entrada
                        @else
                            Data inici: {{date("d/m/Y", strtotime($s_historial_patient))}}
                        @endif
                       
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

        <div id="dietes_acabades">
            
            @php $i=0;
                //var_dump($dietes_acabades[0]['historial']);die();
            @endphp
            @foreach($dietes_acabades as $dieta_acabada)
            
                
                <button class="collapsible"><h2>{{$dieta_acabada['dieta']->name}}</h2></button>
                <div class="content">
                    <br/>
                    <div class="row">
                        <div class="col-9">
                            <p>{{$dieta_acabada['dieta']->description}}</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end" >
                            <b>{{$dieta_acabada['dieta']->calories/1000}} kcal</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            Tipus de dieta: {{$dieta_acabada['dieta']->name_type}}
                        </div>
                    </div>

                    <br/><br/>
                    <div id="chartContainer_historic_acabat{{$i}}" style="height: 370px; width: 100%;"></div>
                    <br/><br/><br/>
                    <div id="chartContainer_historic_acabat_body{{$i}}" style="height: 370px; width: 100%;"></div>

                    <br/><br/><br/>
                </div>

                <script>
                    data_points_historics.push("{{json_encode($dieta_acabada['historial'])}}");
                    data_points_historics_chest.push("{{json_encode($dieta_acabada['chest'])}}");
                    data_points_historics_leg.push("{{json_encode($dieta_acabada['leg'])}}");
                    data_points_historics_arm.push("{{json_encode($dieta_acabada['arm'])}}");
                    data_points_historics_hip.push("{{json_encode($dieta_acabada['hip'])}}");
                </script>


                @php $i++; @endphp

            @endforeach
            <script>
                console.info(data_points_historics);
            </script>

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