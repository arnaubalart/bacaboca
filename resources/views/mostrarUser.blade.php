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
        <form action="{{url('mostrar')}}" method="GET">
            <button class="btn btn-primary" type="submit" name="Back" value="Back">Back</button>
        </form>
        <form action="{{url('crearUser')}}" method="GET">
            <button class="btn btn-primary" type="submit" name="Crear" value="Crear">Crear Usuario</button>
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
                        <th>APELLIDO</th>
                        <th>EMAIL</th>
                        <th>TELEFONO</th>
                        <th>FOTO</th>
                        <th>ROL</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                @foreach($listaUsuario as $usuario)
                    <tr>
                        <td>{{$usuario->id_usu}}</td>
                        <td>{{$usuario->nombre_usu}}</td>
                        <td>{{$usuario->apellido_usu}}</td>
                        <td>{{$usuario->email_usu}}</td>
                        <td>{{$usuario->telf_usu}}</td>
                        <td style="padding: auto; text-align: center"><img src="{{asset('storage')."/".$usuario->foto_usu}}" width="100"></td>
                        <td>{{$usuario->nom_rol}}</td>
                        <td><form action="{{url('eliminarUsuario/'.$usuario->id_usu)}}" method="POST">
                            @csrf
                            <!--{{csrf_field()}}--->
                            {{method_field('DELETE')}}
                            <!--@method('DELETE')--->
                            <button class="btn btn-outline-danger" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                        </form></td>
                        <td><form action="{{url('modificarUsuario/'.$usuario->id_usu)}}" method="GET">
                            <button class="btn btn-outline-secondary" type="submit" name="Modificar" value="Modificar">Modificar</button>
                        </form></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>