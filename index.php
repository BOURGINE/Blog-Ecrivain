<?php

require"Autoload/Autoloader.php";

use Autoload\Autoloader;
use BlogEcrivain\Model\Manager\CommentManager;
use BlogEcrivain\View\View;


Autoloader::register();


// voir les articles
$real= new CommentManager();

$vue =$real->readAll();



$voir= new View();
$voir->essayons("article");

?>
