<?php

require_once '../../function.php';
require_once '../../pre-load-function.php';

$utilisateurDAO = new App\Utilisateur\UtilisateurDAO();
$main = new \App\Main\Main();

if (isset($_GET['id']) && !empty($_GET['id'])){
    $res = $utilisateurDAO->findUtilisateurNoOjbet($_GET['id']);

    if (!empty($res)){
        $image = $utilisateurDAO->getImageUtilisateur($res[0]['id_image_utilisateur']);

        if (isset($image) && $image[0]['blob'] == 1){
            echo $image[0]['image'];
        }
    }else{
        header("Location: /");
        die();
    }
}else{
    if (isset($_SESSION) && !empty($_SESSION['_1'])){

        $infoImageProfle = $main->getImageUtilisateur($utilisateurDAO, $_SESSION['_1']->getId());

        header("content-type: " . $infoImageProfle[0]['extension']);
        echo $infoImageProfle[0]['image'];
    }
}