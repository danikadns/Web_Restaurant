<?php

session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$catClass = new categoriasModel();
$result = 0;
$respuesta = array();

$obtenerCategoria = (isset($_POST['obtener_categoria'])) ? $_POST['obtener_categoria'] : "0";
$crearCategoria = (isset($_POST['crear_categoria'])) ? $_POST['crear_categoria'] : "0";
$actualizarCategoria = (isset($_POST['actualizar_categoria'])) ? $_POST['actualizar_categoria'] : "0";
$eliminarCategoria = (isset($_POST['eliminar_categoria'])) ? $_POST['eliminar_categoria'] : "0";


if ($obtenerCategoria == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $catClass->getCategoriaById($id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombre'] = $fila['nombre'];
        $respuesta['estado'] = $fila['estado'];
    }

    echo json_encode($respuesta);
}

if ($crearCategoria == 1) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $catClass->crearCategoria($nombre, $estado, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($actualizarCategoria == 1) {
    $id_upd = (isset($_POST['id'])) ? $_POST['id'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $result = $catClass->actualizarCategoria($id_upd, $nombre, $_SESSION['user_id'], $estado);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($eliminarCategoria == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $catClass->eliminarCategoria($id);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}