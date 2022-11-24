<?php 

class usuariosModel {

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getUsuarios(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombres,
                        apellidos,                        
                        usuario,
                        password,
                        nombre,                                         
                        u.estado,
                        email,
                        telefono,
                        u.roles_id
                FROM users u, rols r
                where u.roles_id = r.idRole";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getUsuarioById($user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombres,
                        apellidos,                        
                        usuario,
                        password,                                                
                        u.estado,
                        email,
                        telefono,
                        u.roles_id,
                        nombre 
                FROM users u, rols r
                where u.roles_id = r.idRole and id = $user_id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    /**
     * funcion para crear nuevo usuario
     */
    function crearUsuario($nombres, $apellidos, $usuario, $password, $user_id, $email, $telefono, $roles_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO users
                    (
                    nombres,
                    apellidos,                   
                    usuario,
                    password,                    
                    estado,
                    user_created_id,
                    fecha_created,
                    email,
                    telefono,
                    roles_id)
                    VALUES
                    (
                    '$nombres',
                    '$apellidos',                     
                    '$usuario',
                    '$password',                                                        
                    'ACT',
                    $user_id,
                    now(),
                    '$email',
                    '$telefono',
                    $roles_id)";        

        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $conexionClass->desconectar($conexion);
            return 1;
        }else{
            $conexionClass->desconectar($conexion);
            return 0;
        }
    }

    /**
     * Función para actualizar un usuario
     */

    function actualizarUsuario($nombres, $apellidos, $usuario, $password, $user_update_id, $user_id, $email, $telefono, $roles_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE users 
                    SET nombres = '$nombres',
                        apellidos = '$apellidos',
                        usuario = '$usuario',
                        password = '$password',                                            
                        user_updated_id = $user_update_id,
                        fecha_updated = now(),
                        email =  '$email',
                        telefono = '$telefono',
                        roles_id = $roles_id
                WHERE id = $user_id";        
        
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $conexionClass->desconectar($conexion);
            return 1;
        }else{
            $conexionClass->desconectar($conexion);
            return 0;
        }
    }

    /**
     * funcion para eliminar un usuario por su id
     */
    function eliminarUsuario($user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "DELETE FROM users WHERE id = $user_id";
        
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $conexionClass->desconectar($conexion);
            return 1;
        }else{
            $conexionClass->desconectar($conexion);
            return 0;
        }
    }
}
?>