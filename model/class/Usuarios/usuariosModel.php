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
                        estado 
                FROM users ";
 
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
                        estado 
                FROM users where id = $user_id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    /**
     * funcion para crear nuevo usuario
     */
    function crearUsuario($nombres, $apellidos, $usuario, $password, $user_id){
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
                    fecha_created)
                    VALUES
                    (
                    '$nombres',
                    '$apellidos',                     
                    '$usuario',
                    '$password',                                                        
                    'A',
                    $user_id,
                    now())";        

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

    function actualizarUsuario($nombres, $apellidos, $usuario, $password, $user_update_id, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE users 
                    SET nombres = '$nombres',
                        apellidos = '$apellidos',
                        usuario = '$usuario',
                        password = '$password',                                            
                        user_updated_id = $user_update_id,
                        fecha_updated = now()
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