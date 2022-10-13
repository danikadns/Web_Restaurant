<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="assets/img/logos/login.jpg" class="img-fluid">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                    <form class="form" method="POST" action="controller/Login/loginController.php">

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-2 mb-0">BIENVENIDO</p>
                        </div>

                        <!-- INPUT USUARIO -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="inUsuario">Usuario:</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Ingrese su usuario" id="inUsuario" name="inUsuario"/>
                        </div>

                        <!-- INPUT PASSWORD -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="inPassword">Password:</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Ingrese su password" id="inPassword" name="inPassword"/>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>
</html>