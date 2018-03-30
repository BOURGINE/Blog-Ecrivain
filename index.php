<?php

require"Autoload/Autoloader.php";

use Autoload\Autoloader;
use BlogEcrivain\Model\Manager\CommentManager;

Autoloader::register();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <!-- balise méta pour les médias q -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Opengraph pour Facebook -->
    <meta property="og:title" content="WebAgency"/>
    <meta property="og:type" content="site web"/>
    <meta property="og:url" content="http://www.webagency.com/"/>
    <meta property="og:image" content="images/webagency.png"/>
    <meta property="og:description" content="WebAgency réalise vos projets web, site internet, portfolio"/>
    <!-- Opengraph pour Twitter -->
    <meta name="twitter:card" content="WebAgency réalise vos projets web">
    <meta name="twitter:site" content="WebAgency">
    <meta name="twitter:title" content="WebAgency réalise vos projets web">
    <meta name="twitter:description" content="WebAgency réalise vos projets web, site internet, portfolio">
    <meta name="twitter:image" content="images/slider/petite_fille_mascotte.jpg">
    <!-- Icone web agency, feuille css et lien font-awesome -->
    <link rel="shortcut icon" type="image/x-icon" href="webagency_images/images/icone.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="webagency_images/font-awesome/css/font-awesome.min.css">
    <title>WebAgency - L'agence de tous vos projets</title>
</head>

<body>
    <h1>
        hello world!
    </h1>

<?php

    include ("View/accueil.php");
    include ("View/article.php");
?>

<?php

$real= new CommentManager();

$vue =$real->readAll();

var_dump($vue);

?>

</body>
</html>