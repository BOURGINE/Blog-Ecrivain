
<?php

if(isset($_SESSION['role']) && $_SESSION['role']=='1')
{
    $info3= '<a href="index.php?action=accesAdmin" style="color: red">  ESPACE ADMIN</a>';

}else{
    $info3= "";
}
?>

<!--**********************************************
                    MENU
**************************************************-->

<nav id="menu">
        <ul>
            <li><a href="../Projet4/index.php">Accueil</a></li>
            <li><a href="../Projet4/index.php?action=biblio">Biographie</a></li>
            <li><a href="../Projet4/index.php?action=chapitres">Chapitres</a></li>
            <li>  <?= $info3 ?> </li>
        </ul>
    </nav>