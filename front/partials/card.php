<div class="card d-inline-block m-2" style="width: 18rem;">
    <a href="movie.php?id=<?php echo $pelicula->getId(); ?>">
        <img src="<?php echo $pelicula->getPoster(); ?>" class="card-img-top" style="height:300px;" alt="<?php echo $pelicula->getTitle(); ?>">
    </a>
    <div class="card-body">
        <a href="movie.php?id=<?php echo $pelicula->getId(); ?>" class='text-decoration-none'>
            <h5 class="card-title text-truncate  fw-bold"><?php echo $pelicula->getTitle(); ?></h5>
        </a>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Rating: </strong><?php echo $pelicula->getRating(); ?></li>
            <li class="list-group-item"><strong>Duración: </strong><?php echo $pelicula->getDuration(); ?></li>
            <li class="list-group-item"><strong>Géneros: </strong><?php echo $movieBusiness->getCategories($pelicula->getId()); ?></li>
            <li class="list-group-item"><strong>Precio: </strong><?php echo $pelicula->getPrice(); ?></li>
        </ul>
    </div>
</div>