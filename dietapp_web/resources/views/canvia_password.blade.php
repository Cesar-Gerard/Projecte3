<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>DietApp</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_recupera_contrasenya: "{{ route('user.recupera_password') }}",
            }
        };
    </script>

  <script src="{{asset('js/third_party/font-awesome.js')}}"></script>
  <script src="{{asset('js/canvia_password.js')}}"></script>
  <script src="{{asset('js/third_party/jquery-3.6.4.js')}}"></script>
  <script src="{{asset('js/third_party/sweet-alert.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset("css/login.css")}}" />
  <link rel="stylesheet" href="{{asset('js/third_party/animations-font_awesome.min.css')}}" />
  

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">
        <p class="title">Canviar Contrasenya</p>
        
        <img src="{{asset('img/DietApp_Logo.png')}}" class="logo_dietapp" />

        

        <div class="form">

           
            <div class="form__field">
                <input type="password" name="canviar_password" id="canviar_password" placeholder="Escriu la nova contrasenya" class="inputs">
                <span id="see_password"><i class="fa-solid fa-eye see_password"></i></span>
                <br/>
            </div>

            
            <div class="form__field">
                <input type="password" name="canviar_password2" id="canviar_password2" placeholder="Torna a escriure-la" class="inputs">
                <span id="see_password2"><i class="fa-solid fa-eye see_password"></i></span>
                <br/>
                <span id="err_password" class="mail_err"></span>
            </div>


            <div class="form__field ">
                <button id="btn_canviar_password" class="button-3 disabled" disabled ><i class="fa-solid fa-key"></i> Canvia</button>
            </div>

        </div>

        <p><a href="{{route('index')}}" class="pw_oblidada">Inicia sessió</a></p>

    </div>

  </div>

</body>

</html>