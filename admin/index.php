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

                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

                </div>

            </div>       
            <?php include_once __DIR__ . '/./partials/footer.php' ?>
        </div>
        <!-- End of Content Wrapper -->

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