<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light top-bar-margen">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse menuOpciones" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active menu_opcion" aria-current="page" href="#"
                        onclick="cargarContenido('home.php');">
                        <i class=" fa-solid fa-house-user"></i>
                        Inicio
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu_opcion" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Módulo Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Usuarios/usuariosView.php');">Usuarios</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
-->

<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="#" onclick="cargarContenido ('home.php')" class="navbar-brand mx-4 mb-3">
                <h4 class="text-primary"><img class="rounded-circle" src="assets/img/logos/Login.ico" alt=""
                        style="width: 50px; height: 50px;">WebRestaurant</h4>
            </a>
            <div class="d-flex flex-wrap flex-md-nowrap border-bottom align-items-center ms-4  pt-3 pb-4 mb-3">
                <div class="position-relative">
                    <img class="rounded-circle" src="<?php echo $_SESSION['ruta']?>" alt=""
                        style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"><?php echo $_SESSION['username'] ?></h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="#" onclick="cargarContenido ('home.php')" class="nav-item nav-link ">
                <i class="bi bi-house-door-fill me-2"></i> Inicio</a>

                <?php if($_SESSION['roles_id'] == 1 || $_SESSION['roles_id'] == 2){
                ?>
                <a href="#" class="nav-item nav-link"
                    onclick="cargarContenido('view/admin/sales/ordenCajeroView.php')">
                    <i class="bi bi-pencil-square"></i>Ordenar
                </a>
                <?php } ?>
                <?php if($_SESSION['roles_id'] == 1){
                ?>
                <a href="#" class="nav-item nav-link"
                onclick="cargarContenido('view/Alimentos/alimentosView.php')" class="nav-item nav-link">
                    <i class="fa-sharp fa-solid fa-bowl-food"></i> Alimentos
                </a>
                <a href="#" onclick="cargarContenido('view/Clientes/clientesView.php')" class="nav-item nav-link">
                <i class="fa fa-users me-2"></i>Clientes</a>
           
                <a href="#" onclick="cargarContenido('view/Estados/estadosView.php')" class="nav-item nav-link">
                <i class="fa-solid fa-rotate me-2"></i>Estados</a>
                <?php }?>
                <a href="#" onclick="cargarContenido('view/OrdenCocina/OrdenCocinaView.php')" class="nav-item nav-link">
                <i class="far fa-file-alt me-2"></i> Órdenes</a>

                <?php if($_SESSION['roles_id'] == 1){
                ?>
                <a href="#" onclick="cargarContenido('view/Roles/rolesView.php')" class="nav-item nav-link">
                <i class="fa-sharp fa-solid fa-people-arrows me-2"></i>Roles</a>
                <?php }?>
              
                
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->