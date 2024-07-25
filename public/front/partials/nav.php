<?php

use MC\Business\AuthBusiness;
use MC\Helpers\Enums\Permissions;

$auth = new AuthBusiness();
?>


<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../front/resource/icon/logo.png" width="48" height="48" class="align-middle me-1 img-fluid" alt="Movie Cube">
            MovieCube</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar4" aria-controls="myNavbar4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="lc-block collapse navbar-collapse" id="myNavbar4">
            <div lc-helper="shortcode" class="live-shortcode me-auto">
                <ul id="menu-menu-1" class="navbar-nav">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739"><a href="index.php" class="nav-link ">Películas</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738"><a href="about.php" class="nav-link ">Sobre nosotros</a></li>
                </ul>
            </div>

            <div>
                <form action="#" mehtod='GET'>
                    <input type="search" name='movie_search' id='movie_search' placeholder="Buscar películas...">
                    <input type="submit" value="🔍">
                </form>
            </div>


            <?php if (isset($_SESSION['id_user'])) : ?>
                <div lc-helper="shortcode" class="live-shortcode ms-auto" data-bs-theme='dark'>
                    <ul id="menu-secondary" class="navbar-nav">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-33131"><a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
                            <ul class="dropdown-menu  depth_0">
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category nav-item nav-item-33132"><a href="./user_movies.php" class="dropdown-item ">Mis películas</a></li>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category nav-item nav-item-33137"><a href="./about.php#contact" class="dropdown-item ">Contacto</a></li>
                                <?php if ($auth->authPermission(Permissions::ADMIN)) : ?>
                                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category nav-item nav-item-33137"><a href="../admin/index.php" class="dropdown-item ">Panel de Administrador</a></li>
                                <?php endif ?>

                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category nav-item nav-item-33135"><a href="./controllers/logout.php" class="dropdown-item ">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php else : ?>
                <div lc-helper="shortcode" class="live-shortcode ms-auto">
                    <a href="login.php">Ingresar</a>
                    <a href="register.php">Registrarse</a>
                </div>
            <?php endif ?>
        </div>
    </div>
</nav>