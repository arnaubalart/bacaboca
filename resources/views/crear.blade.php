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
    <form class="cuadro_login" action="{{url('crear')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Nombre del restaurante</p>
        <input type="text" name="nom_resta" placeholder="Introduce el nombre del restaurante" value="{{old('nom_resta')}}">
        @error('nom_resta')
            <br>
            {{$message}}
        @enderror
        <p>Ciudad</p>
        <input type="text" name="ciudad_resta" placeholder="Introduce la ciudad donde se ubica el restaurante">
        @error('ciudad_resta')
            <br>
            {{$message}}
        @enderror
        <p>Dirección</p>
        <input type="text" name="direccion_resta" placeholder="Introduce la dirección del restaurante">
        @error('direccion_resta')
            <br>
            {{$message}}
        @enderror
        <p>Ubicación</p>
        <input type="number" name="ubi_resta" placeholder="Introduce la ubicación del restaurante">
        @error('ubi_resta')
            <br>
            {{$message}}
        @enderror
        <p>Telefono</p>
        <input type="number" name="telf_resta" placeholder="Introduce el numero de telefono del restaurante">
        @error('telf_resta')
            <br>
            {{$message}}
        @enderror
        <p>Precio</p>
        <input type="number" name="precio_resta" placeholder="Selecciona el precio del restaurante">
        @error('precio_resta')
            <br>
            {{$message}}
        @enderror
        <p>Foto</p>
        <input type="file" name="foto_resta">
        @error('foto_resta')
            <br>
            {{$message}}
        @enderror
        <p>Gerente del restaurante</p>
        <input type="text" name="id_gerente_fk" placeholder="Selecciona el gerente del restaurante">
        @error('id_gerente_fk')
            <br>
            {{$message}}
        @enderror
        <p>Tipo de restaurante</p>
        <input type="text" name="id_tipo_fk" placeholder="Selecciona el tipo de restaurante">
        @error('id_tipo_fk')
            <br>
            {{$message}}
        @enderror
        <p>Código postal del restaurante</p>
        <input type="text" name="cp_resta" placeholder="Introduce el código postal del restaurante">
        @error('cp_resta')
            <br>
            {{$message}}
        @enderror
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>