<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");

$usrClass = new usuariosModel();

$result = array();
$resultRoles = array();
$result = $usrClass->getUsuarios();

?>
<script src="assets/js/moduloUsuarios.js"></script>
<div class="card">
    <div class="card-header">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">LISTADO DE USUARIOS</h1>
        </div>
    </div>

    <div class="card-body">


        <div class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2" id="btnNuevoUsuario" name="btnNuevoUsuario" type="button"
                    data-bs-toggle="modal" data-bs-target="#formNuevoUsuario">Nuevo Usuario</button>
            </div>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">CLAVE</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">EDITAR</th>
                            <th scope="col">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                while ($fila = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <th><?php echo $fila['id']; ?></th>
                            <td><?php echo $fila['nombres']." ".$fila['apellidos']; ?></td>
                            <td><?php echo $fila['usuario']; ?></td>
                            <td><?php echo $fila['password']; ?></td>
                            <td><?php echo $fila['estado']; ?></td>
                            <td><?php echo $fila['email']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-warning me-md-2" id="btnEditarUsuario"
                                        name="btnEditarUsuario" type="button"
                                        onclick="obtenerUsuario(<?php echo $fila['id']; ?>);">Editar</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-danger me-md-2" id="btnEliminarUsuario"
                                        onclick="eliminarUsuario(<?php echo $fila['id']; ?>);" name="btnEliminarUsuario"
                                        type="button">Eliminar</button>
                                </div>
                            </td>
                        </tr>

                        <?php 
                    }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- AQUI INICIA ESTA EL FORMULARIO MODAL PARA AGREGAR USUARIOS -->
    <div class="modal fade" id="formNuevoUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formNuevoUsuario">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombres" placeholder="aqui va tu nombre">
                        <label for="nombres">Nombres</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="apellidos" placeholder="aqui va tu apellido">
                        <label for="apellidos">Apellidos</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usuario" placeholder="username">
                        <label for="usuario">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="aqui va tu clave">
                        <label for="password">Clave</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder="aqui va tu email">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefono" placeholder="aqui va tu número de telefono">
                        <label for="telefono">Teléfono</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="redSocial" placeholder="aqui va tu link de red social">
                        <label for="redSocial">Red social</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnAgregarUsuario">Agregar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

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

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombres_upd" placeholder="aqui va tu nombre">
                        <label for="nombres_upd">Nombres</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="apellidos_upd" placeholder="aqui va tu apellido">
                        <label for="apellidos_upd">Apellidos</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usuario_upd" placeholder="username">
                        <label for="usuario_upd">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="password_upd" placeholder="aqui va tu clave">
                        <label for="password_upd">Clave</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email_upd" placeholder="aqui va tu email">
                        <label for="email_upd">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefono_upd" placeholder="aqui va tu número de telefono">
                        <label for="telefono_upd">Teléfono</label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnActualizarUsuario">Actualizar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
</div>