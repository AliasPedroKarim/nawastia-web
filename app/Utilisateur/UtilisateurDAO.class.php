<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 27/02/2019
 * Time: 13:43
 */

namespace App\Utilisateur;

use App\DB\DB;
use App\Main\MainSecurity;
use PDO;

class UtilisateurDAO extends Utilisateur{

    public $ip,
            $time;
    private $db;

    public function __construct(){
        parent::__construct();
        $this->ip = get_ip();
        $this->time = date("Y-m-d H:i:s");
        $this->db = DB::getInstance()->connexion();
    }

    /**
     * Cette methode peut retourner soit un booléen soit un objet Utilisateur que l'on pourra après inserer dans le $_SESSION pour plus de manibilité
     *
     * @param $identificateur
     * @param $motDePasse
     *
     * @return bool|array
     */

    public function connexionUtilisateur($identificateur, $motDePasse){
        $motDePasse = sha1($motDePasse);

        $res = $this->db->prepare("SELECT * FROM utilisateur WHERE (pseudo = :pseudo OR email = :email) AND mot_de_passe = :motDePasse");

        $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':email', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);

        $res->execute();

        $unUtilisateur = $res->fetchAll();

        if (empty($unUtilisateur)){
            return ["error" => true, "message" => "Email/Nom d'utilisateur ou mot de passe incorrect !"];

        }else{
            return ["error" => false, "message" => "Connexion réussi !", "data" => $this->giveObjectUtilisateur($unUtilisateur)];
        }
    }

    public function giveObjectUtilisateur($unUtilisateur) : Utilisateur{

        $allRole = $this->getAllRole($unUtilisateur[0]['id_utilisateur']);

        $time = $this->time;
        $ip = $this->ip;

        $objetUtilisateur =  new Utilisateur($unUtilisateur[0]['pseudo'], $unUtilisateur[0]['email'],$unUtilisateur[0]['nom'], $unUtilisateur[0]['prenom'], $unUtilisateur[0]['genre'], $unUtilisateur[0]['money'], $unUtilisateur[0]['note'], $unUtilisateur[0]['pseudo_discord'] ,$allRole);
        $objetUtilisateur->setId($unUtilisateur[0]['id_utilisateur']);
        $objetUtilisateur->setDateDernierActivite($time);
        $objetUtilisateur->setDateCreationCompte($unUtilisateur[0]['date_creation_compte']);
        $objetUtilisateur->setIpDernierActivite($ip);
        $objetUtilisateur->setIpCreationCompte($unUtilisateur[0]['ip_creation_compte']);
        $objetUtilisateur->setBgProfil($unUtilisateur[0]['bg_profil']);

        $objetUtilisateur->setVisibiliteUtilisateur($unUtilisateur[0]['visibilite_utilisateur']);
        $objetUtilisateur->setFollowersUtilisateur($unUtilisateur[0]['followers_utilisateur']);
        $objetUtilisateur->setNotificationActivite($unUtilisateur[0]['notification_activite']);
        $objetUtilisateur->setIdImageUtilisateur($unUtilisateur[0]['id_image_utilisateur']);

        $this->updateActivity($unUtilisateur[0]['id_utilisateur'], $time, $ip);

        return $objetUtilisateur;
    }

    public function getAllRole($identificateur){

        $res = $this->db->prepare("SELECT * FROM possede_role, utilisateur WHERE utilisateur.id_utilisateur = :id_utilisateur AND possede_role.id_utilisateur = :id_utilisateur");

        $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findRole($id_status){

        $res = $this->db->prepare("SELECT * FROM status WHERE id_status = :id_status");

        $res->bindParam(':id_status', $id_status, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function setRole($id_utilisateur, $id_status){

        $verifExist = $this->findRole($id_status);

        if(!empty($verifExist)){
            $res = $this->db->prepare("INSERT INTO possede_role(id_utilisateur, id_status) VALUES(:id_utilisateur, :id_status)");

            $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $res->bindParam(':id_status', $id_status, PDO::PARAM_INT);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    /**
     * Avec cette méthode tu peux creer un joueur si il n'existe pas, retourne un booléen true ou false si le joueur à était créer ou pas
     *
     * @param Utilisateur $utilisateur
     *
     * @return mixed
     */
    public function addUtilisateur(Utilisateur $utilisateur, $nomDePasse){

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){

            $nomDePasse = sha1($nomDePasse);

            $res = $this->db->prepare("INSERT INTO 
                                    utilisateur(pseudo, 
                                    email, 
                                    nom, 
                                    prenom, 
                                    mot_de_passe, 
                                    genre, 
                                    id_image_utilisateur,
                                    money, 
                                    note, 
                                    pseudo_discord, 
                                    date_creation_compte, 
                                    date_dernier_activite, 
                                    ip_creation_compte, 
                                    ip_dernier_activite) 
                                    VALUES(
                                      :pseudo,
                                      :email,
                                      :nom,
                                      :prenom,
                                      :mot_de_passe,
                                      :genre,
                                      :id_image_utilisateur,
                                      :money,
                                      :note,
                                      :pseudo_discord,
                                      :date_creation_compte,
                                      :date_dernier_activite,
                                      :ip_creation_compte,
                                      :ip_dernier_activite
                                    )");

            $pseudo = $utilisateur->getPseudo();
            $res->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $email = $utilisateur->getEmail();
            $res->bindParam(':email', $email, PDO::PARAM_STR);
            $nom = $utilisateur->getNom();
            $res->bindParam(':nom', $nom, PDO::PARAM_STR);
            $prenom = $utilisateur->getPrenom();
            $res->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $mot_de_passe = $nomDePasse;
            $res->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
            $genre = $utilisateur->getGenre();
            $res->bindParam(':genre', $genre, PDO::PARAM_STR);
            $id_image_utilisateur = $utilisateur->getIdImageUtilisateur();
            $res->bindParam(':id_image_utilisateur', $id_image_utilisateur, PDO::PARAM_INT);
            $money = $utilisateur->getMoney();
            $res->bindParam(':money', $money, PDO::PARAM_INT);
            $note = $utilisateur->getNote();
            $res->bindParam(':note', $note, PDO::PARAM_STR);
            $pseudo_discord = $utilisateur->getPseudoDiscord();
            $res->bindParam(':pseudo_discord', $pseudo_discord, PDO::PARAM_STR);

            $time = $this->time;
            $ip = $this->ip;
            $res->bindParam(':date_creation_compte', $time, PDO::PARAM_STR);
            $res->bindParam(':date_dernier_activite', $time, PDO::PARAM_STR);
            $res->bindParam(':ip_creation_compte', $ip, PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $ip, PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return ["error" => true, "message" => "Une erreur a été détecté la création de votre compte."];
            }else{
                $req = $this->db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");

                $pseudo = $utilisateur->getPseudo();

                $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

                $req->execute();

                $res1 = $req->fetchAll();
                $setRole = $this->setRole($res1[0]['id_utilisateur'], 8);

                if ($setRole == false){
                    return ["error" => true, "message" => "Attention ! Vous n'avez pas reçu le rôle de base. <br>Veuillez contacter en administrateur pour régler le problème."];
                }else{
                    return ["error" => false, "message" => "Votre compte a été créé avec succès."];
                }
            }

        }else{
            return ["error" => true, "message" => "Attention ! L'utilisateur que vous essayez de créer existe déjà. <br>Veuillez changer le pseudo ou le mail pour pouvoir créer un nouvel utilisateur."];
        }

    }

    public function updateActivity($identificateur, $time, $ip){
        $exist = $this->findUtilisateurNoOjbet($identificateur);

        if (isset($exist)){
            $res = $this->db->prepare("UPDATE utilisateur SET date_dernier_activite = :date_dernier_activite, ip_dernier_activite = :ip_dernier_activite 
                                    WHERE id_utilisateur = :id_utilisateur");

            $res->bindParam(':date_dernier_activite', $time, PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $ip, PDO::PARAM_STR);
            $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_STR);

            $res->execute();
        }else{
            return null;
        }
    }

    public function updateBgProfil($identificateur, $path){
        $exist = $this->findUtilisateurNoOjbet($identificateur);

        if (isset($exist)){
            $res = $this->db->prepare("UPDATE utilisateur SET bg_profil = :bg_profile 
                                    WHERE id_utilisateur = :id_utilisateur");

            $res->bindParam(':bg_profile', $path, PDO::PARAM_STR);
            $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_STR);

            $res->execute();
        }else{
            return null;
        }
    }

    public function edit_profil__async(Utilisateur $utilisateur){

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return ["utilisateur" => false, "edit_profil" => false, "error" => false];

        }else{
            $ip = $this->ip;
            $time = $this->time;

            $res = $this->db->prepare("UPDATE utilisateur 
                                  SET pseudo = :pseudo,
                                    email = :email,
                                    nom = :nom,
                                    prenom = :prenom,
                                    genre = :genre,
                                    pseudo_discord = :pseudo_discord,
                                    visibilite_utilisateur = :visibilite_utilisateur,
                                    followers_utilisateur = :followers_utilisateur,
                                    ip_dernier_activite = :ip_dernier_activite,
                                    date_dernier_activite = :date_dernier_activite
                                WHERE id_utilisateur = :id_utilisateur AND pseudo = :pseudo
                            ");

            $pseudo = $utilisateur->getPseudo();
            $res->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $email = $utilisateur->getEmail();
            $res->bindParam(':email', $email, PDO::PARAM_STR);
            $nom = $utilisateur->getNom();
            $res->bindParam(':nom', $nom, PDO::PARAM_STR);
            $prenom = $utilisateur->getPrenom();
            $res->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $genre = $utilisateur->getGenre();
            $res->bindParam(':genre', $genre, PDO::PARAM_STR);
            $pseudo_discord = $utilisateur->getPseudoDiscord();
            $res->bindParam(':pseudo_discord', $pseudo_discord, PDO::PARAM_STR);

            $visibilite_utilisateur = $utilisateur->getVisibiliteUtilisateur();
            $res->bindParam(':visibilite_utilisateur', $visibilite_utilisateur, PDO::PARAM_STR);
            $followers_utilisateur = $utilisateur->getFollowersUtilisateur();
            $res->bindParam(':followers_utilisateur', $followers_utilisateur, PDO::PARAM_STR);

            $ip_dernier_activite = $ip;
            $res->bindParam(':ip_dernier_activite', $ip_dernier_activite, PDO::PARAM_STR);
            $date_dernier_activite = $time;
            $res->bindParam(':date_dernier_activite', $date_dernier_activite, PDO::PARAM_STR);

            $id_utilisateur = $utilisateur->getId();
            $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
            $pseudo = $utilisateur->getPseudo();
            $res->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return ["utilisateur" => true, "edit_profil" => false, "error" => true];
            }else{
                return ["utilisateur" => true, "edit_profil" => true, "error" => false];
            }
        }

    }

    public function edit_profil_password__async($arrayInfo){

        if (isset($arrayInfo) && !empty($arrayInfo['id'])){
            $unUtilisateur = $this->findUtilisateurNoOjbet($arrayInfo['id']);
        }else{
            return ["utilisateur" => false, "edit_profil_password" => false, "error" => false, "message" => "Aucun identifiant utilisateur valide n'a été selectionné."];
        }


        if (!isset($unUtilisateur) || empty($unUtilisateur)){
            return ["utilisateur" => false, "edit_profil_password" => false, "error" => false, "message" => "Cette utilisateur n'existe pas !"];
        }else{
            if (isset($arrayInfo) && !empty($arrayInfo['old_password'])){
                $old_password = sha1($arrayInfo['old_password']);
                if ($old_password === $unUtilisateur[0]['mot_de_passe']){
                    $res = $this->db->prepare("UPDATE utilisateur 
                                  SET mot_de_passe = :mot_de_passe
                                WHERE id_utilisateur = :id_utilisateur
                            ");

                    $id_utilisateur = $arrayInfo['id'];
                    $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
                    $mot_de_passe = sha1($arrayInfo['new_password']);
                    $res->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);

                    $res->execute();

                    if ($res == false){
                        return ["utilisateur" => true, "edit_profil_password" => false, "error" => true, "message" => "Une erreur est survenue lors de la modification de votre mots de passe."];
                    }else{
                        return ["utilisateur" => true, "edit_profil_password" => true, "error" => false, "message" => "Votre mot de passe a été modifier avec succés."];
                    }
                }else{
                    return ["utilisateur" => true, "edit_profil_password" => false, "error" => true, "message" => "Ce mot de passe ne correpond pas !"];
                }
            }else{
                return ["utilisateur" => true, "edit_profil_password" => false, "error" => true, "message" => "L'ancien mot de passe n'a pas été saisie !<br>Veuillez le saisir pour continuer s'il vous plait. merci."];
            }
        }
    }

    /**
     * Avec cette méthode tu peux modifier les informations d'un joueur si il existe
     *
     * @param Utilisateur $utilisateur
     *
     * @return bool
     */
    public function updateJoueur(Utilisateur $utilisateur){

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return false;

        }else{
            $ip = get_ip();
            $time = date("Y-m-d H:i:s");

            $res = $this->db->prepare("UPDATE utilisateur 
                                  SET pseudo = :pseudo,
                                    email = :email,
                                    nom = :nom,
                                    prenom = :prenom,
                                    genre = :genre,
                                    id_image_utilisateur = :id_image_utilisateur,
                                    note = :note,
                                    pseudo_discord = :pseudo_discord,
                                    ip_dernier_activite = :ip_dernier_activite,
                                    date_dernier_activite = :date_dernier_activite
                                WHERE id_utilisateur = :id_utilisateur AND pseudo = :pseudo
                            ");

            $res->bindParam(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
            $res->bindParam(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
            $res->bindParam(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $res->bindParam(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $res->bindParam(':genre', $utilisateur->getGenre(), PDO::PARAM_STR);
            $res->bindParam(':id_image_utilisateur', $utilisateur->getIdImageUtilisateur(), PDO::PARAM_INT);
            $res->bindParam(':note', $utilisateur->getNote(), PDO::PARAM_STR);
            $res->bindParam(':pseudo_discord', $utilisateur->getPseudoDiscord(), PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $ip, PDO::PARAM_STR);
            $res->bindParam(':date_dernier_activite', $time, PDO::PARAM_STR);
            $res->bindParam(':id_utilisateur', $utilisateur->getId(), PDO::PARAM_STR);
            $res->bindParam(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                return true;
            }
        }

    }

    /**
     * Cette methode permet de supprimer un joueur si il existe, elle retourne un booléen true ou false si l'utisateur a était supprimer ou pas
     *
     * @param Utilisateur $utilisateur
     *
     * @return bool
     */
    public function deleteJoueur(Utilisateur $utilisateur){

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return false;
        }else{

            $res = $this->db->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur AND pseudo = :pseudo");

            $res->bindParam(':id_utilisateur', $utilisateur->getId(), PDO::PARAM_INT);
            $res->bindParam(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                return true;
            }
        }

    }

    /**
     * @param Utilisateur $utilisateur
     *
     * @return array
     */

    public function findUtilisateur(Utilisateur $utilisateur){

        $res = $this->db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur OR pseudo = :pseudo OR email = :email");

        $id_utilisateur = $utilisateur->getId();
        $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $pseudo = $utilisateur->getPseudo();
        $res->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $email = $utilisateur->getEmail();
        $res->bindParam(':email', $email, PDO::PARAM_STR);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findUtilisateurNoOjbet($identificateur, $type = 'all', $object = false){

        $supplies = "";

        if ($type === "id_utilisateur"){
            $supplies = "WHERE id_utilisateur = :id_utilisateur";
        }elseif($type === "pseudo"){
            $supplies = "WHERE pseudo = :pseudo";
        }elseif($type === "email"){
            $supplies = "WHERE email = :email";
        }else{
            $supplies = "WHERE id_utilisateur = :id_utilisateur OR pseudo = :pseudo OR email = :email";
        }

        $res = $this->db->prepare("SELECT * FROM utilisateur " . $supplies);

        if ($type === "id_utilisateur"){
            $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_INT);
        }elseif($type === "pseudo"){
            $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        }elseif($type === "email"){
            $res->bindParam(':email', $identificateur, PDO::PARAM_STR);
        }else{
            $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_INT);
            $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
            $res->bindParam(':email', $identificateur, PDO::PARAM_STR);
        }

        $res->execute();

        if ($object === true){
            return $res->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $res->fetchAll();
        }

    }

    /**
     *
     * Cette methote à pour but de récupérer tous les joueurs depuis la base de donnée
     *
     * @param string $type
     * @default_value 'array'
     * @posibility_value 'array', 'object'
     *
     * @return array
     */

    public function getListUtilisateur($type = 'array'){

        $res = $this->db->query("SELECT * FROM utilisateur");
        if ($type == 'object'){
            return $res->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function uplodImage($dataArray, $new = false){
        $use_default = false;
        $blob = 0;
        if(!empty($dataArray['name'])){

            $fileName = $dataArray['name'];
            $fileTmpName = $dataArray['tmp_name'];
            $fileSize = $dataArray['size'];
            $fileError = $dataArray['error'];
            $fileType = $dataArray['type'];

            if (!empty($fileName) && !empty($fileTmpName) && !empty($fileSize) && !empty($fileType)){
                $fileExt = explode(".", $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array("jpg", "jpeg", "png");

                if (in_array($fileActualExt, $allowed)){
                    if ($fileError === 0){
                        if ($fileError < 1000000){

                            $use_default = false;
                            $blob = 1;

                        }else{
                            return ["error" => true, "status" => "heavy", "message" => "Votre image est trop lourd !"];
                            //header("Location: ../../inscription.php?errorBigFile=true");
                        }
                    }else{
                        return ["error" => true, "status" => "upload", "message" => "Une erreur est survenue lors de l'excution de l'action !"];
                        //header("Location: ../../inscription.php?errorUpload=true");
                    }
                }else{
                    //header("Location: ../../inscription.php?error=true");
                    return ["error" => true, "status" => "no_support", "message" => "Votre image n'est pas supporter"];
                }
            }else{
                $use_default = true;
                $blob = 0;
                if (preg_match("https:\/\/", $dataArray['photo-profil-default'])){
                    $path = $dataArray['photo-profil-default'];
                }else{
                    $path = $dataArray['photo-default'];
                }
            }
        }else{
            $use_default = true;
            $blob = 0;
            if (preg_match("/https:\/\//", $dataArray['photo-profil-default']) || preg_match("/http:\/\//", $dataArray['photo-profil-default'])){
                $path = $dataArray['photo-profil-default'];
            }else{
                $path = $dataArray['photo-default'];
            }
        }

        if ($new === true){

            (isset($dataArray['id'])) ? $name = $dataArray['id'] : $name = $this->findUtilisateurNoOjbet($dataArray['id'])[0]['pseudo'];

            $description = "Phote de profil de " . $name;

            if ($use_default === false){

                $res = $this->db->prepare("INSERT INTO img_user (nom_d_origine, description, image, extension, taille, `blob`)
                                        VALUES (:nom_d_origine, :description, :image, :extension, :taille, :blob)");
            }else{
                $res = $this->db->prepare("INSERT INTO img_user (description, extension, `blob`, path) 
                                           VALUES (:description, :extension, :blob, :path)");
            }
        }else{
            if ($use_default === false){

                $res = $this->db->prepare("UPDATE img_user
                                           SET nom_d_origine = :nom_d_origine, image = :image, extension = :extension, taille = :taille, `blob` = :blob
                                           WHERE id_image = :id_image");
            }else{

                $res = $this->db->prepare("UPDATE img_user 
                                           SET extension = :extension, `blob` = :blob, path = :path
                                           WHERE id_image = :id_image");
            }
        }

        if ($new === true){
            $res->bindParam(':description', $description, PDO::PARAM_STR);
        }else{
            $id_image = $this->findUtilisateurNoOjbet($dataArray['id'])[0]['id_image_utilisateur'];
            $res->bindParam(':id_image', $id_image, PDO::PARAM_STR);
        }

        if ($use_default === false){
            $image =  file_get_contents($dataArray['tmp_name']);

            $res->bindParam(':nom_d_origine', $fileName, PDO::PARAM_STR);

            $res->bindParam(':image', $image, PDO::PARAM_STR);
            $res->bindParam(':extension', $fileType, PDO::PARAM_STR);
            $res->bindParam(':taille', $fileSize, PDO::PARAM_INT);
            $res->bindParam(':blob', $blob, PDO::PARAM_INT);
        }else{
            $fileType = 'url';

            $res->bindParam(':extension', $fileType, PDO::PARAM_STR);
            $res->bindParam(':blob', $blob, PDO::PARAM_INT);
            $res->bindParam(':path', $path, PDO::PARAM_STR);
        }

        $res->execute();

        if ($res === false){
            return ["error" => true, "status" => "no_uplod_in_database", "message" => "Une erreur est survenue lors de l'excution de l'action !"];
        }else{
            if ($new === true){
                $getImage = $this->getImageUtilisateur(0, true);
                (isset($getImage) && !empty($getImage) && !empty($getImage[0]['id_image'])) ? $id = $getImage[0]['id_image'] : $id = null;

                return ["error" => false, "status" => "success_uplod", "id_image" => $id, "message" => "..."];
            }else{
                return ["error" => false, "status" => "success_uplod", "message" => "Votre image à était mise à jour !"];
            }
        }

    }

    public function getImageUtilisateur($identificateur = 0, $last = false){

        $supplies = "";

        $i = $this->db->query("SELECT MAX(id_image) FROM img_user");

        $j = $i->fetchAll();

        if ($j[0][0] !== null){
            if ($last === true){
                $supplies .= "WHERE id_image = {$j[0][0]}";
            }elseif (!empty($identificateur)){
                $supplies .= "WHERE id_image = :id_image";
            }

            $res = $this->db->prepare("SELECT * FROM img_user " . $supplies);

            if (!empty($identificateur)){
                $res->bindParam(':id_image', $identificateur, PDO::PARAM_INT);
            }

            $res->execute();

            return $res->fetchAll();
        }else{
            return null;
        }
    }

    public function changeNotificationActivite($bool, $id_utilisateur){

        $exist_user = $this->findUtilisateurNoOjbet($id_utilisateur);

        if (isset($exist_user) && !empty($exist_user)){

            $res = $this->db->prepare("UPDATE utilisateur SET notification_activite = :notification_activite WHERE id_utilisateur = :id_utilisateur");

            $res->bindParam(':notification_activite', $bool, PDO::PARAM_INT);
            $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            if ($res->execute() === true){
                return ["error" => false, "message" => "Les modifications que vous avez demandé où tu étais effectué."];
            }else{
                return ["error" => true, "message" => "Une erreur est survenue lors de l'exécution de l'action."];
            }
        }else{
            return ["error" => true, "message" => "L'utilisateur que vous essayez de modifier les informations n'existe pas."];
        }

    }

}