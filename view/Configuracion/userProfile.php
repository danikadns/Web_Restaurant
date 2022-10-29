<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}
include_once("../../model/functions.php");

?>


<script src="assets/js/moduloConfig.js"></script>
<script>mostrarUsuario(<?php echo $_SESSION['user_id']?>);</script>

<div class="card">
    <div class="container">
        <div class="row">

            <!-- Columna izquierda con decripción breve del usuario -->
            <div class="col-4 pb-2 pt-3">
                <!-- Sección de tipo targeta con imagen -->
                <div class="card" style="width: 100%;">
                    <div class="card-head pt-2 pb-2" align="center">
                        <img id="fotoPerfil" src="<?php echo $_SESSION['ruta']?>" class="circular--square" alt="Foto_perfil">
                    </div>
                    <div class="card-body">
                        <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;">
                                <?php echo $_SESSION['user_nombre']." ".$_SESSION['user_apellido'];
                    ?></b></h4>
                        <p class="card-text" align="center">Roll del Usuario</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Edad</li>
                        <li class="list-group-item">Genero</li>
                        <li class="list-group-item">Nacionalidad</li>
                        <li class="list-group-item">Fecha de Nacimiento</li>
                    </ul>

                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
            <!-- Columna Derecha con decripción completa del usuario -->
            <div class="col-8 pb-2 pt-3">
                <div class="card">
                    <div class="card-header">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">PERFIL</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Dato</th>
                                    <td scope="col" align="right"><i
                                            class="btn btn-warning  fa-sharp fa-solid fa-user-pen fa-beat-fade"
                                            type="button"
                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.025;"
                                            onclick="cargarContenido('view/Configuracion/userProfileEdit.php')"></i>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Nombre de Usuario</th>
                                    <td colspan="2"><?php echo $_SESSION['username'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo electronico</th>
                                    <td colspan="2"><?php echo $_SESSION['email']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombres</th>
                                    <td colspan="2"><?php echo $_SESSION['user_nombre'];
                    ?></b></td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellidos</th>
                                    <td colspan="2"><?php echo $_SESSION['user_apellido'];
                    ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Numero de Telefono</th>
                                    <td colspan="2"><?php echo $_SESSION['telefono']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Red Social</th>
                                    <td colspan="2">
                                        <figure>
                                            <a target="_blank" href="<?php echo $_SESSION['red_social']?>"><img
                                                    src="assets/img/logos/facebook.png" alt="Redes sociales"
                                                    width="40px"></a>
                                        </figure>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Other Date</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>