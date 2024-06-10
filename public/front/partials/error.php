
<?php if(isset($_SESSION['error'])):?>
<div class='bg-danger text-center rounded p-2 m-2'>
    <p><?php echo $_SESSION['error']?></p>
</div>
<?php unset($_SESSION['error']) ?>
<?php endif ?>