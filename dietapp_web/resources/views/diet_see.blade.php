@include('nav_bar')

<script src="{{asset('js/diets_see.js')}}"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            
        },
        vars: {
            
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

    <h1>{{$diet->name}}</h1>








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
                    @if($type_dieta->id_type == $diet->tipus_dieta)
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
            <input type="text" id="dieta_calories" class="form-control" value="{{$diet->calories}}" disabled/>
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
                            
                            @php
                                
                                $array = (array) $diets_dishes_esmorzars;
                                var_dump($array);die();    
                                
                            @endphp
                            @foreach($diets_dishes_esmorzars as $dd)
                                
                                <div class="card ui-draggable ui-draggable-handle" id="dish-{{$dd->dishes_id_dishes}}">
                                    {{$dd->name_dishes}}
                                </div>
                            

                            @endforeach
                            <!-- 
                                <div class="card ui-draggable ui-draggable-handle" id="dish-3">
                                    Kiwi
                                </div>
                            -->
                            <!-- Mostrar els àpats -->
                           
                        </div>
                    @endfor
                </div>
        
                <!--
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Dinar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="dinar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
        
                        </div>
                    @endfor
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Berenar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="berenar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
        
                        </div>
                    @endfor
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Sopar
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="sopar-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
        
                        </div>
                    @endfor
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Mig dia
                    </div>
        
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="migdia-{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
                            
                        </div>
                    @endfor
        
        
                </div>

            -->

            </div>

            <div class="col-2 form_border" style="overflow:scroll;" id="scroll">
                <h2>Plats</h2>
                <hr/>
                <input type="text" id="dishes_text" placeholder="Busca els plats" class="form-control"/>
                <br/>
                <div id="launchPad">    

           
                    @foreach($dishes as $dish)
        
                        <div class="card" id="dish-{{$dish->id_dishes}}">
                            {{$dish->name_dishes}}
                        </div> 

                    @endforeach
                    
                   
                </div>
            </div>

        </div>
    
        

        

    </div>


    <br/><br/>

    <div class="row">
        <div class="col-12 d-flex justify-content-center" >
            <button id="crea-dieta" class="button-3 btn-search ">Crear dieta</button>
        </div>
    </div>
    <button id="prova" class="button-3 btn-search " style="display:none;">Prova</button>


    <div style="marin-top:100px;">
    
    </div>


</div>