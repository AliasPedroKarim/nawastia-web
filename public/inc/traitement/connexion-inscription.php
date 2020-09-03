<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 27/02/2019
 * Time: 16:39
 */

use App\Utilisateur\Utilisateur;
use App\Utilisateur\UtilisateurDAO;

require_once '../../inc/function.php';

$json = [];

if (isset($_POST) && !empty($_POST)){
    if (isset($_POST['connexion']) && $_POST['connexion'] === "true"){

        if (isset($_POST['identificateur']) && !empty($_POST['identificateur'])){
            $identificateur = htmlspecialchars(trim($_POST['identificateur']));
            if (isset($_POST['motDePasse']) && !empty($_POST['motDePasse'])){
                $motDePasse = htmlspecialchars(trim($_POST['motDePasse']));
                $connexion = new UtilisateurDAO();
                $res = $connexion->connexionUtilisateur($identificateur, $motDePasse);

                isset($res["message"]) ? $message = $res["message"] : $message = "nom renseigner";
                isset($res["error"]) ? $error = $res["error"] : $error = true;

                if ($res["error"] === true){
                    array_push($json, ["error" => $error,
                        "message" => $message]);
                    echo json_encode($json);
                }else{
                    if (isset($res['data']) && !empty($res['data'])){
                        $_SESSION['_1'] = $res['data'];
                        array_push($json, ["error" => $error,
                            "sign_in" => true,
                            "message" => $message]);
                        echo json_encode($json);
                    }else{
                        array_push($json, ["error" => true,
                            "message" => "Une erreur est survenue lors de la connexion à votre compte."]);
                        echo json_encode($json);
                    }
                }
            }else{
                array_push($json, ["error" => true,
                    "message" => "veuillez renseigner le mot de passe pour pouvoir <strong>vous connecter</strong> !"]);
                echo json_encode($json);
            }
        }else{
            array_push($json, ["error" => true,
                "message" => "un email ou un nom d'utilisateur n'a pas été renseigné.<br>Veuillez le renseigner pour pouvoir <strong>vous connecter</strong> !"]);
            echo json_encode($json);
        }

    }else if(isset($_POST['inscription']) && $_POST['inscription'] === "true"){

        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
            if (isset($_POST['new_password__register'])){
                if (preg_match("/[a-zA-Z0-9]/", $_POST['new_password__register'])){
                    $motDePasse = htmlspecialchars(trim($_POST['new_password__register']));

                    $email = htmlspecialchars(trim($_POST['email']));

                    if (isset($email) && !empty($email)){
                        if (!isset($_POST['pseudo_discord']) || $_POST['pseudo_discord'] == ""){
                            $pseudo_discord = "anonymous#0001";
                        }else{
                            $pseudo_discord = htmlspecialchars(trim($_POST['pseudo_discord']));
                        }

                        if (!isset($_POST['genre']) || $_POST['genre'] == ""){
                            $genre = "non spécifier";
                        }else{
                            $genre = htmlspecialchars(trim($_POST['genre']));
                        }

                        $connexion = new UtilisateurDAO();

                        if (empty($connexion->findUtilisateurNoOjbet($pseudo, 'pseudo')) || empty($connexion->findUtilisateurNoOjbet($email, 'email'))){


                            if (isset($_FILES['photo-profil']) && (!empty($_FILES['photo-profil']['name']) ||!empty($_FILES['photo-profil']['tmp_name']) ||!empty($_FILES['photo-profil']['size']) ||!empty($_FILES['photo-profil']['type']))){
                                $dataArray = [
                                    "name" => $_FILES['photo-profil']['name'],
                                    "tmp_name" => $_FILES['photo-profil']['tmp_name'],
                                    "size" => $_FILES['photo-profil']['size'],
                                    "error" => $_FILES['photo-profil']['error'],
                                    "type" => $_FILES['photo-profil']['type'],
                                    "id" => $pseudo,
                                    "photo-default" => $_POST['profil-default'],
                                    "photo-profil-default" => isset($_POST['photo-profil-default']) ? $_POST['photo-profil-default'] : null
                                ];
                            }else{
                                $dataArray = [
                                    "photo-default" => $_POST['profil-default'],
                                    "id" => $pseudo,
                                    "photo-profil-default" => isset($_POST['photo-profil-default']) ? $_POST['photo-profil-default'] : null
                                ];
                            }

                            $resUplodFile = $connexion->uplodImage($dataArray, true);

                            isset($resUplodFile["message"]) ? $message = $resUplodFile["message"] : $message = "nom renseigner";
                            isset($resUplodFile["error"]) ? $error = $resUplodFile["error"] : $error = true;

                            if ($resUplodFile['error'] === false && $resUplodFile['status'] === "success_uplod"){
                                $unUtilisateur = new Utilisateur($pseudo, $email, $nom, $prenom, $genre, 0, "aucune note", $pseudo_discord);
                                if (isset($resUplodFile['id_image'])){
                                    $unUtilisateur->setIdImageUtilisateur($resUplodFile['id_image']);
                                }

                                if (isset($_POST['visibilite_utilisateur']) && $_POST['visibilite_utilisateur'] == "on"){
                                    $unUtilisateur->setVisibiliteUtilisateur(1);
                                }else{
                                    $unUtilisateur->setVisibiliteUtilisateur(0);
                                }
                                if (isset($_POST['followers_utilisateur']) && $_POST['followers_utilisateur'] == "on"){
                                    $unUtilisateur->setFollowersUtilisateur(1);
                                }else{
                                    $unUtilisateur->setFollowersUtilisateur(0);
                                }

                                $unUtilisateur->setNotificationActivite(1);

                                $res = $connexion->addUtilisateur($unUtilisateur, $motDePasse);

                                if ($res === false){
                                    array_push($json, ["error" => $error,
                                        "message" => $message]);
                                    echo json_encode($json);
                                }else{
                                    array_push($json, ["error" => false,
                                        "message" => "Votre compte a été creer, vous pouvez vous connectez en <a href=\"connexion.php\">cliquant ici </a> !"]);
                                    echo json_encode($json);
                                }
                            }else{

                                array_push($json, ["error" => $error,
                                    "message" => $message]);
                                echo json_encode($json);
                            }
                        }else{
                            array_push($json, ["error" => true,
                                "message" => "Attention ! L'utilisateur que vous essayez de créer existe déjà. <br>Veuillez changer le pseudo ou le mail pour pouvoir créer un nouvel utilisateur."]);
                            echo json_encode($json);
                        }
                    }else{
                        array_push($json, ["error" => true,
                            "message" => "L'email est requis pour pouvoir s'inscrire."]);
                        echo json_encode($json);
                    }

                }else{
                    array_push($json, ["error" => true,
                        "message" => "Votre mot de passe ne recpecte pas la norme de caractère demandé."]);
                    echo json_encode($json);
                }
            }else{
                array_push($json, ["error" => true,
                    "message" => "Vous n'avez saisi aucun mot de passe."]);
                echo json_encode($json);
            }
        }else{
            array_push($json, ["error" => true,
                "message" => "Vous n'avez saisi aucun mot de passe."]);
            echo json_encode($json);
        }

    }else {
        header("Location: ../../home.php");
        die();
    }
}else {
    header("Location: ../../home.php");
    die();
}