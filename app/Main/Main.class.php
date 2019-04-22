<?php


namespace App\Main;

use App\DB\DB;
use App\Utilisateur\UtilisateurDAO;

class Main extends DB{

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

}