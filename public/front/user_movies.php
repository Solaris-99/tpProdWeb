<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ . '/partials/head.php' ?>
<?php

use MC\Business\AuthBusiness;
use MC\Business\MovieUserBusiness;
use MC\Business\MovieBusiness;

$auth = new AuthBusiness();
$auth->authPrivateEndUserSite();
$movieUserBusiness = new MovieUserBusiness();
$movieBusiness = new MovieBusiness();
$movie_ids = $movieUserBusiness->getMoviesOfUser($_SESSION['id_user']); 
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page < 0){$page = 0;}
}
else{
    $page = 0;
}  
$numPages = $movieUserBusiness->getNumOfUserPages();
$peliculas = $movieBusiness->getMoviesByIds($movie_ids,$page);

?>

<body>
    <?php include_once __DIR__ . '/./partials/nav.php' ?>
    <main>
        <?php if (empty($peliculas)) : ?>
            <div class='text-center m-4 p-4'>
                <h2>No se encontraron películas</h2>
            </div>
        <?php endif ?>
        <section class='container'>
            <?php foreach ($peliculas as $pelicula) : ?>
                <?php include __DIR__ . '/partials/card.php' ?>
            <?php endforeach ?>
        </section>
        <?php if ($numPages > 1) : ?>
            <nav aria-label="paginado" class='pagination-nav mx-auto w-fit h-fit' data-bs-theme="dark">
                <ul class="pagination">
                    <?php if ($page > 0) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page - 1 ?>">Anterior</a></li>
                    <?php endif ?>
                    <?php if ($page > 1) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page - 2 ?>"><?php echo $page - 1 ?></a></li>
                    <?php endif ?>
                    <?php if ($page > 0) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page - 1 ?>"><?php echo $page ?></a></li>
                    <?php endif ?>


                    <li class="page-item page-link"> <?php echo $page + 1 ?></li>
                    <?php if ($page + 1 < $numPages) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page + 1 ?>"><?php echo $page + 2 ?></a></li>
                    <?php endif ?>
                    <?php if ($page + 2 < $numPages) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page + 2 ?>"><?php echo $page + 3 ?></a></li>
                    <?php endif ?>

                    <?php if ($page + 1 != $numPages) : ?>
                        <li class="page-item"><a class="page-link" href="user_movies.php?page=<?php echo $page + 1 ?>">Siguiente</a></li>
                    <?php endif ?>

                </ul>
            </nav>
        <?php endif ?>
    </main>
    <?php include_once __DIR__ . '/./partials/footer.php' ?>
</body>

</html>