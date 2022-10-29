<?php
    
    class configModel{
        function actualizarContraseña($user_id, $passNueva, $password){
                $conexionClass = new Tools();
                $conexion = $conexionClass->conectar();
                $sql = "UPDATE users 
                            SET password = '$passNueva',                                            
                                fecha_updated = now()
                        WHERE id = $user_id";  
                          
                
                $resultado = mysqli_query($conexion, $sql);


                if($resultado){
                    $conexionClass->desconectar($conexion);
                    return 1;
                }else{
                    $conexionClass->desconectar($conexion);
                    return 0;
                }
        }

        function getContraseña($user_id){
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();
    
            $sql = "SELECT id,
                            nombres,
                            apellidos,                        
                            usuario,
                            password,                                                
                            estado 
                    FROM users where id = $user_id";
     
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        function getUsuarioById($user_id){
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();
    
            $sql = "SELECT id,
                            nombres,
                            apellidos,                        
                            usuario,
                            email,
                            telefono 
                    FROM users where id = $user_id";
     
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        function actualizarUsuario($nombres, $apellidos, $usuario, $user_id, $email, $telefono){
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();
            $sql = "UPDATE users 
                        SET nombres = '$nombres',
                            apellidos = '$apellidos',
                            usuario = '$usuario',                                           
                            user_updated_id = $user_id,
                            fecha_updated = now(),
                            email =  '$email',
                            telefono = '$telefono'
                    WHERE id = $user_id";        
            
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                $conexionClass->desconectar($conexion);
                return 1;
            }else{
                $conexionClass->desconectar($conexion);
                return 0;
            }
        }

        
    }
?>