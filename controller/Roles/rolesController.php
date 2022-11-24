<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$rlsClass = new rolesModel();
$result = 0;
$respuesta = array();

$obtenerRol = (isset($_POST['obtener_rol'])) ? $_POST['obtener_rol'] : "0";
$crearRol = (isset($_POST['crear_rol'])) ? $_POST['crear_rol'] : "0";
$actualizarRol = (isset($_POST['actualizar_rol'])) ? $_POST['actualizar_rol'] : "0";
$eliminarRol = (isset($_POST['eliminar_rol'])) ? $_POST['eliminar_rol'] : "0";


if ($obtenerRol == 1) {
    $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";

    $result = $rlsClass->getRoleById($role_id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['role_id'] = $fila['idRole'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['estado'] = $fila['estado'];
    }

    echo json_encode($respuesta);
}

if ($crearRol == 1) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $rlsClass->crearRol($nombre, $estado, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($actualizarRol == 1) {
    $role_upd_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $rlsClass->actualizarRol($role_upd_id, $nombre, $_SESSION['user_id'], $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($eliminarRol == 1) {
    $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";

    $result = $rlsClass->eliminarRol($role_id);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}