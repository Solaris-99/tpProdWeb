<!DOCTYPE html>
<html lang="es">
    <?php require_once __DIR__ . '/partials/head.php' ?>
    <?php
        use MC\Helpers\Errors\RedirectException;
        use MC\Business\MovieBusiness;
        use MC\Business\MovieUserBusiness;
        use MC\Business\ImageBusiness;
        
        if(!isset($_GET['id'])){
            throw new RedirectException("./404.php","",404);
        }

        $movieBusiness = new MovieBusiness();
        $movieUserBusiness = new MovieUserBusiness();
        $isOwned = $movieUserBusiness->isOwned(($_GET['id']));
        $movie = $movieBusiness->find($_GET['id']);
        $movieId = $movie->getId();
        $categories = $movieBusiness->getCategories($movieId);
        $related = $movieBusiness->getRelated($movieBusiness->getCategories($movieId,true), $movieId);
        $imageBusiness = new ImageBusiness();
        $images = $imageBusiness->getMovieImages($_GET['id']);
    ?>
    <body>
        <?php include_once __DIR__ . '/partials/nav.php' ?>
            <main class="container" style="min-height: 100%;">
            <?php include_once __DIR__ . '/./partials/error.php'?>
                <?php include_once __DIR__ . '/partials/movie.php'?>
            </main>
        <?php include_once __DIR__ . '/partials/footer.php' ?>
    </body>
</html>