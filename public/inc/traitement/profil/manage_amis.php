<?php

use App\Main\Main;
use App\Utilisateur\AmisDAO;
use App\Utilisateur\UtilisateurDAO;

require_once '../../function.php';
require_once '../../pre-load-function.php';

$json = [];

if (isset($_SESSION['_1'])){
    if (isset($_POST) && !empty($_POST)){
        $amisDAO = new AmisDAO();
        $utilisateurDAO = new UtilisateurDAO();
        $main = new Main();
        $allUtilisateur = $utilisateurDAO->getListUtilisateur('object');
        if (isset($_POST['manage_amis']) && !empty($_POST['manage_amis']) && $_POST['manage_amis'] === "true"){

            if (isset($_POST['id_other_user']) && !empty($_POST['id_other_user'])){
                if (isset($_POST['action']) && !empty($_POST['action'])){

                    $user = base64_decode($_POST['id_other_user']);
                    $action = base64_decode($_POST['action']);

                    $res = $amisDAO->manageAmis($_SESSION['_1']->getId(), $user, $action);

                    ob_start();

                    require_once '../../partie/profil/amis.php';

                    $new_display_activite = ob_get_contents();
                    ob_clean();

                    isset($res["message"]) ? $message = $res["message"] : $message = "nom renseigner";
                    isset($res["error"]) ? $error = $res["error"] : $error = true;

                    array_push($json, [
                        "data" => $new_display_activite,
                        "error" => $error,
                        "message" => $message,
                        "script" => "<script type='text/javascript' src='assets/js/manage_friend.js'></script>"
                    ]);

                    echo json_encode($json);

                }else{
                    array_push($json, [
                        "error" => true,
                        "message" => "Une erreur est survenue lors de l'exécution de l'action."
                    ]);
                    echo json_encode($json);
                }
            }else{
                array_push($json, [
                    "error" => true,
                    "message" => "Une erreur est survenue lors de l'exécution de l'action."
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
}else{
    header("Location: /");
    die();
}