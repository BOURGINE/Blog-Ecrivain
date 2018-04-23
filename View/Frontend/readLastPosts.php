
<?php $title = 'read last posts'; ?>

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

<!--**********************************************
            Slideshow, slider et bouttons-fleches
**************************************************-->
<?php
include("slides.php");

?>
<!-- ****************************************
            BIBLIO et DERNIERS CHAPITRES
******************************************-->


<section id="application">

    <!--Présentation de l'auteur-->
    <div id="biblio">

        <div class="titre1">
            <div class="titre2">
                <h1> JEAN FORTEROCHE  </h1>
            </div>
        </div>

        <figure id="photo_auteur">
            <img src="public/img/jf.jpg" alt="jean forteroche"/>
        </figure>

        <br/>
        <p>
            Jean Forteroche est un écrivain et dramaturge français, né le 23 juin 1970 à 
Bordeaux (Gironde). Son œuvre théâtrale commencée en 1992 est particulièrement abondante et variée : elle est constituée de nombreuses comédies souvent grinçantes et d'œuvres à la tonalité dramatique ou tragique comme sa pièce la plus célèbre, Antigone, réécriture moderne de la pièce de Sophocle.  <br/><br/>
Forteroche a lui-même organisé ses œuvres en séries thématiques, faisant alterner d'abord Pièces roses et Pièces noires. Les premières sont des comédies marquées par la fantaisie comme Le Bal des voleurs (1988) alors que les secondes montrent dans la gravité l'affrontement des « héros » entourés de gens ordinaires en prenant souvent appui sur des mythes comme Eurydice (1991), Antigone (1994) ou Médée (1996). <br/><br/>
Plus récemment son dernier ouvrage "Billet pour l'Alaska" est très attendu par le grand public et de la presse. Il a rédigé son premier roman LES NAUFRAGES lors d'un voyage en mer. Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.<br/><br/>
En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt.
Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès. <a href="index.php?action=biblio" > Lire plus... </a>
        </p>

    </div>

    <!--Derniers acticles-->
    <div id="station">

        <!-- Titre -->
        <div class="titre1">
            <div class="titre2">
                <h1>DERNIERS ARTICLES </h1>
            </div>
        </div>


        <!-- Billets -->
        <div id="section_billets">
            <?php if(empty($data)):?>
             <p> il n'y a aucun article </p>

            <?php else:?>
                <?php if($data === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>

                    <?php foreach ($data as $post):?>
                        <div class="billets">

                            <figure class="imgBillets">
                                <img src="Public/imgUpload/<?= $post->getImg();?>" alt="jean forteroche"/>
                            </figure>

                            <!-- Corps billet -->
                            <div class="corpsBillets">
                                <h2> <?= $post->getTitle();?> </h2>
                                <h3>  <?= $post->getDate();?> </h3>
                                <p> <?= $post->getExtrait();?> </p>
                            </div>

                            <!-- Footer billet -->
                            <div class="footerBillets">

                                <div> <a href="index.php?action=readPost&id=<?=$post->getId()?>" class="lire"> LIRE PLUS... </a> </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>
           
        </div> <!-- fin section billet -->
    </div> <!-- Fin Station -->

    <div style="width: 100%; height: 20px;">
        <a href="index.php?action=chapitres&p=">
            <p style="text-align: right;"> Voir plus d'articles </p>
        </a>
    </div>

</section> <!--FIn application-->