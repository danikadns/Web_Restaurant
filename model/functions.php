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
require_once("class/Login/registerModel.php");
require_once("class/Usuarios/usuariosModel.php");
require_once("class/Configuracion/configModel.php");
require_once("class/Configuracion/funciones.php");
require_once("class/Roles/rolesModel.php");
require_once("class/Estados/estadosModel.php");
require_once("class/Clientes/clientesModel.php");
require_once("class/Alimentos/alimentosModel.php");
require_once("class/Categorias/categoriasModel.php");
require_once("class/Orden/ordenModel.php");

?>