<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
    <!--**********************************************
                        MENU
    **************************************************-->
<?php
include("../Projet4/View/Frontend/Menu.php");
?>

    <!--**********************************************
                    SPACE INSCRIPTION
    **************************************************-->

    <form  id= "pageConnexion" method="POST" action="index.php?action=inscription">
        <h2> NEW USER by ADMIN</h2>

        <label for="pseudo">Votre Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo" />
        <br/> <br/>

        <label for="pass">Votre Mot de passe :</label>
        <input type="password" name="pass" id="pass" />
        <br/> <br/>

        <label for="confirmPass">Confirmez votre Mot de passe :</label>
        <input type="password" name="confirmPass" id="pass" />
        <br/> <br/>
        <label for="confirmPass">Role (1 pour Admin et 2 pour User)</label>
        <input type="number" min="1" max="2" name="role" >

        <input type="submit" value="Valider"/ style="text-align:center">

    </form>

<?php $content = ob_get_clean(); ?>

<?php require('../Projet4/View/Frontend/template.php'); ?>