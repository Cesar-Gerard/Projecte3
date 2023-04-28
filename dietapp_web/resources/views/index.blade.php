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
                zone_login: "{{ route('user.login') }}",
                zone_home: "{{ route('home') }}"
            }
        };
    </script>

  <script src="{{asset('js/font-awesome.js')}}"></script>
  <script src="{{asset('js/login.js')}}"></script>
  <script src="{{asset('js/jquery-3.6.4.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset("css/login.css")}}" />
  

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">

        <div class="errors" id="errors" style="display:none;">
            <span>Usuari o contrasenya incorrecte</span>
        </div>
        
        <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412">
            <defs>
                <linearGradient id="a" x1="0%" y1="0%" y2="0%">
                <stop offset="0%" stop-color="#8ceabb" />
                <stop offset="100%" stop-color="#378f7b" />
                </linearGradient>
            </defs>
            <path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z" />
        </svg>

        <h2>DietApp</h2>

        <div class="form">

            <div class="form__field">
                <input type="text" name="username" id="username" placeholder="Usuari" class="inputs">
                <span id="" style="display:none;"><i class="fa-solid fa-eye see_password"></i></span>
            </div>

            <div class="form__field">
                <input type="password" name="password" id="password" placeholder="Contrasenya" class="inputs">
                <span id="see_password"><i class="fa-solid fa-eye see_password"></i></span>
            </div>

            <div class="form__field">
                <button id="login" class="disabled" disabled >Inicia sessió</button>
            </div>

        </div>

        <p><a href="{{route('forget_password')}}" class="pw_oblidada">He oblidat la meva contrasenya</a></p>

    </div>

  </div>

</body>

</html>