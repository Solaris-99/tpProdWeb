
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MovieCube Admin<sup>2</sup></div>
            </a>
            <!-- Heading -->
            <div class="sidebar-heading">
                Navegación
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTables" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tablas</span>
                </a>

                <div id="collapseTables" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-dark">Admin:</h6>
                        <a class="collapse-item" href="index.php">Administrador - home</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header text-dark">Películas:</h6>
                        <a class="collapse-item" href="movie.php">Películas</a>
                        <a class="collapse-item" href="category.php">Categorías</a>
                        <a class="collapse-item" href="category_movie">Categorías/Películas</a>
                        <a class="collapse-item" href="image.php">Imágenes</a>
                        <h6 class="collapse-header text-dark">Users:</h6>
                        <a class="collapse-item" href="user.php">Usuarios</a>
                        <a class="collapse-item" href="movie_user.php">Usuarios - Películas</a>
                        <a class="collapse-item" href="role.php">Roles</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Páginas</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-dark">Principal:</h6>
                        <a class="collapse-item" href="./../front/index.php">Home</a>
                        <a class="collapse-item" href="./../front/about.php">Sobre Nosotros</a>
                        <a class="collapse-item" href="./../front/termsAndConditions.php">Legal</a>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->