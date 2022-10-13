<?php 
?>

<header class="p-3 mb-3 border-bottom fondoHeader">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <img src="assets/img/logos/logo.png" alt="mdo" width="100" height="90" class="rounded-circle">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <p> <?php echo $_SESSION['username'] ?> </p>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/img/fotos/user.png" width="50" height="50" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Cerrar Sessión</a></li>

            </ul>
        </div>
    </div>
</header>