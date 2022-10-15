$('#btnActualizarPass').on('click', function () {
    
    var nuevaPass = $('#inPassNueva').val();
    var password = $('#inPass').val();
    var passConfirm = $('#inPassConfirm').val();
    
    if (nuevaPass == ""){
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
        success: function(data){
            var contraseña = data.password;
            if(contraseña == password){
                $.ajax({
                    type: 'POST',
                    data: "actualizar_pass=1&nuevaPass=" + nuevaPass + "&password=" + password,
                    url: 'controller/Configuracion/configController.php',
                    dataType: 'json',
                    success: function(data){
                        var resultado = data.resultado;
                        if(resultado === 1){
                            alert('Contraseña actualizada correctamente');
                            cargarContenido('home.php');
                        }else{
                            alert('No se pudo actualizar la contraseña');
                        }
                    }
                });
            }else{
                alert('La contraseña es incorrecta');
            }
        }
    });

});