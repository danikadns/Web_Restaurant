<?php
    function subir_fichero($directorio_destino, $nombre_fichero)
    {
        $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
        if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
        {
            $img_file = $_FILES[$nombre_fichero]['name'];
            $img_type = $_FILES[$nombre_fichero]['type'];
            echo 1;
            // Si se trata de una imagen   
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
            strpos($img_type, "jpg")) || strpos($img_type, "png")))
            {
                //¿Tenemos permisos para subir la imágen?
                echo 2;
                $dir = "/var/www/html/Web_Restaurant/assets/img/$directorio_destino/$img_file";
                if (move_uploaded_file($tmp_name, $dir))
                {
                    $_SESSION['ruta'] = "assets/img/imagenes/".$img_file;
                    return true;
                    echo "prueba";
                }
            }
        }
        //Si llegamos hasta aquí es que algo ha fallado
        
        return false;
    }

    function guardar_dato(){
        $conexionClass = new Tools();
        $conexion = $conexionClass->conectar();
        $ruta = $_SESSION['ruta'];

        $sql = "INSERT into images (image, created, user_id) VALUES ('$ruta', now(), '1')";

        $resultado = mysqli_query($conexion, $sql);
        $conexionClass->desconectar($conexion);
        return $resultado;
    }
?>