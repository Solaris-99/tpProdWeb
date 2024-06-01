<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ . '/partials/head.php' ?>
<body>
    <?php include_once __DIR__.'/./partials/nav.php' ?>
    <main>
        <h2>Login</h2>
        <p>Bienvenido de vuelta a MovieCube.</p>
        <form action="" method="POST">
            <label for="email">
                E-mail
                <input type="text" id='email' name='email' required>
            </label>
            <label for="username">
                Nombre de usuario
                <input type="text" id='username' name='username' required>
            </label>            
        </form>
        <p>¿Nuevo en MovieCube? Registrate <a href="register.php">aquí</a></p>
    </main>
    <?php include_once __DIR__.'/./partials/footer.php' ?>
</body>
</html>