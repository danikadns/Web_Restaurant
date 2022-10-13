function cargarContenido(form){
    var formulario = form;

    $.ajax({
        type: "POST",
        url: formulario,
        success: function (a) {
            $('#contenedorPrincipal').html(a);
        }
    });
}