<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");

$catClass = new categoriasModel();

$result = array();
$resultRoles = array();
$result = $catClass->getCategorias();

?>
<script src="assets/js/moduloCategorias.js"></script>
<div class="card-responsive">
    <div class="card-header">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">LISTADO DE CATEGORIAS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2" id="btnNuevoCategoria" name="btnNuevoCategoria" type="button"
                    data-bs-toggle="modal" data-bs-target="#formNuevoCategoria">Nueva Categoria <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg></button>
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="bg-secondary rounded h-100 p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">EDITAR</th>
                            <th scope="col">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                while ($fila = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th><?php echo $fila['id']; ?></th>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['estado']; ?></td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-warning me-md-2" id="btnEditarCategoria"
                                        name="btnEditarCategoria" type="button"
                                        onclick="obtenerCategoria(<?php echo $fila['id']; ?>);"> Editar</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-danger me-md-2" id="btnEliminarCategoria"
                                        onclick="eliminarCategoria(<?php echo $fila['id']; ?>);" name="btnEliminarCategoria"
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
    <div class="modal fade " id="formNuevoCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formNuevoCategoria">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" placeholder="aqui va el nombre">
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <p>Estado:</p>
                        <form>
                            <input type="radio" id="active" name="categoria_decision" value="ACT">
                            <label for="active">Active</label><br>
                            
                            <input type="radio" id="inactive" name="categoria_decision" value="INA">
                            <label for="inactive">Inactive</label><br>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnAgregarCategoria">Agregar Categoria</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- AQUI ESTA EL FORMULARIO MODAL PARA ACTUALIZAR USUARIOS -->
    <div class="modal fade" id="formActualizaCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formActualizaCategoria">Estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_categoria_upd">
                        <label for="id_categoria_upd">ID</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre_categoria_upd" placeholder="aqui va el nombre">
                        <label for="nombre_categoria_upd">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <form>
                        <p>Estado</p>
                        <input type="radio" id="active" name="categoria_decision" value="ACT">
                        <label for="active">Active</label><br>
                        <input type="radio" id="inactive" name="categoria_decision" value="INA">
                        <label for="inactive">Inactive</label><br>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnActualizarCategoria">Actualizar
                            Categoria</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>