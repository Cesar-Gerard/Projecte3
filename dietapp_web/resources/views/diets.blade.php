@include('nav_bar')

<script src="{{asset('js/diets.js')}}"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            zone_filtre_all_diets: "{{ route('diet.filtrar_all_diets') }}",
            zone_filtre_dieta: "{{ route('diet.filtrar') }}",
            zone_edit_dieta: "{{ route('dieta',-1234) }}",
            zone_delete_dieta: "{{ route('diet_delete') }}",
            zone_clone_dieta: "{{ route('dieta', ['id' => -1234, 'clone' => '1']) }}",
            zone_pdf_dieta: "{{route('imprimir_dieta',-1234) }}",

        },
        vars: {
            
        }
    };
</script>



<div class="container">

    <div class="breadcrumbs">
        <a href="{{route('home')}}" class="brdcr_link">Inici</a> >
        <a href="{{route('dietes')}}" class="brdcr_link brdcr_selected">Dietes</a>
    </div>

    <h1 class="d-flex justify-content-center titol">Dietes</h1>


    <button class="button-3 btn-search" id="btn_mostrar_filtre">Amagar filtres <i class="fa-regular fa-eye-slash"></i></button> 
    <button class="button-3 btn-search" id="btn_amagar_filtre">Mostrar filtres <i class="fa-regular fa-eye"></i></button>



    <div class="row " style="margin-bottom:30px;" id="filtres_div">
        <div class="row d-flex justify-content-center" >

            
            <h3 class="d-flex justify-content-center">Filtres</h3>
            <div class="col-6" style="border:1px solid rgb(92, 91, 91);padding-top:20px;padding-bottom:20px;">
                <div class="row" style="margin-top:20px;">

                    <div class="col-6">
                        <label>Nom de la dieta</label>
                        <input type="text" placeholder="Nom de la dieta" id="cerca_nom_dieta" class="form-control" />
                    </div>

                    <div class="col-6">
                        <label>Tipus de dieta</label>
                        <select class="form-control" id="cerca_tipus_dieta">
                            <option value="-1"></option>
                            @foreach($type_diets as $type_diet)
                                <option value="{{$type_diet->id_type}}">{{$type_diet->name_type}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="row" style="margin-top:20px;">
                    <div class="col-12 d-flex ">
                        <div class="col-6">
                            <!--<button id="cerca_search" class="button-3 btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>-->
                            <button id="cerca_neteja_filtres" class="button-3 btn-search">Neteja filtres <i class="fa-solid fa-trash"></i></button>
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            
                        </div>
                        
                    </div>
                </div>
                
                
            </div>
        
        </div>

    </div>



    <div class="row">
        <div class="col-2">
            <a href="{{route('view_add_dieta')}}" class="button-3 mb-2" style="background-color:green;">Nova dieta <i class="fa-solid fa-plus"></i></a> 
        </div>
    </div>


    @if(count($diets)>0)
        <table class="table table-bordered estils_table ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Descripció</th>
                    <th scope="col">Tipus</th>
                    <th scope="col">Calories</th>
                    <th scope="col">Nombre d'àpats</th>
                    <th scope="col">Accions</th>
                </tr>
            </thead>
            <tbody id="dietes_taula">
            @foreach($diets as $diet)
                
                <tr>                                                                    
                    <td style="text-align: center" onclick="window.location.href = '{{route('dieta',$diet->id_diet)}}';">{{$diet->name}}</td>
                    <td onclick="window.location.href = '{{route('dieta',$diet->id_diet)}}';">{{$diet->description}}</td>
                    <td style="text-align: center" onclick="window.location.href = '{{route('dieta',$diet->id_diet)}}';">{{$diet->name_type}}</td>
                    <td style="text-align: center" onclick="window.location.href = '{{route('dieta',$diet->id_diet)}}';">{{$diet->calories/1000}} kcal</td>
                    <td style="text-align: center" onclick="window.location.href = '{{route('dieta',$diet->id_diet)}}';">{{$diet->number_meals}}</td>
                    <td>
                        <a href="{{route('dieta',$diet->id_diet)}}" class="button-3 btn-edit" style="margin-bottom:5px;">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                        <a id="delete_diet{{$diet->id_diet}}" onclick="f_deleteDiet('{{$diet->id_diet}}')" style="margin-bottom:5px;" class="button-3 btn-delete">Eliminar <i class="fa-solid fa-trash"></i></a>
                        <a href="{{route('dieta', ['id' => $diet->id_diet, 'clone' => '1'])}}" class="button-3 btn-clone" style="margin-bottom:5px;">Clonar <i class="fa-solid fa-clone"></i></a>                                                                   
                        <a href="{{route('imprimir_dieta',$diet->id_diet)}}" class="button-3 btn-pdf" style="margin-bottom:5px;">Descarrega dieta <i class="fa-solid fa-file-pdf"></i></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        <h2 class="d-flex justify-content-center">No tens cap dieta creada</h2>
    @endif



</div>