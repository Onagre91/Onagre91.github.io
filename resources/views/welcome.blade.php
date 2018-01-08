<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('materialize/css/materialize.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('materialize/css/materialize.min.css') }}" rel="stylesheet" type="text/css" />
    <title>Ludovic Lannoo</title>
</head>
<body>

    <div class="overlay">
        <div class="container-fluid">
            <div class="row">
                <div class="col l12 push-l11">
                    <img src="{{ url('images/modif.png')}}">
                </div>
            </div>
        </div>
    </div>   
    <canvas id="canvas"></canvas>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="{{ url('js/dust.js') }}"></script>
</body>
</html>
