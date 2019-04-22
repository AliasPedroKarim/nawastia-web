<?php

use App\Main\Main;
use App\Main\MainSecurity;
use App\Utilisateur\Utilisateur;
use App\Utilisateur\UtilisateurDAO;

require_once '../../function.php';

$displaySecure = new MainSecurity();

$json = [];

if (isset($_SESSION) && !empty($_SESSION['_1'])){
    if(isset($_POST)){
        $main = new Main();
        $utilisateur = new Utilisateur();
        $utilisateurDAO = new UtilisateurDAO();
        if (isset($_POST['edit_profil_genaral']) && !empty($_POST['edit_profil_genaral']) && $_POST['edit_profil_genaral'] === "true"){
            if (($_SESSION['_1']->getPseudo() === $_POST['pseudo']) || $main->isStaff($_SESSION['_1']->getId()) === true){

                $utilisateur->setId(htmlspecialchars($_POST['id']));
                $utilisateur->setPseudo(htmlspecialchars($_POST['pseudo']));
                $utilisateur->setNom(htmlspecialchars($_POST['nom']));
                $utilisateur->setPrenom(htmlspecialchars($_POST['prenom']));
                $utilisateur->setEmail(htmlspecialchars($_POST['email']));
                $utilisateur->setPseudoDiscord(htmlspecialchars($_POST['pseudo_discord']));
                $utilisateur->setGenre(htmlspecialchars($_POST['genre']));

                if (isset($_POST['visibilite_utilisateur']) && $_POST['visibilite_utilisateur'] === "true"){
                    $utilisateur->setVisibiliteUtilisateur(1);
                }elseif(isset($_POST['visibilite_utilisateur']) && $_POST['visibilite_utilisateur'] === "false"){
                    $utilisateur->setVisibiliteUtilisateur(0);
                }

                if (isset($_POST['followers_utilisateur']) && $_POST['followers_utilisateur'] === "true"){
                    $utilisateur->setFollowersUtilisateur(1);
                }elseif(isset($_POST['followers_utilisateur']) && $_POST['followers_utilisateur'] === "false"){
                    $utilisateur->setFollowersUtilisateur(0);
                }

                $res = $utilisateurDAO->edit_profil__async($utilisateur);

                if ($res === ["utilisateur" => true, "edit_profil" => true, "error" => false]){

                    $new_info = $utilisateurDAO->findUtilisateur($_SESSION['_1']);

                    $_SESSION['_1']->setPseudo($new_info[0]->pseudo);
                    $_SESSION['_1']->setNom($new_info[0]->nom);
                    $_SESSION['_1']->setPrenom($new_info[0]->prenom);
                    $_SESSION['_1']->setEmail($new_info[0]->email);
                    $_SESSION['_1']->setPseudoDiscord($new_info[0]->pseudo_discord);
                    $_SESSION['_1']->setGenre($new_info[0]->genre);

                    $_SESSION['_1']->setVisibiliteUtilisateur($new_info[0]->visibilite_utilisateur);
                    $_SESSION['_1']->setFollowersUtilisateur($new_info[0]->followers_utilisateur);

                    ob_start();

                    require_once '../../partie/profil/edit.php';

                    $new_display_profil = ob_get_contents();
                    ob_clean();

                    array_push($json, [
                        "error" => false,
                        "data" => $new_display_profil,
                        "message" => "Vos informations on était mise à jour !"]);

                    echo json_encode($json);
                }else{
                    array_push($json, [
                        "error" => true,
                        "message" => "Une erreur à était detecter lors de la modification de vos données !" ]);
                }

            }else{
                array_push($json, [
                    "error" => true,
                    "message" => "Ce compte ne vous appartient pas, mais encore vous n'êtes pas administrateur"]);
            }
        }
        elseif (isset($_POST['edit_profil_password']) && !empty($_POST['edit_profil_password']) && $_POST['edit_profil_password'] === "true") {
            if (($_SESSION['_1']->getId() === $_POST['id']) || $main->isStaff($_SESSION['_1']->getId()) === true){
                if ($_POST['new_password'] === $_POST['similary_password']){
                    if (isset($_POST['id'])){
                        $res = $utilisateurDAO->edit_profil_password__async($_POST);

                        isset($res["message"]) ? $message = $res["message"] : $message = "nom renseigner";

                        if ($res["utilisateur"] === true && $res["edit_profil_password"] === true && $res["error"] === false){
                            array_push($json, [
                                "error" => false,
                                "message" => $message]);

                            echo json_encode($json);
                        }else{
                            array_push($json, [
                                "error" => true,
                                "message" => $message]);

                            echo json_encode($json);
                        }

                    }else{
                        array_push($json, [
                            "error" => true,
                            "message" => "<strong>Attention !</strong> aucun utilisateur n'a était selectionner pour cette action."
                        ]);
                    }
                }else{
                    array_push($json, [
                        "error" => true,
                        "message" => "<strong>Attention !</strong> Vos mots de pass ne sont pas similaire."
                    ]);
                }
            }
        }
        else{
            header("Location: ../../../../profil.php");
        }
    }else{
        header("location: /");
    }
}else{
    header("location: /");
}