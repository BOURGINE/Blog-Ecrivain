<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 04/03/2018
 * Time: 22:44
 */

namespace BlogEcrivain\Model\Entity;


class Comment
{
    private $id;
    private $id_post;
    private $author;
    private $text_comment;
    private $date_comment;
    private $stat_comment;


    /**
     * @return mixed
     * NB: Jamais de setter pour l'Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdPost()
    {
        return $this->id_post;
    }

    /**
     * @param mixed $id_post
     */
    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {

        if(!isset($author) && !is_string($this->author)){
            echo 'la fonction getTitle a du mal a récupérer le titre';
        }
        return (string) htmlspecialchars($this->author);
    }

    /**
     * @param mixed $auteur
     * @return $this
     */

    public function setAuthor($author)
    {
        if(!isset($author) && !is_string($author))
        {
            echo'le titre n\'est pas bien définie';
        }else{
            $this->author = htmlspecialchars($author);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextComment()
    {
        if (!is_string($this->text_comment)){
            echo 'Problème avec le getTextContent ';
        }
        return $this->text_comment;
    }

    /**
     * @param mixed $text_comment
     * @return $this
     */
    public function setTextComment($text_comment)
    {

        if(!isset($text_comment) && !is_string($text_comment))
        {
            echo'le teComment n\'est pas bien définie';
        }else{
            $this->text_comment = htmlspecialchars($text_comment);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        $date = date_create($this->date_comment);// est une fonction PHP crée une date et qui la stock dans une variable
        return date_format($date, 'd/m/Y à H:i');
    }

    /**
     * @return mixed
     */
    public function getStatComment()
    {
        return $this->stat_comment;
    }

    /**
     * @param mixed $stat_comment
     */
    public function setStatComment($stat_comment)
    {
        $this->stat_comment = $stat_comment;
    }





}