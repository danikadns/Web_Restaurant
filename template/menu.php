<?php 
?>
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
                        <li>
                            <a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Ordenes/ordenesView.php');">Ordenes</a>
                        </li>
                        <?php if($_SESSION['roles_id'] == 1){ ?>
                        <li>
                            <a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Usuarios/usuariosView.php');">Usuarios</a>
                        </li>
                        <li>
                            <a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Roles/rolesView.php');">Roles</a>
                        </li>
                        <li>
                            <a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Usuarios/estadosView.php');">Estados</a>
                        </li>
                        <li>
                            <a class="dropdown-item " href="#"
                                onclick="cargarContenido('view/Usuarios/alimentosView.php');">Alimentos</a>
                        </li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>