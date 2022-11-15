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

    <script src="assets/js/moduloUsuarios.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center ">


                <div class="col-md-8 col-lg-6 col-xl-4 py-md-4 ">

                    <form class="form align-items-center rounded p-4 p-sm-4" method="POST"
                        action="controller/Login/loginController.php">
                        <div class="text-center">
                            <img class="mb-2 align-items-center " src="assets/img/logos/Login.png" width="200"
                                height="200">
                        </div>

                        <div class="divider d-flex align-items-center my-1 text-white">
                            <p class="text-center fw-bold mx-1 mb-0">BIENVENIDO AL SISTEMA</p>
                        </div>

                        <!-- INPUT USUARIO -->
                        <div class="form-outline mb-4 align-content-center">
                            <label class="form-label" for="inUsuario">Usuario:</label>
                            <input type="text" class="form-control form-control-md" placeholder="Ingrese su usuario"
                                id="inUsuario" name="inUsuario" />
                        </div>

                        <!-- INPUT PASSWORD -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="inPassword">Password:</label>
                            <input type="password" class="form-control form-control-md"
                                placeholder="Ingrese su password" id="inPassword" name="inPassword" />
                        </div>

                        <div class="text-center  mt-3 pt-2">
                            <button id="btnLogin" type="submit" class="btn ">Iniciar Sesión</button>
                        </div>

                        <div class="text-center  mt-2 pt-2"><a type="button" class="btn btn-outline-warning"
                                href="register.php" class="fw-bold text-body"><u>Registrarme</u></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>