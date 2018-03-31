<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 22/03/2018
 * Time: 10:17
 */

namespace BlogEcrivain\Controller;

use BlogEcrivain\Model\Entity\User;
use BlogEcrivain\Model\Manager\UserManager;

/**
require_once '../Projet4/Entity/User.php';
require_once '../Projet4/Manager/UserManager.php';
**/

class UserController extends PostController
{


    // c'est l'inscription
    public function createUser($contenu)
    {
        // Les vérifications on été faites on auniveau du routeur avant d'appeler ma fonction.
        // Je hache ensuite le mot de passe.

        $pass_hache = password_hash($contenu['pass'], PASSWORD_DEFAULT);

        $user = new user();
        $user->setPseudo($contenu['pseudo']); // Regarder la vidéo sur les méthodes chainées
        $user->setPass($pass_hache);
        $user->setConfirmPass($pass_hache);
        $user->setRole($contenu['role']);

        //envoi des informations à la db via la fonction save du manager
        $userManager = new UserManager;
        $saveIsOk = $userManager->save($user);

        if($saveIsOk){
            $message = 'Votre Compte à été bien créée ';

        } else{
            $message = 'Votre compte n\'a pas pu être créé. Une erreur est arrivée;';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    public function formcreateUserAdmin(){
        include(__DIR__ . "/../View/Backend/form_createUserAdmin.php");
    }


    public function connexion($infoConnexion)
    {
        //Je vais instancier le userManager pour appeller le usermanager
        $userManager = new UserManager();

        $userManager->verifConnexion($infoConnexion);
        //Le user Manager aura une fonction de vérification entre les données du formulaires et les données et de la db

        if(isset($_SESSION['role']) && $_SESSION['role']=='2'){
            $this->readLastPost();
        }
        elseif(isset($_SESSION['role']) && $_SESSION['role']=='1')
        {
            $this->readAllAdmin();
        }else {
            $this->formConnexion();
        }
    }


    public function updateUser()
    {
        $userManager = new UserManager();
        $user= $userManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact

        $user->setTitle($_POST['title']);
        $user->setImg($_POST['img']);
        $user->setContent($_POST['content']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $userManager->save($user);

        if($saveIsOk){
            $message = 'Félicitation, votre contact a été bien modifiée';
        }else{
            $message = 'Alerte, une erreur est survenue';
        };

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/Admin.php");
    }

    public function deleteUser($recupUser)
    {
        $userManager = new UserManager();

        $deleteIsOk = $userManager->delete($recupUser);

        if($deleteIsOk){
            $message = 'L\'utilisateur a été bien supprimée';
        }else
        {
            $message = 'Une erreur est arrivée';
        }

        include(__DIR__ . "/../View/Backend/Admin.php");
    }

    public function readUser($reception)
    {
        // On instancie la classe ContactManager et on appelle la méthode readAll
        $userManager = new UserManager();

        $user= $userManager->read($reception);
        // Je pouvais faite des traitements conditionnels ici mais je l'ai fait dans la vue

        include(__DIR__ . "/../View/Frontend/readPost.php");
    }
}