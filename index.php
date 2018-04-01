<?php

require"Autoload/Autoloader.php";
use Autoload\Autoloader;
Autoloader::register();

use BlogEcrivain\View\View;

use BlogEcrivain\Model\Entity\Post;
use BlogEcrivain\Model\Entity\Comment;
use BlogEcrivain\Model\Entity\User;

use BlogEcrivain\Model\Manager\PostManager;
use BlogEcrivain\Model\Manager\CommentManager;
use BlogEcrivain\Model\Manager\UserManager;

use BlogEcrivain\Controller\CommentController;
use BlogEcrivain\Controller\UserController;
use BlogEcrivain\Controller\PostController;


// Ici c'est la déclaration de Class. C'est ce que je dois gérer avec un autloader
$post = new BlogEcrivain\Model\Entity\Post();
$controller = new BlogEcrivain\Controller\PostController();

$comment = new BlogEcrivain\Model\Entity\Comment();
$commentController = new BlogEcrivain\Controller\CommentController();

$user = new BlogEcrivain\Model\Entity\User();
$userController = new BlogEcrivain\Controller\UserController();


try {

    if (isset($_GET['action'])) // si une action est effectué par l'utilisateur
    {

        /**
         *
         * NAVIGATION SUR LA PAGE ACCUEIL
         * ($controller)
         *
         */


        if ($_GET['action'] == 'formConnexion')
        {
            $controller->formConnexion();
        }

        elseif ($_GET['action'] == 'biblio')
        {
            $controller->showbiblio();
        }

        elseif ($_GET['action'] == 'deconnexion')
        {
            session_destroy();
            header('Location: index.php');
        }


        elseif ($_GET['action'] == 'formInscription')
        {
            $controller->formInscription();
        }


        elseif ($_GET['action'] == 'accesAdmin')
        {

            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $controller->readAllAdmin();
            }
            else
            {
                header('Location: index.php');
                //  $controller->readLastPost();
            }
        }


        /**
         *
         * INSCRIPTION, CONNEXION ET GESTION DES USERS
         * ($userController)
         *
         **/




        elseif ($_GET['action'] == 'inscription')
        {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['confirmPass']) && ($_POST['pass']) === ($_POST['confirmPass']))
            {
                $userController->createUser($_POST);
            }
            else{
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Vous devez remplir les 3 champs et le mot de passe doit correspondre ');
            }
        }


        elseif ($_GET['action'] == 'connexion')
        {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
            {
                $userController->connexion($_POST);
            }
            else
            {
                throw new Exception('Vous devez remplir 2 champs');
            }
        }


        elseif ($_GET['action'] === 'deleteUser') // Si on appel la fonction get delete et qu'il y a un Id
        {
            $userController->deleteUser($_GET['id']); // Appelle la fonction delete en fonction de l'id reçu dans POST
        }


        elseif($_GET['action'] === 'form_createUserAdmin') // Si on appel la fonction get delete et qu'il y a un Id
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $userController->formcreateUserAdmin();
            }
            else
            {
                header('Location: index.php');
                //  $controller->readLastPost();
            }

        }


        /**
         *
         * GESTION DES ARTICLES (POST)
         * ($controller)
         */


        elseif ($_GET['action'] == 'formCreatePost')
        {
            $controller->formCreatePost();
        }


        elseif ($_GET['action'] == 'chapitres')
        {
            $controller->readAllPosts();
        }


        elseif ($_GET['action'] == 'createPost') // si cette action correspond à creatContact
        {
            if (!empty($_POST['title']) && !empty($_POST['content']))
            {
                $controller->createPost($_POST);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Une erreurs est survenue. Vous devez remplir tous les champs');
            }
        }

        elseif($_GET['action'] == 'readAllPosts')
        {
            $controller->readAllPosts();
        }

        elseif($_GET['action'] == 'readPost')
        {
            $controller->readPost($_GET['id']);
        }


        elseif($_GET['action'] === 'deletePost') // Si on appel la fonction get delete et qu'il y a un Id
        {
            $controller->deletePost($_GET['id']); // Appelle la fonction delete en fonction de l'id reçu dans POST
        }

        elseif($_GET['action'] == 'formUpdatePost') // Si on appel la fonction get delete et qu'il y a un Id
        {
            $controller->formUpdatePost($_GET['id']); // envoi moi le formulaire de mise à jour.
        }

        elseif($_GET['action'] == 'updatePost') // Si on appel la fonction get delete et qu'il y a un Id
        {
            $controller->updatePost(); // envoi la mise à jour de l'article à la base de donnée

        }

        /**
         *
         * GESTION DES COMMENTAIRES
         * ($commentController)
         *
         */

        elseif($_GET['action'] == 'createComment') // Si on appel la fonction get delete et qu'il y a un Id
        {
            if (!empty($_POST['author']) && !empty($_POST['text_comment']) && !empty($_POST['id_post']))
            {
                $commentController->createComment($_POST);
            }

            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception(' Vous devez entrez un pseudo et un commentaire.');
            }
        }

        elseif ($_GET['action'] == 'deleteComment')
        {
            $commentController->deleteComment($_GET['id']);
        }

        elseif ($_GET['action'] == 'signaler' Or 'moderer')
        {
            $commentController->signaler();
        }

        else {
            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('La page n\'existe pas');
        }

    }

    else {
        $controller->readLastPost();
    }
}

// Si ces chose ne marchent pas affiche des messages d'erreurs
catch
(Exception $e) { // S'il y a eu une erreur, alors...
    echo $e->getMessage();
}





/**
// voir les articles
$real= new CommentManager();
$vue =$real->readAll();

// ces deux lignes appellent la vue - A partir de chaque controller
$view= new View();
$view->showPage("article", $data);

// vue est en faite le résultat de mon readAll

**/
?>
