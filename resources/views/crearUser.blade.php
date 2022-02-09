<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles_crear.css') !!}">
    <title>Formulario Actualizar Restaurante</title>
</head>
<body class="login">
    @if($errors->any())
    <div>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <form class="cuadro_login" action="{{url('crearUser')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('POST')}}
        <p>Nombre del usuario</p>
            <input class="btn-outline-success" type="text" name="nombre_usu" placeholder="Introduce el nombre del restaurante" value="{{old('nombre_usu')}}">
            @error('nombre_usu')
                <br>
                {{$message}}
            @enderror
        <p>apellido</p>
            <input class="btn-outline-success" type="text" name="apellido_usu" placeholder="Introduce la ciudad donde se ubica el restaurante">
            @error('apellido_usu')
                <br>
                {{$message}}
            @enderror
        <p>email</p>
            <input class="btn-outline-success" type="text" name="email_usu" placeholder="Introduce la dirección del restaurante">
            @error('email_usu')
                <br>
                {{$message}}
            @enderror
        <p>telf</p>
            <input class="btn-outline-success" type="number" name="telf_usu" placeholder="Introduce la ubicación del restaurante">
            @error('telf_usu')
                <br>
                {{$message}}
            @enderror
        <p>contraseña</p>
            <input class="btn-outline-success" type="text" name="contra_usu" placeholder="Introduce el numero de telefono del restaurante">
            @error('contra_usu')
                <br>
                {{$message}}
            @enderror
        <p>Foto</p>
            <input type="file" name="foto_usu">
            @error('foto_usu')
                <br>
                {{$message}}
            @enderror
        <p>rol</p>
            <select class="btn-outline-success" name="id_rol_fk" id="id_rol_fk">
                <option value="" selected >Seleccione el precio del restaurante</option>
                <option value="1">Admin</option>
                <option value="2">Estandar</option>
                <option value="3">Gerente</option>
            </select>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>