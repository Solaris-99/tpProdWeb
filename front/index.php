<?php

require_once __DIR__.'/../dataAccess/Dao.php';
require_once __DIR__.'/../dataAccess/MovieDaoMySql.php';
require_once __DIR__.'/../entity/Movie.php';
require_once __DIR__.'/../business/MovieBusiness.php';

$movieBusiness = new MovieBusiness();
$peliculas = $movieBusiness->all($_GET);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <header class="container bg-primary p-1 mw-100">
        <a href="index.php" class="ms-4 d-block text-light text-decoration-none" style="width: fit-content;">
            <h1>Películas</h1>
        </a>
    </header>
    <main class="container" style="min-height: 100%;">
        <div class="row d-flex align-items-center justify-content-center mb-4">
            <div class="col-md-8">
                <form id="form" action="index.php" method="GET">
                    <div class="form-group">
                        <label for="release"></label>
                        <select name="release" id="release" class="form-control">
                            <?php for ($i = 2012; $i <= 2024; $i++) : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-4  mt-auto">
                <button class="btn btn-primary" form="form" type="submit">Filtrar</button>
                <?php if (isset($_GET["release"])) : ?>
                    <a href="index.php" class="btn btn-primary">Limpiar</a>
                <?php endif ?>
            </div>
        </div>
        <div>
            <?php if (!empty($peliculas)): ?>
                <?php foreach ($peliculas as $pelicula): ?>
                    <div class="card d-inline-block m-2" style="width: 18rem;">
                        <a href="pelicula.php?id=<?php echo $pelicula->getId(); ?>">
                            <img src="<?php echo $pelicula->getPoster(); ?>" class="card-img-top" style="height:300px;" alt="<?php echo $pelicula->getTitle(); ?>">
                        </a>
                        <div class="card-body">
                            <a href="pelicula.php?id=<?php echo $pelicula->getId(); ?>" class='text-decoration-none'>
                                <h5 class="card-title text-truncate  fw-bold"><?php echo $pelicula->getTitle(); ?></h5>
                            </a>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Rating: </strong><?php echo $pelicula->getRating(); ?></li>
                                <li class="list-group-item"><strong>Duración: </strong><?php echo $pelicula->getDuration(); ?></li>
                                <li class="list-group-item"><strong>Géneros: </strong><?php echo $movieBusiness->getCategories($pelicula->getId()); ?></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h2>No hay peliculas que cumplan los criterios.</h2>
            <?php endif ?>
        </div>
    </main>
    <!-- position-fixed mt-4 bottom-0 -->
    <footer class="container bg-primary p-1 mw-100 <?php if(count($peliculas)<5) echo "position-fixed mt-4 bottom-0"?>" >
            <p class="text-light">Peliculas &copy;2024</p>
    </footer>
</body>

</html>