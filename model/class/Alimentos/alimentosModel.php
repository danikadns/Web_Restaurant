<?php 

class alimentosModel {

    /**
     * Funcion para obtener el listado de usuarios
     */

    function getMenu(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT a.id,
                        a.nombre as nombre_alimento,                                            
                        a.estado,
                        c.nombre as nombre_categoria,
                        a.categorias_id,
                        a.precio 
                FROM alimentos a, categorias c
                WHERE a.categorias_id = c.id
                and a.estado = 'ACT'";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    function getAlimentos(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT a.id,
                        a.nombre as nombre_alimento,                                            
                        a.estado,
                        c.nombre as nombre_categoria,
                        a.categorias_id,
                        a.precio 
                FROM alimentos a, categorias c
                WHERE a.categorias_id = c.id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

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
    function getAlimentoById($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombre,                                               
                        estado,
                        precio 
                FROM alimentos where id = $id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
    /**
     * funcion para crear nuevo usuario
     */
    function crearAlimento($nombre, $estado, $user_id, $categoria_id, $precio){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO alimentos
                    (
                    nombre,
                    usuario_creacion_id,                   
                    fecha_creacion,                                   
                    estado,
                    categorias_id,
                    precio
                    )
                    VALUES
                    (
                    '$nombre',
                    $user_id,
                    now(),                     
                    '$estado',
                    $categoria_id,
                    $precio
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

    function actualizarAlimento($id, $nombre, $user_id, $estado, $categoria_id, $precio){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE alimentos 
                    SET nombre = '$nombre',                                            
                        usuario_updated_id = $user_id,
                        fecha_actualizacion = now(),
                        estado = '$estado',
                        categorias_id = $categoria_id,
                        precio = $precio
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
    function eliminarAlimento($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "DELETE FROM alimentos WHERE id = $id";
        
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