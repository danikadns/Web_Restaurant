<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$estClass = new estadosModel();
$result = 0;
$respuesta = array();

$obtenerEstado = (isset($_POST['obtener_estado'])) ? $_POST['obtener_estado'] : "0";
$crearEstado = (isset($_POST['crear_estado'])) ? $_POST['crear_estado'] : "0";
$actualizarEstado = (isset($_POST['actualizar_estado'])) ? $_POST['actualizar_estado'] : "0";
$eliminarEstado = (isset($_POST['eliminar_estado'])) ? $_POST['eliminar_estado'] : "0";


if ($obtenerEstado == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $estClass->getEstadoById($id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['estado'] = $fila['estado'];
    }

    echo json_encode($respuesta);
}

if ($crearEstado == 1) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $estClass->crearEstado($nombre, $estado, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($actualizarEstado == 1) {
    $id_upd = (isset($_POST['id'])) ? $_POST['id'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $estClass->actualizarEstado($id_upd, $nombre, $_SESSION['user_id'], $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($eliminarEstado == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $estClass->eliminarEstado($id);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}