<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="js/ajax.js"></script>
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
        .body{
            padding: 100px;
            margin: 0;
        }
        .container-filtros{
            display: flex;
            flex-flow:row wrap;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }
        .cocina{
            margin: 30px;
            width: 25%;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            background-color: aquamarine;
        }
        .container-restaurantes{
            display: flex;
            flex-flow:row wrap;
            align-items: center;
            justify-content: center;
            padding: 30px;
            width: 100%;
        }
        .restaurante{
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
        }
    </style>
</head>
<body>
    <input type="text" onkeyup="filter_data()" id="filtro">
    <div class="container-filtros" id="container-filtros">
        <div class="cocina"><p>Americana</p><input type="checkbox" class="check-cocina" value="americano" onclick="filter_data();"/></div>
        <div class="cocina"><p>China</p><input type="checkbox" class="check-cocina" value="chino" onclick="filter_data();"/></div>
        <div class="cocina"><p>Mejicana</p><input type="checkbox" class="check-cocina" value="mexicano" onclick="filter_data();"/></div>
        <div class="cocina"><p>Japonesa</p><input type="checkbox" class="check-cocina" value="japones" onclick="filter_data();"/></div>
        <div class="cocina"><p>Kebab</p><input type="checkbox" class="check-cocina" value="kebab" onclick="filter_data();"/></div>
        <div class="cocina"><p>Pollo</p><input type="checkbox" class="check-cocina" value="pollo" onclick="filter_data();"/></div>
        <div class="cocina"><p>Italiana</p><input type="checkbox" class="check-cocina" value="italiano" onclick="filter_data();"/></div>
        <div class="cocina"><p>Vegana</p><input type="checkbox" class="check-cocina" value="Veggie" onclick="filter_data();"/></div>
    </div>
    <div class="container-restaurantes" id="container-restaurantes"></div>
</body>
</html>