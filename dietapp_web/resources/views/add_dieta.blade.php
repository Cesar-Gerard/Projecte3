@include('nav_bar')

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
    <div class="row">

        <div class="col-6">
            <label for="dieta_nom">Nom de la dieta</label>
            <input type="text" placeholder="Nom de la dieta" id="dieta_nom" class="form-control" />
        </div>

        <div class="col-6">
            <label>Tipus de dieta</label>
            <select id="">

            </select>
        </div>

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
