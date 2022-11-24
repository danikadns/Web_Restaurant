<?php

class loginModel {

    /**
     * METODO DE AUTENTICACION
     */

    function autenticar($user, $pass){
        $connClass = new Tools();
        $conexion = $connClass->conectar();

        $sql = "SELECT
                    id, usuario, password, nombres, apellidos, user_created_id, u.estado, email, telefono, red_social, image, u.roles_id, nombre
                FROM
                    users u, rols r
                WHERE
                    u.roles_id = r.idRole and
                    UPPER(usuario) = UPPER('$user')
                    and password = '$pass'";

        $resultado = mysqli_query($conexion, $sql);
        $connClass->desconectar($conexion);
        
        return $resultado;
    }

    


}

?>