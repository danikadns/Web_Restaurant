<?php
session_start();
if (!$_SESSION['user_id']) {
    header("location: ../../index.php");
}

include_once("../../model/functions.php");


?>

<style>
#pos-field {
    height: 54em;
    display: flex;
}

#menu-list {
    width: 65%;
    height: 100%;
    overflow: auto;
}

#order-list {
    width: 100%;
    height: 100%;
    overflow: auto;
}

#cat-list {
    height: 4em !important;
    overflow: auto;
    display: flex;
}

#item-list {
    height: 40em !important;
}

#item-list.empty-data {
    width: 100%;
    align-items: center;
    justify-content: center;
    display: flex;
}

#item-list.empty-data:after {
    content: 'La categoría seleccionada aún no tiene elementos disponibles.';
    color: #b7b4b4;
    font-size: 1.7em;
    font-style: italic;
}

div#order-items-holder {
    height: 38em !important;
    overflow: auto;
    position: relative;
}

div#order-items-header {
    position: sticky !important;
    top: 0;
    z-index: 1;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>

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
                <div class="card-header">
                    <h3 class="font-weight-bolder text-light">CATEGORIAS</h3>
                </div>

                <div class="card-body p-4">

                    <div class="row g-4">
                        <div class="col-12 col-sm-4 col-md-4">

                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2"><i class="fa fa-cutlery"></i>
                                    Menu #1</button>
                            </div>

                        </div>

                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">

                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2"><i
                                        class="fa fa-cutlery me-2"></i>Menu #2</button>
                            </div>

                        </div>

                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">

                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2"><i
                                        class="fa fa-cutlery me-2"></i>Menu #3</button>
                            </div>

                        </div>

                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">

                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2"><i
                                        class="fa fa-cutlery me-2"></i>Menu #4</button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>


        <!-- comienzo de Facturación -->
        <div class="col-6">
            <div class="card bg-secondary rounded h-100 p-4">

                <!-- comienzo de Facturación -->
                <div id="order-list" class="bg-orange bg-gradient p-1">
                    <h3 class="fw-bolder text-center fst-italic text-light">ORDENES</h3>
                    <div id="order-items-holder" class="bg-light bg-gradient mb-3">
                        <div id="order-items-header">
                            <div class="d-flex w-100 bg-primary bg-gradient">
                                <div class="col-3 text-center text-white fw-bolder m-0 border">Cantidad</div>
                                <div class="col-6 text-center text-white fw-bolder m-0 border">Menú</div>
                                <div class="col-3 text-center text-white fw-bolder m-0 border">Total</div>
                            </div>
                        </div>
                        <div id="order-items-body"></div>
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
            <div class="input-group input-group-sm">
                <button class="btn btn-indigo btn-xs btn-flat minus-qty" type="button"><i
                        class="fa fa-minus"></i></button>
                <input type="number" min='1' value='1' name="quantity[]"
                    class="form-control form-control-xs rounded-0 text-center" required readonly>
                <button class="btn btn-indigo btn-xs btn-flat plus-qty" type="button"><i
                        class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="col-6 font-weight-bolder m-0 border align-middle">
            <div style="line-height:1em" class="text-sm">
                <div class="w-100 d-flex aling-items-center"><a href="javascript:void(0)"
                        class="text-danger text-decoration-none rem-item mr-1"><i class="fa fa-times"></i></a>
                    <p class="m-0 truncate-1 menu_name">Menu name</p>
                </div>
                <div><small class="text-muted menu_price">x 0.00</small></div>
            </div>
        </div>
        <div class="col-3 font-weight-bolder m-0 border align-middle text-right menu_total">0.00</div>
    </div>
</noscript>

<script>
function calc_total() {
    var gt = 0;
    $('#order-items-body .product-item').each(function() {
        var total = 0;
        var price = $(this).find('input[name="price[]"]').val()
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
        $('#order-items-body').append(item)
        calc_total()
        item.find('.minus-qty').click(function() {
            var qty = item.find('input[name="quantity[]"]').val()
            qty = qty > 0 ? qty : 0;
            qty = qty == 1 ? 1 : parseInt(qty) - 1
            item.find('input[name="quantity[]"]').val(qty)
            calc_total()
        })
        item.find('.plus-qty').click(function() {
            var qty = item.find('input[name="quantity[]"]').val()
            qty = qty > 0 ? qty : 0;
            qty = parseInt(qty) + 1
            item.find('input[name="quantity[]"]').val(qty)
            calc_total()
        })
        item.find('.rem-item').click(function() {
            if (confirm("¿Deseas eliminar esta comida?") == true) {
                item.remove()
                calc_total()
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