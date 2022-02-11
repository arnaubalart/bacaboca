<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles_crear.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <title>Formulario Actualizar Restaurante</title>
</head>
<body class="login">
    <form class="cuadro_login" action="{{url('crear')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('POST')}}
        <p>Nombre del restaurante</p>
            <input class="btn-outline-success" type="text" name="nom_resta" placeholder="Introduce el nombre del restaurante" value="{{old('nom_resta')}}">
            @error('nom_resta')
                <br>
                {{$message}}
            @enderror
            <p>Ciudad</p>
            <input class="btn-outline-success" type="text" name="ciudad_resta" placeholder="Introduce la ciudad donde se ubica el restaurante">
            @error('ciudad_resta')
                <br>
                {{$message}}
            @enderror
            <p>Dirección</p>
            <input class="btn-outline-success" type="text" name="direccion_resta" placeholder="Introduce la dirección del restaurante">
            @error('direccion_resta')
                <br>
                {{$message}}
            @enderror
            <p>Ubicación</p>
            <input class="btn-outline-success" type="text" name="ubi_resta" placeholder="Introduce la ubicación del restaurante">
            @error('ubi_resta')
                <br>
                {{$message}}
            @enderror
            <p>Telefono</p>
            <input class="btn-outline-success" type="number" name="telf_resta" placeholder="Introduce el numero de telefono del restaurante">
            @error('telf_resta')
                <br>
                {{$message}}
            @enderror
            <p>Precio</p>
            <select class="btn-outline-success" name="precio_resta" id="precio_resta">
                <option value="" selected >Seleccione el precio del restaurante</option>
                <option value="€">€</option>
                <option value="€">€€</option>
                <option value="€">€€€</option>
            </select>
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
            <p>Gerente</p>
            <select class="btn-outline-success" name="id_gerente_fk" id="id_gerente_fk">
                <option>Seleccione un gerente</option>
                @foreach ($user as $gerente)
                    <option value="{{$gerente->id_usu}}">{{$gerente->nombre_usu}}</option>
                @endforeach
            </select>
            @error('id_gerente_fk')
                <br>
                {{$message}}
            @enderror
            <p>Tipo de restaurante</p>
            <select class="btn-outline-success" name="id_tipo_fk" id="id_tipo_fk">
                <option>Seleccione el tipo de restaurante</option>
                @foreach ($tipo as $type)
                    <option value="{{$type->id_tipo}}">{{$type->nom_tipo}}</option> 
                @endforeach
            </select>
            @error('id_tipo_fk')
                <br>
                {{$message}}
            @enderror
            <p>Código postal del restaurante</p>
            <input class="btn-outline-success" type="number" name="cp_resta" placeholder="Introduce el código postal del restaurante">
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