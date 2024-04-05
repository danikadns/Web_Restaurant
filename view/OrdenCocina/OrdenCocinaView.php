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
$result = $estClass->getOrdenCajero();
$resultAdm = $estClass->getOrdenAdmin();
$resultCaj = $estClass->getOrdenCocinero();

?>
<script src="assets/js/moduloOrden.js"></script>
<section class="placed-orders">
    <h1 class="heading text-center">Orders</h1>

    <div class="container">

        <div class="row justify-content-center">
            <?php if($_SESSION['roles_id'] == 3){
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
// Agrupar los datos por orden_id
$ordenData = array();
while ($fila = mysqli_fetch_array($result)) {
    $orden_id = $fila['id']; // Suponiendo que el id de la orden es orden_id
    if (!isset($ordenData[$orden_id])) {
        $ordenData[$orden_id] = array(
            'id' => $orden_id,
            'menu' => array(),
            'observaciones' => $fila['observaciones'],
            'fecha_creacion' => $fila['fecha_creacion'],
            'estado' => $fila['estado'],
            'cliente' => $fila['cliente'],
            'precios' => array() // Inicializamos un array para guardar los precios de cada pedido
        );
    }
    $ordenData[$orden_id]['precios'][] = $fila['precio'];
    $ordenData[$orden_id]['menu'][] = $fila['menu']; // Agregamos el precio al array de precios
}

// Iterar sobre los datos agrupados y generar las tarjetas HTML
foreach ($ordenData as $orden_id => $orden) {
    ?>
    <div class="col-md-4" id="carOrden" style="width: 30%;">
        <div id="cardOrden" class="card">
            <!-- Cabecera de la tarjeta -->
            <div class="card-body">
                <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;" id="fontcolor">Orden</b></h4>
                <p class="card-text" align="center" id="fontcolor">Orden #: <?php echo $orden['id']; ?></p>
            </div>

            <!-- Cuerpo de la tarjeta -->
            <table class="table table-striped-columns">
                <tbody id="fontcolor">
                    <tr>
                        <td colspan="2">Menú: <?php echo implode(', ', $orden['menu']) . ' - Precios: ' . implode(', ', $orden['precios']); ?></td>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <td colspan="2">Observaciones: <?php echo $orden['observaciones']; ?></td>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <td colspan="2">Fecha creacion: <?php echo $orden['fecha_creacion']; ?></td>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <td colspan="2">Estado: <?php echo $orden['estado']; ?></td>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <td colspan="2">Cliente: <?php echo $orden['cliente']; ?></td>
                        <th scope="row"></th>
                    </tr>
                </tbody>
            </table>

            <!-- Botones de la tarjeta -->
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-warning me-md-2" id="btnFinalizarOrdenn" name="btnFinalizarOrdenn" type="button"
                            onclick="FinalizarOrden(<?php echo $orden_id; ?>, <?php echo end($orden['precios']); ?>);">Entregar
                        <i class="fa-solid fa-check"></i></button>
                    <button class="btn btn-danger me-md-2" id="btnCancelarOrdenn" name="btnCancelarOrdenn" type="button"
                            onclick="CancelarOrden(<?php echo $orden_id; ?>);">Cancelar <i class="fa-solid fa-check"></i></button>
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