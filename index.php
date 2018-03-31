<?php

require"Autoload/Autoloader.php";

use Autoload\Autoloader;
use BlogEcrivain\Model\Manager\CommentManager;
use BlogEcrivain\View\View;

Autoloader::register();

// Routeur


// voir les articles
$real= new CommentManager();
$data =$real->readAll();

// ces deux lignes appellent la vue - A partir de chaque controller
$view= new View();
$view->essayons("article", $data);

// vue est en faite le résultat de mon readAll


?>
