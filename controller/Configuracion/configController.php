<?php 
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once("../../model/functions.php");
$confClass = new configModel();
$result = 0;
$respuesta = array();

$actualizarPass = (isset($_POST['actualizar_pass'])) ? $_POST['actualizar_pass'] : "0";
$comprobarPass = (isset($_POST['comprobar_pass'])) ? $_POST['comprobar_pass'] : "0";

if($actualizarPass == 1){
    $passNueva = (isset($_POST['nuevaPass'])) ? $_POST['nuevaPass'] : "0";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "0";    
        
    $result = $confClass->actualizarContraseña($_SESSION['user_id'], $passNueva, $password);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if($comprobarPass == 1){
    $passNueva = (isset($_POST['nuevaPass'])) ? $_POST['nuevaPass'] : "0";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "0";    
        
    $result = $confClass->getContraseña($_SESSION['user_id']);

    if ($fila = mysqli_fetch_array($result)){
        $respuesta['id'] = $fila['id'];
        $respuesta['nombres'] = $fila['nombres'];
        $respuesta['apellidos'] = $fila['apellidos'];
        $respuesta['usuario'] = $fila['usuario'];
        $respuesta['password'] = $fila['password'];
    }

    echo json_encode($respuesta);
}