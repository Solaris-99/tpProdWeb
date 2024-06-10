<!DOCTYPE html>
<html lang="es">

<?php include_once  __DIR__."/partials/head.php"?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include_once  __DIR__."/partials/sidebar.php"?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once  __DIR__."/partials/nav.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto text-white" data-text="500">Error</div>
                        <p class="lead text-white mb-5">
                            Ocurrió un error inesperado:
                        </p>
                        <p>El error completo es:</p>
                            <?php if(isset($_SESSION['detailed_error'])):?>
                                <div class='bg-danger p-2 m-2  text-center'>
                                    <p class="lead text-white mb-5">
                                        <?php echo $_SESSION['detailed_error'];?>
                                        <?php unset($_SESSION['detailed_error']);?>
                                    </p>
                                </div> 
                            <?php endif?>

                        <a href="index.php">&larr; Ir al inicio</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once  __DIR__."/partials/footer.php"?>
           <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include_once __DIR__ . '/partials/logout.php' ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>