@include('nav_bar')
     
  
  <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
  <script src="{{asset('js/home.js')}}"></script>
  <script src="{{asset('js/third_party/canvas.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title d-flex justify-content-center" id="exampleModalLabel">Dietes assignades</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background-color:white !important;border:3px solid white !important;">x</button>
            
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-2"></div>
              <div class="col-8">
                <table class="table">
                  <thead style="border: 1px solid black;background-color: #1F3A1C;color:white;" >
                    <tr style="border: 1px solid black;">
                      <th scope="col" style="border: 1px solid black;">Pacient</th>
                      <th scope="col" style="border: 1px solid black;">Dieta actual</th>
                    </tr>
                  </thead>
                  <tbody style="border: 1px solid black;">
                    @foreach($dietes_seguides_noms as $dsn)

                      <tr style="border: 1px solid black;">
                        <th scope="row">{{$dsn->name_user}} {{$dsn->lastname_user}}</th>
                        <td style="border: 1px solid black;">@if(strlen($dsn->name)==0) Sense dieta assignada @else {{$dsn->name}} @endif</td>
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
        @foreach($dietes_inicialitzades as $di)
          <tr>
            <th scope="row">{{$di->name_user}} {{$di->lastname_user}}</th>
            <td>{{$di->name}}</td>
            <td>{{date("d/m/Y", strtotime($di->start_date))}}</td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>

      
    
</body>
</html>