<?php 

ob_start();
session_start();

include_once("../../model/functions.php");

$registerModel = new registerModel();

$loginModel = new loginModel();

$NewUser = $_POST['inNewUser'];
$NewName = $_POST['inNewName'];
$NewLastname = $_POST['inNewLastName'];
$NewEmail = $_POST['inNewEmail'];
$NewPass = $_POST['inNewPass'];

$resultado = array();
$result = array();

$resultado = $registerModel->registrar($NewUser, $NewName, $NewLastname, $NewEmail, $NewPass);

$result = $loginModel->autenticar($NewUser, $NewPass);

if($row = mysqli_fetch_array($result)){
    echo "<script>
            alert('REGISTRO EXITOSO, BIENVENIDO');
            history.back();
        </script>";
    exit(-1);
}else{
    echo "<script>
            alert('REGISTRO FALLIDO, porfavor intente nuevamente');
            history.back();
        </script>";
    exit(-1);
}

ob_end_flush();

?>