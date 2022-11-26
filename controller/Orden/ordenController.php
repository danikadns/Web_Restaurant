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


if ($ActEstadOrden == 1) {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "0";

    $result = $ordClass->actEstadoOrden($id, $_SESSION['user_id']);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}
