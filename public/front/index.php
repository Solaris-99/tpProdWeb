<!DOCTYPE html>
<html lang="es">
<?php require_once __DIR__ . '/partials/head.php' ?>

<?php
    use MC\Business\MovieBusiness;
    use MC\Business\CategoryBusiness;
    $movieBusiness = new MovieBusiness();
    $categoryBusiness = new CategoryBusiness();
    $categorySelectData = $categoryBusiness->all([],true);
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page < 0){$page = 0;}
    }
    else{
        $page = 0;
    }   
    $peliculas = $movieBusiness->all($_GET,false,$page);
    $numPages = $movieBusiness->getNumOfPages();

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
        <section class='container'>
            <?php foreach ($peliculas as $pelicula) : ?>
                <?php include __DIR__ . '/partials/card.php' ?>
            <?php endforeach ?>
        </section>
        <?php if($numPages>1):?>
        <nav aria-label="paginado" class='pagination-nav mx-auto w-fit h-fit' data-bs-theme="dark">
            <ul class="pagination">
                <?php if($page > 0 ):?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1?>">Anterior</a></li>
                <?php endif?>
                    <?php if($page > 2 ):?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-2?>"><?php echo $page-3 ?></a></li>
                    <?php endif?>
                    <?php if($page > 1 ):?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1?>"><?php echo $page-2 ?></a></li>
                    <?php endif?>
                    

                    <li class="page-item page-link"> <?php echo $page+1 ?></li>
                    <?php if($page +1 < $numPages ):?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1?>"><?php echo $page+2 ?></a></li>
                    <?php endif?>
                    <?php if($page +2 < $numPages ):?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+2?>"><?php echo $page+3 ?></a></li>
                    <?php endif?>

                <?php if($page+1 != $numPages ):?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1?>">Siguiente</a></li>
                <?php endif?>

            </ul>
        </nav>
        <?php endif?>
    </main>
    <?php include_once __DIR__ . '/partials/footer.php' ?>

</body>

</html>