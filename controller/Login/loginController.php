<?php

ob_start();
session_start();

include_once("../../model/functions.php");

$loginModel = new loginModel();

$usuario = $_POST['inUsuario'];
$clave = $_POST['inPassword'];

$result = array();

$result = $loginModel->autenticar($usuario, $clave);

if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_nombre'] = $row['nombres'];
    $_SESSION['user_apellido'] = $row['apellidos'];
    $_SESSION['username'] = $row['usuario'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['telefono'] = $row['telefono'];
    $_SESSION['red_social'] = $row['red_social'];
    $_SESSION['ruta'] = $row['image'];

    header("location: ../../main.php");

} else {
    echo "<script>
            alert('AUTENTICACIÓN FALLIDA, AL PARECER SU USUARIO O CLAVE SON INVÁLIDOS');
            history.back();
        </script>";
    exit(-1);
}


/*echo "USUARIO: ".$usuario." CLAVE: ".$clave;
echo "NOMBRES: ".$row['nombres']."APELLIDOS: ".$row['apellidos'];
echo "NO HAY DATOS";
*/

ob_end_flush();

?>