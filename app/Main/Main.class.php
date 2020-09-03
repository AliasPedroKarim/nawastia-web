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

    public function getInfoMC(string $url, string $pathCertificat = "") {
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

    public function getImageUtilisateur(\App\Utilisateur\UtilisateurDAO $utilisateurDAO, $id_utilisateur){
        $utilisateur = $utilisateurDAO->findUtilisateurNoOjbet($id_utilisateur, 'id_utilisateur');
        if (isset($utilisateur) && !empty($utilisateur)){
            return $utilisateurDAO->getImageUtilisateur($utilisateur[0]['id_image_utilisateur']);
        }
        return null;
    }

    public function allRole(\App\Utilisateur\UtilisateurDAO $utilisateurDAO, $userIdSession){
        if ($userIdSession == null){
            return [];
        }else{
            if (isset($_SESSION['_1'])){
                $allRole = $utilisateurDAO->getAllRole($userIdSession);
            }
            return $allRole;
        }
    }

    public function formatMesssage($message){
        if(preg_match_all('/@(.*?)\s/m', $message, $matches)) {

            foreach ($matches[0] as $match){
                preg_match_all("/[\.|\|\+|\*|\?|\[|\^|\]|\$|\(|\)|\{|\}|\=|\!|\<|\>|\||\:|\-|\#]/", $match, $i);
                $j = array();
                foreach ($i[0] as $k){
                    if (!in_array($k, $j)){
                        $j[] = $k;
                    }
                }
                if (!empty($j)){
                    foreach ($j as $item){
                        $match = preg_replace("/[\\" . $item . "]/", "\\" . $item, $match);
                    }
                }
                $message = preg_replace('#'. $match .'#', '<a href="#!" class="badge badge-soft-primary">'. stripslashes($match) .'</a>', $message);
            }
            return $message;
        }else{
            return $message;
        }
    }

}