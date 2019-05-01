<?php

use App\Utilisateur\UtilisateurDAO;

require_once '../../function.php';
require_once '../../pre-load-function.php';

$utilisateurDAOforimg = new UtilisateurDAO();

if (isset($_GET['id']) && !empty($_GET['id'])){
    $res = $utilisateurDAOforimg->findUtilisateurNoOjbet($_GET['id']);

    if (!empty($res)){
        $image = $utilisateurDAOforimg->getImageUtilisateur($res[0]['id_image_utilisateur']);

        if (isset($image) && $image[0]['blob'] == 1){
            echo $image[0]['image'];
        }
    }else{
        header("Location: /");
    }
}else{
    if (isset($_SESSION) && !empty($_SESSION['_1'])){

        $infoImageProfle = infoImage($utilisateurDAOforimg);

        header("content-type: " . $infoImageProfle[0]['extension']);
        echo $infoImageProfle[0]['image'];
    }
}