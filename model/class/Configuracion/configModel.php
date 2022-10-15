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
    }
?>