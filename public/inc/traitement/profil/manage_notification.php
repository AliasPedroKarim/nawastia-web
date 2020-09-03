<?php

use App\Main\Main;
use App\Utilisateur\AmisDAO;
use App\Utilisateur\NotificationDAO;
use App\Utilisateur\UtilisateurDAO;

require_once '../../function.php';
require_once '../../pre-load-function.php';

$json = [];

if (isset($_SESSION['_1'])){
    if (isset($_POST) && !empty($_POST)){
        $amisDAO = new AmisDAO();
        $utilisateurDAO = new UtilisateurDAO();
        $main = new Main();
        $notification = new NotificationDAO();
        $allUtilisateur = $utilisateurDAO->getListUtilisateur('object');
        if (isset($_POST['manage_notification']) && !empty($_POST['manage_notification']) && $_POST['manage_notification'] === "true"){

            if (isset($_POST['id_notification']) && !empty($_POST['id_notification'])){
                if (isset($_POST['id_status_notification']) && !empty($_POST['id_status_notification'])) {

                    $id_notification = base64_decode($_POST['id_notification']);
                    $id_status_notification = base64_decode($_POST['id_status_notification']);

                    if (!in_array($id_status_notification, [1, 2])) {
                        return;
                    }
                    if ($id_status_notification == 1) {
                        $id_status_notification = 2;
                    }

                    $res = $notification->changeStatusNotify($id_notification, $_SESSION['_1']->getId(), $id_status_notification);

                    $notificationUtilisateur = $main->getStatus('notification', ["id_notifier" => $_SESSION['_1']->getId(), "id_status_notification" => 1]);

                    ob_start(); ?>

                    <div class="modal-content">
                        <div class="modal-header">

                            <!-- Title -->
                            <h4 class="modal-title text-dark">
                                Notifications <?= count($notificationUtilisateur) > 0 ? "<span class='badge badge-soft-danger' style='font-size: 1rem;;'>" . count($notificationUtilisateur) . "</span>" : null ?>
                            </h4>

                            <!-- Close -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">
                                ×
                              </span>
                            </button>

                        </div>
                        <div class="modal-body bg-white">

                            <!-- List group -->
                            <div class="list-group list-group-flush my-n3">
                                <?php if (isset($main)):

                                    $notificationUtilisateur = $main->getStatus('notification', ["id_notifier" => $_SESSION['_1']->getId()]);

                                    if (!empty($notificationUtilisateur)):
                                        foreach ($notificationUtilisateur as $item => $notif):
                                            if (in_array($notif->id_status_notification, [1, 2])):
                                                $image__notify = $main->getImageUtilisateur($utilisateurDAO, $notif->id_notifieur);
                                                ?>
                                                <a class="notification list-group-item px-0 position-relative"
                                                   data-status="<?= base64_encode($notif->id_status_notification) ?>"
                                                   data-content="<?= base64_encode($notif->id_notification) ?>"
                                                   href="<?= $notif->lien_notification ?>">

                                                    <?= $notif->id_status_notification == 1 ? "<span class='popover-body-indicator bg-danger position-absolute top' style='top: 3px; right: 0px;'></span>" : null ?>

                                                    <div class="row">
                                                        <div class="col-auto">

                                                            <!-- Avatar -->
                                                            <div class="avatar avatar-sm">
                                                                <img
                                                                    src="<?= isset($image__notify) && $image__notify[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $notif->id_notifieur : $image__notify[0]['path']; ?>"
                                                                    alt="..." class="avatar-img rounded-circle">
                                                            </div>

                                                        </div>
                                                        <div class="col ml-n2 d-flex flex-column">
                                                            <div class="h6">
                                                                <?= $notif->titre_notification ?>
                                                            </div>
                                                            <!-- Content -->
                                                            <div class="small text-muted">
                                                                <?= $notif->texte_notification ?>
                                                            </div>

                                                        </div>
                                                        <div class="col-auto">
                                                            <small class="text-muted">
                                                                <?php
                                                                $date_notify = $notif->date_notification;
                                                                $datetime2 = new DateTime($date_notify);
                                                                echo ago($datetime2);
                                                                ?>
                                                            </small>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </a>

                                            <?php endif;
                                        endforeach;
                                    endif;
                                endif; ?>
                            </div>

                        </div>
                    </div>


                    <?php $new_display_activite = ob_get_contents();

                    ob_clean();

                    ob_start(); ?>

                    <span class="icon">
                      <i class="fe fe-bell"></i>
                    </span>

                    <?php if (!empty($main->getStatus('notification', ["id_notifier" => $_SESSION['_1']->getId(), "id_status_notification" => 1]))): ?>
                            <span class="popover-body-indicator bg-danger position-absolute top" style="top: 0px; right: 0px;"></span>
                    <?php endif;

                    $data2 = ob_get_contents();
                    ob_clean();

                    array_push($json, [
                        "data" => $new_display_activite,
                        "data2" => $data2,
                        "script" => "<script type='text/javascript' src='assets/js/manage_notification.js'></script>"
                    ]);

                    echo json_encode($json);
                }else{
                    array_push($json, [
                        "error" => true,
                        "message" => "Une erreur est survenue lors de l'exécution de l'action."
                    ]);
                    echo json_encode($json);
                }
            }else{
                array_push($json, [
                    "error" => true,
                    "message" => "Une erreur est survenue lors de l'exécution de l'action."
                ]);
                echo json_encode($json);
            }
        }else{
            header("Location: /");
            die();
        }
    }else{
        header("Location: /");
        die();
    }
}else{
    header("Location: /");
    die();
}