<?php $title = 'Modifier un article'; ?>

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
    <h1> Modifier l'article</h1>

    <form  action="index.php?action=updatePost" method="POST" id="form_CreatePost" enctype="multipart/form-data">


        <input type="hidden" id="id" name="id" value="<?=$post->getId();?>">
        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$post->getTitle();?>">
        </p>

        <p>
            <label for="content"> Image </label>
            <input type="file" id="tel" name="img" value="<?=$post->getImg();?>">
        </p>

        <p>
            <label for="mel"> Contenu </label>
            <textarea name="content" form="form_CreatePost" cols="100" rows="10" class="tinymce"> <?=$post->getContent();?> </textarea>
        </p>

        <p>
            <input type="submit" value="Modifier l'article">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>
