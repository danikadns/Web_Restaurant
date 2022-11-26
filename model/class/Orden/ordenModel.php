<?php 

class ordenModel {

    /**
     * Funcion para obtener el listado de ordenes
     */

    function getOrden(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT
	                o.id,
	                o.observaciones,
	                o.fecha_creacion,
	                a.nombre,
	                e.nombre,
                    e.id,
	                c.nombre
                FROM
	                orden o
                INNER JOIN alimentos a ON
	                o.alimento_id = a.id
                INNER JOIN estado e ON
	                o.estado_orden_id = e.id
                INNER JOIN cliente c ON
	                o.cliente_id = c.id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    /**
     * Funcion para obtener las ordenes con el estado de preparando
     */

    function getOrdenCocinero(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT
                    o.id,
                    o.observaciones,
                    o.fecha_creacion,
                    a.nombre as menu,
                    e.nombre as estado,
                    c.nombre as cliente
                FROM
                    orden o,
                    alimentos a,
                    estado e,
                    cliente c
                WHERE
                    o.alimento_id = a.id
                    and o.estado_orden_id = e.id 
                    and o.cliente_id = c.id
                    and e.id = 2";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    /**
     * funcion para eliminar un usuario por su id
     */
    function actEstadoOrden($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE
                    orden
                SET
                    estado_orden_id = 3,
                    usuario_updated_id = $user_id,
                    fecha_actualizacion = now()
                WHERE
                id = $id";
        
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
     * Funcion para obtener el listado de usuarios
     */
    function getOrdenById($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT
                    id,
                    observaciones,
                    estado_orden_id,
                    alimento_id,
                    users_id,
                    cliente_id,
                FROM
                    orden o 
                WHERE
                    o.id = $id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    /**
     * Funcion para actualizarEstadoOrden
     */

    function actualizar($id, $nombre, $user_id, $estado){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE orden 
                    SET 
                        estado_orden_id = $estado,                                     
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
     * funcion para crear nuevo usuario
     */
    function crearEstado($nombre, $estado, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO estado
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

    function actualizarEstado($id, $nombre, $user_id, $estado){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE estado 
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
    function eliminarEstado($id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "DELETE FROM estado WHERE id = $id";
        
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