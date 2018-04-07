<?php $title = 'read All posts'; ?>

<?php ob_start();


// GESTION DE PAGINATION

$pagination='';


if($this->last_page != 1)
{
    if($this->num_page > 1)
    {
        $previous = $this->num_page-1;
        $pagination = '<a href="index.php?action=chapitres&p='.$previous.'"> Précédent</a> &nbsp; &nbsp;';

        for ($i = $this->num_page - $this->num_max_before_after; $i<$this->num_page; $i++){
            if($i>0)
            {
                $pagination .='<a href="index.php?action=chapitres&p='.$i.'">'.$i.'</a> &nbsp;';
            }
        }

    }

    $pagination .='<span class="active">'.$this->num_page.'</span> &nbsp;';

    for ($i = $this->num_page +1; $i <= $this->last_page ; $i++){

        $pagination .='<a href="index.php?action=chapitres&p='.$i.'">'.$i.'</a>';

        if($i >= $this->num_page + $this->num_max_before_after)
        {
            break;
        }
    }

    // Si je ne suis pas sur la dernière page,
    if($this->num_page!= $this->last_page)
    {
        $next = $this->num_page + 1;
        $pagination .='<a href="index.php?action=chapitres&p='.$next.'"> Suivant </a>';
    }
}



?>


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
        <div class="titre1">
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
        </div> <!-- fin section billet -->

    </div> <!-- Fin Station -->

    <?php echo '<div id="pagination">'.$pagination.'</div>'?>

</section> <!--FIn application-->


<?php $content = ob_get_clean(); ?>

<?php require('../BlogEcrivain/View/template.php'); ?>