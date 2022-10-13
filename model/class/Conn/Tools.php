<?php

class Tools{

    function conectar(){
        $conexion = mysqli_connect(SERVER, USERDB, PASSDB, DATABASE);

        if($conexion){
            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");
        }else{
            echo "Error de conexion debido a: <br> ".mysqli_connect_error();
        }

        return $conexion;
    }

    function desconectar($conexion){
        $close = mysqli_close($conexion);

        if(!$close){
            echo "Ocurrio un error al cerrar la conexion debido a: <br> ".mysqli_connect_error();
        }

        return $close;
    }


}
?>