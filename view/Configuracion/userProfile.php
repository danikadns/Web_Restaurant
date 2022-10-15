<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}
include_once("../../model/functions.php");

?>

<script src="assets/js/moduloUsuarios.js"></script>

<!-- AQUI INICIA ESTA EL FORMULARIO MODAL PARA AGREGAR USUARIOS -->
<div class="modal fade" id="formActualizaUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formActualizaUsuario">Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_upd">
                        <label for="id_upd">ID</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnActualizarUsuario">Actualizar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>


    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form class="form" method="POST" action="controller/Login/loginController.php">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-2 mb-0">BIENVENIDO</p>
                        </div>

                        <!-- INPUT USUARIO -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="nombres">Nombres</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Ingrese su usuario" id="inUsuario" name="inUsuario"/>
                        </div>

                        <!-- INPUT PASSWORD -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="apellidos">Apellidos</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Ingrese su password" id="inPassword" name="inPassword"/>
                        </div>

                        <!-- INPUT USUARIO -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="usuario">Username</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Ingrese su usuario" id="inUsuario" name="inUsuario"/>
                        </div>

                        <!-- INPUT PASSWORD -->
                        <div class="form-outline mb4">
                            <label class="form-label" for="inPassword">Password:</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Ingrese su password" id="inPassword" name="inPassword"/>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>

                        </div>
                    </form>
                </div>