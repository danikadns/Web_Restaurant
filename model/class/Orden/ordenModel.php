<?php 

class ordenModel {

    /**
     * Funcion para obtener el listado de ordenes
     */

    function getIdOrden(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id FROM orden o ORDER BY o.id DESC LIMIT 1";
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

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
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT
        o.id AS id,
        o.observaciones,
        o.fecha_creacion,
        e.nombre AS estado,
        c.nombre AS cliente,
        GROUP_CONCAT(a.nombre separator ', ') as menu
    FROM
        orden o
    JOIN
        estado e ON
        o.estado_orden_id = e.id
    JOIN
        cliente c ON
        o.cliente_id = c.id
    JOIN
        pedidos p ON
        o.id = p.id_orden
    JOIN
        alimentos a ON
        p.id_alimento = a.id
    where o.users_id = $user_id
    and e.id = 2
    group by
        o.id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    function getOrdenAdmin(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT
                    o.id AS id,
                    o.observaciones,
                    o.fecha_creacion,
                    e.nombre AS estado,
                    c.nombre AS cliente,
                    GROUP_CONCAT(a.nombre separator ', ') as menu
                FROM
                    orden o
                JOIN
                    estado e ON
                    o.estado_orden_id = e.id
                JOIN
                    cliente c ON
                    o.cliente_id = c.id
                JOIN
                    pedidos p ON
                    o.id = p.id_orden
                JOIN
                    alimentos a ON
                    p.id_alimento = a.id
                group by
                    o.id";                
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    function getOrdenCajero(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT
        o.id AS id,
        o.observaciones,
        o.fecha_creacion,
        e.nombre AS estado,
        c.nombre AS cliente,
        GROUP_CONCAT(a.nombre separator ', ') as menu,
        sum(precio * p.cantidad) as precio
    FROM
        orden o                
    JOIN
        estado e ON
        o.estado_orden_id = e.id
    JOIN
        cliente c ON
        o.cliente_id = c.id
    JOIN
        pedidos p ON
        o.id = p.id_orden
    JOIN
        alimentos a ON
        p.id_alimento = a.id
    where e.id = 3
    group by
        o.id";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    function getClienteByNit($nit){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT  id,
                        nombre,
                        nit,                                                                  
                        estado
                FROM cliente where nit = $nit";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    function getUsuarios(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT id,
                        nombres,                                            
                        estado 
                FROM users where roles_id = 3";
 
        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }

    /**
     * funcion para eliminar un usuario por su id
     */
    function actEstadoOrden($id, $user_id){
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

    function actEstadoOrdenCan($id, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE
                    orden
                SET
                    estado_orden_id = 4,
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

    function actEstadoOrdenAnu($id, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE
                    orden
                SET
                    estado_orden_id = 5,
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

    function actEstadoOrdenFin($id, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "UPDATE
                    orden
                SET
                    estado_orden_id = 1,
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

    function crearPago($orden, $precio, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO pago
                    (
                    orden_id,
                    monto,
                    fecha,
                    usuario_creacion_id,                   
                    fecha_creacion,                                   
                    estado
                    )
                    VALUES
                    (
                    $orden,
                    $precio,
                    now(),
                    $user_id, 
                    now(),                    
                    'ACT'
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
    function crearOrden($cliente, $alimento, $usuario, $observaciones, $user_id){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO orden
                    (
                    observaciones,
                    usuario_creacion_id,                   
                    fecha_creacion,                                   
                    estado,
                    estado_orden_id,
                    
                    users_id,
                    cliente_id
                    )
                    VALUES
                    (
                    '$observaciones',
                    $user_id,
                    now(),                     
                    'ACT',
                    2,
                    
                    $usuario,
                    $cliente
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

    function agregarPedido($id_alimento, $id_orden, $cantidad){
        echo $cantidad;
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $sql = "INSERT INTO pedidos
                    (
                    id_alimento,
                    id_orden,                   
                    cantidad,
                    Fecha                                                                                                                                       
                    )
                    VALUES
                    (
                    $id_alimento,
                    $id_orden,
                    $cantidad,
                    now()                                         
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