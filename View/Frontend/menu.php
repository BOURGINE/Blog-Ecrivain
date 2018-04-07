
<?php

if(isset($_SESSION['role']) && $_SESSION['role']=='1')
{
    $info3= '<a href="index.php?action=accesAdmin" style="color: red"> Administration</a>';

}else{
    $info3= "";
}
?>

<!--**********************************************
                    MENU
**************************************************-->

<nav id="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=biblio">Biographie</a></li>
            <li><a href="index.php?action=chapitres&p=">Chapitres</a></li>
            <li>  <?= $info3 ?> </li>
        </ul>
    </nav>