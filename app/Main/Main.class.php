<?php


namespace App\Main;

use App\DB\DB;
use App\Utilisateur\UtilisateurDAO;
use PDO;

class Main{

    private $db;

    public function __construct(){
        $this->db = DB::getInstance()->connexion();
    }

    public function isStaff($identifieur){
        $utilisateurDAO = new UtilisateurDAO();
        $allRole = $utilisateurDAO->getAllRole($identifieur);
        if (!empty($allRole)){
            foreach($allRole as $value){

                $role = $utilisateurDAO->findRole($value->id_status);

                if ($role[0]->role == "op" ||
                    $role[0]->role == "fonda" ||
                    $role[0]->role == "admin" ||
                    $role[0]->role == "super-modo" ||
                    $role[0]->role == "dev"
                ){
                    return true;
                }
            }
        }
        return false;
    }

    public function getEdit(){

    }

    /**
     * @param $table string "table_name"
     * @param array $data ["field" => "value"]
     * @param string $option "AND" or "OR"
     * @return array object(stdClass)
     */
    public function getStatus($table, $data = [], $option = "AND"){
        $supplies = "";
        if (!empty($data)){
            $supplies = isset($option) && !empty($option) && $option === "OR" ? "WHERE 0" : "WHERE 1";
            $i = 0;
            foreach ($data as $fields => $value){
                $supplies .= " " . $option . " " . $fields . " = :" . $fields . " ";
                $i++;
            }
        }
        $req = $this->db->prepare(trim("SELECT * FROM " . $table . " " . $supplies));
        if (!empty($data)){
            foreach ($data as $fields => $value){
                $req->bindValue(":" . $fields, $value);
            }
        }
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function useAPI(string $url, string $pathCertificat = "") {
        if (isset($url)){
            $curl = curl_init($url);
            curl_setopt_array($curl, [
                CURLOPT_CAINFO => $pathCertificat,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10
            ]);
            $data = curl_exec($curl);
            if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200){
                return null;
            }
            return json_decode($data);
        }
        return null;
    }

}