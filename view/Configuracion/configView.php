<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");

?>

<script src="assets/js/moduloConfig.js"></script>
<div class="card">
    <div class="card-header">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cambiar la contraseña</h1>
        </div>
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
                    <div class="form-outline mb4">
                        <label class="form-label" for="inPassNueva">Nueva contraseña:</label>
                        <input type="password" class="form-control form-control-lg" placeholder="Ingrese su nueva contraseña" id="inPassNueva" name="inPassNueva"/>
                    </div>
                    <div class="form-outline mb4">
                        <label class="form-label" for="inPassConfirm">Confirmar contraseña:</label>
                        <input type="password" class="form-control form-control-lg" placeholder="Confirmar contraseña" id="inPassConfirm" name="inPassConfirm"/>
                    </div>
                    <br>
                    <div class="form-outline mb4">
                        <label class="form-label" for="inPass">Contraseña actual:</label>
                        <input type="password" class="form-control form-control-lg" placeholder="Ingrese su contraseña actual" id="inPass" name="inPass"/>
                    </div>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" id="btnActualizarPass">Aceptar</button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>