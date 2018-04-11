<?php $title = 'Articles'; ?>

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
                    <h1> <?= $data[0]->getTitle();?> - <?= $data[0]->getDate();?>  </h1>
                </div>
            </div>

            <figure class="imgBillets">
                <img src="../BlogEcrivain/Public/imgUpload/<?= $data[0]->getImg();?>"/>
            </figure>

            <p> <?= $data[0]->getContent();?> </p>
        </div>

    <!-- Ici, je dois afficher les commentaires liés à chaque billet -->

        <div>
            <?php if(empty($data[1])):?>
                <p class="sectioncomment"> il n'y a aucun commentaire</p>
            <?php else:?>

                <?php if($data[1] === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <?php foreach ($data[1] as $comment):?>
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

        <!-- Ici, je dois afficher le formulaire de création de commentaire-->

        <div id="session_form_createComment">

            <form  action="index.php?action=createComment" method="POST" id="form_createComment"  >
                <h2> Ajouter un commentaire</h2>

                <input type="hidden" name="id_post" value="<?=$data[0]->getId()?>"/>

                <?php if(isset($_SESSION['pseudo'])):?>

                <h2 style="color: white">Auteur: <?=$_SESSION['pseudo'] ?></h2>
                <input type="hidden" name="author" id="pseudo" value="<?=$_SESSION['pseudo'] ?>"/>

                <?php else:?>
                <label for="author"> Votre pseudo: </label>
                <input type="text" name="author" id="author"/>
                <?php endif;?>

                <br/> <br/>

                <label for="text_comment">Commentaire:</label>
                <textarea name="text_comment" form="form_createComment" cols="50" rows="10"></textarea>

                <input type="hidden" name="stat_comment" value="NEUTRE"/>

                <br/> <br/>

                <input  id="button" type="submit" value="Publier" />
            </form>
        </div>

    </div>
