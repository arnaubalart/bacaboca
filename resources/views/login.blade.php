<!DOCTYPE HTML>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Formulario Login</title>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/validacion_login.js"></script>
  <link rel="stylesheet" href="{!! asset('css/styles_login.css') !!}">
</head>
<body class="login">
  <div class="row flex-cv">
    <div class="cuadro_login">
      <form action="{{url('login')}}" method="POST" onsubmit="return validar()">
          @csrf
          {{method_field('POST')}}
          <br>
          <h1>INICIO DE SESIÓN</h1>
          <br>
          <div class=alert id='mensaje'></div>
          <div class="form-group">
            <p>Usuario:</p>
            <div>
              <input class="inputlogin" type="text" name="email_usu" id="email_usu" placeholder="Introduce tu usuario">
            </div>
            @error('email_usu')
                <br>
                {{$message}}
            @enderror
          </div>
          <br>
          <div class="form-group">
            <p>Contraseña:</p>
            <div>
              <input class="inputlogin" type="password" name="contra_usu" id="contra_usu" placeholder="Introduce la contraseña">
            </div>
            @error('contra_usu')
                <br>
                {{$message}}
            @enderror
          </div>
          <br><br>
          <div class="form-group">
            <button class= "botonlogin" type="submit" value="register">Iniciar Sesión</button>
          </div>
      </form>
    </div>
  </div>
</body>
</html>
