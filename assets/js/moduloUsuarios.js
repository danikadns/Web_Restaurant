$('#btnAgregarUsuario').on('click', function () {
    
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();    
    var usuario = $('#usuario').val();
    var password = $('#password').val();
    
    if (nombres == ""){
        alert('El nombre es obligatorio');
        return false;
    }
    if (apellidos == "") {
        alert('El apellido es obligatorio');
        return false;
    }

    if (usuario == "") {
        alert('El usuario es obligatorio');
        return false;
    }

    if (password == "") {
        alert('El password es obligatorio');
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_usuario=1&nombres=" + nombres + "&apellidos=" + apellidos + "&usuario=" + usuario + "&password=" + password,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#formNuevoUsuario').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                alert('Usuario creado exitosamente');
                cargarContenido('view/Usuarios/usuariosView.php');
            }else{
                alert('No se pudo crear el usuario');
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
    
    if (nombres == ""){
        alert('El nombre es obligatorio');
        return false;
    }
    if (apellidos == "") {
        alert('El apellido es obligatorio');
        return false;
    }

    if (usuario == "") {
        alert('El usuario es obligatorio');
        return false;
    }

    if (password == "") {
        alert('El password es obligatorio');
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "actualizar_usuario=1&id=" + id + "&nombres=" + nombres + "&apellidos=" + apellidos + "&usuario=" + usuario + "&password=" + password,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#formActualizaUsuario').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                alert('Usuario actualizado exitosamente');
                cargarContenido('view/Usuarios/usuariosView.php');
            }else{
                alert('No se pudo actualizar los datos del usuario');
            }
        }
    });

});

function obtenerUsuario(id){

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
            
            $('#id_upd').val(id);
            $('#nombres_upd').val(nombres);
            $('#apellidos_upd').val(apellidos);
            $('#usuario_upd').val(usuario);
            $('#password_upd').val(clave);

            $('#formActualizaUsuario').modal('show');                            
        }
    });
}

function eliminarUsuario(id){

    $.ajax({
        type: 'POST',
        data: "eliminar_usuario=1&user_id=" + id,
        url: 'controller/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {                
                alert('Usuario Eliminado exitosamente');
                cargarContenido('view/Usuarios/usuariosView.php');
            } else {
                alert('No se pudo eliminar el usuario seleccionado');
            }
        }
    });

}