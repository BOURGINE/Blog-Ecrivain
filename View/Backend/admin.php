<?php $title = 'Administration'; ?>

    <!--**********************************************
                        LOGO & Titre du livre
    **************************************************-->
<?php
include("../BlogEcrivain/View/Frontend/logo.php");
?>

    <!--**********************************************
                         MENU
     **************************************************-->
<?php
include("../BlogEcrivain/View/Frontend/menu.php");
?>



    <!-- ************************************************************************************
               Il devrait afficher toutes les entités:Post - les commentaires - les users
    ****************************************************************************************-->
<div>
<h1> BACK-OFFICE </h1>

    <!-- ****************************************
                 1- les articles
    ******************************************-->
    <div class="section_articles">

        <div class="titre_section_back">
            <h3> Gestion des Articles </h3>
        </div>

        <div class="corp_session_back">
        <!-- Billets -->
            <?php if(empty($data[0])):?>
                <p> il n'y a aucun contact</p>
            <?php else:?>

            <?php if($data[0] === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>
                <table>
                    <tr>
                        <th > Date & heure </th>
                        <th> Titre  </th>
                        <th colspan="3"> ACTIONS </th>
                    </tr>

                    <?php foreach ($data[0] as $post):?>
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

    </div>


    <!-- ****************************************
                2- Les Commentaires
       ******************************************-->
    <div class="section_articles" id="Commentaires">
        <div class="titre_section_back">
            <h3> Gestion des commentaires</h3>
        </div>

        <nav id="nav2">
            <ul>
                <li>
                    <a href="index.php?action=ReadCat&Stat=signale#Commentaires"> <button> Signalés </button></a>
                </li>

                <li>
                    <a href="index.php?action=ReadCat&Stat=modere#Commentaires"> <button> Modérés </button></a>
                </li>

                <li>
                    <a href="index.php?action=ReadCat&Stat=neutre#Commentaires"> <button> Neutres </button> </a>
                </li>

            </ul>
        </nav>

        <div class="corp_session_back">
        <?php if(empty($data[1])):?>
            <p> il n'y a aucun contact</p>

        <?php else:?>
            <?php if($data[1] === false):?>
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

                    <?php foreach ($data[1] as $comment):?>
                        <tr>
                            <td> <?= $comment->getAuthor();?>  </td>
                            <td> <?= $comment->getDate();?> </td>
                            <td>  <?= $comment->getTextComment();?></td>
                            <td>  <?= $comment->getStatComment();?></td>
                            <td> <a href="index.php?action=deleteComment&id=<?= $comment->getId();?>"> SUPPRIMER</a> </td>

                            <td id="moderé_vert">
                                <form  action="index.php?action=moderer" method="POST">
                                <input type="hidden" name="id" value="<?=$comment->getId()?>">
                                <input type="hidden" name="stat_comment" value="modere"/>
                                <input  id="button" type="submit" value="MODERER" />
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>

        </div>
    </div>


    <!-- ****************************************
            3 - les utilisateurs
     ******************************************-->
    <div class="section_articles">
        <div class="titre_section_back">
            <h3> Gestion des utilisateurs </h3>
        </div>

        <div class="corp_session_back">
        <!-- Billets -->
        <?php if(empty($data[2])):?>
            <p> il n'y a aucun membre</p>
        <?php else:?>

            <?php if($data[2] === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>

                <table>
                    <tr>
                        <th> Role </th>
                        <th> Pseudo</th>
                        <th> ACTIONS </th>
                    </tr>

                    <?php foreach ($data[2] as $user):?>
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
</div>
