<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 22/03/2018
 * Time: 10:17
 */

namespace BlogEcrivain\Controller;

use BlogEcrivain\Controller\PostController;
use BlogEcrivain\Model\Entity\Comment;
use BlogEcrivain\Model\Manager\CommentManager;


/**

require_once '../Projet4/Entity/Post.php';
require_once '../Projet4/Manager/PostManager.php';

require_once '../Projet4/Entity/Comment.php';
require_once '../Projet4/Manager/CommentManager.php';

require_once '../Projet4/Entity/User.php';
require_once '../Projet4/Manager/UserManager.php';
**/

// On indique les espace de nom des classes utilisées.


class CommentController extends PostController
{

    public function createComment($newComment) // $contenu 7 le tablo du donnée $_POST du formulaire
    {
        // 1 - GESTION ET ENVOI DES INFOS DANS LA BDD;
        $comment = new Comment();

        $comment->setAuthor($newComment['author']); // Regarder la vidéo sur les méthodes chainées
        $comment->setIdPost($newComment['id_post']);
        $comment->setTextComment($newComment['text_comment']);
        $comment->setStatComment($newComment['stat_comment']);

        $commentManager = new CommentManager;

        $saveIsOk = $commentManager->save($comment);


        if($saveIsOk){
            $message = 'Votre commentaire a été bien ajouté à la base de données';

        } else{
            $message = 'votre commentaire na pas pu être ajouté à la base de données';
        }
        //2- Redonne-moi la page readAll en mettant à jours les post et les commentaire
        $this->readPost($newComment['id_post']);
    }


    public function deleteComment($recupComment)
    {
        $commentManager = new CommentManager();

        $deleteIsOk = $commentManager->delete($recupComment);

        if($deleteIsOk){
            $message = 'Le Commentaire a été bien supprimé';
        }else
        {
            $message = 'Une erreur est arrivée';
        }

        //NB: Ici je dois dire, redonne moi la page connexion
        //si la session stockage pseudo et la session stockage pass sont égal à admin.

        include(__DIR__ . "/../View/Backend/messageAdmin.php"); // Faire en sorte qu'il revienne à administration sans passer
        // Par le connexion.
    }

    public function signaler()
    {
        $commentManager = new CommentManager();
        $comment= $commentManager->readSignal($_POST['id']);

        $comment->setStatComment($_POST['stat_comment']);
        $comment->setIdPost($_POST['id']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $commentManager->updateSignal($comment);

        if($saveIsOk)
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='2'){
                $message = 'Félicitation Commentaire signalé';

                include(__DIR__ . "/../View/Frontend/messageUser.php");
            }
            elseif(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $message = 'Félicitation Commentaire modéré';

                include(__DIR__ . "/../View/Backend/messageAdmin.php");

            }else {
                $message = 'Félicitation Commentaire signalé';
                include(__DIR__ . "/../View/Frontend/messageUser.php");
            }
        }

        else
        {
            echo 'Alerte, une erreur est survenue au niveau de signaler (controller)';
        }

    }

}