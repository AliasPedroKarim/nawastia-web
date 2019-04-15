<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 26/02/2019
 * Time: 23:53
 */

namespace App;

class Joueur{

    private $id,
            $pseudo,
            $email,
            $nom,
            $prenom,
            $genre,
            $photo_profil,
            $money,
            $note,
            $pseudo_discord,
            $id_status,
            $date_creation_compte,
            $date_dernier_activite,
            $ip_creation_compte,
            $ip_dernier_activite;

    /**
     * Joueur constructor.
     * @param string $pseudo
     * @param string $email
     * @param string $nom
     * @param string $prenom
     * @param string $genre
     * @param string $photo_profil
     * @param int $money
     * @param string $note
     * @param string $pseudo_discord
     * @param array $id_status
     */
    public function __construct($pseudo = "", $email = "", $nom = "", $prenom = "", $genre = "", $photo_profil = "", $money = 0, $note = "", $pseudo_discord = "", $id_status = array())
    {
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setGenre($genre);
        $this->setPhotoProfil($photo_profil);
        $this->setMoney($money);
        $this->setNote($note);
        $this->setPseudoDiscord($pseudo_discord);
        $this->setIdStatus($id_status);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getPhotoProfil()
    {
        return $this->photo_profil;
    }

    /**
     * @param mixed $photo_profil
     */
    public function setPhotoProfil($photo_profil)
    {
        $this->photo_profil = $photo_profil;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getPseudoDiscord()
    {
        return $this->pseudo_discord;
    }

    /**
     * @param mixed $pseudo_discord
     */
    public function setPseudoDiscord($pseudo_discord)
    {
        $this->pseudo_discord = $pseudo_discord;
    }

    /**
     * @return array
     */
    public function getIdStatus()
    {
        return $this->id_status;
    }

    /**
     * @param array $id_status
     */
    public function setIdStatus($id_status)
    {
        $this->id_status = $id_status;
    }

    /**
     * @return mixed
     */
    public function getDateCreationCompte()
    {
        return $this->date_creation_compte;
    }

    /**
     * @param mixed $date_creation_compte
     */
    public function setDateCreationCompte($date_creation_compte)
    {
        $this->date_creation_compte = $date_creation_compte;
    }

    /**
     * @return mixed
     */
    public function getDateDernierActivite()
    {
        return $this->date_dernier_activite;
    }

    /**
     * @param mixed $date_dernier_activite
     */
    public function setDateDernierActivite($date_dernier_activite)
    {
        $this->date_dernier_activite = $date_dernier_activite;
    }

    /**
     * @return mixed
     */
    public function getIpCreationCompte()
    {
        return $this->ip_creation_compte;
    }

    /**
     * @param mixed $ip_creation_compte
     */
    public function setIpCreationCompte($ip_creation_compte)
    {
        $this->ip_creation_compte = $ip_creation_compte;
    }

    /**
     * @return mixed
     */
    public function getIpDernierActivite()
    {
        return $this->ip_dernier_activite;
    }

    /**
     * @param mixed $ip_dernier_activite
     */
    public function setIpDernierActivite($ip_dernier_activite)
    {
        $this->ip_dernier_activite = $ip_dernier_activite;
    }


}