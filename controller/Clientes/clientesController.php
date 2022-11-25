<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$clienClass = new clienteModel();
$result = 0;
$respuesta = array();

$obtenerCliente = (isset($_POST['obtener_cliente'])) ? $_POST['obtener_cliente'] : "0";
$crearCliente = (isset($_POST['crear_cliente'])) ? $_POST['crear_cliente'] : "0";
$actualizarCliente = (isset($_POST['actualizar_cliente'])) ? $_POST['actualizar_cliente'] : "0";
$eliminarCliente = (isset($_POST['eliminar_cliente'])) ? $_POST['eliminar_cliente'] : "0";


if ($obtenerCliente == 1) {
    $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";

    $result = $clienClass->getClienteById($user_id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['nit'] = $fila['nit'];
        $respuesta['estado'] = $fila['estado'];

    }

    echo json_encode($respuesta);
}

if ($crearCliente == 1) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";
   

    $result = $clienClass->crearCliente($nombre, $nit, $_SESSION['user_id'], $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($actualizarCliente == 1) {
    $user_id = (isset($_POST['id'])) ? $_POST['id'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $clienClass->actualizarCliente($nombre, $nit, $user_id, $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($eliminarCliente == 1) {
    $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";

    $result = $clienClass->eliminarCliente($user_id);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}
