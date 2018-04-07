
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
            <img src="public/img/jf.jpg"/>
        </figure>

        <p>
            Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.
            Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.
            <a href="index.php?action=biblio" > Lire plus... </a>
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
                                <img src="../BlogEcrivain/Public/imgUpload/<?= $post->getImg();?>"/>
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

            <div id="voir_plus">
                <a href="index.php?action=chapitres&p=">
                    <button id="voir_plus_button"> VOIR PLUS DE CHAPITRES</button>
                </a>
            </div>
        </div> <!-- fin section billet -->

    </div> <!-- Fin Station -->
</section> <!--FIn application-->