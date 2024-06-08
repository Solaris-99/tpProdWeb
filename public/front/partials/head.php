<?php
session_start();
require_once __DIR__ . '/../../../app/dataAccess/Dao.php';
require_once __DIR__ . '/../../../app/dataAccess/MovieDaoMySql.php';
require_once __DIR__ . '/../../../app/entity/Movie.php';
require_once __DIR__ . '/../../../app/business/MovieBusiness.php';
require_once __DIR__ . '/../../../app/business/UserBusiness.php';
require_once __DIR__ . '/../../../app/business/CategoryBusiness.php';
require_once __DIR__ . '/../../../app/business/MovieUserBusiness.php';
require_once __DIR__ . '/../../../app/config/exception_handler.php';
require_once __DIR__ . '/../../../app/business/AuthBusiness.php';
require_once __DIR__ . '/../../../app/helpers/enums/permissions.php';

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieCube <?php if(isset($PAGE_TITLE)){echo "- $PAGE_TITLE";} ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!--  <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css" media="all"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css" media="all"> 
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resource/css/styles.css">
</head>