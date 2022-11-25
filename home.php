<?php
session_start();
if(!$_SESSION['user_id']){
    header("location: index.php");
} 
?>

<div class="row bg-secondary rounded align-items-center justify-content-center mx-0 pt-4 pb-2 mb-3">
    <div class="col-md-9 ms-sm-auto col-lg-12 pb-2 bt-3">
        <div align="center" class=" border-bottom">
            <h4 class="m-t-0 m-b-40 header-title text-center pb-2"><b style="font-size: 25px;">SISTEMA
                    DE GESTIÓN
                    WEB-RESTAURANT</b>
            </h4>
        </div>
    </div>
</div>

<div class="row bg-secondary rounded align-items-center justify-content-center mx-0 mt-3">
    <div class="col-md-9 ms-sm-auto col-lg-12 pt-4 pb-4">
        <div class="container-fluid">

            <div align="center">

                <br />
                <img src="assets/img/logos/Login.png" class="align-items-center" width="25%" height="20%">
                <br />
                <br />
                <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;">BIENVENIDO</b></h4>
                <h4 class="m-t-0 m-b-40 header-title text-center"><b style="font-size: 20px;">
                        <?php echo $_SESSION['user_nombre']." ".$_SESSION['user_apellido'];
                    ?></b></h4>
            </div>
        </div>
    </div>
</div>