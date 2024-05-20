<?php

require_once __DIR__.'/../business/MovieBusiness.php';
if(!isset($_GET['id'])){
    echo file_get_contents("404.php");
    die;
}
$movieBusiness = new MovieBusiness();
$movie = $movieBusiness->find($_GET['id']);
$movieId = $movie->getId();
$categories = $movieBusiness->getCategories($movieId);
$related = $movieBusiness->getRelated($movieBusiness->getCategories($movieId,true), $movieId);

?>

<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ . '/partials/head.php' ?>

<body>
    <?php include_once __DIR__ . '/partials/nav.php' ?>

    <main class="container" style="min-height: 100%;">
        <?php include_once __DIR__ . '/partials/movie.php'?>

    </main>
    <?php include_once __DIR__ . '/partials/footer.php' ?>

</body>

</html>