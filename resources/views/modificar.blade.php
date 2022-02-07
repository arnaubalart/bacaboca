<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles_actu.css') !!}">
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
                <option value="{{$restaurante->precio_resta}}" selected >{{$restaurante->precio_resta}}</option>
                <option value="€">€</option>
                <option value="€">€€</option>
                <option value="€">€€€</option>
            </select>
        <p>Foto</p>
        <input type="file" name="foto_resta" value="{{$restaurante->foto_resta}}">
        <p>Gerente</p>
            <select class="btn-outline-success" name="id_gerente_fk" id="id_gerente_fk">
                <option value="{{$restaurante->id_gerente_fk}}" selected>{{$restaurante->nombre_usu}}</option>
                <option value="{{$restaurante->id_gerente_fk}}">Roberto</option>
                <option value="{{$restaurante->id_gerente_fk}}">Fernanda</option>
                <option value="{{$restaurante->id_gerente_fk}}">Julia</option>
                <option value="{{$restaurante->id_gerente_fk}}">Pablo</option>
                <option value="{{$restaurante->id_gerente_fk}}">Silvia</option>
                <option value="{{$restaurante->id_gerente_fk}}">Carla</option>
                <option value="{{$restaurante->id_gerente_fk}}">Pedro</option>
                <option value="{{$restaurante->id_gerente_fk}}">Julian</option>
            </select>
        <p>Tipo de restaurante</p>
            <select class="btn-outline-success" name="id_tipo_fk" id="id_tipo_fk">
                <option value="{{$restaurante->id_tipo_fk}}" selected >{{$restaurante->nom_tipo}}</option>
                <option value="{{$restaurante->id_tipo_fk}}">Americano</option>
                <option value="{{$restaurante->id_tipo_fk}}">Mejicano</option>
                <option value="{{$restaurante->id_tipo_fk}}">Chino</option>
                <option value="{{$restaurante->id_tipo_fk}}">Kebab</option>
                <option value="{{$restaurante->id_tipo_fk}}">Pollo</option>
                <option value="{{$restaurante->id_tipo_fk}}">Japones</option>
                <option value="{{$restaurante->id_tipo_fk}}">Italiano</option>
                <option value="{{$restaurante->id_tipo_fk}}">Veggie</option>
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