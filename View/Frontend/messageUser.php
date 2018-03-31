<?php $title = 'Message'; ?>

<?php ob_start(); ?>

<div>

    <p> <?= $message ?> </p>

    <p> <a href="index.php"> Revenir à l'accueil </a></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('../Projet4/View/Frontend/template.php'); ?>
