<?php

use App\Activite\ActiviteDAO;
use App\Main\Main;
use App\Main\MainSecurity;
use App\Utilisateur\Utilisateur;
use App\Utilisateur\UtilisateurDAO;

require_once '../../function.php';
require_once '../../pre-load-function.php';

$displaySecure = new MainSecurity();
$utilisateurDAOforimg = new UtilisateurDAO();
$infoImageProfle = infoImage($utilisateurDAOforimg);

$json = [];

if (isset($_SESSION) && !empty($_SESSION['_1'])) {
    if (isset($_POST)) {
        $main = new Main();
        $utilisateur = new Utilisateur();
        $utilisateurDAO = new UtilisateurDAO();
        $activite = new ActiviteDAO();

        if (isset($_POST['edit_reaction']) && !empty($_POST['edit_reaction']) && $_POST['edit_reaction'] === "true") {

            $res = $activite->setReaction($_POST['id_activite'], $_POST['id_reaction'], $_SESSION['_1']->getId());

            ob_start();
            require_once '../../partie/profil/new-activites.php';
            $new_display_activite = ob_get_contents();
            ob_clean();

            isset($res["message"]) ? $message = $res["message"] : $message = "nom renseigner";
            isset($res["error"]) ? $error = $res["error"] : $error = false;

            array_push($json, [
                "data" => $new_display_activite,
                "error" => $error,
                "message" => $message,
                "script" => "<script type='text/javascript' src='assets/js/edit_reaction.js'></script>"
            ]);

            echo json_encode($json);

        }elseif (isset($_POST['add_comment']) && !empty($_POST['add_comment']) && $_POST['add_comment'] === "true") {

            $id_activite = base64_decode($_POST['area_activite_contexte']);
            $res = $activite->setCommentaire($id_activite, $_SESSION['_1']->getId(), $_POST['text_commentaire']);

            ob_start();

            require_once '../../partie/profil/new-activites.php';
            $new_display_activite = ob_get_contents();
            ob_clean();

            isset($res["message"]) ? $message = $res["message"] : $message = false;
            isset($res["error"]) ? $error = $res["error"] : $error = false;

            array_push($json, [
                "data" => $new_display_activite,
                "error" => $error,
                "message" => '<script type="text/javascript" src="assets/js/add_comment.js"></script>'
            ]);

            echo json_encode($json);
        }
    }else{
        header("Location: /");
        die();
    }
}else{
    header("Location: /");
    die();
}