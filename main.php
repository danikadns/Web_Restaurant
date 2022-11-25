<?php
session_start();
if(!$_SESSION['user_id']){
    header("location: index.php");
} 

# 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 -Token-

#IMPORTANDO EL TEMPLATE

#header
include 'template/header.php';

#SiderBar
include 'template/menu.php';

#Userinfo
include 'template/userinfo.php';

?>


<!-- INJECCIÓN DEL CONTENIDO DINAMICO  
<div class="wrapper">
    <div class="container">


        <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
            <div class="container" id="contenedorPrincipal">

            </div>
        </main>


    </div>
</div>
-->

<!-- INJECCIÓN DEL CONTENIDO DINAMICO  -->
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4" id="contenedorPrincipal">

</div>
<!-- Blank End -->


<?php
#footer
include 'template/footer.php';
?>

<script>
$(document).ready(function() {

    //INICIALIZAR EL EFECTO DEL ESTADO DEL SERVIDOR
    $body = $('body');
    $(document).on({
        ajaxStart: function() {
            $body.addClass('loading');
        },
        ajaxStop: function() {
            $body.removeClass('loading');
        }
    });

    //CARGANDO EL CONTENIDO PRINCIPAL
    cargarContenido('home.php');
    bienvenidoUser();
});
</script>