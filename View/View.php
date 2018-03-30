<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 30/03/2018
 * Time: 15:21
 */
namespace BlogEcrivain\View;

class View
{

    function essayons($page, $data)
    {

     // EN RESUMER: Ce que je fais c'est apeller une page avec des données;
        //d'insérer les données dans cette page
        // retrourner ce couple au template

        //1- Insertion des données dans ob_start
        ob_start();

            extract($data);

            include "View/$page.php";
$content=ob_get_clean();


   //     var_dump($data);

        //3- Appelle template
        include ("View/template.php");
    }

}