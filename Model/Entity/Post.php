<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 04/03/2018
 * Time: 22:01
 */

namespace BlogEcrivain\Model\Entity;


class Post
{
    private $id;
    private $title;
    private $img;
    private $content;
    private $extrait;
    private $date_creation;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        if(!is_string($this->title)){
            echo 'la fonction getTitle a du mal a récupérer le titre';
        }
        return (string) htmlspecialchars($this->title);
    }


    /**
     * @param mixed $title
     * @return $this
     */

    public function setTitle($title)
    {
        if(!isset($title) && !is_string($title))
        {
            echo'le titre n\'est pas bien définie';
        }else{
            $this->title = htmlspecialchars($title);
        }
        return $this;
    }

    /**
     * @return mixed
     */

    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     * Les vérifications images ont été fait dans...
     */
    public function setImg($img)
    {
        $this->img = $img;
    }


    /**
     * @return mixed
     */
    public function getContent()
    {
        if (!is_string($this->content)){
            echo 'Problème avec le getcontent ';
        }
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        if(!isset($content) && !is_string($content))
        {
            echo'le contenu n\'est pas bien définie';
        }else{
            $this->content =$content;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtrait()
    {
        $this->extrait = substr($this->content, 0,130).'...';
        return $this->extrait;
    }

    /**
     * A refaire
     */
    public function getDate()
    {
        $date = date_create($this->date_creation);// est une fonction PHP crée une date et qui la stock dans une variable
        return date_format($date, 'd/m/Y à H:i:s');

    }



}