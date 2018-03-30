<?php

require"Autoload/Autoloader.php";

use Autoload\Autoloader;
use BlogEcrivain\Model\Manager\CommentManager;
use BlogEcrivain\View\View;

Autoloader::register();


// routeur

// voir les articles
$real= new CommentManager();
$data =$real->readAll();

// ces deux lignes appellent la vue - A partir de chaque controller
$voir= new View();
$voir->essayons("article", $data);

// vue est en faite le résultat de mon readAll

?>
