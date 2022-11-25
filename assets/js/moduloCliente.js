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


$('#btnAgregarCliente').on('click', function () {

    var nombre = $('#nombre').val();
    var nit= $('#nit').val();
    var estado = $('#estado').val();
   

    if (nombre == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (nit == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El nit es requerido!',
        })
        return false;
    }

    if (estado == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Estado es obligatorio!',
        })
        return false;
    }


    $.ajax({
        type: 'POST',
        data: "crear_cliente=1&nombre=" + nombre + "&nit=" + nit + "&estado=" + estado,
        url: 'controller/Clientes/clientesController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formNuevoCliente').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Nuevo Cliente agregado correctamente!',
                    
                    'success'
                );
                cargarContenido('view/Clientes/clientesView.php');
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

$('#btnActualizaCliente').on('click', function () {

    var id = $('#id_upd').val();
    var nombre = $('#nombre_upd').val();
    var nit = $('#nit_upd').val();
    var estado = $('#estado_upd').val();

    if (nombre == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El nombre es requerido!',
        })
        return false;
    }
    if (nit == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El nit es requerido!',
        })
        return false;
    }
    if (estado== "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El estado es requerido!',
        })
        return false;
    }


    $.ajax({
        type: 'POST',
        data: "actualizar_cliente=1&id=" + id + "&nombre=" + nombre + "&nit=" + nit + "&estado=" + estado,
        url: 'controller/Clientes/clientesController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                $('#formActualizaCliente').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                Swal.fire(
                    '!Cliente actualizado exitosamente!',
                    '!Recargue la pagina!',
                    'success'
                );
                cargarContenido('view/Clientes/clientesView.php');
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

function obtenerCliente(id) {

    $.ajax({
        type: 'POST',
        data: "obtener_cliente=1&user_id=" + id,
        url: 'controller/Clientes/clientesController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombre = data.nombre;
            var nit = data.nit;
            var estado = data.estado;
           
            $('#id_upd').val(id);
            $('#nombre_upd').val(nombre);
            $('#nit_upd').val(nit);
            $('#estado_upd').val(estado);
         

            $('#formActualizaCliente').modal('show');
        }
    });
}

function eliminarCliente(id) {

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
                data: "eliminar_cliente=1&user_id=" + id,
                url: 'controller/Clientes/clientesController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            '!Eliminado!',
                            'Borrado de la base de datos',
                            'success'
                        )
                        cargarContenido('view/Clientes/clientesView.php');
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