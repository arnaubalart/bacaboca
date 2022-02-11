<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha restaurante</title>
    <!-- librerias-->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <!-- jquery-->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.0/src/js.cookie.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/fichaResta.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- sweetalert-->
    <script type="text/javascript" src="../js/iconos_g.js"></script>
    <!-- iconos FontAwesome-->
    <script type="text/javascript" src="../js/js.js"></script>
    <link rel="icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="sidenav">
        <a class="twitter-timeline" data-width="300" data-height="500" data-dnt="true" data-theme="dark" href="https://twitter.com/UberEats?ref_src=twsrc%5Etfw">Tweets by UberEats</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </nav>
    <menu class="menu">
        <div class="container-menu">
            <div class="burger flex-cv">
                <button class="boton-burger" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                    <svg width="50" height="50" viewBox="0 0 100 100">
                      <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                      <path class="line line2" d="M 20,50 H 80" />
                      <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                  </button>
            </div>
            <div class="logo flex-cv">
                <a href="{{url('/')}}"></a>
                <img src="{{asset('storage/logo/baca.gif')}}" alt="LogoBacaBoca">
            </div>
            <div class="toggle">

            </div>
            <div class="container-search-top ficha">
                <div class="search-top">
                    <svg width="24px" height="24px" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M17.5834 5.16602C14.5001 2.08268 9.50008 2.08268 6.41675 5.16602C3.33341 8.24935 3.33341 13.3327 6.41675 16.416L12.0001 21.9993L17.5834 16.3327C20.6667 13.3327 20.6667 8.24935 17.5834 5.16602ZM12.0001 12.416C11.0834 12.416 10.3334 11.666 10.3334 10.7493C10.3334 9.83268 11.0834 9.08268 12.0001 9.08268C12.9167 9.08268 13.6667 9.83268 13.6667 10.7493C13.6667 11.666 12.9167 12.416 12.0001 12.416Z" fill="#000000"></path></svg>
                    <input class="input-search-top" type="text" placeholder="Introduce que restaurante quieres">
                </div>
            </div>
            <div class="login flex-cv">
                @if (Session::get('nombre_admin') || Session::get('nombre_cliente'))
                <a href="{{url('logout')}}">
                    <button type="button" >Logout</button>
                </a>
                @else
                <a href="{{url('login')}}">
                    <button type="button" >Login</button>
                </a>
                <a href="{{url('crearUser')}}">
                    <button type="button">Register</button>
                </a>
                @endif

            </div>
        </div>
    </menu>
    <header class="header-tipo">
        <div class="bg-header">
            <div class="bg-svg all-width">
                <!-- poner la imagen y el alt -->
                <img src="{{asset('storage/restaurantes')."/".$restaurante->foto_resta}}" alt="lospolloshermanos">
            </div>
        </div>
    </header>
    <div class="content region-tipo">
        <div class="info-resta">
            <div class="container-info ">
                <div class="nombre-resta">
                    <!-- Poner el nombre resta -->
                    <h2>{{ucwords($restaurante->nom_resta)}}</h2>
                </div>

                <div class="more-info-resta">
                    <!-- Poner nota resta -->
                    <div class="nota">
                        <label class="rating-label">
                            <input
                              class="rating"
                              oninput="this.style.setProperty('--value', this.value)"
                              type="range"
                              style="--value:
                              <?php 
                              $suma=0;
                              $media=0;
                              $contador=0;
                              foreach ($reviews as $review) {
                                  $suma +=$review->valoracion_rev;
                                  $contador +=1;
                              }
                              if ($contador==0) {
                                echo 2.5;
                              }else{
                                $media=$suma/$contador;
                                echo $media;
                              }
                              
                               
                            ?>;"
                              disabled>
                        </label>
                    </div>
                    <!-- Poner tipo resta -->
                    <div class="tipo-resta">
                        <p>Menú:  {{$restaurante->nom_tipo}}</p>
                    </div>
                    <!-- Poner precio resta -->
                    <div class="precio">
                        <p>{{$restaurante->precio_resta}}</p>
                    </div>
                </div>
                <div class="descripcion">
                    <h3>Descripción</h3>
                    <!-- poner descripcion del restaurante en cuestion -->
                    <p>{{$restaurante->desc_tipo}}</p>
                </div>
                <div class="telf">
                    <a href="tel:{{$restaurante->telf_resta}}">{{$restaurante->telf_resta}}</a>
                </div>
                <div class="direccion">
                    <div class="direccion-resta">
                        <p>{{$restaurante->direccion_resta}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ubicacion">
            <!-- Passar con una cookie las cordenadas del mapa. La cookie se llamara ubiMap-->
            <span class="hide ubi-flea">{{$restaurante->ubi_resta}}</span>
            <div class="container-mapa">
                <div class="mapa" id="map">

                </div>
            </div>
        </div>
    </div>




    <div class="region-2">
        <div class="container-reviews">
            <div class="bg">
                <div class="left"></div>
                <div class="right"></div>
            </div>
            <!--Recordar de passar las fk del id del usuario y la fk del id restaurante-->
            <form class="formulario-review" action="{{url('/creaReview')}}" method="POST">
                @csrf
                {{method_field('POST')}}
                <h2>Escriba aquí su valoración</h2>
                <label class="rating-label">
                    <strong>Nota</strong>
                    <input
                    class="rating"
                    max="5"
                    min="0"
                    oninput="this.style.setProperty('--value', this.value)"
                    step="0.5"
                    type="range"
                    name="nota_resta"
                    id="nota_resta"
                    >
                </label>
                <label for="texto_rev"> Descripción</label>
                <textarea name="texto_rev" id="texto_rev" cols="30" rows="10" resize="false"></textarea>
                <input type="hidden" name="id_resta" id="id_resta" value="{{$restaurante->id_resta}}">
                <input type="hidden" name="id_usu" id="id_usu" value="{{Session::get('id_usu')}}">
                @if (Session::get('nombre_admin') || Session::get('nombre_cliente'))
                    <input type="submit" value="Enviar">
                @else
                    <input type="submit" value="Enviar" disabled><br>
                    <p class="no-login">Inicia sesión para poder valorar el restaurante</p><br>
                @endif

            </form>

            <div class="historial-reviews" id="historial-reviews"><!-- MOSTRAR REVIEWS -->
                @foreach ($reviews as $review)
                <div class="card-review">
                    <div class="user-info">
                        <div class="foto-user">
                            <i class="fad fa-user-alien"></i>
                        </div>
                        <div class="nombre-user">
                            <p>{{$review->nombre_usu}} {{$review->apellido_usu}}</p>
                        </div>
                    </div>
                    <div class="nota-resta">
                        <label class="rating-label">
                            <input
                              class="rating"
                              oninput="this.style.setProperty('--value', this.value)"
                              type="range"
                              style="--value:{{$review->valoracion_rev}};"
                              disabled>
                        </label>
                    </div>
                    <div class="descripcion-review">
                        <p>
                            {{$review->texto_rev}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
    <footer class=""></footer>

    <div class="overlay"></div>
    <div class="overlay-p">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrarPop"><i class="fas fa-times"></i></a>
            <h3>Iniciar sessión <span class="numeroEj"></span></h3>
            <div class="contenedor-popup">
                <div class="ejercicio-body">

                </div>
            </div>
        </div>
    </div>

</body>

</html>