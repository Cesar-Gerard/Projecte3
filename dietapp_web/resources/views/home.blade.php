@include('nav_bar')
     
  
  <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
  <script src="{{asset('js/home.js')}}"></script>
  <script src="{{asset('js/third_party/canvas.js')}}"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script>
    // global app configuration object
    var config = {
        routes: {
            zone_filtre_pacient: "{{ route('pacient.filtrar_pacient') }}",
            zone_filtre_all_pacients: "{{ route('pacient.filtrar_all_pacients') }}",
            zone_edit_pacient: "{{ route('pacient',-1234) }}",
        },
        vars: {
            nutricionist: "{{Auth::user()->id}}",
        }
    };

    let data_points_diets = [];
  
  </script>

  <div class="container">

  </div>

  @foreach($dietes_seguides as $ds)

    <script>
      data_points_diets.push("{{json_encode($ds)}}");
    </script>


  @endforeach

  <h1 style="margin-left:10px;">Benvingut, {{Auth::user()->name_user}}</h1>



  <div id="chartContainer" style="height: 300px; width: 100%;"></div>

  <br/>
  <div class="d-flex justify-content-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
      Més informació
    </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dietes assignades</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-2"></div>
              <div class="col-8">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Pacient</th>
                      <th scope="col">Dieta actual</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dietes_seguides_noms as $dsn)

                      <tr>
                        <th scope="row">{{$dsn->name_user}} {{$dsn->lastname_user}}</th>
                        <td>@if(strlen($dsn->name)==0) Sense dieta assignada @else {{$dsn->name}} @endif</td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-2"></div>
          </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tanca</button>
        </div>
      </div>
    </div>
  </div>

  <br/><br/>
  <h2 class="d-flex justify-content-center">Últimes dietes assignades</h2>

  <div class="container table-responsive py-5">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Pacient</th>
          <th scope="col">Dieta</th>
          <th scope="col">Data de canvi</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
        </tr>
       
      </tbody>
    </table>
  </div>

      
    
</body>
</html>