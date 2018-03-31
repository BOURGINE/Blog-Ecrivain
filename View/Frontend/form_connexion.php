
<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<!--**********************************************
                    MENU
**************************************************-->

<?php
include("menu.php");
?>

<!--**********************************************
                SPACE CONNEXION
**************************************************-->

<form  id= "pageConnexion" method="POST" action="index.php?action=connexion">
    <h2> CONNEXION </h2>

    <label for="pseudo">Votre Pseudo:</label>
    <input type="text" name="pseudo" id="pseudo" />
    <br/> <br/>

    <label for="pass"> Votre Mot de Passe: </label>
    <input type="password" name="pass" id="pseudo" />
    <br/> <br/>

    <input  id="button" type="submit" value="Connexion" style="text-align:center" />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>