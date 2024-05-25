<!DOCTYPE html>
<html lang="es">
<?php require_once __DIR__ . '/partials/head.php' ?>

<?php

    $movieBusiness = new MovieBusiness();
    $categoryBusiness = new CategoryBusiness();
    $categorySelectData = $categoryBusiness->all([],true);
    $peliculas = $movieBusiness->all($_GET);

?>

<body >
    <?php include_once __DIR__ . '/partials/nav.php' ?>

    <main class="container" style="min-height: 100%;">
        <?php include_once __DIR__ . '/partials/hero.php' ?>
        <form action="" method='GET' class='border border-dark rounded p-2'>
            <label for="id_category">
                Categoría
                <select name="id_category" id="id_category" class='d-block rounded '>
                    <option value="" selected>Todas las categorias</option>
                    <?php foreach($categorySelectData as $val): ?>
                        <option value="<?php echo $val['id'] ?>"> <?php echo $val['name'];?> </option>
                    <?php endforeach ?>
                </select>
            </label>
            <label for="release">
                Año de estreno
                <input type="number" name='release' class='d-block rounded' min='2010' max='2024'>
            </label>
            <label for="rating">
                Calificación
                <input type="number" name='rating' class='d-block rounded' max='10' min='1' >
            </label>
            <label for="price">
                Precio
                <input type="number" name='price' class='d-block rounded' min='5'>
            </label>
            <input type="submit" value="Filtrar" class='rounded'>
        </form>
        <?php if(empty($peliculas)):?>
            <div class='text-center m-4 p-4'>
                <h2>No se encontraron películas</h2>
            </div>
        <?php endif?>

        <?php foreach ($peliculas as $pelicula) : ?>
            <?php include __DIR__ . '/partials/card.php' ?>
        <?php endforeach ?>


    </main>
    <?php include_once __DIR__ . '/partials/footer.php' ?>

</body>

</html>