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

    private $setting = [];

    private static $_instance;

    public static function getInstance(){
        if (is_null(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function __construct(){
        $this->setting = require dirname(__DIR__, 2) . '/config/config.php';
    }

    public function get($key){
        if (!isset($this->setting[$key])){
            return null;
        }
        return $this->setting[$key];
    }

    public $_PDO;
    /*private $_host,
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
    }*/

    /**
     * Permet de commencer une connexion vers la base de donnée
     *
     * @return PDO
     */
    public function connexion(){
        try{
            $this->setPDO(new PDO("mysql:host={$this->get('db_host')};dbname={$this->get('db_name')};port={$this->get('port')};charset={$this->get('charset_default')}", "{$this->get('db_user')}", "{$this->get('db_pass')}"));
            $this->_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $this->_PDO;
        }catch (Exception $ex){
            //echo "Une erreur est survenue lors de la connexion à la base de donnée !\n<div><code>' . $ex . '</code></div></div>";
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
}