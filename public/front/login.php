<!DOCTYPE html>
<html lang="es">
<?php $PAGE_TITLE = 'Ingresar' ?>
<?php include_once __DIR__ . '/partials/head.php' ?>
<?php
    use MC\Business\AuthBusiness;
    $authBusiness = new AuthBusiness();
    if(isset($_SESSION['id_user'])){
        header("location: index.php");
    }
    if(isset($_POST['submit'])){
        $authBusiness->login($_POST);
    }

?>

<body>
    <?php include_once __DIR__.'/./partials/nav.php' ?>
    <main class='container vh-50'>
        <h2>Login</h2>
        <p>Bienvenido de vuelta a MovieCube.</p>
        <?php include_once __DIR__ . '/./partials/error.php'?>
        <form action="" method="POST" >
            <label for="email" class='d-block'>
                E-mail
                <input type="email" id='email' name='email' required class='d-block mb-2'>
            </label>
            <label for="password" class='d-block'>
                Password
                <input type="password" id='password' name='password' required class='d-block mb-2'>
            </label>
            <input type="submit" name='submit' id='submit' class='d-block' value='Ingresar'>
        </form>
        <p>¿Nuevo en MovieCube? Registrate <a href="register.php">aquí</a></p>
    </main>
    <?php include_once __DIR__.'/./partials/footer.php' ?>
</body>
</html>