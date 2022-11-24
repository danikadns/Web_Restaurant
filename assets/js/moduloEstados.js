$('#btnAgregarEstado').on('click', function () {

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
        data: "crear_estado=1&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Estados/estadosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoEstado').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nuevo Estado agregado correctamente!',
                    '!Ya puede ser asignado!',
                    'success'
                );
                cargarContenido('view/Estados/estadosView.php');
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

$('#btnActualizarEstado').on('click', function () {

    var id = $('#id_estado_upd').val();
    var nombre = $('#nombre_estado_upd').val();
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
            text: '!El estado es necesario!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "actualizar_estado=1&id=" + id + "&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Estado/estadoController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaEstado').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Rol actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Estados/estadosView.php');
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

function obtenerEstado(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_estado=1&id=" + id,
        url: 'controller/Estados/estadosController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombre = data.nombre;
            var estado = data.estado;

            $('#id_estado_upd').val(id);
            $('#nombre_estado_upd').val(nombre);

            $('#formActualizaEstado').modal('show');
        }
    });
}

function eliminarEstado(id) {

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
                data: "eliminar_estado=1&id=" + id,
                url: 'controller/Estados/estadosController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Estados/estadosView.php');
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