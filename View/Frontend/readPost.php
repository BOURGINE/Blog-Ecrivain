<?php $title = 'Articles'; ?>

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

    <!--Derniers acticles-->
    <div id="station_lecture">

    <!-- Titre -->
     <div>
        <div class="titre1">
            <div class="titre2">
                <h1> <?= $post->getTitle();?> - <?= $post->getDate();?>  </h1>
            </div>
        </div>

        <figure class="imgBillets">
            <img src="../Projet4/Public/imgUpload/<?= $post->getImg();?>"/>
        </figure>

        <p> <?= $post->getContent();?> </p>
    </div>



    <!-- Ici, je dois afficher les commentaires liés à chaque billet -->

        <div>
            <?php if(empty($comments)):?>
                <p class="sectioncomment"> il n'y a aucun commentaire</p>
            <?php else:?>

                <?php if($comments === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <?php foreach ($comments as $comment):?>
                            <!-- Corps de chaque commentaire -->
                    <div class="sectioncomment">

                        <h3> <?= $comment->getAuthor();?> </h3>

                        <h4> <?= $comment->getDate();?> </h4>
                        <p> <?= $comment->getTextComment();?>
                        </p>

                        <!-- -->
                        <form  action="index.php?action=signaler" method="POST">
                            <input type="hidden" name="id" value="<?=$comment->getId()?>">
                            <input type="hidden" name="stat_comment" value="SIGNALÉ" id="signalé_rouge"/>
                            <input  id="button" type="submit" value="SIGNALER" />
                        </form>

                    </div>

                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>
        </div>


        <div>

        <?php if(empty($message)):?>
            <p> </p>
        <?php else:?>
            <p> <?= $message;?> </p>
        <?php endif;?>
        </div>


        <div id="session_form_createComment">  <!-- Ici, je dois afficher le formulaire de création de commentaire-->

            <form  action="index.php?action=createComment" method="POST" id="form_createComment"  >
                <h2> Ajouter un commentaire</h2>

                <input type="hidden" name="id_post" value="<?=$post->getId()?>"/>

                <?php if(isset($_SESSION['pseudo'])):?>

                <h2>Auteur: <?=$_SESSION['pseudo'] ?></h2>
                <input type="hidden" name="author" id="pseudo" value="<?=$_SESSION['pseudo'] ?>"/>

                <?php else:?>
                <label for="pseudo"> Votre pseudo: </label>
                <input type="text" name="author" id="pseudo"/>
                <?php endif;?>

                <br/> <br/>

                <label for="pass"> Commentaire :</label>
                <textarea name="text_comment" form="form_createComment" cols="50" rows="10"> </textarea>

                <input type="hidden" name="stat_comment" value="AUTOMATIQUE"/>

                <br/> <br/>

                <input  id="button" type="submit" value="Publier" />
            </form>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>