@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mostrar Restaurante</title>
    <link rel="stylesheet" href="{!! asset('css/styles_mostrar.css') !!}">
</head>
<body>
    <div>
        <form action="{{url('crear')}}" method="GET">
            <button class="btn btn-primary" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class="btn btn-dark" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div class="mostrar">
        <div class="row flex-cv">
            <table class="table">
                    <tr class="active">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CIUDAD</th>
                        <th>DIRECCION</th>
                        <th>UBICACION</th>
                        <th>TELEFONO</th>
                        <th>PRECIO CARTA</th>
                        <th>FOTO</th>
                        <th>GERENTE</th>
                        <th>TIPO DE RESTAURANTE</th>
                        <th>CODIGO POSTAL</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                @foreach($listaRestaurante as $restaurante)
                    <tr>
                        <td>{{$restaurante->id_resta}}</td>
                        <td>{{$restaurante->nom_resta}}</td>
                        <td>{{$restaurante->ciudad_resta}}</td>
                        <td>{{$restaurante->direccion_resta}}</td>
                        <td>{{$restaurante->ubi_resta}}</td>
                        <td>{{$restaurante->telf_resta}}</td>
                        <td>{{$restaurante->precio_resta}}</td>
                        <td style="padding: auto; text-align: center"><img src="{{asset('storage/restaurantes')."/".$restaurante->foto_resta}}" width="100"></td>
                        <td>{{$restaurante->nombre_usu}}</td>
                        <td>{{$restaurante->nom_tipo}}</td>
                        <td>{{$restaurante->cp_resta}}</td>
                        <td><form action="{{url('eliminarRestaurante/'.$restaurante->id_resta)}}" method="POST">
                            @csrf
                            <!--{{csrf_field()}}--->
                            {{method_field('DELETE')}}
                            <!--@method('DELETE')--->
                            <button class="btn btn-outline-danger" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                        </form></td>
                        <td><form action="{{url('modificarRestaurante/'.$restaurante->id_resta)}}" method="GET">
                            <button class="btn btn-outline-secondary" type="submit" name="Modificar" value="Modificar">Modificar</button>
                        </form></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>