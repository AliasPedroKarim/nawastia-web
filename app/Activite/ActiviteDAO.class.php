<?php
namespace App\Activite;

use App\DB\DB;
use App\Utilisateur\UtilisateurDAO;
use PDO;

class ActiviteDAO{

    private $db;

    public function __construct(){
        $this->db = DB::getInstance()->connexion();
    }

    /**
     * @param int $identificateur
     * @param string $type
     * @return array
     */
    public function getActivite($identificateur = 0, $type = 'all') :?array {

        $supplies = '';

        if ($type === 'id_activite'){
            $supplies = "WHERE id_activite = :id_activite";
        }elseif ($type === 'id_poster'){
            $supplies = "WHERE id_poster = :id_poster";
        }elseif ($type === 'id_status_activite'){
            $supplies = "WHERE id_status_activite = :id_status_activite";
        }

        $res = $this->db->prepare("SELECT * FROM activite {$supplies}");

        if ($type === 'id_activite'){
            $res->bindParam(':id_activite', $identificateur, PDO::PARAM_INT);
        }elseif ($type === 'id_poster'){
            $res->bindParam(':id_poster', $identificateur, PDO::PARAM_INT);
        }elseif ($type === 'id_status_activite'){
            $res->bindParam(':id_status_activite', $identificateur, PDO::PARAM_INT);
        }

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function getImageActivite($id_activte) :?array {

        if (!empty($this->getActivite($id_activte, 'id_activite'))){
            $res = $this->db->prepare("SELECT * FROM possede_image WHERE id_activite = :id_activite");

            $res->bindParam(':id_activite', $id_activte, PDO::PARAM_INT);

            $res->execute();

            return $res->fetchAll(PDO::FETCH_OBJ);
        }else{
            return null;
        }
    }

    public function getReactionActivite($id_activite_reaction, $id_reaction = 0, $id_utilisateur_reaction = 0){

        if (!empty($this->getActivite($id_activite_reaction, 'id_activite'))){

            $supplies = "";

            if (!empty($id_reaction)){
                $supplies .= "AND id_reaction = :id_reaction";
            }
            if (!empty($id_utilisateur_reaction)){
                $supplies .= " AND id_utilisateur_reaction = :id_utilisateur_reaction";
            }

            $res = $this->db->prepare("SELECT * FROM possede_reaction 
                                       WHERE id_activite_reaction = :id_activite_reaction {$supplies}");

            if (!empty($id_reaction)){
                $res->bindParam(':id_reaction', $id_reaction, PDO::PARAM_INT);
            }
            if (!empty($id_utilisateur_reaction)){
                $res->bindParam(':id_utilisateur_reaction', $id_utilisateur_reaction, PDO::PARAM_INT);
            }

            $res->bindParam(':id_activite_reaction', $id_activite_reaction, PDO::PARAM_INT);
            $res->execute();

            return $res->fetchAll(PDO::FETCH_OBJ);
        }else{
            return null;
        }
    }

    public function getReaction($identificateur = 0, $type = 'all'){

        $supplies = '';

        if ($type === 'id_reaction'){
            $supplies = "WHERE id_reaction = :id_reaction";
        }

        $res = $this->db->prepare("SELECT * FROM reaction {$supplies}");

        if ($type === 'id_reaction'){
            $res->bindParam(':id_reaction', $identificateur, PDO::PARAM_INT);
        }
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentaire($identificateur = 0, $type = 'all') :?array {

        $supplies = '';

        if ($type === 'id_activite'){
            $supplies = "WHERE id_activite = :id_activite";
        }elseif ($type === 'id_poster'){
            $supplies = "WHERE id_poster = :id_poster";
        }

        $res = $this->db->prepare("SELECT * FROM commentaire {$supplies}");

        if ($type === 'id_activite'){
            $res->bindParam(':id_activite', $identificateur, PDO::PARAM_INT);
        }elseif ($type === 'id_poster'){
            $res->bindParam(':id_poster', $identificateur, PDO::PARAM_INT);
        }

        $res->execute();

        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function setReaction($id_activite_reaction, $id_reaction, $id_utilisateur_reaction){

        $i = $this->getActivite($id_activite_reaction, 'id_activite');
        if (isset($i) && !empty($i)){
            $j = $this->getReaction($id_reaction, 'id_reaction');
            if (isset($j) && !empty($j)){
                $utilisateurDAO = new UtilisateurDAO();
                $k = $utilisateurDAO->findUtilisateurNoOjbet($id_utilisateur_reaction, 'id_utilisateur');
                if (isset($k) && !empty($k)){


                    $allReactionActivite = $this->getReactionActivite($id_activite_reaction);

                    $list_reaction = array();
                    foreach ($allReactionActivite as $k){
                        if (!in_array($k->id_reaction, $list_reaction)){
                            $list_reaction[] = $k->id_reaction;
                        }
                    }

                    $reaction_activite = $this->getReactionActivite($id_activite_reaction, $id_reaction, $id_utilisateur_reaction);

                    if (empty($reaction_activite)){
                        if (count($list_reaction) < 10){
                            $res = $this->db->prepare("INSERT INTO possede_reaction 
                                                    VALUES (:id_activite_reaction, :id_reaction, :id_utilisateur_reaction)");
                        }else{
                            return ["error" => true, "status" => "trigger_limit_reaction", "message" => "Limite d'ajout des emojis"];
                        }
                    }else{
                        $res = $this->db->prepare("DELETE FROM possede_reaction
                                                    WHERE id_activite_reaction = :id_activite_reaction 
                                                    AND id_reaction = :id_reaction
                                                    AND id_utilisateur_reaction = :id_utilisateur_reaction");
                    }

                    $res->bindParam(':id_reaction', $id_reaction, PDO::PARAM_INT);
                    $res->bindParam(':id_utilisateur_reaction', $id_utilisateur_reaction, PDO::PARAM_INT);
                    $res->bindParam(':id_activite_reaction', $id_activite_reaction, PDO::PARAM_INT);

                    $res->execute();


                }
            }

        }
    }

    public function setCommentaire($id_activite, $id_utilisateur, $text_commentaire){
        $i = $this->getActivite($id_activite, 'id_activite');
        if (isset($i) && !empty($i)){
            $utilisateurDAO = new UtilisateurDAO();
            $k = $utilisateurDAO->findUtilisateurNoOjbet($id_utilisateur, 'id_utilisateur');
            if (isset($k) && !empty($k)){

                if (!empty($text_commentaire)){

                    $res = $this->db->prepare("INSERT INTO commentaire 
                                                    VALUES (null, :text_commmentaire, :date_commmentaire, :id_activite, :id_utilisateur)");

                    $res->bindParam(':text_commmentaire', $text_commentaire, PDO::PARAM_STR);
                    $date_commentaire = $utilisateurDAO->time;
                    $res->bindParam(':date_commmentaire', $date_commentaire, PDO::PARAM_STR);
                    $res->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
                    $res->bindParam(':id_activite', $id_activite, PDO::PARAM_INT);

                    $res->execute();
                }else{
                    return ["error" => true, "message" => "Aucun commentaire n'a était saisi."];
                }
            }else{
                return ["error" => true, "message" => "Techniquement vous n'êtes pas inscrit, par conséquent si vous ne pouvez pas poster de commentaire."];
            }
        }else{
            return ["error" => true, "message" => "Vous essayez d'ajouter un commentaire sur un article qui n'existe pas"];
        }
    }

}