
<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<!--**********************************************
                    MENU
**************************************************-->
<?php
include("menu.php");
?>

<!--**********************************************
                SPACE INSCRIPTION
**************************************************-->

   <form  id= "pageConnexion" method="POST" action="index.php?action=inscription">
    <h2> INSCRIPTION </h2>
       
       <label for="pseudo">Votre Pseudo:</label>
       <input type="text" name="pseudo" id="pseudo" />
        <br/> <br/>
    
       <label for="pass">Votre Mot de passe :</label>
       <input type="password" name="pass" id="pass" />
        <br/> <br/>

       <label for="confirmPass">Confirmez votre Mot de passe :</label>
       <input type="password" name="confirmPass" id="pass" />
        <br/> <br/>
       <input type="hidden" name="role" value="2">
        
        <input id="button" type="submit" value="Valider" style="text-align:center">
       
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>