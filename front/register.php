<!DOCTYPE html>
<html lang="es">
<?php $PAGE_TITLE = 'Registro' ?>
<?php include_once __DIR__ . '/partials/head.php' ?>
<?php
    $userBusiness = new UserBusiness();
    if(isset($_POST['submit'])){
        $userBusiness->create($_POST);
    }
    header("location: register.php");
?>

<body>
    <?php include_once __DIR__.'/./partials/nav.php' ?>
    <main>
        <h2>Registro</h2>
        <p>¡Bienvenido a Movie Cube! El lugar correcto para ver tus películas</p>
        <p>Para comenzar, completa el formulario de registro:</p>
        <form action="" method="POST">
            <label for="email">
                E-mail
                <input type="text" id='email' name='email' required>
            </label>
            <label for="username">
                Nombre de usuario
                <input type="text" id='username' name='username' required>
            </label>
            <label for="password">
                Password
                <input type="text" id='password' name='password' required>
            </label>
            <input type="submit" name='submit' id='submit'>
        </form>
        <p>¿Ya tienes cuenta? Logueate <a href="login.php">aquí</a></p>
    </main>
    <?php include_once __DIR__.'/./partials/footer.php' ?>
</body>
</html>