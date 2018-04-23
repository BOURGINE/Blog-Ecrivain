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
                    <h1> JEAN FORTEROCHE  </h1>
                </div>
            </div>

            <figure class="imgBillets">
                <img src="public/img/jf.jpg" alt="jean forteroche"/>
            </figure>
            <br/> <br/>
            <p> Jean Forteroche est un écrivain et dramaturge français, né le 23 juin 1970 à
Bordeaux (Gironde). Son œuvre théâtrale commencée en 1992 est particulièrement abondante et variée : elle est constituée de nombreuses comédies souvent grinçantes et d'œuvres à la tonalité dramatique ou tragique comme sa pièce la plus célèbre, Antigone, réécriture moderne de la pièce de Sophocle.  <br/><br/>
Forteroche a lui-même organisé ses œuvres en séries thématiques, faisant alterner d'abord Pièces roses et Pièces noires. Les premières sont des comédies marquées par la fantaisie comme Le Bal des voleurs (1988) alors que les secondes montrent dans la gravité l'affrontement des « héros » entourés de gens ordinaires en prenant souvent appui sur des mythes comme Eurydice (1991), Antigone (1994) ou Médée (1996). <br/><br/>
Plus récemment son dernier ouvrage "Billet pour l'Alaska" est très attendu par le grand public et de la presse. Il a rédigé son premier roman LES NAUFRAGES lors d'un voyage en mer. Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.<br/><br/>
En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt.
Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès.  <br/> <br/>
Afin de partager avec son public son nouveau roman, il a décidé de publiér chaque chapitre au fure et à mesure sur ce blog.
            </p>
        </div>


<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>