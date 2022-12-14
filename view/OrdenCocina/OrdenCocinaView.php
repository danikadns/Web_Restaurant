<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");

$estClass = new ordenModel();

$result = array();
$resultAdm = array();
$resultCaj = array();
$resultRoles = array();
$result = $estClass->getOrdenCocinero();
$resultAdm = $estClass->getOrdenAdmin();
$resultCaj = $estClass->getOrdenCajero();

?>
<script src="assets/js/moduloOrden.js"></script>
<section class="placed-orders">
    <h1 class="heading text-center">Orders</h1>

    <div class="container">

        <div class="row justify-content-center">
            <?php if($_SESSION['roles_id'] == 3){
            ?>
            <?php
                while ($fila = mysqli_fetch_array($result)) {
                    ?>
            <div class="col-md-4" id="carOrden" style="width: 30%;">
                <div id="cardOrden" class="card">

                    <div class="card-body">
                        <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;"
                                id="fontcolor">Orden</b></h4>
                        <p class="card-text" align="center" id="fontcolor">Orden #: <?php echo $fila['id']; ?></p>
                    </div>

                    <table class="table table-striped-columns">
                        <tbody id="fontcolor">
                            <tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Menú: <?php echo $fila['menu']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Observaciones: <?php echo $fila['observaciones']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Fecha creacion:
                                    <?php echo $fila['fecha_creacion']; ?></b></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Estado: <?php echo $fila['estado']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Cliente: <?php echo $fila['cliente']; ?></td>
                                <th scope="row"></th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-warning me-md-2" id="btnActualizarOrdenn" name="btnActualizarOrdenn"
                                type="button" onclick="DespacharOrden(<?php echo $fila['id']; ?>);">Despachar <i
                                    class="fa-solid fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php    
                }
                ?>
            <?php
            } else if($_SESSION['roles_id'] == 2){
                ?>
            <?php
                    while ($fila = mysqli_fetch_array($resultCaj)) {
                        ?>
            <div class="col-md-4" id="carOrden" style="width: 30%;">
                <div id="cardOrden" class="card">

                    <div class="card-body">
                        <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;"
                                id="fontcolor">Orden</b></h4>
                        <p class="card-text" align="center" id="fontcolor">Orden #: <?php echo $fila['id']; ?></p>
                    </div>

                    <table class="table table-striped-columns">
                        <tbody id="fontcolor">
                            <tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Menú: <?php echo $fila['menu']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Observaciones: <?php echo $fila['observaciones']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Fecha creacion:
                                    <?php echo $fila['fecha_creacion']; ?></b></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Estado: <?php echo $fila['estado']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Cliente: <?php echo $fila['cliente']; ?></td>
                                <th scope="row"></th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-warning me-md-2" id="btnFinalizarOrdenn" name="btnFinalizarOrdenn"
                                type="button"
                                onclick="FinalizarOrden(<?php echo $fila['id']; ?>, <?php echo $fila['precio']; ?>);">Entregar
                                <i class="fa-solid fa-check"></i></button>
                            <button class="btn btn-danger me-md-2" id="btnCancelarOrdenn" name="btnCancelarOrdenn"
                                type="button" onclick="CancelarOrden(<?php echo $fila['id']; ?>);">Cancelar <i
                                    class="fa-solid fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php    
                    }
                    ?>
            <?php
                } else if($_SESSION['roles_id'] == 1){
                    ?>
            <?php
                        while ($fila = mysqli_fetch_array($resultAdm)) {
                            ?>
            <div class="col-md-4" id="carOrden" style="width: 30%;">
                <div id="cardOrden" class="card">

                    <div class="card-body">
                        <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;"
                                id="fontcolor">Orden</b></h4>
                        <p class="card-text" align="center" id="fontcolor">Orden #: <?php echo $fila['id']; ?></p>
                    </div>

                    <table class="table table-striped-columns">
                        <tbody id="fontcolor">
                            <tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Menú: <?php echo $fila['menu']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Observaciones: <?php echo $fila['observaciones']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Fecha creacion:
                                    <?php echo $fila['fecha_creacion']; ?></b></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Estado: <?php echo $fila['estado']; ?></td>
                                <th scope="row"></th>
                            </tr>
                            <tr>
                                <td id="fontcolor" colspan="2">Cliente: <?php echo $fila['cliente']; ?></td>
                                <th scope="row"></th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-warning me-md-2" id="btnCancelarOrdenn" name="btnCancelarOrdenn"
                                type="button" onclick="CancelarOrden(<?php echo $fila['id']; ?>);">Cancelar <i
                                    class="fa-solid fa-check"></i></button>
                            <button class="btn btn-danger me-md-2" id="btnAnularOrdenn" name="btnAnularOrdenn"
                                type="button" onclick="AnularOrden(<?php echo $fila['id']; ?>);">Anular <i
                                    class="fa-solid fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php    
                        }
                        ?>
            <?php
                    }
                    ?>


        </div>

    </div>


</section>