<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$altClass = new alimentosModel();
$result = 0;
$respuesta = array();

$obtenerAlimento = (isset($_POST['obtener_alimento'])) ? $_POST['obtener_alimento'] : "0";
$crearAlimento = (isset($_POST['crear_alimento'])) ? $_POST['crear_alimento'] : "0";
$actualizarAlimento = (isset($_POST['actualizar_alimento'])) ? $_POST['actualizar_alimento'] : "0";
$eliminarAlimento = (isset($_POST['eliminar_alimento'])) ? $_POST['eliminar_alimento'] : "0";


if ($obtenerAlimento == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $altClass->getAlimentoById($id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['estado'] = $fila['estado'];
    }

    echo json_encode($respuesta);
}

if ($crearAlimento == 1) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $altClass->crearAlimento($nombre, $estado, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($actualizarAlimento == 1) {
    $id_upd = (isset($_POST['id'])) ? $_POST['id'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $altClass->actualizarAlimento($id_upd, $nombre, $_SESSION['user_id'], $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($eliminarAlimento == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $altClass->eliminarAlimento($id);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}