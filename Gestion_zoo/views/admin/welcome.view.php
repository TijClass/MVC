<?php ob_start(); ?>


<p>Welcome : </p>

<div>
    <?php if(isset($_SESSION['user'])) : ?>

        <p><?= $_SESSION['user'] ?></p>

    <?php endif; ?>
</div>


<form action="<?= URL ?>admin/logout" method="POST">
    <input type="submit" name="logout" value="logout">
</form>

<?php
$content = ob_get_clean();
$titre = "Login";
require 'views/includes/template.php';
