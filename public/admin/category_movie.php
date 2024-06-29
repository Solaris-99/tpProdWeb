
<!DOCTYPE html>
<html lang="es">

<?php include_once __DIR__ . '/./partials/head.php' ?>

<?php
use MC\Business\CategoryBusiness;
use MC\Business\MovieBusiness;
use MC\Business\CategoryMovieBusiness;

$categoryMovieBusiness = new CategoryMovieBusiness();
$movieBusiness = new MovieBusiness();
$categoryBusiness = new CategoryBusiness();


$movieSelectData = $movieBusiness->all(as_array:true);
$categorySelectData = $categoryBusiness->all(as_array:true);
$columns = ["ID","ID Película","ID Categoría","Película","Categoría"];
$data = $categoryMovieBusiness->getMovieAndCategoryName(null, true);
$tablename = "CategoryMovie";
$url_table = "category_movie.php";

if (isset($_POST['SAVE'])) {

    if(empty($_POST['id'])){
        $categoryMovieBusiness->create($_POST);
    }
    else{
        $categoryMovieBusiness->update($_POST);
    }
    header("location:$url_table");
}

if(isset($_GET['edit'])){
    $mov = $categoryMovieBusiness->find($_GET['edit'], true);
}
if (isset($_GET['del'])){
    $categoryMovieBusiness->delete($_GET['del']);
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
                    <p>Tabla de relación N a N de categorías/películas</p>
                    <!-- Insert Form -->

                    <div class="col-xl-10 col-lg-12 col-md-9 mx-auto">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-4">
                                <h4>Añadir una nueva entrada</h4>
                                <form class="user" action='' method='POST'>
                                    <div class='d-flex '>
                                            <div class="form-group d-inline-block mr-2">
                                                <label>ID</label>
                                                <input type="number" class="form-control" value="<?php if(isset($mov)){echo $mov['id']; }?>" min='1'>
                                            </div>
                                            <div class="form-group d-inline-block mr-2 my-auto ">
                                                <label for='id_movie' class='d-block'>ID Película</label>
                                                <select class="form-select d-inline-block mr-2" name='id_movie' id='id_movie'>
                                                    <?php foreach($movieSelectData as $val): ?>
                                                        <option value="<?php echo $val['id'] ?>" <?php if(isset($mov)){if($mov['id_movie'] == $val['id']){echo "selected";} } ?> > <?php echo "ID: ".$val['id']." - " . $val['title'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group d-inline-block mr-2 my-auto">
                                                <label for='id_category' class='d-block'>ID Categoría</label>
                                                <select class=" form-select d-inline-block mr-2" name='id_category' id='id_category'>
                                                    <?php foreach($categorySelectData as $val): ?>
                                                        <option value="<?php echo $val['id'] ?>" <?php if(isset($mov)){if($mov['id_category'] == $val['id']){echo "selected";} } ?>  > <?php echo "ID: ".$val['id']." - " . $val['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
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