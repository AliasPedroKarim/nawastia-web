<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 27/02/2019
 * Time: 13:43
 */

namespace App\Utilisateur;

use App\DB\DB;
use PDO;

class UtilisateurDAO extends DB{

    public $ip,
            $time;

    public function __construct($host = "localhost", $dbName = "nawastia_db", $port = 3307, $nomUtilisateur = "root", $motDePasse = "")
    {
        parent::__construct($host, $dbName, $port, $nomUtilisateur, $motDePasse);
        $this->ip = get_ip();
        $this->time = date("Y-m-d H:i:s");
    }

    /**
     * Cette methode peut retourner soit un booléen soit un objet Utilisateur que l'on pourra après inserer dans le $_SESSION pour plus de manibilité
     *
     * @param $identificateur
     * @param $motDePasse
     *
     * @return bool|Utilisateur
     */

    public function connexionUtilisateur($identificateur, $motDePasse){

        $db = $this->connexion();

        $motDePasse = sha1($motDePasse);

        $res = $db->prepare("SELECT * FROM utilisateur WHERE (pseudo = :pseudo OR email = :email) AND mot_de_passe = :motDePasse");

        $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':email', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);

        $res->execute();

        $unUtilisateur = $res->fetchAll();

        if (empty($unUtilisateur)){
            echo "[TEST] Attention le joueur n'existe pas ! On ne peut pas modifier ces informations";
            return false;

        }else{
            return $this->giveObjectUtilisateur($unUtilisateur);
        }
    }

    public function giveObjectUtilisateur($unUtilisateur) : Utilisateur{

        $allRole = $this->getAllRole($unUtilisateur[0]['id_utilisateur']);

        $time = $this->time;
        $ip = $this->ip;

        $objetUtilisateur =  new Utilisateur($unUtilisateur[0]['pseudo'], $unUtilisateur[0]['email'],$unUtilisateur[0]['nom'], $unUtilisateur[0]['prenom'], $unUtilisateur[0]['genre'], $unUtilisateur[0]['photo_profil'],$unUtilisateur[0]['money'], $unUtilisateur[0]['note'], $unUtilisateur[0]['pseudo_discord'] ,$allRole);
        $objetUtilisateur->setId($unUtilisateur[0]['id_utilisateur']);
        $objetUtilisateur->setDateDernierActivite($time);
        $objetUtilisateur->setDateCreationCompte($unUtilisateur[0]['date_creation_compte']);
        $objetUtilisateur->setIpDernierActivite($ip);
        $objetUtilisateur->setIpCreationCompte($unUtilisateur[0]['ip_creation_compte']);
        $objetUtilisateur->setBgProfil($unUtilisateur[0]['bg_profil']);

        $objetUtilisateur->setVisibiliteUtilisateur($unUtilisateur[0]['visibilite_utilisateur']);
        $objetUtilisateur->setFollowersUtilisateur($unUtilisateur[0]['followers_utilisateur']);
        $objetUtilisateur->setNotificationActivite($unUtilisateur[0]['notification_activite']);

        $this->updateActivity($unUtilisateur[0]['id_utilisateur'], $time, $ip);

        return $objetUtilisateur;
    }

    public function getAllRole($identificateur){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM possede_role, utilisateur WHERE utilisateur.id_utilisateur = :id_utilisateur AND possede_role.id_utilisateur = :id_utilisateur");

        $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findRole($id_status){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM status WHERE id_status = :id_status");

        $res->bindParam(':id_status', $id_status, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function setRole($id_utilisateur, $id_status){
        $db = $this->connexion();

        $verifExist = $this->findRole($id_status);

        if (empty($verifExist)){
            $res = $db->prepare("INSERT INTO possede_role(id_utilisateur, id_status) VALUES(:id_utilisateur, :id_status)");

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
     * @return bool
     */
    public function addUtilisateur(Utilisateur $utilisateur, $nomDePasse){
        $db = $this->connexion();

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){

            $nomDePasse = sha1($nomDePasse);

            $res = $db->prepare("INSERT INTO 
                                    utilisateur(pseudo, 
                                    email, 
                                    nom, 
                                    prenom, 
                                    mot_de_passe, 
                                    genre, 
                                    photo_profil, 
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
                                      :photo_profil,
                                      :money,
                                      :note,
                                      :pseudo_discord,
                                      :date_creation_compte,
                                      :date_dernier_activite,
                                      :ip_creation_compte,
                                      :ip_dernier_activite
                                    )");

            $res->bindParam(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
            $res->bindParam(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
            $res->bindParam(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $res->bindParam(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $res->bindParam(':mot_de_passe', $nomDePasse, PDO::PARAM_STR);
            $res->bindParam(':genre', $utilisateur->getGenre(), PDO::PARAM_STR);
            $res->bindParam(':photo_profil', $utilisateur->getPhotoProfil(), PDO::PARAM_STR);
            $res->bindParam(':money', $utilisateur->getMoney(), PDO::PARAM_INT);
            $res->bindParam(':note', $utilisateur->getNote(), PDO::PARAM_STR);
            $res->bindParam(':pseudo_discord', $utilisateur->getPseudoDiscord(), PDO::PARAM_STR);
            $res->bindParam(':date_creation_compte', $this->time, PDO::PARAM_STR);
            $res->bindParam(':date_dernier_activite', $this->time, PDO::PARAM_STR);
            $res->bindParam(':ip_creation_compte', $this->ip, PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $this->ip, PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                $req = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");

                $req->bindParam(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);

                $req->execute();

                $res1 = $req->fetchAll();
                $setRole = $this->setRole($res1[0]['id_utilisateur'], 8);

                if ($setRole == false){
                    return false;
                }else{
                    return true;
                }
            }

        }else{
            return false;
        }

    }

    public function updateActivity($identificateur, $time, $ip){
        $exist = $this->findUtilisateurNoOjbet($identificateur);

        if (isset($exist)){
            $db = $this->connexion();
            $res = $db->prepare("UPDATE utilisateur SET date_dernier_activite = :date_dernier_activite, ip_dernier_activite = :ip_dernier_activite 
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
            $db = $this->connexion();
            $res = $db->prepare("UPDATE utilisateur SET bg_profil = :bg_profile 
                                    WHERE id_utilisateur = :id_utilisateur");

            $res->bindParam(':bg_profile', $path, PDO::PARAM_STR);
            $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_STR);

            $res->execute();
        }else{
            return null;
        }
    }

    public function edit_profil__async(Utilisateur $utilisateur){
        $db = $this->connexion();

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return ["utilisateur" => false, "edit_profil" => false, "error" => false];

        }else{
            $ip = $this->ip;
            $time = $this->time;

            $res = $db->prepare("UPDATE utilisateur 
                                  SET pseudo = :pseudo,
                                    email = :email,
                                    nom = :nom,
                                    prenom = :prenom,
                                    genre = :genre,
                                    pseudo_discord = :pseudo_discord,
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
        $db = $this->connexion();

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
                    $res = $db->prepare("UPDATE utilisateur 
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
        $db = $this->connexion();

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return false;

        }else{
            $ip = get_ip();
            $time = date("Y-m-d H:i:s");

            $res = $db->prepare("UPDATE utilisateur 
                                  SET pseudo = :pseudo,
                                    email = :email,
                                    nom = :nom,
                                    prenom = :prenom,
                                    genre = :genre,
                                    photo_profil = :photo_profil,
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
            $res->bindParam(':photo_profil', $utilisateur->getPhotoProfil(), PDO::PARAM_STR);
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
        $db = $this->connexion();

        $unUtilisateur = $this->findUtilisateur($utilisateur);

        if (empty($unUtilisateur)){
            return false;
        }else{

            $res = $db->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur AND pseudo = :pseudo");

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
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur OR pseudo = :pseudo OR email = :email");

        $id_utilisateur = $utilisateur->getId();
        $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $pseudo = $utilisateur->getPseudo();
        $res->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $email = $utilisateur->getEmail();
        $res->bindParam(':email', $email, PDO::PARAM_STR);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findUtilisateurNoOjbet($identificateur){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = '{$identificateur}' OR pseudo = '{$identificateur}' OR email = '{$identificateur}'");

        $res->bindParam(':id_utilisateur', $identificateur, PDO::PARAM_INT);
        $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':email', $identificateur, PDO::PARAM_STR);

        $res->execute();

        return $res->fetchAll();
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
        $db = $this->connexion();

        $res = $db->query("SELECT * FROM utilisateur");
        if ($type == 'object'){
            return $res->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}