

    <div lc-helper="background" class="container-fluid py-5 mb-4 d-flex justify-content-center hero" style="
    background-image: url('https://www.vanas.ca/images/blog/vfx-visual-effects-vanas.jpg');
    background-position: center;
    background-size:cover;
    background-repeat:no-repeat">
        <div class="p-5 mb-4 lc-block col-xxl-7 col-lg-8 col-12" style=" backdrop-filter: blur(6px) saturate(102%);
    -webkit-backdrop-filter: blur(6px) saturate(102%);
    background-color: rgba(255, 255, 255, 0.45);
    border-radius: 12px;
    border: 1px solid rgba(209, 213, 219, 0.3);">
            <div class="lc-block">
                <div editable="rich">
                    <h2 class="fw-bolder display-3">MovieCube</h2>
                </div>
            </div>
            <div class="lc-block col-md-8">
                <div editable="rich">
                    <p class="lead">
                    Bienvenido a MovieCube: tu cine personal en casa. Con nosotros, puedes comprar cualquier película y tenerla para siempre. Descárgala o mírala online, en cualquier idioma, doblada o subtitulada, y siempre en la mejor calidad disponible. Disfruta del cine como nunca antes.
                    </p>
                </div>
            </div>
            <div class="lc-block">
                <!-- Para registrarse -->
                 <?php if(!isset($_SESSION['id_user'])):?>
                    <a class="btn btn-dark" href="register.php" role="button">Empieza tu colección</a>
                <?php else:?>
                    <a class="btn btn-dark" href='user_movies.php' role='button' > Ver mis peliculas</a>
                <?php endif?>
            </div>
        </div>
    </div>


<!-- 
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
