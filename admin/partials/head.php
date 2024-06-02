<head>
    <?php
        require_once __DIR__ . "/../../app/helpers/enums/permissions.php";

        session_start();

        require_once __DIR__ . "/../../app/config/exception_handler.php";
        require_once __DIR__ . "/../../app/helpers/errors/RedirectException.php";
        require_once __DIR__ . '/../../app/business/CategoryBusiness.php';
        require_once __DIR__ . '/../../app/business/CategoryMovieBusiness.php';
        require_once __DIR__ . '/../../app/business/MovieBusiness.php';
        require_once __DIR__ . '/../../app/business/UserBusiness.php';
        require_once __DIR__ . '/../../app/business/MovieUserBusiness.php';
        require_once __DIR__ . '/../../app/business/RoleBusiness.php';
        require_once __DIR__ . '/../../app/business/AuthBusiness.php';
        $auth = new AuthBusiness();
        $auth->authAdminSite();


    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MovieCube ADM</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>