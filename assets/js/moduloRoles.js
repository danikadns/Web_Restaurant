$('#btnAgregarRol').on('click', function () {

    var nombre = $('#nombre').val();
    var estado = document.querySelector('input[type=radio][name=estado_decision]:checked');

    if (nombre == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (estado == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El estado es requerido!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_rol=1&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Roles/rolesController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoRol').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nuevo rol agregado correctamente!',
                    '!Ya puede ser asignado!',
                    'success'
                );
                cargarContenido('view/Roles/rolesView.php');
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

$('#btnActualizarRol').on('click', function () {

    var role_id = $('#id_rol_upd').val();
    var nombre = $('#nombre_rol_upd').val();
    var estado = document.querySelector('input[type=radio][name=estado_decision]:checked');
    

    if (nombre == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El nombre es requerido!',
        })
        return false;
    }

    if (estado == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El estado del rol es necesario!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "actualizar_rol=1&role_id=" + role_id + "&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Roles/rolesController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaRol').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Rol actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Roles/rolesView.php');
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

function obtenerRol(role_id) {

    $.ajax({
        type: 'POST',
        data: "obtener_rol=1&role_id=" + role_id,
        url: 'controller/Roles/rolesController.php',
        dataType: 'json',
        success: function (data) {
            var role_id = data.role_id;
            var nombre = data.nombre;
            var estado = data.estado;

            $('#id_rol_upd').val(role_id);
            $('#nombre_rol_upd').val(nombre);

            $('#formActualizaRol').modal('show');
        }
    });
}

function eliminarRol(role_id) {

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
                data: "eliminar_rol=1&role_id=" + role_id,
                url: 'controller/Roles/rolesController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Roles/rolesView.php');
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