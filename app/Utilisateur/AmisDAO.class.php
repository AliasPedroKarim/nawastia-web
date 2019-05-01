<?php


namespace App\Utilisateur;


use App\DB\DB;
use App\Main\Main;
use PDO;

class AmisDAO{

    private $db, $main, $notification;

    public function __construct(){
        $this->db = DB::getInstance()->connexion();
        $this->main = new Main();
        $this->notification = new NotificationDAO();
    }

    public function manageAmis($id_demandeur, $id_demander, $id_status_amis = null){
        $utilisateurDAO = new UtilisateurDAO();
        $issueError = ["error" => true, "message" => "Cette action n'est pas possible."];
        $possibilitie = [1, 2, 4, 5];
        $possibilitieAfterDemand = [2, 4, 5];

        $id_status_amis = intval($id_status_amis);
        $id_demandeur = intval($id_demandeur);
        $id_demander = intval($id_demander);

        if (!empty($utilisateurDAO->findUtilisateurNoOjbet($id_demandeur, 'id_utilisateur'))){
            if (!empty($utilisateurDAO->findUtilisateurNoOjbet($id_demander, 'id_utilisateur'))){

                if ($id_demandeur != $id_demander){
                    $status = $this->main->getStatus('status_amis', ["id_status_amis" => $id_status_amis]);

                    if (!empty($id_status_amis) && !empty($status)){

                        $listeAmis = $this->main->getStatus('amis', ["id_joueur_demandeur" => $id_demandeur, "id_joueur_demander" => $id_demander]);
                        $demandeur = true;
                        if (empty($listeAmis)){
                            $listeAmis = $this->main->getStatus('amis', ["id_joueur_demandeur" => $id_demander, "id_joueur_demander" => $id_demandeur]);
                            $demandeur = false;
                        }

                        if (!empty($listeAmis)){

                            if (!in_array($id_status_amis, $possibilitie)){
                                return $issueError;
                            }

                            if ($listeAmis[0]->id_status_amis == 3 && $id_status_amis != 4){
                                return $issueError;
                            }elseif ($listeAmis[0]->id_status_amis == 1 && !in_array($id_status_amis, $possibilitieAfterDemand)){
                                return $issueError;
                            }elseif ($listeAmis[0]->id_status_amis == 5 && $id_status_amis != 1){
                                return $issueError;
                            }elseif ($id_status_amis == 3){
                                return $issueError;
                            }

                            $supplies = "";
                            if ($listeAmis[0]->id_status_amis == 4 && $id_status_amis == 1){
                                if ($demandeur == false){
                                    $supplies = ", id_joueur_demandeur = :id_mofif_demandeur,  id_joueur_demander = :id_modif_demander";
                                }
                                $report = ["error" => false, "message" => "La demande d'ami a été envoyée."];
                                $data = [
                                    "title" => "Demande d'amis",
                                    "topic" => "<strong class='text-body'>" . $utilisateurDAO->findUtilisateurNoOjbet($id_demander, 'id_utilisateur', true)[0]->pseudo . "</strong> vous a demander en amis.",
                                    "link" => ROOT . "/profile.php#amis"
                                ];
                                $this->notification->notifyUser($id_demander, $id_demandeur, $data);
                            }
                            if ($listeAmis[0]->id_status_amis == 1 && $id_status_amis == 4){
                                $report = ["error" => false, "message" => "Demande d'amis refusé."];
                            }

                            if ($id_status_amis == 2 && $listeAmis[0]->id_status_amis == 1){
                                $id_status_amis = 3;
                                $report = ["error" => false, "message" => "Vous êtes désormé amis avec cette personne."];
                                $data = [
                                    "title" => "Demande d'amis",
                                    "topic" => "<strong class='text-body'>" . $utilisateurDAO->findUtilisateurNoOjbet($id_demandeur, 'id_utilisateur', true)[0]->pseudo . "</strong> a accepté ta demande.",
                                    "link" => ROOT . "/profile.php#amis"
                                ];
                                $this->notification->notifyUser($id_demander, $id_demandeur, $data);
                            }
                            if ($id_status_amis == 5 && in_array($listeAmis[0]->id_status_amis, [1, 3, 4])){
                                $id_status_amis = 4;
                                if ($listeAmis[0]->id_status_amis == 3){
                                    $report = ["error" => false, "message" => "Cette personne a été retirer de la liste d'amis."];
                                }else{
                                    $report = ["error" => false, "message" => "Votre demande d'amis a été annulé."];
                                }
                            }

                            $req = $this->db->prepare("UPDATE amis SET id_status_amis = :id_status_amis, date_dernier_activite = :date_dernier_activite {$supplies}
                                                            WHERE id_joueur_demandeur = :id_joueur_demandeur
                                                            AND id_joueur_demander = :id_joueur_demander");

                            if ($demandeur == false){
                                if ($listeAmis[0]->id_status_amis == 4 && $id_status_amis == 1){
                                    $req->bindParam(':id_joueur_demandeur', $id_demander, PDO::PARAM_INT);
                                    $req->bindParam(':id_joueur_demander', $id_demandeur, PDO::PARAM_INT);
                                    $req->bindParam(':id_mofif_demandeur', $id_demandeur, PDO::PARAM_INT);
                                    $req->bindParam(':id_modif_demander', $id_demander, PDO::PARAM_INT);
                                }else{
                                    $req->bindParam(':id_joueur_demandeur', $id_demander, PDO::PARAM_INT);
                                    $req->bindParam(':id_joueur_demander', $id_demandeur, PDO::PARAM_INT);
                                }
                            }else{
                                $req->bindParam(':id_joueur_demandeur', $id_demandeur, PDO::PARAM_INT);
                                $req->bindParam(':id_joueur_demander', $id_demander, PDO::PARAM_INT);
                            }
                            $req->bindParam(':id_status_amis', $id_status_amis, PDO::PARAM_INT);
                            $date = date('Y-m-d H:i:s');
                            $req->bindParam(':date_dernier_activite', $date, PDO::PARAM_STR);

                            $req->execute();
                            !isset($report) ? $report = ["error" => false, "message" => "Une action d'interaction à été exécuté."] : null;
                            return $report;
                        }else{

                            if ($id_status_amis === 1){
                                $req = $this->db->prepare("INSERT INTO amis 
                                                                VALUES (:id_joueur_demandeur, :id_joueur_demander, :id_status_amis, :date_demande_amis, null)");
                                $req->bindParam(':id_joueur_demandeur', $id_demandeur, PDO::PARAM_INT);
                                $req->bindParam(':id_joueur_demander', $id_demander, PDO::PARAM_INT);
                                $req->bindParam(':id_status_amis', $id_status_amis, PDO::PARAM_INT);
                                $date = date('Y-m-d H:i:s');
                                $req->bindParam(':date_demande_amis', $date, PDO::PARAM_STR);

                                $req->execute();

                                $data = [
                                    "title" => "Demande d'amis",
                                    "topic" => "<strong class='text-body'>" . $utilisateurDAO->findUtilisateurNoOjbet($id_demandeur, 'id_utilisateur', true)[0]->pseudo . "</strong> vous a demander en amis.",
                                    "link" => ROOT . "/profile.php#amis"
                                ];
                                $this->notification->notifyUser($id_demander, $id_demandeur, $data);
                                return ["error" => false, "message" => "La demande d'amis a été envoyer !"];
                            }
                        }
                    }else{
                        return ["error" => true, "message" => "Une erreur s'est produite lors de l'exécution de l'action."];
                    }
                }else{
                    return null;
                }
            }else{
                return ["error" => true, "message" => "Vous ne pouvais pas rajouter cette personne en amis parce que votre compte n'est pas valide."];
            }
        }else{
            return null;
        }
    }
}