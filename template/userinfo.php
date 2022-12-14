<!--
<header class="p-3 mb-3 border-bottom fondoHeader">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" onclick="cargarContenido ('home.php')"
            class="d-flex align-items-center mb-2 mb-lg-3 text-dark text-decoration-none">
            <img src="assets/img/logos/Logotipo.png" alt="mdo" width="100" height="100" class="rounded-circle">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <h3>⠀ <?php echo $_SESSION['username'] ?> </h3>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $_SESSION['ruta']?>" width="50" height="50" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#" onclick="cargarContenido('view/Configuracion/userProfile.php')">Mi
                        Perfil <i class="fa-sharp fa-solid fa-id-badge fa-flip"
                            style="--fa-animation-duration: 3s;"></i></a>
                </li>
                <li><a class="dropdown-item" href="#"
                        onclick="cargarContenido('view/Configuracion/configView.php')">Configuración <i
                            class="fa-solid fa-cog fa-spin" style="--fa-animation-duration: 15s;"></i></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="controller/Configuracion/cerrarSesion.php">Cerrar Sessión <i
                            class="fa-sharp fa-solid fa-right-to-bracket"></i></a></li>

            </ul>
        </div>
    </div>
</header>

-->

<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="#" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><img class="rounded-circle" src="assets/img/logos/Login.ico" alt=""
                    style="width: 50px; height: 50px;"></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control bg-dark border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">

            <?php if($_SESSION['roles_id'] == 1){

            ?>
            <!-- Modulo de usuarios y roles -->
            <div class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Módulo Usuarios</span>
                </a>


                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item" onclick="cargarContenido('view/Usuarios/usuariosView.php');">
                        <h6 class="fw-normal mb-0">Registro de Actualización</h6>
                        <small>Cree, edite y elimine</small>
                    </a>

                </div>

            </div>
            <?php
                }?>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?php echo $_SESSION['ruta']?>" alt=""
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['username'] ?> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a class="dropdown-item" href="#" onclick="cargarContenido('view/Configuracion/userProfile.php')">Mi
                        Perfil <i class="fa-sharp fa-solid fa-id-badge fa-flip"
                            style="--fa-animation-duration: 3s;"></i></a>
                    <a class="dropdown-item" href="#"
                        onclick="cargarContenido('view/Configuracion/configView.php')">Configuración <i
                            class="fa-solid fa-cog fa-spin" style="--fa-animation-duration: 15s;"></i></a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="controller/Configuracion/cerrarSesion.php">Cerrar Sessión <i
                            class="fa-sharp fa-solid fa-right-to-bracket"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->