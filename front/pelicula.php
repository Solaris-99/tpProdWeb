<?php

require_once __DIR__.'/../business/MovieBusiness.php';
if(!isset($_GET['id'])){
    echo file_get_contents("404.php");
    die;
}

$movieBusiness = new MovieBusiness();
$pelicula = $movieBusiness->find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pelicula->getTitle(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <header class="container bg-primary p-1 mw-100">
        <a href="index.php" class="ms-4 d-block text-light text-decoration-none" style="width: fit-content;">
            <h1>Películas</h1>
        </a>
    </header>
    <main class="container">
        <div class="text-center">
            <h1><?php echo $pelicula->getTitle(); ?></h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-4">
                <img style="max-width:100%;max-height:80vh;" src="<?php echo $pelicula->getPoster(); ?>" alt="<?php echo $pelicula->getTitle(); ?>">
            </div>
            <div>

                <div class="border border-info rounded mt-4 p-2" style="height: fit-content;">
                    <p><strong>Genero:</strong> <?php echo $pelicula->getGenero(); ?></p>
                    <hr>
                    <p><strong>Rating:</strong> <?php echo $pelicula->getRating(); ?></p>
                    <hr>
                    <p><strong>Duración:</strong> <?php echo $pelicula->getDuracion(); ?></p>
                </div>
                <a href="https://www.google.com/search?q=<?php echo $pelicula->getTitle(); ?>" target="_blank" class="d-block btn btn-primary mb-1 mt-1 mx-auto">Buscar en google</a>
                <a href="index.php" class="d-block btn btn-primary mx-auto">Volver</a>
            </div>
        </div>
    </main>
    <footer class="container bg-primary p-1 mw-100" >
            <p class="text-light">Peliculas &copy;2024</p>
    </footer>
</body>

</html>