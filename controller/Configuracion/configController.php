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
$obtenerUsuario = (isset($_POST['obtener_usuario'])) ? $_POST['obtener_usuario'] : "0";
$actualizarUsuario = (isset($_POST['actualizar_usuario'])) ? $_POST['actualizar_usuario'] : "0";
$mostrarUsuario = (isset($_POST['mostrar_usuario'])) ? $_POST['mostrar_usuario'] : "0";

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

if ($obtenerUsuario == 1) {
    $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";

    $result = $confClass->getUsuarioById($user_id);

    if ($fila = mysqli_fetch_array($result)) {
        $respuesta['id'] = $fila['id'];
        $respuesta['nombres'] = $fila['nombres'];
        $respuesta['apellidos'] = $fila['apellidos'];
        $respuesta['usuario'] = $fila['usuario'];
        $respuesta['email'] = $fila['email'];
        $respuesta['telefono'] = $fila['telefono'];
    }

    echo json_encode($respuesta);
}

if ($actualizarUsuario == 1) {
    $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : "0";
    $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : "0";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";

    $result = $confClass->actualizarUsuario($nombres, $apellidos, $usuario, $_SESSION['user_id'], $email, $telefono);

    $respuesta['resultado'] = $result;
    echo json_encode($respuesta);
}

if ($mostrarUsuario == 1) {
    $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";

    $result = $confClass->getUsuarioById($user_id);

    if ($fila = mysqli_fetch_array($result)) {
        $_SESSION['user_nombre'] = $fila['nombres'];
        $_SESSION['user_apellido'] = $fila['apellidos'];
        $_SESSION['username'] = $fila['usuario'];
        $_SESSION['email'] = $fila['email'];
        $_SESSION['telefono'] = $fila['telefono'];
    }

    echo json_encode($respuesta);
}