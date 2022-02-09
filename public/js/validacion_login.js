function validar() {
    email_usu = document.getElementById('email_usu').value
    contra_usu = document.getElementById('contra_usu').value
    mensaje = document.getElementById('mensaje')

    if (email_usu == '' && contra_usu == '') {
        mensaje.innerHTML = 'Introduce el usuario y la contraseña'
        return false
    } else if (email_usu == '') {
        mensaje.innerHTML = 'Introduce el usuario'
        return false
    } else if (contra_usu == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        return false
    } else {
        return true
    }
}