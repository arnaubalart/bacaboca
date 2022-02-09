<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <!-- librerias-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- jquery-->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.0/src/js.cookie.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="js/owl.carousel.min.js"></script>
    <!-- sweetalert-->
    <script type="text/javascript" src="js/iconos_g.js"></script>
    <!-- iconos FontAwesome-->
    <script type="text/javascript" src="js/js.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="js/ajax.js"></script>
    {{-- <link rel="icon" type="image/png" href="../img/icon.png"> --}}
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="sidenav">
        <ul>
            <li></li>
        </ul>
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
                <img src="{{asset('storage/logo/baca.gif')}}" alt="LogoBacaBoca">
            </div>
            <div class="toggle">

            </div>
            <div class="search-top">
                <svg width="24px" height="24px" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M17.5834 5.16602C14.5001 2.08268 9.50008 2.08268 6.41675 5.16602C3.33341 8.24935 3.33341 13.3327 6.41675 16.416L12.0001 21.9993L17.5834 16.3327C20.6667 13.3327 20.6667 8.24935 17.5834 5.16602ZM12.0001 12.416C11.0834 12.416 10.3334 11.666 10.3334 10.7493C10.3334 9.83268 11.0834 9.08268 12.0001 9.08268C12.9167 9.08268 13.6667 9.83268 13.6667 10.7493C13.6667 11.666 12.9167 12.416 12.0001 12.416Z" fill="#000000"></path></svg>
                <input class="input-search-top" type="text" placeholder="Introduce qué restaurante quieres" id="filtro" onkeyup="filter_data()">
            </div>
            <div class="login flex-cv">
                <button type="button">Login</button>
            </div>
        </div>
    </menu>
    <header class="header">
        <div class="bg-svg left">
            <img src="{{asset('storage/banners/burgersleft.svg')}}" alt="">
        </div>
        <div class="bg-svg right">
            <img src="{{asset('storage/banners/burgersRIGHT.svg')}}" alt="">
        </div>
        <div class="search-header">
            <svg width="24px" height="24px" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M17.5834 5.16602C14.5001 2.08268 9.50008 2.08268 6.41675 5.16602C3.33341 8.24935 3.33341 13.3327 6.41675 16.416L12.0001 21.9993L17.5834 16.3327C20.6667 13.3327 20.6667 8.24935 17.5834 5.16602ZM12.0001 12.416C11.0834 12.416 10.3334 11.666 10.3334 10.7493C10.3334 9.83268 11.0834 9.08268 12.0001 9.08268C12.9167 9.08268 13.6667 9.83268 13.6667 10.7493C13.6667 11.666 12.9167 12.416 12.0001 12.416Z" fill="#000000"></path></svg>
            <input class="input-search-header" type="text" placeholder="Introduce qué restaurante quieres" onkeyup="filter_data()">
        </div>

    </header>
    <div class="content">
        <form action="">
            <input type="hidden" class="hidden-texto" name="texto">
            <div class="owl-carousel">
                <div>
                    <div class="item-cousine">
                        <input id="idTipoCocina1" class="check-cocina" type="checkbox" name="idTipoCocina1" value="americano" onclick="filter_data();"/>
                        <label for="idTipoCocina1" style="background-image: url(storage/comidas/american.png);">Comida Americana</label>
                    </div>
                    <div class="item-cousine">
                        <input id="idTipoCocina2" class="check-cocina" type="checkbox" name="idTipoCocina2" value="chino" onclick="filter_data();"/>
                        <label for="idTipoCocina2" style="background-image: url(storage/comidas/china.png);">Comida China</label>
                    </div>
                </div>
                <div>
                    <div class="item-cousine">
                        <input id="idTipoCocina3" class="check-cocina" type="checkbox" name="idTipoCocina3" value="mexicano" onclick="filter_data();"/>
                        <label for="idTipoCocina3" style="background-image: url(storage/comidas/mexicana.png);">Comida Mejicana</label>
                    </div>
                    <div class="item-cousine">
                        <input id="idTipoCocina4" class="check-cocina" type="checkbox" name="idTipoCocina4" value="japones" onclick="filter_data();"/>
                        <label for="idTipoCocina4" style="background-image: url(storage/comidas/japonesa.png);">Comida Japonesa</label>
                    </div>
                </div>
                <div>
                    <div class="item-cousine">
                        <input id="idTipoCocina5" class="check-cocina" type="checkbox" name="idTipoCocina5" value="kebab" onclick="filter_data();"/>
                        <label for="idTipoCocina5" style="background-image: url(storage/comidas/halal.png);">Kebab</label>
                    </div>
                    <div class="item-cousine">
                        <input id="idTipoCocina6" class="check-cocina" type="checkbox" name="idTipoCocina6" value="pollo" onclick="filter_data();"/>
                        <label for="idTipoCocina6" style="background-image: url(storage/comidas/turka.png);">Pollo</label>
                    </div>
                </div>
                <div>
                    <div class="item-cousine">
                        <input id="idTipoCocina7" class="check-cocina" type="checkbox" name="idTipoCocina7" value="italiano" onclick="filter_data();"/>
                        <label for="idTipoCocina7" style="background-image: url(storage/comidas/italiana.png);">Comida Italiana</label>
                    </div>
                    <div class="item-cousine">
                        <input id="idTipoCocina8" class="check-cocina" type="checkbox" name="idTipoCocina8" value="Veggie" onclick="filter_data();"/>
                        <label for="idTipoCocina8" style="background-image: url(storage/comidas/saludable.png);">Comida Vegana</label>
                    </div>
                </div>
            </div>


        </form>
        <h2>Los Restaurantes</h2>
        <div class="container-list-restaurantes">
            <div class="grid-restaurantes" id="container-restaurantes">
                <div class="item-restaurant">
                    <img src="{{asset('storage/restaurantes/lospolloshermanos.png')}}" alt="foto-[introducir nombre restaurante]" class="foto-restaurante">
                    <div class="info-restaurante">
                        <h4>Los Pollos hermanos</h4>
                        <h6>Comida mejicana</h6>
                        <h6>Nuevo mejico, calle gustavo con Heisenberg</h6>
                        <small>4.5</small>
                    </div>

                </div>
                <div class="item-restaurant">
                    <img src="{{asset('storage/restaurantes/lospolloshermanos.png')}}" alt="foto-[introducir nombre restaurante]" class="foto-restaurante">
                    <div class="info-restaurante">
                        <h4>Los Pollos hermanos</h4>
                        <h6>Comida mejicana</h6>
                        <h6>Nuevo mejico, calle gustavo con Heisenberg</h6>
                        <small>4.5</small>
                    </div>

                </div>
                <div class="item-restaurant">
                    <img src="{{asset('storage/restaurantes/lospolloshermanos.png')}}" alt="foto-[introducir nombre restaurante]" class="foto-restaurante">
                    <div class="info-restaurante">
                        <h4>Los Pollos hermanos</h4>
                        <h6>Comida mejicana</h6>
                        <h6>Nuevo mejico, calle gustavo con Heisenberg</h6>
                        <small>4.5</small>
                    </div>

                </div>
                <div class="item-restaurant">
                    <img src="{{asset('storage/restaurantes/lospolloshermanos.png')}}" alt="foto-[introducir nombre restaurante]" class="foto-restaurante">
                    <div class="info-restaurante">
                        <h4>Los Pollos hermanos</h4>
                        <h6>Comida mejicana</h6>
                        <h6>Nuevo mejico, calle gustavo con Heisenberg</h6>
                        <small>4.5</small>
                    </div>

                </div>
                <div class="item-restaurant">
                    <img src="{{asset('storage/restaurantes/lospolloshermanos.png')}}" alt="foto-[introducir nombre restaurante]" class="foto-restaurante">
                    <div class="info-restaurante">
                        <h4>Los Pollos hermanos</h4>
                        <h6>Comida mejicana</h6>
                        <h6>Nuevo mejico, calle gustavo con Heisenberg</h6>
                        <small>4.5</small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer class=""></footer>

    <div class="overlay"></div>
</body>

</html>