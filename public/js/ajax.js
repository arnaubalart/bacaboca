window.onload = function() {
    //leerRestaurantes();
    filter_data();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

/* Función implementada con AJAX */
// function leerRestaurantes() {
//     /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
//     /* Usar el objeto FormData para guardar los parámetros que se enviarán:
//        formData.append('clave', valor);
//        valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
//     var contenedor = document.getElementById("container-restaurantes");
//     var formData = new FormData();
//     formData.append('_token', document.getElementById('token').getAttribute("content"));
//     formData.append('filtro', document.getElementById('filtro').value);

//     /* Inicializar un objeto AJAX */
//     var ajax = objetoAjax();

//     ajax.open("POST", "leer", true);
//     ajax.onreadystatechange = function() {
//         if (ajax.readyState == 4 && ajax.status == 200) {
//             var respuesta = JSON.parse(this.responseText);
//             var recarga = '';
//             /* Leerá la respuesta que es devuelta por el controlador: */
//             for (let i = 0; i < respuesta.length; i++) {
//                 recarga += '<div class="restaurante">' + respuesta[i].nom_resta + '</div>';
//             }
//             contenedor.innerHTML = recarga;
//         }
//     }
//     ajax.send(formData);
// }

function filter_data() { //FUNCION PRINCIPAL
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
    formData.append('clave', valor);
    valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var contenedor = document.getElementById("container-restaurantes");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtro', document.getElementById('filtro').value);
    var cocina = get_filter('check-cocina');
    var cocina = cocina.join("','");
    formData.append('cocina', cocina);

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "filtro", true);
    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<div class="restaurante">' + respuesta[i].nom_resta + '</div>';
            }
            contenedor.innerHTML = recarga;
        }
    }
    ajax.send(formData);
}

function get_filter(clase) { //FUNCION REUTILIZABLE PARA DIFERENTES FILTROS

    var filtro = [];
    var listaCocinas = document.getElementsByClassName(clase);
    for (var i = 0; i < listaCocinas.length; i += 1) {
        if (listaCocinas[i].checked == true) {
            filtro.push(listaCocinas[i].value);
        } else {

        }
    }
    return filtro;
}