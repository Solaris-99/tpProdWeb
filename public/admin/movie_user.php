<!DOCTYPE html>
<html lang="es">

<?php include_once __DIR__ . '/./partials/head.php' ?>

<?php
use MC\Business\MovieUserBusiness;
$movieUserBusiness = new MovieUserBusiness();
$columns = $movieUserBusiness->getColumns();
$data = $movieUserBusiness->all([], true);
$tablename = "Películas de usuarios";
$url_table = "movie_user.php";

if (isset($_POST['SAVE'])) {

    if(empty($_POST['id'])){
        $movieUserBusiness->create($_POST);
    }
    else{
        $movieUserBusiness->update($_POST);
    }
    header("location:$url_table");
}

if(isset($_GET['edit'])){
    $mov = $movieUserBusiness->find($_GET['edit'], true);
}
if (isset($_GET['del'])){
    $movieUserBusiness->delete($_GET['del']);
}


?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once __DIR__ . '/./partials/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once __DIR__ . '/./partials/nav.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2">Administración de datos</h1>
                    <p>Administración de películas de usuario</p>

                    <!-- Insert Form -->

                    <div class="col-xl-10 col-lg-12 col-md-9 mx-auto">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-4">
                                <h4>Añadir una nueva entrada</h4>
                                <form class="user" action='' method='POST'>
                                    <div class='d-flex '>
                                        <?php foreach ($columns as $col) : ?>
                                            <div class="form-group d-inline-block mr-2">
                                                <label for="<?php echo $col ?>"><?php echo $col ?></label>
                                                <?php 
                                                    $input;
                                                    $required;
                                                    switch($col){
                                                        case 'id';
                                                        case 'user_id';
                                                        case 'movie_id';
                                                            $input = 'number';
                                                            $required = false;
                                                            break;
                                                        default:
                                                            $input = 'text';
                                                            $required = true;
                                                            break;
                                                    }
                                                ?>
                                                <input type="<?php echo $input?>" class="form-control" id="<?php echo $col ?>" name='<?php echo $col ?>' <?php if($required){echo 'required';}?> value="<?php echo isset($mov)? $mov[$col] :"" ?>" >
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <input type='submit' name='SAVE' id='SAVE' class="btn w-25 mx-auto btn-primary btn-user btn-block" value="Guardar">
                                </form>
                            </div>
                        </div>
                    </div>


                    <?php include_once __DIR__ . '/./partials/table.php' ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once __DIR__ . '/./partials/footer.php' ?>
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
    <?php include_once __DIR__ . '/./partials/logout.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>