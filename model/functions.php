<?php
#CONFIGURACION PARA HABILITACION DE MODO DEBUG
require_once("config.php");

if(DEBUG == "true"){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}

#CLASES DE LA CAPA DEL MODELO DE BASE DE DATOS
require_once("class/Conn/Tools.php");
require_once("class/Login/loginModel.php");
require_once("class/Usuarios/usuariosModel.php");

?>