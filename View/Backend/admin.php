<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

    <!--**********************************************
                        LOGO & Titre du livre
    **************************************************-->
<?php
include("../Projet4/View/Frontend/logo.php");
?>

    <!--**********************************************
                         MENU
     **************************************************-->
<?php
include("../Projet4/View/Frontend/Menu.php");
?>



    <!-- ************************************************************************************
               Il devrait afficher toutes les entités:Post - les commentaires - les users
    ****************************************************************************************-->
<div>
<h1> Administration </h1>

    <!-- ****************************************
                 1- les articles
    ******************************************-->
    <div class="section_articles">
        <h3>Liste des articles déjà publiés</h3>
        <!-- Billets -->
        <?php if(empty($posts)):?>
            <p> il n'y a aucun contact</p>
        <?php else:?>

            <?php if($posts === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>
                <table>
                    <tr>
                        <th > Date & heure </th>
                        <th> Titre  </th>
                        <th colspan="3"> ACTIONS </th>

                    </tr>

                    <?php foreach ($posts as $post):?>
                    <tr>
                        <td> <?= $post->getDate();?> </td>
                        <td> <?= $post->getTitle();?> </td>
                        <td> <a href="index.php?action=readPost&id=<?= $post->getId();?>"> AFFICHER</a>  </td>
                        <td> <a href="index.php?action=formUpdatePost&id=<?= $post->getId();?>"> MODIFIER</a>  </td>
                        <td> <a href="index.php?action=deletePost&id=<?= $post->getId();?>"> SUPPRIMER</a> </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
        <h4> <a href="index.php?action=formCreatePost" style="color: darkred"> Créer un nouvel article </a></h4>
    </div>


    <!-- ****************************************
                2- Les Commentaires
       ******************************************-->
    <div class="section_articles">
        <h3>Liste des commentaires</h3>

        <?php if(empty($comments)):?>
            <p> il n'y a aucun contact</p>

        <?php else:?>
            <?php if($comments === false):?>
                <p> Une erreur vient de se produire</p>

            <?php else:?>

                <table>
                    <tr>
                        <th> Auteur (pseudo) </th>
                        <th> Date & Heures</th>
                        <th> Commentaire </th>
                        <th> Statut </th>
                        <th colspan="2"> Action </th>
                    </tr>

                    <?php foreach ($comments as $comment):?>
                        <tr>
                            <td> <?= $comment->getAuthor();?>  </td>
                            <td> <?= $comment->getDate();?> </td>
                            <td>  <?= $comment->getTextComment();?></td>
                            <td>  <?= $comment->getStatComment();?></td>
                            <td> <a href="index.php?action=deleteComment&id=<?= $comment->getId();?>"> SUPPRIMER</a> </td>

                            <td id="moderé_vert">
                                <form  action="index.php?action=moderer" method="POST">
                                <input type="hidden" name="id" value="<?=$comment->getId()?>">
                                <input type="hidden" name="stat_comment" value="MODERÉ"/>
                                <input  id="button" type="submit" value="MODERER" />
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
    </div>


    <!-- ****************************************
            3 - les utilisateurs
     ******************************************-->

    <div class="section_articles">
        <h3>Liste utilisateurs</h3>
        <!-- Billets -->
        <?php if(empty($users)):?>
            <p> il n'y a aucun membre</p>
        <?php else:?>

            <?php if($users === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>

                <table>
                    <tr>
                        <th> Role </th>
                        <th> Pseudo</th>
                        <th> ACTIONS </th>
                    </tr>

                    <?php foreach ($users as $user):?>
                        <tr>
                            <td> <?= $user->getRole();?>  </td>
                            <td> <?= $user->getPseudo();?></td>
                            <td> <a href="index.php?action=deleteUser&id=<?= $user->getId();?>"> SUPPRIMER</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
        <h4> <a href="index.php?action=form_createUserAdmin" style="color: darkred"> Créer un nouveau Compte </a></h4>
    </div>


</div>


<?php $content = ob_get_clean(); ?>

<?php require('../Projet4/View/Frontend/template.php'); ?>