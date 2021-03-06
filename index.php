<?php
session_start();

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

    if(isset($_GET['action'])) // si une action est effectué par l'utilisateur
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
            header('Location: index.php');
            session_destroy();
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

        elseif ($_GET['action'] == 'ReadCat')
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $controller->BackReadCat($_GET['Stat']);
            }
            else
            {
                header('Location: index.php');
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


        elseif ($_GET['action'] === 'deleteUser') // Si on appel la fonction get delete
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $userController->deleteUser($_GET['id']);
            }
            else // je raccompagne l'imposteur à la porte.
            {
                header('Location: index.php');
            }
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
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $controller->formCreatePost();
            }
            else
            {
                header('Location: index.php');
                //  $controller->readLastPost();
            }
        }


        elseif ($_GET['action'] == 'chapitres')
        {
           $controller->readAllPostsByPage();
        }


        elseif ($_GET['action'] == 'createPost')
        {
            if (isset($_SESSION['role']) && $_SESSION['role']=='1' && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['img']['name']))
            {
                $controller->createPost($_POST);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Une erreurs est survenue. Vous devez remplir tous les champs et choisir une image');
            }
        }

        elseif($_GET['action'] == 'readAllPosts')
        {
            $controller->readAllPosts();
        }

        elseif($_GET['action'] == 'readPost')
        {
            if(is_numeric($_GET['id']) && isset($_GET['id']))
            {
               $controller->readPost($_GET['id']);
            }
            else
            {
                throw new Exception('Cet id n\'est pas admis');
            }
        }


        elseif($_GET['action'] === 'deletePost') // Si on appel la fonction get delete et qu'il y a un Id
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $controller->deletePost($_GET['id']);
            }
            else
            {
                header('Location: index.php');
                //  $controller->readLastPost();
            }


        }

        elseif($_GET['action'] == 'formUpdatePost') // Si on appel la fonction get delete et qu'il y a un Id
        {
            if(isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $controller->formUpdatePost($_GET['id']);
            }
            else
            {
                header('Location: index.php');
                //  $controller->readLastPost();

            }
        }

        elseif($_GET['action'] == 'updatePost') // Si on appel la fonction get delete et qu'il y a un Id
        {

            if (isset($_SESSION['role']) && $_SESSION['role']=='1' && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['img']['name']))
            {
                $controller->updatePost(); // envoi la mise à jour de l'article à la base de donnée
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Une erreurs est survenue. Vous devez remplir tous les champs et choisir une image');
            }
        }

        /**
         *
         * GESTION DES COMMENTAIRES
         * ($commentController)
         *
         */

        elseif($_GET['action'] == 'createComment') //
        {
            if (!empty($_POST['author']) && !empty($_POST['text_comment']) && ($_POST['text_comment'])!==" ")
            {
                $commentController->createComment($_POST);
            }

            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception(' Vous devez entrez un pseudo et un commentaire.');
            }
        }

        elseif ($_GET['action'] == 'deleteComment')
        {
            if (isset($_SESSION['role']) && $_SESSION['role']=='1')
            {
                $commentController->deleteComment($_GET['id']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Vous ne disposez pas de droit de suppression de commentaire');
            }

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

    else
    {
        $controller->readLastPost();
    }
}

// Si ces chose ne marchent pas affiche des messages d'erreurs
catch
(Exception $e)
{ // S'il y a eu une erreur, alors...
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


