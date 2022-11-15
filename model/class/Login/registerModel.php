<?php

class registerModel{

    function registrar($NewUser, $NewName, $NewLastname, $NewEmail, $NewPass){

        $connClass = new Tools();
        $conexion = $connClass->conectar();

        $sql = "INSERT INTO users
                    (
                    usuario,    
                    nombres,
                    apellidos,
                    email,
                    password,
                    estado,
                    user_created_id,
                    fecha_created)
                    VALUES
                    (
                    '$NewUser',
                    '$NewName',
                    '$NewLastname',
                    '$NewEmail',
                    '$NewPass',
                    'ACT',
                    '1',
                    now())";

        $resultado = mysqli_query($conexion, $sql);

        $connClass->desconectar($conexion);

    }


}