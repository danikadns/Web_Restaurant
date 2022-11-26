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