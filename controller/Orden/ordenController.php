<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$ordClass = new ordenModel();
$result = 0;
$respuesta = array();


$ActEstadOrden = (isset($_POST['act_estado_orden'])) ? $_POST['act_estado_orden'] : "0";
$ActEstadOrdenFin = (isset($_POST['act_estado_orden_fin'])) ? $_POST['act_estado_orden_fin'] : "0";
$ActEstadOrdenCan = (isset($_POST['act_estado_orden_can'])) ? $_POST['act_estado_orden_can'] : "0";
$ActEstadOrdenAnu = (isset($_POST['act_estado_orden_anu'])) ? $_POST['act_estado_orden_anu'] : "0";
$obtenerCliente = (isset($_POST['obtener_cliente'])) ? $_POST['obtener_cliente'] : "0";
$CrearOrden = (isset($_POST['crear_orden'])) ? $_POST['crear_orden'] : "0";


if ($ActEstadOrden == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $ordClass->actEstadoOrden($id, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($ActEstadOrdenCan == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $ordClass->actEstadoOrdenCan($id, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($ActEstadOrdenAnu == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $ordClass->actEstadoOrdenAnu($id, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($ActEstadOrdenFin == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "0";
    

    $result = $ordClass->actEstadoOrdenFin($id, $_SESSION['user_id']);
    $result = $ordClass->crearPago($id, $precio, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($obtenerCliente == 1) {
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";

    $result = $ordClass->getClienteByNit($nit);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['nit'] = $fila['nit'];
        $respuesta['estado'] = $fila['estado'];

    }

    echo json_encode($respuesta);
}

if ($CrearOrden == 1) {
    $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "0";
    $alimento = (isset($_POST['alimento'])) ? $_POST['alimento'] : "0";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
    $observaciones = (isset($_POST['observaciones'])) ? $_POST['observaciones'] : "0";
    $alimentos = json_decode((isset($_POST['alimentos'])) ? $_POST['alimentos'] : "0", true);
    $cantidades = json_decode((isset($_POST['cantidades'])) ? $_POST['cantidades'] : "0", true);
   
    $result = $ordClass->crearOrden($cliente, $alimento, $usuario, $observaciones, $_SESSION['user_id']);


    $id = $ordClass->getIdOrden();
    $fila = mysqli_fetch_array($id);
    
    foreach ($alimentos as $pedido) {
        $id_alimento = $pedido['id'];
        $id_orden = $fila['id'];
        $cantidad_alimento = $pedido['qty'];
        $resultado = $ordClass->agregarPedido($id_alimento, $id_orden, $cantidad_alimento);
    }    

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}