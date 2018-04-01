<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 11/03/2018
 * Time: 13:31
 */

namespace BlogEcrivain\Model\Manager;

// Je definis l'emplacement des classe je vais utiliser

use BlogEcrivain\Model\Entity\Comment;

class CommentManager extends Connex_Db
{
    private $pdoStatement;

    /**
     * Création des commentaires
     **/


    public function create(Comment &$comment)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO comment VALUES(NULL, :id_post, :author, :text_comment, now(), :stat_comment)');

        //liaison des paramettres : Liaison des name du formulaire aux champs de la table post
        $this->pdoStatement->bindValue(':id_post', $comment->getIdPost(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':text_comment', $comment->getTextComment(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':stat_comment', $comment->getStatComment(), PDO::PARAM_STR);

        //Exécution de la req
        $executeIsOk = $this->pdoStatement->execute();


        //Recupération du résultat
        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée
            return false;

        }
        else
            {
            //Ajoute l'élement en mettant à jour d'id.
            $id = $this->pdo->lastInsertId();
            $comment = $this->read($id);
            return true;
        }
    }

    public function read($id)
    {
        //préparation de la req
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM post WHERE id=:id');

        // liaison de la req
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //exécution de la req
        $executeIsOk = $this->pdoStatement->execute();


        if($executeIsOk)
        {

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $post= $this->pdoStatement->fetchObject('BlogEcrivain\Model\Entity\Post');

            if($post === false)
            {
                return null;
            }
            else
            {
                return $post;
            }
        }
        else
        {
            return false;
        }
    }


    public function readSignal($id)
    {
        //préparation de la req
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM comment WHERE id=:id');

        // liaison de la req
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_STR);

        //exécution de la req
        $executeIsOk = $this->pdoStatement->execute();

        if($executeIsOk)
        {

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $comment= $this->pdoStatement->fetchObject('BlogEcrivain\Model\Entity\Comment');

            if($comment === false)
            {
                return null;
            }
            else
            {
                return $comment;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     *
     **/

    public function readAllByID($reception)
    {
        //préparation de la req
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM comment WHERE id_post=:id_post');

        // liaison de la req
        $this->pdoStatement->bindValue(':id_post', $reception, PDO::PARAM_INT);

        //exécution de la req
        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            //1- initialisation du tableau vide
            $comments=[];

            // 2-On ajoute au table chaque ligne.
            while($comment=$this->pdoStatement->fetchObject('BlogEcrivain\Model\Entity\Comment'))
            {
                $comments[]=$comment;
            }

            //3- On retourne le table finalisé.
            return $comments;
        }

        else
        {
            return false;
        }
    }


    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM comment ORDER BY date_comment DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $comments=[];

        // 2-On ajoute au table chaque ligne.
        while($comment=$this->pdoStatement->fetchObject('BlogEcrivain\Model\Entity\Comment'))
        {
            $comments[]=$comment;
        }

        //3- On retourne le table finalisé.
        return $comments;
    }




    /**
     * Cette fonction permettra seulement accessible à l'utilisateur
     * Elle lui permettra de modifier le contenu de son commentaire.
     * La base de données quand a elle, modifiera la date de création du commentaire
     **/

    private function update(Comment $comment)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE comment set text_comment=:text_comment,
 now() WHERE id=:id');
        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd

        $this->pdoStatement->bindValue(':text_comment', $comment->getTextComment(), PDO::PARAM_STR);

        //execution de la requette
        $executeIsOk= $this->pdoStatement->execute();

        //recuperation du résultat
        return $executeIsOk;
    }


    public function updateSignal(Comment $comment)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE comment set stat_comment=:stat_comment WHERE id=:id');
        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd

        $this->pdoStatement->bindValue(':stat_comment', $comment->getStatComment(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $comment->getId(), PDO::PARAM_STR);

        //execution de la requette
        $executeIsOk= $this->pdoStatement->execute();

        //recuperation du résultat
        return $executeIsOk;
    }



    /**
     *
     **/

    public function delete($id)
    {
        //preparation de la req
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM comment WHERE id=:id');

        //liaison des paramettres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        // execution de la req
        $executionIsOk = $this->pdoStatement->execute();

        //recupération du résultat.
        return $executionIsOk;
    }

    /**
    La fonction public save est un rAssemblement des fonctions create et de la fonction update.
     * Elle crée un objet contact lorsque qu'il n'y a pas d'id.
     * sinon, elle fait appel à la fonction UPDATE
     */

    public function save(Comment &$comment)
    {
        if (is_null($comment->getId())){
            return $this->create($comment);
        }
        else{
            return $this->update($comment);
        }
    }

}