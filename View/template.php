<?php

if (isset($_SESSION['pseudo']))
{
    //Affiche les infos de la session
    $info1 = '<span class="glyphicon glyphicon-user"></span> HELLO '.ucfirst($_SESSION['pseudo']).' !';
    $info2 = '<a href="index.php?action=deconnexion"> <i class="fa fa-sign-out" aria-hidden="true"></i> DECONNEXION</a>';
}
else
{ // Si pas de session demande l'inscription ou la connexion

    $info1='<a href="index.php?action=formConnexion"> <i class="fa fa-sign-in" aria-hidden="true"></i> CONNEXION</a>';
    $info2='<a href="index.php?action=formInscription"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> INSCRIPTION </a></li>';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <!-- balise méta pour les médias q -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- Opengraph pour Facebook -->
    <meta property="og:title" content="velib"/>
    <meta property="og:type" content="application web"/>
    <meta property="og:url" content="http://projet4.recherchefinancement.org"/>
    <meta property="og:image" content="images/projet4.png"/>
    <meta property="og:description" content="Jean forteroche"/>
    <!-- Opengraph pour Twitter -->
    <meta name="twitter:card" content="jeanforteroch">
    <meta name="twitter:site" content="jeanforteroch">
    <meta name="twitter:title" content="Jean forteroche">
    <meta name="twitter:description" content="un billet pour l'alaska">
    <meta name="twitter:image" content="images/slider/petite_fille_mascotte.jpg">

    <link rel="shortcut icon" type="image/x-icon" href="public/img/icone.jpg" />

    <link rel="stylesheet" href="public/img/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../BlogEcrivain/Public/style.css"/>

    <title><?= $title ?></title>
</head>

<body>

<div id="page">
    <!-- ***************************
            BANDE NOIRE
    ******************************** -->
<section id="bandeNoire">

    <div id="resoSocio"> <!--reseaux socio -->
        <ul>
            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
        </ul>
    </div>

    <div id="espaceConnexion">
        <ul>
            <li> <?= $info1 ?> </li> <!-- Correspond à CONNEXION ou PSEUDO -->
            <li>  <?= $info2 ?> </li> <!-- Correspond à INSCRIPTION  DECONNEXION -->
        </ul>
    </div>

</section>



<?= $content ?>

</div>

<!-- ****************************************
		 FOOTER
********************************************* -->
<footer id="footer">
    <div>
        <nav id="navFooter">
            <ul>
                <li><a href="#"> <i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
                <li><a href="#"> <i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                <li><a href="#"> <i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a></li>
                <li><a href="#"> <i class="fa fa-envelope" aria-hidden="true"></i> E-mail</a></li>
            </ul>
        </nav>

        <div>
            <img src="Public/img/logoFooter.png" alt="jeanforteroche">
        </div>

        <nav id="navFooter2">
            <ul>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">CGU</a></li>
                <li><a href="#">Partenaires</a></li>
            </ul>
        </nav>
        <p id="copyr"> Copyright 2018 - Bourgine Bérenger FAGADE </p>
    </div>
</footer>


<!-- Javascript -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea.tinymce' });</script>

<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"> </script>
<script type="text/javascript" src="public/javaScript/sliderTitre.js"></script>
<script type="text/javascript" src="public/javaScript/slider.js"></script>

</body>
</html>