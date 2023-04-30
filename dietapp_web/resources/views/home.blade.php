<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DietApp</title>
</head>
<body>
    <h1>Home {{Auth::user()->nickname_user}}</h1>

    <a href="{{route('logout')}}">Tanca sessió</a>
</body>
</html>