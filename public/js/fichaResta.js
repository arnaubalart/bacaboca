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

function creaReview() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
    formData.append('clave', valor);
    valor = elemento/s que se pasarán como parámetros: token, method, inputs... */

    var contenedor = document.getElementById("historial-reviews");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('id_usu', document.getElementById('id_usu').value);
    formData.append('id_resta', document.getElementById('id_resta').value);
    formData.append('nota_resta', document.getElementById('nota_resta').value);
    formData.append('texto_rev', document.getElementById('texto_rev').value);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("GET", "creaReview", true);
    alert("sgsg")
    ajax.onreadystatechange = function() {
        alert(ajax.status)
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += `<div class="card-review">
                                <div class="nota-resta">` + respuesta[i][`valoracion_rev`] + `</div>
                                <div class="foto-user"><img src="" alt="foto usuario"></div>
                                <div class="nombre-user">` + respuesta[i][`nombre_usu`] + ` ` + respuesta[i][`apellido_usu`] + `</div>
                                <div class="descripcion-review">` + respuesta[i][`texto_rev`] + `</div>
                            </div>`;
            }
            contenedor.innerHTML = recarga;
        }
    }
    ajax.send(formData);
    return false
}