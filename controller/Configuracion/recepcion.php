<script src="assets/js/contentManager.js"></script>
<?php
require_once('../../model/class/Configuracion/funciones.php');
session_start();

if (!$_SESSION['user_id']){
      header("location: ../../index.php");
}

include_once("../../model/functions.php");

if(!empty($_POST)){
      if (subir_fichero('../../assets/img/imagenes','campofotografia')){
         echo 'Archivo recibido correctamente';
      }

      if (guardar_dato()){
            echo 'Ruta guardada';
            echo $_SESSION['ruta'];
      }

      echo "<script>
            history.back();
        </script>";
      exit(-1);
      
}
?>