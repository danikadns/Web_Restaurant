<?php
session_start();
if(!$_SESSION['user_id']){
    header("location: index.php");
} 
?>

<div align="center">
    <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 25px;">SISTEMA DE GESTIÓN BASE DE PROGRA
            WEB</b></h4>
    <br />
    <br />
    <img src="assets/img/logos/Login.png" class="align-items-center" width="25%" height="20%">
    <br />
    <br />
    <br />
    <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;">BIENVENIDO</b></h4>
    <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;">
            <?php echo $_SESSION['user_nombre']." ".$_SESSION['user_apellido'];
                    ?></b></h4>
</div>