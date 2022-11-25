<?php 

class clienteModel {

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getCliente(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombre,
                        nit,                                                                  
                        estado
                        
                FROM cliente ";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getClienteById($user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT  id,
                        nombre,
                        nit,                                                                  
                        estado
                FROM cliente where id = $user_id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    /**
     * funcion para crear nuevo usuario
     */   function crearCliente($nombre, $nit,  $user_id, $estado){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO cliente (
                    nombre,
                    nit,
                    usuario_creacion_id,
                    fecha_creacion,
                    estado)
                    VALUES
                    (
                    '$nombre',
                    '$nit',        
                    $user_id,
                    now(),
                '$estado')";        

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

    function actualizarCliente($nombre, $nit, $user_id, $estado){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE cliente
                    SET nombre = '$nombre',
                        nit = '$nit',                                
                        usuario_updated_id = $user_id,
                        fecha_actualizacion= now(),
                        estado = '$estado'
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
    function eliminarCliente($user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "DELETE FROM cliente WHERE id = $user_id";
        
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