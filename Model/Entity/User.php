<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 08/03/2018
 * Time: 13:36
 */

namespace BlogEcrivain\Model\Entity;

class User
{
    private $id;
    private $pseudo;
    private $pass;
    private $confirmPass;
    private $role;

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
    public function getPseudo()
    {
        if(!is_string($this->pseudo)){
            echo'la fonction getPseudo a du mal a récupérer votre pseudo';
        }
        return (string) htmlspecialchars($this->pseudo);
    }

    /**
     * @param mixed $pseudo
     * @return $this
     */
    public function setPseudo($pseudo)
    {
        if(!isset($pseudo) && !is_string($pseudo))
        {
            echo'le titre n\'est pas bien définie';
        }else{
            $this->pseudo = htmlspecialchars($pseudo);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getConfirmPass()
    {
        return $this->confirmPass;
    }

    /**
     * @param mixed $confirmPass
     */
    public function setConfirmPass($confirmPass)
    {
        $this->confirmPass = $confirmPass;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return (int) $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
         $this->role = $role;
    }

}