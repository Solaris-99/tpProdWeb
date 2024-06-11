<div id="carouselExample" class="carousel slide carousel-dark w-100" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php if (gettype($images) == 'string'): ?>
      <div class="carousel-item active">
        <img class='d-block mx-auto' src="<?php echo $images ?>">
        </div>
      <?php else: ?>
        <?php $active = true ?>
      <?php foreach ($images as $image) : ?>
        <div class="carousel-item <?php if($active){echo "active";}?>">
          <img class='d-block mx-auto' src="<?php echo $image->getPath() ?>">
        </div>
        <?php $active = false?>
      <?php endforeach ?>
    <?php endif ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguente</span>
  </button>


</div>