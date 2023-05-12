@include('nav_bar')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/add_dieta.js')}}"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            zone_filtre_all_diets: "{{ route('diet.filtrar_all_diets') }}",
            zone_filtre_dieta: "{{ route('diet.filtrar') }}",

        },
        vars: {
            
        }
    };
</script>


<div class="container">

    <div class="breadcrumbs">
        <a href="{{route('home')}}" class="brdcr_link">Inici</a> >
        <a href="{{route('dietes')}}" class="brdcr_link">Dietes</a> >
        <a href="" class="brdcr_link brdcr_selected">Nova dieta</a>
    </div>


    <h1 class="d-flex justify-content-center titol">Nova dieta</h1>


    <br/><br/>
    <h2>Dades bàsiques</h2>
    <div class="row form_border">

        <div class="col-6">
            <label for="dieta_nom">Nom de la dieta</label>
            <input type="text" placeholder="Nom de la dieta" id="dieta_nom" class="form-control" />
        </div>
        <div class="col-6">
            <label>Tipus de dieta</label>
            <select id="dieta_tipus" class="form-control">
                <option value="-1"></option>
                @foreach($tipus_dietes as $type_dieta) 
                    <option value="{{$type_dieta->id_type}}">{{$type_dieta->name_type}}</option>
                @endforeach
            </select>
        </div>
        
        <br/>

        <div class="col-12">
            <label>Descripció</label>
            <textarea id="dieta_descripcion" class="form-control" rows="4"></textarea>
        </div>

        <div class="col-6">
            <label>Total calories</label>
            <input type="text" id="dieta_calories" class="form-control" disabled/>
        </div>

    </div>

    <br/><br/>

    <div id="diets_dishes">

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
                <div id="esmorzar{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                </div>
            @endfor
        </div>

        <div class="row">
            <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                Dinar
            </div>

            @for ($i = 1; $i <= 5; $i++)
                <div id="dinar{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                </div>
            @endfor
        </div>

        <div class="row">
            <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                Berenar
            </div>

            @for ($i = 1; $i <= 5; $i++)
                <div id="berenar{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                </div>
            @endfor
        </div>

        <div class="row">
            <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                Sopar
            </div>

            @for ($i = 1; $i <= 5; $i++)
                <div id="sopar{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">

                </div>
            @endfor
        </div>

        <div class="row">
            <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                Mig dia
            </div>

            @for ($i = 1; $i <= 5; $i++)
                <div id="migdia{{$i}}" class="col-2 requadre_cela cela_ocupada stackDrop1">
                    
                </div>
            @endfor


        </div>

        

    </div>

    <br/><br/>

    <button id="prova">Prova</button>

    <div class="row">
        <div class="col-2">
            <div id="launchPad">    
                <div class="card" id="apple">
                    apple
                </div> 
                <div class="card" id="orange">
                    orange
                </div> 
                <div class="card" id="banana">
                    banana
                </div> 
                <div class="card" id="car">
                    car
                </div> 
                <div class="card" id="bus">
                    bus
                </div> 
            </div>
        </div>
        
    </div>

    
    
    
    

    <div style="marin-top:100px;">
    '
    </div>

    <!-- 

        Name
        Description 
        Tipus dieta
        Calories(Cada vegada que assignis, actualitzar les calories dinàmicament)
        Number meals(nullable inicialment)


        Una vegada introduït tot, apareixerà un apartat en format graella de dilluns a divendres
        Apareixerà un menu on puguis buscar els àpats. Aquests poden ser dragables, i cada cel·la admet dragable.

        Quan es guardin els canvis, fer un update del count d'àpats


    -->



</div>
