<!DOCTYPE html>
<html lang="es">
<?php $PAGE_TITLE = 'Registro' ?>
<?php include_once __DIR__ . '/partials/head.php' ?>
<?php
    use MC\Business\UserBusiness;
    use MC\Business\AuthBusiness;
    $userBusiness = new UserBusiness();
    $authBusiness = new AuthBusiness();
    if(isset($_SESSION['id_user'])){
        header("location: index.php");
    }

    if(isset($_POST['submit'])){
        $userBusiness->create($_POST);
    }
?>

<body>
    <?php include_once __DIR__.'/./partials/nav.php' ?>
    <main class='container vh-50'>
        <h2>Registro</h2>
        <p>¡Bienvenido a Movie Cube! El lugar correcto para ver tus películas</p>
        <p>Para comenzar, completa el formulario de registro:</p>
        <form action="" method="POST">
            <label for="email" class='d-block'>
                E-mail
                <input type="email" id='email' name='email' required class='d-block mb-2'>
            </label>
            <label for="username" class='d-block'>
                Nombre de usuario
                <input type="text" id='username' name='username' required class='d-block mb-2'>
            </label>
            <label for="password" class='d-block'>
                Password
                <input type="password" id='password' name='password' required class='d-block mb-2'>
            </label>
            <input type="submit" name='submit' id='submit' class='d-block mb-2' value="Registrarme">
        </form>
        <?php include_once __DIR__ . '/./partials/error.php'?>
        <p>¿Ya tienes cuenta? Logueate <a href="login.php">aquí</a></p>
    </main>
    <?php include_once __DIR__.'/./partials/footer.php' ?>
</body>
</html>