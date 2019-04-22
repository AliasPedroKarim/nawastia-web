<?php

$navbar_status_admin = false;

if (isset($_SESSION['_1'])){
    if (isset($allRole) || !empty($allRole)){
        foreach($allRole as $value){
            $role = $utilisateurDAO->findRole($value->id_status);
            if ($role[0]->role == "op" ||
                $role[0]->role == "fonda" ||
                $role[0]->role == "admin" ||
                $role[0]->role == "super-modo" ||
                $role[0]->role == "dev"
            ){
                $navbar_status_admin = true;
            }
        }
    }else{
        $navbar_status_admin = false;
    }
}

/*if (!empty($_SESSION) && isset($_SESSION['_1'])){
    $joueurDAOVerif = new JoueurDAO();
    $idVerif = $_SESSION['_1'];
    $_SESSION['_1'] = $joueurDAOVerif->giveObjectJoueur($joueurDAOVerif);
}*/