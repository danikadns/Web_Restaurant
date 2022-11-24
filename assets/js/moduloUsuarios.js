function bienvenidoUser() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'BIENVENIDO'
    })
}

function loginFallido() {
    Swal.fire(
        '¡AUTENTICACIÓN FALLIDA!',
        '¡Asegurese de que todo este correctamente!',
        'question'
    )
}


$('#btnAgregarUsuario').on('click', function () {

    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var usuario = $('#usuario').val();
    var password = $('#password').val();
    var roles_id = document.querySelector('input[type=radio][name=rol_decision]:checked');
    var email = $('#email').val();
    var telefono = $('#telefono').val();
    var redSocial = $('#redSocial').val();

    if (nombres == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
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

    if (password == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La contraseña es obligatoria!',
        })
        return false;
    }

    if (roles_id.value == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La contraseña es obligatoria!',
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
        data: "crear_usuario=1&nombres=" + nombres + "&apellidos=" + apellidos + "&usuario=" + usuario + "&password=" + password + "&roles_id=" + roles_id.value + "&email=" + email + "&telefono=" + telefono,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoUsuario').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nuevo usuario agregado correctamente!',
                    '!Ya puede iniciar sesion!',
                    'success'
                );
                cargarContenido('view/Usuarios/usuariosView.php');
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

$('#btnActualizarUsuario').on('click', function () {

    var id = $('#id_upd').val();
    var nombres = $('#nombres_upd').val();
    var apellidos = $('#apellidos_upd').val();
    var usuario = $('#usuario_upd').val();
    var password = $('#password_upd').val();
    var roles_id = document.querySelector('input[type=radio][name=rol_decision]:checked');
    var email = $('#email_upd').val();
    var telefono = $('#telefono_upd').val();

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

    if (password == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La contraseña es obligatoria!',
        })
        return false;
    }

    if (roles_id == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La contraseña es obligatoria!',
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
        data: "actualizar_usuario=1&id=" + id + "&nombres=" + nombres + "&apellidos=" + apellidos + "&usuario=" + usuario + "&password=" + password + "&roles_id=" + roles_id.value + "&email=" + email + "&telefono=" + telefono,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaUsuario').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Usuario actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Usuarios/usuariosView.php');
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

function obtenerUsuario(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_usuario=1&user_id=" + id,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombres = data.nombres;
            var apellidos = data.apellidos;
            var usuario = data.usuario;
            var clave = data.password;
            var email = data.email;
            var telefono = data.telefono;

            $('#id_upd').val(id);
            $('#nombres_upd').val(nombres);
            $('#apellidos_upd').val(apellidos);
            $('#usuario_upd').val(usuario);
            $('#password_upd').val(clave);
            $('#email_upd').val(email);
            $('#telefono_upd').val(telefono);

            $('#formActualizaUsuario').modal('show');
        }
    });
}

function eliminarUsuario(id) {

    Swal.fire({
        title: '¿Estas seguro?',
        text: "!No podras revertir este cambio!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'POST',
                data: "eliminar_usuario=1&user_id=" + id,
                url: 'controller/Usuarios/usuariosController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Usuarios/usuariosView.php');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '!Algo salió mal!',
                        })
                    }
                }

            })
        }
    })
}