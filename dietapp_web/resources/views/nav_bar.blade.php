
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>DietApp</title>

    <link rel="stylesheet" href="{{asset("css/main.css")}}" />
    <script src="{{asset('js/third_party/font-awesome.js')}}"></script>
    <script src="{{asset('js/third_party/jquery-3.6.4.js')}}"></script>
    <script src="{{asset('js/third_party/sweet-alert.js')}}"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"

        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">

    </script>

</head>
<body>


    <div class="page">
        <header tabindex="0">
            
            <div class="container">
                <div class="row">
                  <div class="col-sm" ></div>

                  <div class="col-sm justify-content-center" style="display:flex !important;">

                    <a href="{{route('home')}}">
                        <img src="{{asset('img/DietApp_Logo.png')}}" class="foto_logo"/>
                    </a>
                  </div>
                  
                  <div class="col-sm justify-content-end" style="display:flex !important;margin-top:45px;">
                    
                    <a href="{{route('logout')}}">
                        <i class="fa-solid fa-power-off fa-2xl"></i>
                    </a>

                  </div>
                </div>
              </div>
    
        </header>
        
        <div id="nav-container">
          <div class="bg"></div>
          <div class="button" tabindex="0">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </div>
          <div id="nav-content" tabindex="0">
            <ul>
              <li><a href="{{route('home')}}"><i class="fa-solid fa-house"></i> Inici</a></li>
              <li><a href="{{route('pacients')}}"><i class="fa-solid fa-user-group"></i> Pacients</a></li>
              <li><a href=""><i class="fa-solid fa-utensils"></i> Dietes</a></li>
              <li><a href=""><i class="fa-solid fa-dumbbell"></i> Exercicis</a></li>
              <li><a href=""><i class="fa-solid fa-user"></i> El meu perfil</a></li>
            </ul>
          </div>
        </div>
        
        <br/><br/><br/>
