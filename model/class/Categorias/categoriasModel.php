<?php 

class categoriasModel {

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getCategorias(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombre,                                            
                        estado 
                FROM categorias ";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    

    /**
     * Funcion para obtener el listado de usuarios
     */
    function getCategoriaById($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombre,                                               
                        estado 
                FROM categorias where id = $id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    /**
     * funcion para crear nuevo usuario
     */
    function crearCategoria($nombre, $estado, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO categorias
                    (
                    nombre,
                    usuario_creacion_id,                   
                    fecha_creacion,                                   
                    estado
                    )
                    VALUES
                    (
                    '$nombre',
                    $user_id,
                    now(),                     
                    '$estado'
                    )";        

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

    function actualizarCategoria($id, $nombre, $user_id, $estado){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE categorias
                    SET nombre = '$nombre',                                            
                        usuario_updated_id = $user_id,
                        fecha_actualizacion = now(),
                        estado = '$estado'
                WHERE id = $id";        
        
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
    function eliminarCategoria($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "DELETE FROM categorias WHERE id = $id";
        
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