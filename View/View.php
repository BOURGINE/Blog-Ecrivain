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

    function essayons($page)
    {
        ob_start();

        include "View/$page.php";


        $content=ob_get_clean();
        include ("View/template.php");
    }

}