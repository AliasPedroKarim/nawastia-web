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

if (isset($_POST['connexion'])){

    $identificateur = htmlspecialchars(trim($_POST['identificateur']));
    $motDePasse = htmlspecialchars(trim($_POST['motDePasse']));

    $connexion = new UtilisateurDAO();

    $res = $connexion->connexionUtilisateur($identificateur, $motDePasse);

    if ($res == false){
        header("Location: ../../connexion.php?userNoExist=true");
    }else{
        $_SESSION['_1'] = $res;
        header("Location: ../../index.php");
    }

}else if(isset($_POST['inscription'])){

    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $motDePasse = htmlspecialchars(trim($_POST['motDePasse']));
    $email = htmlspecialchars(trim($_POST['email']));

    if (!isset($_POST['pseudo_discord']) || $_POST['pseudo_discord'] == ""){
        $genre = "anonymous#0001";
    }else{
        $pseudo_discord = htmlspecialchars(trim($_POST['pseudo_discord']));
    }

    if (!isset($_POST['genre']) || $_POST['genre'] == ""){
        $genre = "non spécifier";
    }else{
        $genre = htmlspecialchars(trim($_POST['genre']));
    }

    $fileTmpName = "";

    if(isset($_FILES['photo-profil'])){
        $file = $_FILES['photo-profil'];

        $fileName = $_FILES['photo-profil']['name'];
        $fileTmpName = $_FILES['photo-profil']['tmp_name'];
        $fileSize = $_FILES['photo-profil']['size'];
        $fileError = $_FILES['photo-profil']['error'];
        $fileType = $_FILES['photo-profil']['type'];

        if (!empty($fileName) && !empty($fileTmpName) && !empty($fileSize) && !empty($fileType)){
            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array("jpg", "jpeg", "png");

            if (in_array($fileActualExt, $allowed)){
                if ($fileError === 0){
                    if ($fileError < 1000000){
                        $fileNameNew =  "ProfileAvatar-id-" . $pseudo ."." . $fileActualExt;
                        $fileDestination = "assets/img/user-avatar/" . $fileNameNew;

                    }else{
                        header("Location: ../../inscription.php?errorBigFile=true");
                    }
                }else{
                    header("Location: ../../inscription.php?errorUpload=true");
                }
            }else{
                header("Location: ../../inscription.php?error=true");
            }
        }else{
            $fileDestination = htmlspecialchars(trim($_POST['profil-default']));
        }
    }

    $connexion = new UtilisateurDAO();

    $unUtilisateur = new Utilisateur($pseudo, $email, $nom, $prenom, $genre, $fileDestination, 0, "aucune note", $pseudo_discord);

    $res = $connexion->addUtilisateur($unUtilisateur, $motDePasse);

    if ($res === false){
        header("Location: ../../inscription.php?errorCreateUser=true");
    }else{
        move_uploaded_file($fileTmpName, "../../" . $fileDestination);
        header("Location:  ../../inscription.php?errorCreateUser=false");

    }

}else {
    header("Location: ../../index.php");
}