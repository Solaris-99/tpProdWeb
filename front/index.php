<?php

require_once __DIR__ . '/../dataAccess/Dao.php';
require_once __DIR__ . '/../dataAccess/MovieDaoMySql.php';
require_once __DIR__ . '/../entity/Movie.php';
require_once __DIR__ . '/../business/MovieBusiness.php';
require_once __DIR__ . '/../business/CategoryBusiness.php';

$movieBusiness = new MovieBusiness();
$categoryBusiness = new CategoryBusiness();
$categorySelectData = $categoryBusiness->all([],true);
$peliculas = $movieBusiness->all($_GET);

?>

<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ . '/partials/head.php' ?>

<body >
    <?php include_once __DIR__ . '/partials/nav.php' ?>

    <main class="container" style="min-height: 100%;">
        <?php include_once __DIR__ . '/partials/hero.php' ?>
        <form action="" method='GET'>
            <label for="id_category">
                Categoría
                <select name="id_category" id="id_category" class='d-block'>
                    <option value="" selected>Todas las categorias</option>
                    <?php foreach($categorySelectData as $val): ?>
                        <option value="<?php echo $val['id'] ?>"> <?php echo $val['name'];?> </option>
                    <?php endforeach ?>
                </select>
            </label>
            <label for="release">
                Año de estreno
                <input type="number" name='release' class='d-block'>
            </label>
            <label for="rating">
                Calificación
                <input type="number" name='rating' class='d-block' max='10' min='0' >
            </label>
            <label for="price">
                Precio
                <input type="number" name='price' class='d-block' min='5'>
            </label>
            <input type="submit" value="Filtrar">
        </form>
        <?php foreach ($peliculas as $pelicula) : ?>
            <?php include __DIR__ . '/partials/card.php' ?>
        <?php endforeach ?>


    </main>
    <?php include_once __DIR__ . '/partials/footer.php' ?>

</body>

</html>