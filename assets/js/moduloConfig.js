$('#btnActualizarPass').on('click', function () {

    var nuevaPass = $('#inPassNueva').val();
    var password = $('#inPass').val();
    var passConfirm = $('#inPassConfirm').val();

    if (nuevaPass == "") {
        alert('Debe ingresar una contraseña');
        return false;
    }
    if (nuevaPass !== passConfirm) {
        alert('El campo de confirmar contraseña no coincide');
        return false;
    }

    if (password == "") {
        alert('Debe ingresar su contraseña actual');
        return false;
    }
    $.ajax({
        type: 'POST',
        data: "comprobar_pass=1&nuevaPass=" + nuevaPass + "&password=" + password,
        url: 'controller/Configuracion/configController.php',
        dataType: 'json',
        success: function (data) {
            var contraseña = data.password;
            if (contraseña == password) {
                $.ajax({
                    type: 'POST',
                    data: "actualizar_pass=1&nuevaPass=" + nuevaPass + "&password=" + password,
                    url: 'controller/Configuracion/configController.php',
                    dataType: 'json',
                    success: function (data) {
                        var resultado = data.resultado;
                        if (resultado === 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Contraseña actualizada correctamente'
                            })
                            cargarContenido('home.php');
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'No se pudo actualizar la contraseña'
                            })
                        }
                    }
                });
            } else {
                Toast.fire({
                    icon: 'success',
                    title: 'La contraseña es incorrecta'
                })
            }
        }
    });

});

function obtenerUsuario(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_usuario=1&user_id=" + id,
        url: 'controller/Configuracion/configController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombres = data.nombres;
            var apellidos = data.apellidos;
            var usuario = data.usuario;
            var email = data.email;
            var telefono = data.telefono;

            $('#name_edit').val(nombres);
            $('#lastname_edit').val(apellidos);
            $('#user_edit').val(usuario);
            $('#email_edit').val(email);
            $('#phone_edit').val(telefono);
        }
    });

}

$('#btnActualizarUsuario').on('click', function () {

    var nombres = $('#name_edit').val();
    var apellidos = $('#lastname_edit').val();
    var usuario = $('#user_edit').val();
    var email = $('#email_edit').val();
    var telefono = $('#phone_edit').val();

    if (nombres == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El nombre es requerido!',
        })
        return false;
    }
    if (apellidos == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El apellido es requerido!',
        })
        return false;
    }

    if (usuario == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Usuario es obligatorio!',
        })
        return false;
    }

    if (email == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!Falta el Correo!',
        })
        return false;
    }

    if (telefono == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El numero de telefono es necesario!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "actualizar_usuario=1&nombres=" + nombres + "&apellidos=" + apellidos + "&usuario=" + usuario + "&email=" + email + "&telefono=" + telefono,
        url: 'controller/Configuracion/configController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                Swal.fire(
                    '!Usuario actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Configuracion/userProfile.php');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '!Algo salió mal!',
                })
            }
        }
    });

});

function mostrarUsuario(id) {

    $.ajax({
        type: 'POST',
        data: "mostrar_usuario=1&user_id=" + id,
        url: 'controller/Configuracion/configController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombres = data.nombres;
            var apellidos = data.apellidos;
            var usuario = data.usuario;
            var email = data.email;
            var telefono = data.telefono;

        }
    });

}