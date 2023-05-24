@include('nav_bar')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/diets_see.js')}}"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            zone_diet_edit: "{{ route('diet_edit') }}",
            zone_diet_clone: "{{ route('diet_clone') }}",
            zone_dishes_filtrar: "{{ route('diet.dishes_filtrar') }}",
        },
        vars: {
            id_dieta: "{{ $diet->id_diet }}"
        }
    };
</script>



<div class="container">

    <div class="breadcrumbs">
        <a href="{{route('home')}}" class="brdcr_link">Inici</a> >
        <a href="{{route('dietes')}}" class="brdcr_link">Dietes</a> >
        <a href="" class="brdcr_link brdcr_selected">Pacient</a>
    </div>

    <br/>

    @if($clone==1)
        <h1>Clonar: {{$diet->name}}</h1>
    @else
        <h1>{{$diet->name}}</h1>
    @endif
   








    <br/><br/>
    <h2>Dades bàsiques</h2>
    <div class="row form_border">

        <div class="col-6">
            <label for="dieta_nom">Nom de la dieta</label>
            <input type="text" value="{{$diet->name}}" placeholder="Nom de la dieta" id="dieta_nom" class="form-control" required/>
        </div>
        
        <div class="col-6">
            <label>Tipus de dieta</label>
            <select id="dieta_tipus" class="form-control">
                <option value="-1"></option>
                @foreach($tipus_dietes as $type_dieta)
                    @if($type_dieta->id_type == $diet->type_diet)
                        <option value="{{$type_dieta->id_type}}" selected>{{$type_dieta->name_type}}</option>
                    @else
                        <option value="{{$type_dieta->id_type}}">{{$type_dieta->name_type}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>

        <div class="col-6">
            <span id="sp_nom_error" style="color:red;display:none;" >El nom de la dieta és obligatori</span>
        </div>
        <div class="col-6"></div>
        
        <div class="col-12">&nbsp;</div>

        <div class="col-12">
            <label>Descripció</label>
            <textarea id="dieta_descripcion" class="form-control" rows="4" required>{{$diet->description}}</textarea>
        </div>
        <div class="col-12">
            <span id="sp_descripcio_error" style="color:red;display:none;">La descripció de la dieta és obligatòria</span>
        </div>

        <div class="col-12">&nbsp;</div>

        <div class="col-6">
            <label>Total calories</label>
            <input type="text" id="dieta_calories" class="form-control" value="{{$diet->calories/1000}} kcal" disabled/>
        </div>

    </div>

    <br/><br/>

    <div id="diets_dishes">
        <div class="row">
            <div class="col-10">

                <h2>Dies de la setmana</h2>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dilluns
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dimarts
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dimecres
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dijous
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Divendres
                    </div>
                </div>
        
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Esmorzar
                    </div>
                    
                    

                    @for ($i = 1; $i <= 5; $i++)
                        <div id="esmorzar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            @foreach($diets_dishes_esmorzars as $dde)
                                
                                @if($dde->week_day == $i)
                                    
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-{{$dde->dish_id_dish}}">
                                        <img src="{{asset('img/Icons/'.$dde->image_dish.'')}}" class="dish_etiqueta"/>
                                            {{$dde->name_dish}}
                                    </div>
                                
                                @endif
                            
                            @endforeach
                            

                        </div>
                    @endfor

                </div>

                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Mig dia
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="migdia-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
                            @foreach($diets_dishes_migmati as $ddm)

                                @if($ddm->week_day == $i)
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-{{$ddm->dish_id_dish}}">
                                        <img src="{{asset('img/Icons/'.$ddm->image_dish.'')}}" class="dish_etiqueta"/>
                                        {{$ddm->name_dish}}
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    @endfor
        
        
                </div>
        
                
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Dinar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="dinar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            @foreach($diets_dishes_dinar as $ddd)

                                @if($ddd->week_day == $i)
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-{{$ddd->dish_id_dish}}">
                                        <img src="{{asset('img/Icons/'.$ddd->image_dish.'')}}" class="dish_etiqueta"/>
                                        {{$ddd->name_dish}}
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    @endfor
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Berenar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="berenar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
                            
                            @foreach($diets_dishes_berenar as $ddb)

                                @if($ddb->week_day == $i)
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-{{$ddb->dish_id_dish}}">
                                        <img src="{{asset('img/Icons/'.$ddb->image_dish.'')}}" class="dish_etiqueta"/>
                                        {{$ddb->name_dish}}
                                    </div>
                                @endif
                            
                            @endforeach

                        </div>
                    @endfor
                </div>

                
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Sopar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="sopar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            @foreach($diets_dishes_sopar as $dds)

                                @if($dds->week_day == $i)
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-{{$dds->dish_id_dish}}">
                                        <img src="{{asset('img/Icons/'.$dds->image_dish.'')}}" class="dish_etiqueta"/>
                                        {{$dds->name_dish}}
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    @endfor
                </div>
        
                

            

            </div>

            <div class="col-2 form_border" style="overflow:scroll;" id="scroll">
                <h2>Plats</h2>
                <hr/>
                <input type="text" id="dishes_text" placeholder="Busca els plats" class="form-control"/>
                <br/>
                <div id="launchPad">    

           
                    @foreach($dishes as $dish)
        
                        <div class="card" id="dish-{{$dish->id_dishes}}">
                            <img src="{{asset('img/Icons/'.$dish->image_dish.'')}}" class="dish_etiqueta"/>
                            {{$dish->name_dish}}
                        </div> 

                    @endforeach
                    
                   
                </div>
            </div>

        </div>
    
        

        

    </div>


    <br/><br/>

    <div class="row">
        <div class="col-12 d-flex justify-content-center" >
            @if($clone==1)
                <button id="clone-dieta" class="button-3 btn-search">Clonar dieta</button> 
                  
            @else
                <button id="edita-dieta" class="button-3 btn-search">Edita dieta</button>
            @endif          
        </div>
    </div>
    <button id="prova" class="button-3 btn-search " style="display:none;">Prova</button>


    <div style="marin-top:100px;">
    
    </div>


</div>