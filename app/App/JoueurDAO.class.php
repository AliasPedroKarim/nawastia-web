<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 27/02/2019
 * Time: 13:43
 */

namespace App;

use \PDO;

class JoueurDAO extends DB{

    /**
     * Cette methode peut retourner soit un booléen soit un objet Joueur que l'on pourra après inserer dans le $_SESSION pour plus de manibilité
     *
     * @param $identificateur
     * @param $motDePasse
     *
     * @return bool|Joueur
     */

    public function connexionJoueur($identificateur, $motDePasse){

        $db = $this->connexion();

        $motDePasse = sha1($motDePasse);

        //$res = $db->query("SELECT * FROM joueur WHERE (pseudo = '{$identificateur}' OR email = '{$identificateur}')AND mot_de_passe = '{$motDePasse}'");

        $res = $db->prepare("SELECT * FROM joueur WHERE (pseudo = :pseudo OR email = :email) AND mot_de_passe = :motDePasse");

        $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':email', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);

        $res->execute();

        $unJoueur = $res->fetchAll();

        if (empty($unJoueur)){
            echo "[TEST] Attention le joueur n'existe pas ! On ne peut pas modifier ces informations";
            return false;

        }else{
            $ip = get_ip();
            $time = date("Y-m-d H:i:s");

            $allRole = $this->getAllRole($unJoueur[0]['id_joueur']);

            $objetJoueur =  new Joueur($unJoueur[0]['pseudo'], $unJoueur[0]['email'],$unJoueur[0]['nom'], $unJoueur[0]['prenom'], $unJoueur[0]['genre'], $unJoueur[0]['photo_profil'],$unJoueur[0]['money'], $unJoueur[0]['note'], $unJoueur[0]['pseudo_discord'] ,$allRole);
            $objetJoueur->setId($unJoueur[0]['id_joueur']);
            $objetJoueur->setDateDernierActivite($time);
            $objetJoueur->setDateCreationCompte($unJoueur[0]['date_creation_compte']);
            $objetJoueur->setIpDernierActivite($ip);
            $objetJoueur->setIpCreationCompte($unJoueur[0]['ip_creation_compte']);

            return $objetJoueur;
        }
    }

    public function getAllRole($identificateur){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM possede_role WHERE id_joueur = :id_joueur");

        $res->bindParam(':id_joueur', $identificateur, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll();
    }

    public function findRole($id_joueur, $id_status){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM possede_role WHERE id_joueur = :id_joueur AND id_status = :id_status");

        $res->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT);
        $res->bindParam(':id_status', $id_status, PDO::PARAM_INT);

        $res->execute();

        return $res->fetchAll();
    }

    public function setRole($id_joueur, $id_status){
        $db = $this->connexion();

        $verifExist = $this->findRole($id_joueur, $id_status);

        if (empty($verifExist)){
            $res = $db->prepare("INSERT INTO possede_role(id_joueur, id_status) VALUES(:id_joueur, :id_status)");

            $res->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT);
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
     * @param Joueur $joueur
     *
     * @return bool
     */
    public function addJoueur(Joueur $joueur, $nomDePasse){
        $db = $this->connexion();

        $unJoueur = $this->findJoueur($joueur);

        if (empty($unJoueur)){
            $ip = get_ip();
            $time = date("Y-m-d H:i:s");

            $nomDePasse = sha1($nomDePasse);

            $res = $db->prepare("INSERT INTO 
                                    joueur(pseudo, 
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

            $res->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);
            $res->bindParam(':email', $joueur->getEmail(), PDO::PARAM_STR);
            $res->bindParam(':nom', $joueur->getNom(), PDO::PARAM_STR);
            $res->bindParam(':prenom', $joueur->getPrenom(), PDO::PARAM_STR);
            $res->bindParam(':mot_de_passe', $nomDePasse, PDO::PARAM_STR);
            $res->bindParam(':genre', $joueur->getGenre(), PDO::PARAM_STR);
            $res->bindParam(':photo_profil', $joueur->getPhotoProfil(), PDO::PARAM_STR);
            $res->bindParam(':money', $joueur->getMoney(), PDO::PARAM_INT);
            $res->bindParam(':note', $joueur->getNote(), PDO::PARAM_STR);
            $res->bindParam(':pseudo_discord', $joueur->getPseudoDiscord(), PDO::PARAM_STR);
            $res->bindParam(':date_creation_compte', $time, PDO::PARAM_STR);
            $res->bindParam(':date_dernier_activite', $time, PDO::PARAM_STR);
            $res->bindParam(':ip_creation_compte', $ip, PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $ip, PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                $req = $db->prepare("SELECT * FROM joueur WHERE pseudo = :pseudo");

                $req->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);

                $req->execute();

                $res1 = $req->fetchAll();
                $setRole = $this->setRole($res1[0]['id_joueur'], 8);

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

    /**
     * Avec cette méthode tu peux modifier les informations d'un joueur si il existe
     *
     * @param Joueur $joueur
     *
     * @return bool
     */
    public function updateJoueur(Joueur $joueur){
        $db = $this->connexion();

        $unJoueur = $this->findJoueur($joueur);

        if (empty($unJoueur)){
            return false;

        }else{
            $ip = get_ip();
            $time = date("Y-m-d H:i:s");

            $res = $db->prepare("UPDATE joueur 
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
                                WHERE id_joueur = :id_joueur AND pseudo = :pseudo
                            ");

            $res->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);
            $res->bindParam(':email', $joueur->getEmail(), PDO::PARAM_STR);
            $res->bindParam(':nom', $joueur->getNom(), PDO::PARAM_STR);
            $res->bindParam(':prenom', $joueur->getPrenom(), PDO::PARAM_STR);
            $res->bindParam(':genre', $joueur->getGenre(), PDO::PARAM_STR);
            $res->bindParam(':photo_profil', $joueur->getPhotoProfil(), PDO::PARAM_STR);
            $res->bindParam(':note', $joueur->getNote(), PDO::PARAM_STR);
            $res->bindParam(':pseudo_discord', $joueur->getPseudoDiscord(), PDO::PARAM_STR);
            $res->bindParam(':ip_dernier_activite', $ip, PDO::PARAM_STR);
            $res->bindParam(':date_dernier_activite', $time, PDO::PARAM_STR);
            $res->bindParam(':id_joueur', $joueur->getId(), PDO::PARAM_STR);
            $res->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);

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
     * @param Joueur $joueur
     *
     * @return bool
     */
    public function deleteJoueur(Joueur $joueur){
        $db = $this->connexion();

        $unJoueur = $this->findJoueur($joueur);

        if (empty($unJoueur)){
            return false;
        }else{

            $res = $db->prepare("DELETE FROM joueur WHERE id_joueur = :id_joueur AND pseudo = :pseudo");

            $res->bindParam(':id_joueur', $joueur->getId(), PDO::PARAM_INT);
            $res->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);

            $res->execute();

            if ($res == false){
                return false;
            }else{
                return true;
            }
        }

    }

    /**
     * @param Joueur $joueur
     *
     * @return array
     */

    public function findJoueur(Joueur $joueur){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM joueur WHERE id_joueur = :id_joueur OR pseudo = :pseudo OR email = :email");

        $res->bindParam(':id_joueur', $joueur->getId(), PDO::PARAM_INT);
        $res->bindParam(':pseudo', $joueur->getPseudo(), PDO::PARAM_STR);
        $res->bindParam(':email', $joueur->getEmail(), PDO::PARAM_STR);

        $res->execute();

        return $res->fetchAll();
    }

    public function findJoueurNoOjbet($identificateur){
        $db = $this->connexion();

        $res = $db->prepare("SELECT * FROM joueur WHERE id_joueur = '{$identificateur}' OR pseudo = '{$identificateur}' OR email = '{$identificateur}'");

        $res->bindParam(':id_joueur', $identificateur, PDO::PARAM_INT);
        $res->bindParam(':pseudo', $identificateur, PDO::PARAM_STR);
        $res->bindParam(':email', $identificateur, PDO::PARAM_STR);

        $res->execute();

        return $res->fetchAll();
    }

    /**
     * Cette methote à pour but de récupérer tous les joueurs depuis la base de donnée
     *
     * @return array
     */

    public function getListJoueur(){
        $db = $this->connexion();

        $res = $db->query("SELECT * FROM joueur");
        return $res->fetchAll();
    }
}