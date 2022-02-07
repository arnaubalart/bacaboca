<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <title>Formulario Actualizar Restaurante</title>
</head>
<body class="login">
    <form class="cuadro_login" action="{{url('modificarRestaurante')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre</p>
        <input type="text" name="nom_resta" value="{{$restaurante->nom_resta}}">
        <p>Ciudad</p>
        <input class="btn-outline-success" type="text" name="ciudad_resta" value="{{$restaurante->ciudad_resta}}">
        <p>Dirección</p>
        <input class="btn-outline-success" type="text" name="direccion_resta" value="{{$restaurante->direccion_resta}}">
        <p>Ubicación</p>
        <input class="btn-outline-success" type="text" name="ubi_resta" value="{{$restaurante->ubi_resta}}">
        <p>Telefono</p>
        <input class="btn-outline-success" type="number" name="telf_resta" value="{{$restaurante->telf_resta}}">
        <p>Precio del restaurante</p>
            <select class="btn-outline-success" name="precio_resta" id="precio_resta">
                <option selected >{{$restaurante->precio_resta}}</option>
                <option value="1">€</option>
                <option value="2">€€</option>
                <option value="3">€€€</option>
            </select>
        <p>Foto</p>
        <input type="file" name="foto_resta" value="{{$restaurante->foto_resta}}">
        <p>Gerente</p>
            <select class="btn-outline-success" name="id_gerente_fk" id="id_gerente_fk">
                <option selected >{{$restaurante->id_gerente_fk}}</option>
                <option value="8">Roberto</option>
                <option value="10">Fernanda</option>
                <option value="11">Julia</option>
                <option value="12">Pablo</option>
                <option value="13">Silvia</option>
                <option value="14">Carla</option>
                <option value="15">Pedro</option>
                <option value="16">Julian</option>
            </select>
        <p>Tipo de restaurante</p>
            <select class="btn-outline-success" name="id_tipo_fk" id="id_tipo_fk">
                <option selected >{{$restaurante->id_tipo_fk}}</option>
                <option value="1">Americano</option>
                <option value="2">Mejicano</option>
                <option value="3">Chino</option>
                <option value="4">Kebab</option>
                <option value="5">Pollo</option>
                <option value="6">Japones</option>
                <option value="7">Italiano</option>
                <option value="8">Veggie</option>
            </select>
        <p>Codigo postal</p>
        <input class="btn-outline-success" type="number" name="cp_resta" value="{{$restaurante->cp_resta}}">
        <div>
            <input type="hidden" name="id_resta" value="{{$restaurante->id_resta}}">
            <input class="btn btn-success" type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>