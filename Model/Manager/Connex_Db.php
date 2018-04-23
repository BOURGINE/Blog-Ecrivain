<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 30/03/2018
 * Time: 14:36
 */

namespace BlogEcrivain\Model\Manager;
use PDO;

class Connex_Db
{
    protected $pdo;

    /**
    connexion à la bdd avec la fonction constructeur
     * C'est une fonction PHP de connexion à la base de donnée via PDO
     **/
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=XXXXXXXXXXXX;dbname=XXXXXXXXXXXX', 'XXXXXXXXX','XXXXXXXXXXX');
    }
}