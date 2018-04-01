<?php
$title = 'Accueil'; ?>

<?php ob_start(); ?>
    <!--**********************************************
                        LOGO & Titre du livre
    **************************************************-->
<?php
include("logo.php");
?>

    <!--**********************************************
                        MENU
    **************************************************-->
<?php
include("menu.php");
?>

    <!-- ****************************************
                BIBLIO et DERNIERS CHAPITRES
    ******************************************-->
     <!--Présentation de l'auteur-->
        <div id="station_lecture">

            <div class="titre1">
                <div class="titre2">
                    <h1>Qui est Jean FORTEROCHE ? </h1>
                </div>
            </div>

            <figure class="imgBillets">
                <img src="public/img/jf.jpg"/>
            </figure>

            <p>
                Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.
                Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.

            </p>

        </div>


<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>