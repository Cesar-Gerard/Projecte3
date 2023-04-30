<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* CSS */
  .button-3 {
    appearance: none;
    background-color: #2ea44f;
    border: 1px solid rgba(27, 31, 35, .15);
    border-radius: 6px;
    box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
    font-size: 14px;
    font-weight: 600;
    line-height: 20px;
    padding: 6px 16px;
    position: relative;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: middle;
    white-space: nowrap;
  }
  
  .button-3:focus:not(:focus-visible):not(.focus-visible) {
    box-shadow: none;
    outline: none;
  }
  
  .button-3:hover {
    background-color: #2c974b;
  }
  
  .button-3:focus {
    box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
    outline: none;
  }
  
  .button-3:disabled {
    background-color: #94d3a2;
    border-color: rgba(27, 31, 35, .1);
    color: rgba(255, 255, 255, .8);
    cursor: default;
  }
  
  .button-3:active {
    background-color: #298e46;
    box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
  }


  .center_img{
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }

  .color_lletra{
    color:black;
  }
    </style>
</head>
<body>
    
    
    <div style="display:flex;justify-content:center">
        <img src="{{asset('img/DietApp_Logo.png')}}" class="center_img"/>
    </div>
    <br/><br/>
    <h1 class="color_lletra"><p style="text-align: center">Restaurar la meva contrasenya</p></h1>
    <br/>
    <p style="text-align: center" class="color_lletra">Hola {{$nom_usuari}} {{$cognoms_usuari}}, clica al següent botó per poder restaurar la contrasenya:</p>
    <br/>

    <p style="text-align:center"><a class="button-3" style="color:white !important;" href="{{route('canvia_contrasenya',$id_usuari)}}">Restaurar la contrasenya</a>
    


    
</body>
</html>