<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ . '/./partials/head.php' ?>

<body id="page-top">
    <div id="wrapper">
        <?php include_once __DIR__ . '/./partials/sidebar.php' ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once __DIR__ . '/./partials/nav.php' ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4">Administrador de datos</h1>
                </div>
                <section class='container'>
                <div class="col-xl-12 col-md-8 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MOVIES</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <a href="./movie.php">Peliculas/Movies</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-8 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CATEGORIES</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <a href="./category.php">Categorias/Categories</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-8 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CATEGORIES/MOVIES</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./category_movie.php">Peliculas - categorias (Relación)</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
            <?php include_once __DIR__ . '/./partials/footer.php' ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include_once __DIR__ . '/./partials/logout.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>