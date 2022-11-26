$('#btnAgregarCategoria').on('click', function () {

    var nombre = $('#nombre').val();
    var estado = document.querySelector('input[type=radio][name=categoria_decision]:checked');

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
        data: "crear_categoria=1&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Categorias/categoriasController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoEstado').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nueva Categoría de alimentos agregada correctamente!',
                    '!Ya puede ser asignado!',
                    'success'
                );
                cargarContenido('view/Categorias/categoriasView.php');
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

$('#btnActualizarCategoria').on('click', function () {

    var id = $('#id_categoria_upd').val();
    var nombre = $('#nombre_categoria_upd').val();
    var estado = document.querySelector('input[type=radio][name=categoria_decision]:checked');
    

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
        data: "actualizar_categoria=1&id=" + id + "&nombre=" + nombre + "&estado=" + estado.value,
        url: 'controller/Categorias/categoriasController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaEstado').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Categoria actualizada exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Categorias/categoriasView.php');
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

function obtenerCategoria(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_categoria=1&id=" + id,
        url: 'controller/Categorias/categoriasController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombre = data.nombre;
            var estado = data.estado;

            $('#id_categoria_upd').val(id);
            $('#nombre_categoria_upd').val(nombre);

            $('#formActualizaCategoria').modal('show');
        }
    });
}

function eliminarCategoria(id) {

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
                data: "eliminar_categoria=1&id=" + id,
                url: 'controller/Categorias/categoriasController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Categorias/categoriasView.php');
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