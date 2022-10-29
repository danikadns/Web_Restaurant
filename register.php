<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="assets/css/styleRegister.css" />
</head>

<body>
    <!-- Start your project here-->
    <section class="intro">
        <div class="bg-image h-100" style="
          background-image: url('https://i.pinimg.com/736x/b8/57/f6/b857f6eeed86bc1eda743afec402b194.jpg');
        ">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                            <div class="card mask-custom">
                                <div class="card-body p-4 text-white">
                                    <div class="my-3">
                                        <h2 class="text-center mb-3">Registro</h2>

                                        <form>
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row">
                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="form3Example1"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Example1">
                                                            Username
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="form3Example1"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Example1">
                                                            Nombre
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="form3Example2"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Example2">
                                                            Apellido
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Email input -->
                                            <div class="form-outline form-white mb-3">
                                                <input type="email" id="form3Example3"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Example3">
                                                    Correo electronico
                                                </label>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline form-white mb-3">
                                                <input type="password" id="form3Example4"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Example4">
                                                    Contraseña
                                                </label>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input type="password" id="form3Example4"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Example4">
                                                    Confirmar contraseña
                                                </label>
                                            </div>

                                            <!-- Checkbox -->
                                            <div class="form-check d-flex justify-content-center mb-2">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id="form2Example3" checked />
                                                <label class="form-check-label" for="form2Example3">
                                                    Acepto los terminos y condiciones del establecimiento
                                                </label>
                                            </div>

                                            <!-- Submit button -->
                                            <div class="text-center  mt-2 pt-0">
                                                <button id="btnRegister" type="submit" class="btn ">Registrar</button>

                                            </div>

                                            <p class="text-center text-warning mt-2 mb-2">¿Ya tengo una cuenta? <a
                                                    href="index.php" class="fw-bold text-body"><u>Iniciar aquí</u></a>
                                            </p>

                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <p>o registrate con:</p>
                                                <button type="button" class="btn btn-light btn-floating mx-1">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>

                                                <button type="button" class="btn btn-light btn-floating mx-1">
                                                    <i class="fab fa-google"></i>
                                                </button>

                                                <button type="button" class="btn btn-light btn-floating mx-1">
                                                    <i class="fab fa-twitter"></i>
                                                </button>

                                                <button type="button" class="btn btn-light btn-floating mx-1">
                                                    <i class="fab fa-github"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>