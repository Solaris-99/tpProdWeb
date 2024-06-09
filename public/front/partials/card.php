<?php
    use MC\Business\ImageBusiness;
    $imageBusiness = new ImageBusiness();
    $__card_movie_id = $pelicula->getId();
?>

<div class="card d-inline-block m-2" style="width: 18rem;">
    <a href="movie.php?id=<?php echo $__card_movie_id; ?>">
        <img src="<?php echo $imageBusiness->getBanner($__card_movie_id); ?>" class="card-img-top" style="height:300px;" alt="<?php echo $pelicula->getTitle();?>">
    </a>
    <div class="card-body">
        <a href="movie.php?id=<?php echo $__card_movie_id; ?>" class='text-decoration-none'>
            <h5 class="card-title text-truncate  fw-bold"><?php echo $pelicula->getTitle(); ?></h5>
        </a>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Rating: </strong><?php echo $pelicula->getRating(); ?></li>
            <li class="list-group-item"><strong>Duración: </strong><?php echo $pelicula->getDuration(); ?></li>
            <li class="list-group-item"><strong>Géneros: </strong><?php echo $movieBusiness->getCategories($__card_movie_id); ?></li>
            <li class="list-group-item"><strong>Precio: </strong><?php echo $pelicula->getPrice(); ?></li>
        </ul>
    </div>
</div>