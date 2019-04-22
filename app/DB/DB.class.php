<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 11/04/2019
 * Time: 15:02
 */

namespace App\DB;

use \Exception;
use \PDO;

class DB{

    public $_PDO;
    private $_host,
        $_dbName,
        $_port,
        $_nomUtilisateur,
        $_motDePasse;
    public function __construct($host = "localhost", $dbName = "nawastia_db", $port = 3307, $nomUtilisateur = "root", $motDePasse = ""){ //$host = "www.g01.joutes.pw", $dbName = "joutes_db", $port = 3306, $nomUtilisateur = "root", $motDePasse = "joutes01"
        $this->setHost($host);
        $this->setDbName($dbName);
        $this->setPort($port);
        $this->setNomUtilisateur($nomUtilisateur);
        $this->setMotDePasse($motDePasse);
    }

    /**
     * Permet de commencer une connexion vers la base de donnée
     *
     * @return PDO
     */
    public function connexion(){
        try{
            $this->setPDO(new PDO("mysql:host={$this->getHost()};dbname={$this->getDbName()};port={$this->getPort()};charset=utf8", "{$this->getNomUtilisateur()}", "{$this->getMotDePasse()}"));
            $this->_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Emettre une erreur à chaque fois qu'une requête échoue !!!
            return $this->_PDO;
        }catch (Exception $ex){
            echo "Une erreur est survenue lors de la connexion à la base de donnée !\n<div><code>' . $ex . '</code></div></div>";
            $this->_PDO = null;
            die();
        }
    }

    //Creation des methodes getters et setters...

    /**
     * @return PDO
     */
    public function getPDO()
    {
        return $this->_PDO;
    }

    /**
     * @param PDO $PDO
     */
    public function setPDO(PDO $PDO)
    {
        $this->_PDO = $PDO;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->_host = $host;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->_dbName;
    }

    /**
     * @param mixed $dbName
     */
    public function setDbName($dbName)
    {
        $this->_dbName = $dbName;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->_port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->_port = $port;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->_nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->_nomUtilisateur = $nomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->_motDePasse;
    }

    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse)
    {
        $this->_motDePasse = $motDePasse;
    }
}