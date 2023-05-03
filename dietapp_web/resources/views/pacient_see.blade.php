@include('nav_bar')

    <script src="{{asset('js/third_party/just-validate.production.min.js')}}"></script>
    <script src="{{asset('js/add_pacient.js')}}"></script>

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_afegir_pacient: "{{ route('pacient.add') }}",
                zone_pacients: "{{ route('pacients') }}",
            },
            vars: {
                nutricionist: "{{Auth::user()->id}}",
            }
        };
    </script>




    <div class="container">

        <h1>{{$pacient->phone_pacient}}</h1>


    </div>