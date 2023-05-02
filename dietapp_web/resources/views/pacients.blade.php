@include('nav_bar')


    <script src="{{asset('js/pacients.js')}}"></script>



    <div class="container">



        <h1 class="d-flex justify-content-center titol">Pacients</h1>

        <button class="button-3 btn-search" id="btn_mostrar_filtre"><i class="fa-regular fa-eye"></i></button> 
        <button class="button-3 btn-search" id="btn_amagar_filtre"><i class="fa-regular fa-eye-slash"></i></button>


        <div class="row " style="margin-bottom:30px;" id="filtres_div">
            <div class="row d-flex justify-content-center" >

                
                <h3 class="d-flex justify-content-center">Filtres</h3>
                <div class="col-6" style="border:1px solid rgb(92, 91, 91);padding-top:20px;padding-bottom:20px;">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-6">
                            <label>Nom del pacient</label>
                            <input type="text" placeholder="Nom del pacient" id="cerca_nom_pacient" class="form-control" />
                        </div>
                        <div class="col-6">
                            <label>Cognom del pacient</label>
                            <input type="text" placeholder="Cognoms del pacient" id="cerca_cognom_pacient" class="form-control" />
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-6">
                            <label>Tipus de dieta</label>
                            <select class="form-control" id="cerca_tipus_dietes">
                                <option value="-1"></option>
                                @foreach($diets as $diet)
                                    <option value="{{$diet->id_diet}}">{{$diet->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-12 d-flex ">
                            <div class="col-6">
                                <a href="" id="cerca_search" class="button-3 btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </div>

                            <div class="col-6 d-flex justify-content-end">
                                <button id="cerca_neteja_filtres" class="button-3 btn-search"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            
                        </div>


                    </div>
                    
                    
                </div>
            
            </div>

        </div>
        


        <div class="row">
            <div class="col-2">
                <a href="" class="button-3 mb-2" style="background-color:green;"><i class="fa-solid fa-user-plus"></i></a> 
            </div>
        </div>

        @if(count($pacients)>0)
            <table class="table table-bordered estils_table ">
                <thead>
                <tr>
                    <th scope="col">Pacient</th>
                    <th scope="col">Telèfon</th>
                    <th scope="col">Adreça</th>
                    <th scope="col">Dieta Actual</th>
                    <th scope="col">Accions</th>
                </tr>
                </thead>
                <tbody id="pacients_taula">
                @foreach($pacients as $pacient)
                    
                    <!-- 
                        object(stdClass)#325 (12) { ["id"]=> int(1) ["name_user"]=> string(6) "Gerard" ["lastname_user"]=> string(7) "César " 
                        ["nickname_user"]=> string(6) "gcesar" ["password"]=> string(60) "$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha" 
                        ["type_user"]=> string(1) "P" ["email_user"]=> string(25) "gcesar@milaifontanals.org" ["id_pacient"]=> int(1) 
                        ["assigned_nutricionist"]=> int(2) ["phone_pacient"]=> string(10) "+656394050" ["address_pacient"]=> string(9) 
                        "Can Debot" ["current_diet"]=> int(1) }
                    -->

                    <td>{{$pacient->name_user}} {{$pacient->lastname_user}}</td>
                    <td>{{$pacient->phone_pacient}}</td>
                    <td>{{$pacient->address_pacient}}</td>
                    <td>@if($pacient->name != null) {{$pacient->name}} @else Sense dieta assignada @endif</td>
                    <td>
                        
                        <a href="" class="button-3 btn-edit"><i class="fa-solid fa-user-pen"></i></a>
                        <a href="" class="button-3 btn-delete"><i class="fa-solid fa-user-slash"></i></a>
                    </td>


                @endforeach
                </tbody>
            </table>
        @else
            <h2 class="d-flex justify-content-center">No tens cap pacient assignat</h2>

        @endif

        

    </div>



    </div>

      
    
</body>
</html>