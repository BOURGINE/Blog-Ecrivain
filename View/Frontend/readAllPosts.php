<?php

$title = 'read All posts'; ?>

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

<section id="application">

    <!--Derniers acticles-->
    <div id="session_all_post">

        <!-- Titre -->
        <div class="titre1" style="border: 2px red solid;">
            <div class="titre2">
                <h1> CHAPITRES </h1>
            </div>
        </div>


        <!-- Billets -->
        <div id="section_billets">
            <?php if(empty($posts)):?>
             <p> il n'y a aucun contact</p>

            <?php else:?>
                <?php if($posts === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>

                    <?php foreach ($posts as $post):?>
                        <div class="billets">

                            <figure class="imgBillets">
                                <img src="../Projet4/Public/imgUpload/<?= $post->getImg();?>"/>
                            </figure>

                            <!-- Corps billet -->
                            <div class="corpsBillets">
                                <h2> <?= $post->getTitle();?> </h2>
                                <h3>  <?= $post->getDate();?> </h3>
                                <p> <?= $post->getExtrait();?> </p>
                            </div>

                            <!-- Footer billet -->
                            <div class="footerBillets">

                                <div> <a href="index.php?action=readPost&id=<?=$post->getId()?>"> LIRE PLUS... </a> </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>
        </div> <!-- fin section billet -->

    </div> <!-- Fin Station -->

</section> <!--FIn application-->