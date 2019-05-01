<?php


namespace App\Utilisateur;


use App\DB\DB;
use App\Main\Main;
use PDO;

class NotificationDAO{

    private $db,
            $main;

    public function __construct(){
        $this->db = DB::getInstance()->connexion();
        $this->main = new Main();
    }

    /*$array = [
            "title" => "",
            "topic" => "",
            "link" => ""
        ];*/

    public function notifyUser($id_notifier, $id_notifieur, $data = ["title" => "", "topic" => "", "link" => ""]){

        $i = $this->main->getStatus('utilisateur', ["id_utilisateur" => $id_notifier]);
        if (!empty($i)){
            $j = $this->main->getStatus('utilisateur', ["id_utilisateur" => $id_notifieur]);
            if (!empty($j)){
                if (!empty($data)){

                    $req = $this->db->prepare("INSERT INTO notification 
                                                  VALUES (null, :titre_notification, :date_notification, :texte_notification, :lien_notification, :id_notifieur, :id_notifier, :id_status_notification)");

                    $req->bindValue(":titre_notification", $data['title']);
                    $date = date("Y-m-d H:i:s");
                    $req->bindValue(":date_notification", $date);
                    $req->bindValue(":texte_notification", $data['topic']);
                    $req->bindValue(":lien_notification", $data['link']);
                    $req->bindValue(":id_notifieur", $id_notifieur);
                    $req->bindValue(":id_notifier", $id_notifier);
                    $req->bindValue(":id_status_notification", 1);

                    $req->execute();
                }
            }
        }
    }

    public function changeStatusNotify($id_notification, $id_notifier, $id_status_notification){
        $i = $this->main->getStatus("notification", ["id_notification" => $id_notification, "id_notifier" => $id_notifier]);
        if (isset($i) && !empty($i)){
            $req = $this->db->prepare("UPDATE notification SET id_status_notification = :id_status_notification 
                                                WHERE id_notification = :id_notification AND id_notifier = :id_notifier");

            $req->bindValue(":id_status_notification", $id_status_notification);
            $req->bindValue(":id_notification", $id_notification);
            $req->bindValue(":id_notifier", $id_notifier);

            $req->execute();
            return true;
        }else{
            return false;
        }
    }

}