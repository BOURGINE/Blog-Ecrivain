<?php $title = 'Ajouter un article'; ?>

<?php ob_start(); ?>

<!--**********************************************
            Slideshow, slider et bouttons-fleches
**************************************************-->
<?php
include('../BlogEcrivain/View/Frontend/logo.php');
?>
<!--**********************************************
                    MENU
**************************************************-->
<?php
include("../BlogEcrivain/View/Frontend/menu.php");
?>

<div>
    <h1> Ajouter un article</h1>

    <form  action="index.php?action=createPost" method="POST" id="form_CreatePost" enctype="multipart/form-data">

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title">
        </p>

        <p>
            <label for="img"> Image </label>
            <input type="file" id="tel" name="img">
        </p>

        <p>
            <label for="content">Contenu</label>
            <textarea name="content" form="form_CreatePost" cols="100" rows="10" class="tinymce"></textarea>
        </p>

        <p>
            <input type="submit" value="Créer un nouvel article">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>

