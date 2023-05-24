<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DietApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"

        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">

    </script>
    <link rel="stylesheet" href="{{asset("css/main.css")}}" />
</head>
<body style="background-color:white;color:black;">
    
    <h1 style="text-align: center;margin-top:5px;">{{$diet->name}}</h1>
    

    <table style="margin-top:50px;margin-left:10px;margin-right:10px;">
        <tr>
          <th></th>
          <th>Dilluns</th>
          <th>Dimarts</th>
          <th>Dimecres</th>
          <th>Dijous</th>
          <th>Divendres</th> 
        </tr>
        
       <tr>
            <td style="color:white;background-color:black">Esmorzar</td>
            @for ($i = 1; $i <= 5; $i++)
                <td style="border: 1px solid black;">
                    @foreach($diets_dishes_esmorzars as $dde)
                        @if($dde->week_day == $i)
                            <div class="card_pdf">
                                
                                <img src="{{asset('img/Icons/'.$dde->image_dish.'')}}" class="dish_etiqueta"/>
                                    {{$dde->name_dish}}
                            </div>
                        @endif
                    @endforeach
                </td>
            @endfor
       </tr>

       <tr>
            <td style="color:white;background-color:black">Mig dia</td>
                @for ($i = 1; $i <= 5; $i++)
                    <td style="border: 1px solid black;">
                        @foreach($diets_dishes_migmati as $ddm)

                            @if($ddm->week_day == $i)
                                <div class="card_pdf">
                                    <img src="{{asset('img/Icons/'.$ddm->image_dish.'')}}" class="dish_etiqueta"/>
                                    {{$ddm->name_dish}}
                                </div>
                            @endif
                        @endforeach

                    </td>
                @endfor
        </tr>

        <tr>
            <td style="color:white;background-color:black">Dinar</td>
            @for ($i = 1; $i <= 5; $i++)
                <td style="border: 1px solid black;">
                    @foreach($diets_dishes_dinar as $ddd)
                    
                        @if($ddd->week_day == $i)
                            <div class="card_pdf">
                                <img src="{{asset('img/Icons/'.$ddd->image_dish.'')}}" class="dish_etiqueta"/>
                                {{$ddd->name_dish}}
                            </div>
                        @endif
                    
                    @endforeach
                </td>
            @endfor

        </tr>

        <tr>
            <td style="color:white;background-color:black">Berenar</td>
            @for ($i = 1; $i <= 5; $i++)
                <td style="border: 1px solid black;">
                    
                    @foreach($diets_dishes_berenar as $ddb)

                        @if($ddb->week_day == $i)
                            <div class="card_pdf">
                                <img src="{{asset('img/Icons/'.$ddb->image_dish.'')}}" class="dish_etiqueta"/>
                                {{$ddb->name_dish}}
                            </div>
                        @endif
                    
                    @endforeach
                </td>
            @endfor
        </tr>

        <tr>
            <td style="color:white;background-color:black">Sopar</td>

            @for ($i = 1; $i <= 5; $i++)
                <td style="border: 1px solid black;">
                    @foreach($diets_dishes_sopar as $dds)

                        @if($dds->week_day == $i)
                            <div class="card_pdf" id="dish-{{$dds->dish_id_dish}}">
                                <img src="{{asset('img/Icons/'.$dds->image_dish.'')}}" class="dish_etiqueta"/>
                                {{$dds->name_dish}}
                            </div>
                        @endif

                    @endforeach
                </td>
            @endfor
        </tr>



      </table>
    
        

        

    


</body>
</html>