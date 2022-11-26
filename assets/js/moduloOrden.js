function DespacharOrden(id) {
    Swal.fire({
        title: '¿Estas seguro?',
        text: "!No podras revertir este cambio!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, despachar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                data: "act_estado_orden=1&id=" + id,
                url: 'controller/Orden/ordenController.php',
                dataType: 'json',

                success: function (data) {
                    var resultado = data.resultado;

                    if (resultado === 1) {

                        Swal.fire(
                            'Orden despachada',
                            'success'
                        )
                        cargarContenido('view/OrdenCocina/OrdenCocinaView.php');
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
                cargarContenido('view/admin/sales/ordenCajeroView.php');
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

function obtenerCliente() {
    var nit = $('#nit').val();
    $.ajax({
        type: 'POST',
        data: "obtener_cliente=1&nit=" + nit,
        url: 'controller/Orden/ordenController.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var nombre = data.nombre;
            var nit = data.nit;
            var estado = data.estado;
           
            $('#id_cliente').val(id);
            $('#nombre_cliente').val(nombre);
            $('#nit').val(nit);

            if(id != null){
                Swal.fire(
                    '!Cliente encontrado correctamente!',
                    
                    'success'
                );
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cliente no encontrado',
                    
                })
            }
            
        }
    });
}

$('#btnGenOrden').on('click', function () {
    var cliente = $('#id_cliente').val();
    var observaciones = $('#observaciones').val();
    var id_alimento = $('#id_alimento').val();
    var usuario = document.querySelector('input[type=radio][name=usuario_decision]:checked');

    if (cliente == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (id_alimento == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (usuario == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_orden=1&cliente=" + cliente + "&alimento=" + id_alimento + "&usuario=" + usuario.value + "&observaciones=" + observaciones,
        url: 'controller/Orden/ordenController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                Swal.fire(
                    '!Nueva Orden agregada correctamente!',
                    
                    'success'
                );
                cargarContenido('view/admin/sales/ordenCajeroView.php');
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