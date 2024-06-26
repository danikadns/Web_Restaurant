<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");

$altClass = new alimentosModel();

$result = array();
$resultado = array();
$resultRoles = array();
$result = $altClass->getAlimentos();
$resultado = $altClass->getCategorias();
$resultado2 = $altClass->getCategorias();


?>
<script src="assets/js/moduloAlimentos.js"></script>
<div class="card-responsive">
    <div class="card-header">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">LISTADO DE ALIMENTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2" id="btnNuevoAlimento" name="btnNuevoAlimento" type="button"
                    data-bs-toggle="modal" data-bs-target="#formNuevoAlimento">Nuevo Alimento <svg
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
                        <tr id="color">
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">CATEGORIA</th>
                            <th scope="col">PRECIO</th>
            
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
                            <td><?php echo $fila['nombre_alimento']; ?></td>
                            <td><?php echo $fila['nombre_categoria']; ?></td>
                            <td><?php echo $fila['precio']; ?></td>
                            
                            <td><?php echo $fila['estado']; ?></td>
                            
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-warning me-md-2" id="btnEditarAlimento"
                                        name="btnEditarAlimento" type="button"
                                        onclick="obtenerAlimento(<?php echo $fila['id']; ?>);"> Editar</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-danger me-md-2" id="btnEliminarAlimento"
                                        onclick="eliminarAlimento(<?php echo $fila['id']; ?>);" name="btnEliminarAlimento"
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
    <!-- AQUI INICIA ESTA EL FORMULARIO MODAL PARA AGREGAR ALIMENTOS -->
    <div class="modal fade " id="formNuevoAlimento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formNuevoAlimento">Nuevo Alimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" placeholder="aqui va tu nombre">
                        <label for="nombres">Nombres</label>
                    </div>
                

                    <div class="form-floating mb-3">
                        <form>
                            <p>Categoria</p>
                            <?php
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                            <input type="radio" id="<?php echo $fila['nombre'];?>" name="categoria_decision" value="<?php echo $fila['id'];?>">
                            <label for="<?php echo $fila['nombre'];?>"><?php echo $fila['nombre'];?></label><br>
                            <?php
                            }
                            ?>
                        </form>
                    </div>

                    <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="precio" placeholder="Aquí va el precio">
                            <label for="precio">Precio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <form>
                            <p>Estado</p>
                            <input type="radio" id="active" name="estado_decision" value="ACT">
                            <label for="active">Active</label><br>
                            <input type="radio" id="inactive" name="estado_decision" value="INA">
                            <label for="inactive">Inactive</label><br>
                        </form>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnAgregarAlimento">Agregar Alimento</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>                            
            </div>
        </div>
    </div>

    <!-- AQUI ESTA EL FORMULARIO MODAL PARA ACTUALIZAR ALIMENTOS -->
    <div class="modal fade" id="formActualizaAlimento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="formActualizaAlimento">Alimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_alimento_upd">
                        <label for="id_alimento_upd">ID</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre_alimento_upd" placeholder="aqui va el nombre del alimento">
                        <label for="nombre_alimento_upd">Nombres</label>
                    </div>

                    <div class="form-floating mb-3">
                        <form>
                            <p>Categoria</p>
                            <?php
                            while ($fila = mysqli_fetch_array($resultado2)) {
                            ?>
                            <input type="radio" id="<?php echo $fila['nombre'];?>" name="categoria_decision" value="<?php echo $fila['id'];?>">
                            <label for="<?php echo $fila['nombre'];?>"><?php echo $fila['nombre'];?></label><br>
                            <?php
                            }
                            ?>
                        </form>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="precio_alimento_upd" placeholder="Aquí va el precio">
                        <label for="precio_alimento_upd">Precio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <form>
                            <p>Estado</p>
                            <input type="radio" id="active" name="estado_decision" value="ACT">
                            <label for="active">Active</label><br>
                            <input type="radio" id="inactive" name="estado_decision" value="INA">
                            <label for="inactive">Inactive</label><br>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnActualizarAlimento">Actualizar
                            Alimento</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>