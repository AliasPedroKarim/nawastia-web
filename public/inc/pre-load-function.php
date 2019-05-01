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

function infoImage(\App\Utilisateur\UtilisateurDAO $utilisateurDAO){
    if (isset($_SESSION) && !empty($_SESSION['_1'])){
        return $utilisateurDAO->getImageUtilisateur($_SESSION['_1']->getIdImageUtilisateur());
    }
}

function getImageUtilisateur(\App\Utilisateur\UtilisateurDAO $utilisateurDAO, $id_utilisateur){
    $utilisateur = $utilisateurDAO->findUtilisateurNoOjbet($id_utilisateur, 'id_utilisateur');
    if (isset($utilisateur) && !empty($utilisateur)){
        $image_utilisateur = $utilisateurDAO->getImageUtilisateur($utilisateur[0]['id_image_utilisateur']);
    }else{
        $image_utilisateur = null;
    }

    return $image_utilisateur;
}

!isset($main_bg) ? $main_bg = "assets/img/background/bg-test-2.png" : $main_bg;

if (isset($main)){
    $info_serveur_minecraft = $main->useAPI("https://api.mcsrvstat.us/1/play.jaime-la-survie.com", ROOT . "/supplies/certificat/api.mcsrvstat.cer"); // for test -> play.nethergames.org:19132 or play.jaime-la-survie.com
}

/*if (!empty($_SESSION) && isset($_SESSION['_1'])){
    $joueurDAOVerif = new JoueurDAO();
    $idVerif = $_SESSION['_1'];
    $_SESSION['_1'] = $joueurDAOVerif->giveObjectJoueur($joueurDAOVerif);
}*/

