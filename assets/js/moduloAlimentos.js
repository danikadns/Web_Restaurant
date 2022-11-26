$('#btnAgregarAlimento').on('click', function () {

    var nombre = $('#nombre').val();
    var estado = document.querySelector('input[type=radio][name=estado_decision]:checked');
    var categoria = document.querySelector('input[type=radio][name=categoria_decision]:checked');
    var precio = $('#precio').val();

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
    if (precio == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El precio es necesario!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_alimento=1&nombre=" + nombre + "&estado=" + estado.value + "&categoria=" + categoria.value + "&precio=" + precio,
        url: 'controller/Alimentos/alimentosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoAlimento').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nuevo alimento agregado correctamente!',
                    '!Ya se encuentra en el menú!',
                    'success'
                );
                cargarContenido('view/Alimentos/alimentosView.php');
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

$('#btnActualizarAlimento').on('click', function () {

    var id = $('#id_alimento_upd').val();
    var nombre = $('#nombre_alimento_upd').val();
    var estado = document.querySelector('input[type=radio][name=estado_decision]:checked');
    var categoria = document.querySelector('input[type=radio][name=categoria_decision]:checked');
    var precio = $('#precio_alimento_upd').val();
    

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
    if (categoria == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La categoria es necesario!',
        })
        return false;
    }
    if (precio == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!La categoria es necesario!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "actualizar_alimento=1&id=" + id + "&nombre=" + nombre + "&estado=" + estado.value + "&categoria=" + categoria.value + "&precio=" + precio,
        url: 'controller/Alimentos/alimentosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaAlimento').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Alimento actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Alimentos/alimentosView.php');
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

function obtenerAlimento(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_alimento=1&id=" + id,
        url: 'controller/Alimentos/alimentosController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombre = data.nombre;
            var estado = data.estado;
            var precio = data.precio;

            $('#id_alimento_upd').val(id);
            $('#nombre_alimento_upd').val(nombre);
            $('#precio_alimento_upd').val(precio);

            $('#formActualizaAlimento').modal('show');
        }
    });
}

function eliminarAlimento(id) {

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
                data: "eliminar_alimento=1&id=" + id,
                url: 'controller/Alimentos/alimentosController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Alimentos/alimentosView.php');
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