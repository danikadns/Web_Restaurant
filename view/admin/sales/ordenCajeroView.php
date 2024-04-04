<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../../model/functions.php");

$altClass = new alimentosModel();
$ordClass = new ordenModel();
$result = array();
$result = $altClass->getMenu();
$resultado2 = array();
$resultado2 = $ordClass->getUsuarios();
?>
<script src="assets/js/moduloOrden.js"></script>

<!-- Titulo de Contenido -->
<div class="row bg-secondary rounded align-items-center justify-content-center mx-0 pt-4 pb-2 mb-3">
    <div class="col-md-9 ms-sm-auto col-lg-12 pb-2 bt-3">
        <div align="center" class=" border-bottom">
            <h4 class="header-title text-center"><b style="font-size: 25px;">GENERAR ORDEN</b></h4>
        </div>
    </div>
</div>

<!-- Contenido -->
<div class="Container-fluid">


    <div class="row">


        <div class="col-6">
            <div class="card bg-secondary rounded h-100 p-3">
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-warning" type="button" onclick="obtenerCliente();"
                                id="Buscar_Cliente">Buscar</button>
                            <input type="text" class="form-control text-white bg-transparent bg-gradient" id="nit_orden"
                                placeholder="NIT" aria-label="Example text with button addon"
                                aria-describedby="button-addon1">
                                <button class="btn btn-success me-md-2" id="btnNuevoCliente" name="btnNuevoCliente"
                            type="button" data-bs-toggle="modal" data-bs-target="#formNuevoCliente">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </button>
                        </div>
                        <!-- DATOS CLIENTE -->
                <div class="card-header">
                     <h4 class="font-weight-bolder text-light">DATOS DEL CLIENTE</h4>
                </div>
                <div class="card-body p-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-dark" id="nombre_cliente" placeholder="Nombre del Cliente" readonly>
                        <label for="nombre_cliente">Nombre del Cliente</label>
                    </div>
                    <div class= " form-floating mb-3">
                        <input type="text" class="form-control text-dark" id="nit" placeholder="NIT del Cliente" readonly>
                        <label for="nit_cliente">NIT del Cliente</label>
                    </div>
                </div>
                 <!-- DATOS CLIENTE -->
                        
                <div class="card-header">
                    <h4 class="font-weight-bolder text-light">Alimentos</h4>
                </div>

                <div class="card-body p-4">

                    <div class="row g-4 text-center align-items-center ">

                        

                        <?php
                        while($fila = mysqli_fetch_array($result)){
                        ?>
                        <div class="col-12 col-sm-4 col-md-4">

                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2 item-btn"
                                    data-id='<?php echo $fila['id'];?>' data-price='<?php echo $fila['precio'];?>'><i
                                        class="fa fa-cutlery"></i>
                                    <?php echo $fila['nombre_alimento'];?></button>
                            </div>

                        </div>

                        <?php
                        }?>



                    </div>
                    <div class="row g-4 p-4">

                        

                        <!-- <input type="text" class="form-control" id="nit" placeholder="NIT"> -->

                        <input type="hidden" name="id_cliente" id="id_cliente" value="">
                        <input type="hidden" name="nombre_cliente" id="nombre_cliente" value="">
                        <input type="hidden" name="id_alimento" id="id_alimento" value="">

                        <input type="text" class="form-control text-white bg-body bg-gradient" id="observaciones"
                            placeholder="Observaciones">
                    </div>

                    <form>
                        <p>Asignar Cocinero</p>
                        <?php
                            while ($fila = mysqli_fetch_array($resultado2)) {
                            ?>
                        <input type="radio" id="<?php echo $fila['nombres'];?>" name="usuario_decision"
                            value="<?php echo $fila['id'];?>">
                        <label for="<?php echo $fila['nombres'];?>"><?php echo $fila['nombres'];?></label><br>
                        <?php
                            }
                            ?>
                    </form>

                </div>

            </div>
        </div>


        <!-- comienzo de Facturación -->
        <div class="col-6">
            <div class="card bg-secondary rounded h-100 p-4">

                <!-- comienzo de Facturación -->
                <div id="order-list" class="bg-orange bg-gradient p-1">
                    <div align="right">
                        
                        </button>
                        <h3 class="fw-bolder text-center fst-italic text-light">ORDENES</h3>
                    </div>


                    <div id="order-items-holder" class="bg-light bg-gradient mb-3">
                        <div id="order-items-header">
                            <div class="d-flex w-100 bg-primary bg-gradient">
                                <div class="col-3 text-center text-white fw-bolder m-0 border">Cantidad</div>
                                <div class="col-6 text-center text-white fw-bolder m-0 border">Menú</div>
                                <div class="col-3 text-center text-white fw-bolder m-0 border">Total</div>
                            </div>
                        </div>
                        <div id="order-items-body" class="text-center text-white fw-bolder"></div>
                    </div>
                    <div class="d-flex w-100 mb-2">
                        <h3 class="col-5 mb-0">Total</h3>
                        <h3 class="col-7 mb-0 bg-light bg-gradient rounded-0 text-end" id="grand_total">0.00</h3>
                    </div>
                    <div class="d-flex w-100 mb-2">
                        <h3 class="col-5 mb-0">Pagado</h3>
                        <h3 class="col-7 mb-0 bg-light bg-gradient rounded-0 text-end px-0"><input type="number"
                                step="any" name="tendered_amount"
                                class="form-control rounded-0 text-end bg-white bg-white font-weight-bolder"
                                style="font-size:1em" required value="0"></h3>
                    </div>
                    <div class="d-flex w-100 mb-2">
                        <h3 class="col-5 mb-0">Cambio</h3>
                        <h3 class="col-7 mb-0 bg-light bg-gradient rounded-0 text-end" id="change">0.00</h3>
                    </div>
                </div>
                <button id="btnGenOrden" class="bg-success bg-gradient">
                    <div class="text-center text-white fw-bolder m-0 border">GENERAR ORDEN</div>
                </button>
                <!-- Fin de Facturación -->

            </div>

        </div>
    </div>
</div>

<noscript id="item-clone">
    <div class="d-flex w-100 bg-gradient-light product-item">
        <div class="col-3 text-center font-weight-bolder m-0 border align-middle">
            <input type="hidden" name="menu_id[]" value="">
            <input type="hidden" name="price[]" value="">
            <input type="hidden" name="total_amount" value="">
            
            <div class="input-group input-group-sm">
                <button class="btn btn-warning btn-xs btn-flat minus-qty" type="button"><i
                        class="fa fa-minus"></i></button>
                <input type="number" min='1' value='1' name="quantity[]"
                    class="form-control form-control-xs rounded-0 text-center" required readonly>
                <button class="btn btn-warning btn-xs btn-flat plus-qty" type="button"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="col-6 font-weight-bolder m-0 border align-middle">
            <div style="line-height:1em" class="text-sm texte-center">
                <div class="w-100 d-flex aling-items-center"><a href="javascript:void(0)"
                        class="text-danger text-decoration-none rem-item mr-1"><i class="fa fa-times"></i></a>
                    <p class="m-0 truncate-1 menu_name text-center text-white">Menu name</p>
                </div>
                <div><small class="text-white menu_price">x 0.00</small></div>
            </div>
        </div>
        <div class="col-3 font-weight-bolder m-0 border align-middle text-right menu_total">0.00</div>
    </div>
</noscript>

<div class="modal fade " id="formNuevoCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="formNuevoCliente">Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">


                </button>
            </div>

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="aqui va tu nombre">
                    <label for="nombre">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nit" placeholder="aqui va el nit">
                    <label for="nit">Nit</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="estado" placeholder="Estado">
                    <label for="estado">Estado</label>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnAgregarCliente">Agregar Cliente</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<script>
var alimentos = [];
var cantidades = [];

$('#btnGenOrden').on('click', function () {
    var cliente = $('#id_cliente').val();
    var observaciones = $('#observaciones').val();
    
    
    var usuario = document.querySelector('input[type=radio][name=usuario_decision]:checked');

    $('.item-btn').each(function() {
        

        if (alimentos.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: '¡Edición Incompleta!',
                text: 'Al menos un alimento es requerido',
            });
            return false;
        }
        console.log("prueba");
    });

    if (cliente == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (id_alimento == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }
    if (usuario == "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Edición Incompleta!',
            text: '!El Nombre es requerido!',
        })
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_orden=1&cliente=" + cliente + "&alimento=" + id_alimento + "&alimentos="+ JSON.stringify(alimentos)+"&cantidades="+ JSON.stringify(cantidades) + "&usuario=" + usuario.value + "&observaciones=" + observaciones,
        url: 'controller/Orden/ordenController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if (resultado === 1) {
                Swal.fire(
                    '!Nueva Orden agregada correctamente!',
                    '!Espere por el pedido!',
                    'success'
                );
                cargarContenido('view/admin/sales/ordenCajeroView.php');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '!Algo salió mal!',
                })
            }
        }
    });
});
function calc_total(precio) {
    var gt = 0;
    $('#order-items-body .product-item').each(function() {
        var total = 0;
        var price = precio;
        price = price > 0 ? price : 0;
        var qty = $(this).find('input[name="quantity[]"]').val()
        qty = qty > 0 ? qty : 0;
        total = parseFloat(price) * parseFloat(qty)
        gt += parseFloat(total)
        $(this).find('.menu_total').text(parseFloat(total).toLocaleString('en-US', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }))
    })
    $('[name="total_amount"]').val(gt).trigger('change')

    $('#grand_total').text(parseFloat(gt).toLocaleString('en-US', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }))

}
$(function() {
    $('body').addClass('sidebar-collapse')
    if ($('#item-list>.row>.col:visible').length > 0) {
        if ($('#item-list').hasClass('empty-data') == true) {
            $('#item-list').removeClass('empty-data');
        }
    } else {
        if ($('#item-list').hasClass('empty-data') == false) {
            $('#item-list').addClass('empty-data');
        }
    }
    $('.cat_btn').click(function() {
        $('.cat_btn.bg-gradient-indigo').removeClass('bg-gradient-indigo text-light').addClass(
            'bg-gradient-light border')
        $(this).removeClass('bg-gradient-light border').addClass('bg-gradient-indigo text-light')
        var id = $(this).attr('data-id')
        $('.menu-item').addClass('d-none')
        $('.menu-item[data-cat-id="' + id + '"]').removeClass('d-none')
        if ($('#item-list>.row>.col:visible').length > 0) {
            if ($('#item-list').hasClass('empty-data') == true) {
                $('#item-list').removeClass('empty-data');
            }
        } else {
            if ($('#item-list').hasClass('empty-data') == false) {
                $('#item-list').addClass('empty-data');
            }
        }
    })

    $('.item-btn').click(function() {
        var id = $(this).attr('data-id')
        var price = $(this).attr('data-price')
        var name = $(this).text().trim()
        //var precio = document.getElementByName("price[]")[0];
        //precio.value = price;
        var item = $($('noscript#item-clone').html()).clone()
        if ($('#order-items-body .product-item[data-id="' + id + '"]').length > 0) {
            item = $('#order-items-body .product-item[data-id="' + id + '"]')
            var qty = item.find('input[name="quantity[]"]').val()
            qty = qty > 0 ? qty : 0;
            qty = parseInt(qty) + 1;
            item.find('input[name="quantity[]"]').val(qty)
            calc_total()
            return false;
        }
        item.attr('data-id', id)
        item.find('input[name="menu_id[]"]').val(id)
        $('#id_alimento').val(id)
        item.find('input[name="price[]"]').val(price)
        item.find('.menu_name').text(name)
        item.find('.menu_price').text("x " + (parseFloat(price).toLocaleString('en-US', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })))
        item.find('.menu_total').text((parseFloat(price).toLocaleString('en-US', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })))
        

        var qty = item.find('input[name="quantity[]"]').val();
            console.log("prueba");
            alimentos.push({
                id: id,
                qty: qty             
            });
            cantidades.push({
                qty: qty
            })
        
        $('#order-items-body').append(item)
        calc_total(price)
        item.find('.minus-qty').click(function() {
            var qty = item.find('input[name="quantity[]"]').val()
            qty = qty > 0 ? qty : 0;
            qty = qty == 1 ? 1 : parseInt(qty) - 1
            item.find('input[name="quantity[]"]').val(qty)
            calc_total(price)
        })
        item.find('.plus-qty').click(function() {
            var qty = item.find('input[name="quantity[]"]').val()
            qty = qty > 0 ? qty : 0;
            qty = parseInt(qty) + 1
            item.find('input[name="quantity[]"]').val(qty)
            calc_total(price)
        })
        item.find('.rem-item').click(function() {
            if (confirm("¿Deseas eliminar esta comida?") == true) {
                item.remove()
                calc_total(price)
            }
        })
    })
    $('input[name="tendered_amount"], input[name="total_amount"]').on('input change', function() {
        var total = $('input[name="total_amount"]').val()
        var tendered = $('input[name="tendered_amount"]').val()
        total = total > 0 ? total : 0;
        tendered = tendered > 0 ? tendered : 0;
        var change = parseFloat(tendered) - parseFloat(total)
        $('#change').text(parseFloat(change).toLocaleString('en-US', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }))
    })
    $('#sales-form').submit(function(e) {
        e.preventDefault()
        if ($('#order-items-body .product-item').length <= 0) {
            alert_toast("Agrega al menos 1 comida", "indigo")
            return false;
        }
        if (parseFloat($('input[name="tendered_amount"]').val()) < parseFloat($(
                'input[name="total_amount"]').val())) {
            alert_toast("Monto Pagado Inválido.", "error")
            return false;
        }
        start_loader()
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=place_order",
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            error: err => {
                console.log(err)
                alert_toast("Ocurrió un error", "error")
                end_loader()
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    alert_toast(resp.msg, 'success')
                    // location.reload()
                    setTimeout(() => {
                        var nw = window.open(_base_url_ +
                            "admin/sales/receipt.php?id=" + resp.oid, '_blank',
                            "width=" + ($(window).width() * .8) + ",left=" + ($(
                                window).width() * .1) + ",height=" + ($(window)
                                .height() * .8) + ",top=" + ($(window)
                                .height() * .1))
                        setTimeout(() => {
                            nw.print()
                            setTimeout(() => {
                                nw.close()
                                location.reload()
                            }, 300);
                        }, 200);
                    }, 200);
                } else if (!!resp.msg) {
                    alert_toast(resp.msg, 'error')
                } else {
                    alert_toast(resp.msg, 'error')
                }
                end_loader()
            }
        })
    })
})
</script>