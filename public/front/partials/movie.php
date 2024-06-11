<!-- Page Content -->
<div class="container">

  <h1 class="my-4">
    <?php echo $movie->getTitle() ?>
  </h1>

  <div class="row mb-4">

  <?php if($isOwned):?>
      <div>
        <iframe width="1200" height="600" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=BWsGwxULUC2UJIY2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    <?php endif ?>
    <div class="col-md-8">
      <?php include_once 'carousel.php' ?>
    </div>
 

    <div class="col-md-4">
      <h3 class="my-3">Descripción</h3>
      <p><?php echo $movie->getDescription() ?></p>
      <h3 class="my-3">Detalle</h3>
      <ul>
        <li><strong>Categorías</strong>: <?php echo $categories ?></li>
        <li><strong>Duración</strong>: <?php echo $movie->getDuration() ?></li>
        <li><strong>Rating</strong>: <?php echo $movie->getRating() ?></li>
        <li><strong>Fecha de estreno</strong>: <?php echo $movie->getRelease() ?></li>
      </ul>
      <?php if (!$isOwned) : ?>
        <div class='d-flex   justify-content-around p-2'>
          <p class="bg-primary rounded my-auto p-2 text-white"><?php echo $movie->getPrice() ?></p>
          <a href="#" class="btn btn-primary d-block p-2 my-auto">Comprar</a>
        </div>
      <?php endif ?>
    </div>


  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <?php if (!empty($related)) : ?>
    <h3 class="my-4">Más como esta película</h3>

    <div class="row">
      <?php foreach ($related as $r) : ?>
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="movie.php?id=<?php echo $r->getId() ?>">
            <img class="img-fluid" src="<?php echo $imageBusiness->getBanner($r->getId()) ?>" alt="<?php echo $r->getTitle() ?>" height="300">
          </a>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
  <!-- /.row -->

</div>
<!-- /.container -->